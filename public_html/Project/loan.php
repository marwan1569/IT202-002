<?php 
require_once(__DIR__ . '/../../partials/nav.php');
require_once(__DIR__ . '/../../lib/user_helpers.php');
if(!is_logged_in()){
    flash("You need to log in first!");
    die(header("Location: login.php"));
}
?>

<?php
$id = get_user_id();
$results = [];
    $db = getDB();
    $stmt = $db->prepare("SELECT id, account_number, balance, account_type, created, modified from Accounts WHERE user_id like :id");
    $r = $stmt->execute([":id" => $id]);
    if ($r) {
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    else {
        flash("There was a problem fetching the results");
    }
?>
<?php
if(isset($_POST["save"])){
    $bal = $_POST["balance"];
    if ($bal < 500){
        flash("Please enter a balance greater than $500");
    }else{
        $acctnum = rand(100000000000, 999999999999);
        $dest_acc = $_POST["dest_acc"];
        $apy = 0.1;
        $opened = date('Y-m-d H:i:s');
        $updated = $opened;
        $stmt = $db->prepare("INSERT INTO Accounts (account_number, account_type, balance, created, modified, user_id, APY) VALUES(:acctnum, :accttype, :balance, :created, :modified, :user, :apy)");
        $r = $stmt->execute([
            ":acctnum"=>$acctnum,
            ":accttype"=>"Loan",
            ":created"=>$opened,
            ":modified"=>$updated,
            ":user"=>$id,
            ":apy"=>$apy,
            //":balance"=>$bal
        ]);
        if($r){
            // var_dump($r);

            // $stmt = $db->prepare("SELECT id FROM Accounts where account_number =:num");
            // $r = $stmt->execute([":num" => $dest_acc]);
            // $result = $stmt->fetch(PDO::FETCH_ASSOC);
            // if (!$result) {
            //     $e = $stmt->errorInfo();
            //     flash($e[2]);
            // }else{
                $accountID = $db->lastInsertId();

                $src_id = getWorldId();
                do_bank_action($src_id, $accountID, $bal, "0", "Got a loan", $opened);
                flash("Your new account has been created successfully!");
                die(header("Location: ./view_accounts.php"));  

        }
        else{
            $e = $stmt->errorInfo();
            flash("Error creating: " . var_export($e, true));
        }
    }

}


?>
<form method="POST">
<label> Destination Account <label>
<select name="dest_acc" required>
        <?php foreach ($results as $account): ?>
            <option value="<?php se($account["account_number"]); ?>">
                <?php se($account["account_number"]); ?>
            </option>
        <?php endforeach; ?> 
    </select> 
	<label>Loan Amount</label>
	<input type="number" min="500" name="balance"/>
	<input type="submit" name="save" value="Get Loan"/>
</form>


<?php require(__DIR__ . '/../../partials/flash.php'); ?>