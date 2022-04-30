<?php
require(__DIR__ . "/../../partials/nav.php");

$srcID = get_user_id();
$db = getDB();
$stmt = $db->prepare("SELECT id, account_number from Accounts WHERE user_id=:user_id order by created DESC");
$r = $stmt->execute([":user_id"=>get_user_id()]);
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<form method="POST">
    <label>Destination Account</label>
    <select name="dest_acc" required>
        <?php foreach ($results as $r): ?>
            <option value="<?php se($r["id"]);?>"><?php se($r["account_number"]);?></option>
        <?php endforeach; ?>
    </select>
</form>
<?php ?>
</div>
<label>Memo</label>
<input name="memo"/>

<label>Amount</label>
<input type="number" min="0" name="amount" required/>
<input type="submit" name="save" value="Complete Transaction"/>
</form>

<?php 
if(isset($_POST["save"])){
$src_id = $_POST["src_acc"];
if($src_id == '-1'){
    flash("please choose an account");
}
$amount = $_POST["amount"];
$dest_id='';

$memo = $_POST["memo"];
$created = date('Y-m-d H:i:s');
$res=NULL;
if($type == "Deposit"){
    $dest_id = $src_id;
    $src_id = getWorldID();
    $res = do_bank_action($src_id, $dest_id, $amount, $type, $memo, $created);

}elseif($type == "Withdraw"){
    if(getRealTimeBalance($src_id) <= $amount){

        flash("You do not have enough to withdraw this amount");
    }else{
        $dest_id = getWorldID();
        $res = do_bank_action($src_id, $dest_id, $amount, $type, $memo, $created);

    }

}else{
    if($dest_id == '-1'){
        flash("please choose a destination account");
    }
    $dest_id = $_POST["dest_acc"];
    $res = do_bank_action($src_id, $dest_id, $amount, $type, $memo, $created);

}

if ($res){
    flash("Transaction Successful");
}
}