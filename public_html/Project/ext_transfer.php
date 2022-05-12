<?php 
require_once(__DIR__ . '/../../partials/nav.php');

if(!is_logged_in()){
    flash("You need to login first!");
    die(header("Location: login.php"));
}

$srcID = get_user_id();
$db = getDB();     
$stmt = $db->prepare("SELECT id, account_number from Accounts WHERE user_id=:user_id order by created DESC");
$r = $stmt->execute([":user_id"=>get_user_id()]);
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<form method="POST"> 
	<label for "account1"><h3><u> Transfer from Account:</u></h3></label>
	<select name="account1" id="account1">
	  <?php foreach($results as $r):?>
	    <option value="<?php se($r["id"]);?>"><?php se($r["account_number"]);?></option>
	  <?php endforeach;?>
	</select>
	<label for "account2"><h3><u>Transfer to Account:</u></h3></label>
        <input type="number" name="account2" min="999" max="9999" placeholder="Enter Last 4 Digits of Account Number"    required/>
	<input type="text" name="LastName" placeholder="Enter Last Name of Account Holder" required/>
	<input type="number" name="amount" min="0" placeholder="$0.00" required/>
	<input type="hidden" name="type" value="<?php echo $_GET['type'];?>"/>
	<input type="text" name="memo" placeholder="Write Memo Here" />
	<input type="submit" value="Transfer"/>
</form>

<?php
if(isset($_POST['type']) && isset($_POST['account1']) && isset($_POST['amount'])){
	$type = 3;
	$amount = (int)$_POST['amount'];
	$memo = "";
	$isvalid = true;
	if($amount <= 0){ 
	    flash("Amount must be greater than 0!");
	    $isvalid = false;
	}
	if(isset($_POST['memo']) && !empty($_POST['memo'])){
	   $memo = $_POST['memo'];
	}
	else{
	   $memo = "N/A";
	}
	if(isset($_POST['account2']) && $_POST['account1'] == $_POST['account2']){ 
	    flash("Source and Destination account can not be the same!");
	    $isvalid = false;
	}
	if($isvalid){
	    if(getRealTimeBalance($_POST['account1']) >= $amount){

	        do_bank_extTransfer($source, $LastName, $accNum, $amountChange, $type, $memo, $date);
	        flash("Your transfer has successfully been completed!");
	    }else{
		flash("You do not have enough to transfer this amount");
	    }
	}
}
require(__DIR__ . '/../../partials/flash.php');
?>
}