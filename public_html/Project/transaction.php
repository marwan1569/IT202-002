<?php
require_once(__DIR__ . '/../../partials/nav.php');

use function PHPSTORM_META\type;

if (!is_logged_in()){
    flash("You need to login first!");
    die(header("Location: login.php"));
}

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$srcID = get_user_id();
$db = getDB();      
$stmt = $db->prepare("SELECT id, account_number from Accounts WHERE user_id=:user_id order by created DESC LIMIT 10");
$r = $stmt->execute([":user_id"=>get_user_id()]);
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

$q = "SELECT id from Accounts WHERE account_number='000000000000'";
$stmt = $db->prepare($q);
	$s = $stmt->execute();
	$res = $stmt->fetch(PDO::FETCH_ASSOC);
$worldID = $res["id"];
?>

<form method="POST"> 
	<label for "source"><h3> Source Account</h3></label>
	<select name="source" id="source">
	  <?php foreach($results as $r):?>
	    <option value="<?php se($r["id"]);?>"><?php se($r["account_number"]);?></option>
	  <?php endforeach;?>
	</select>
	<?php if($_GET == 'transfer') : ?>

	<label for "dest"><h3> Destination Account</h3></label>
	<select name="dest" id="dest">
          <?php foreach($results as $r):?>
            <option value="<?php se($r["id"]);?>"><?php se($r["account_number"]);?></option>
          <?php endforeach;?>
        </select>
	<?php endif; ?>
	<!-- <?php if($_GET == 'ext_transfer') : ?> -->
        <!-- <label for "dest"><h3> Destination Account</h3></label> -->
        <!-- <select name="dest" id="dest"> -->
          <!-- <?php foreach($results as $r):?> -->
            <!-- <option value="<?php se($r["id"]);?>"><?php se($r["account_number"]);?></option> -->
          <!-- <?php endforeach;?> -->
        <!-- </select> -->
        <!-- <?php endif; ?> -->
	
	<input type="number" name="amount" placeholder="amount"/>
	<input type="text" name="memo" placeholder="Memo" />
	<input type="submit" value="Transfer" name="submit"/>
</form>


<?php

if(isset($_POST['submit'])){
	if(isset($_POST['source']) && isset($_POST['amount'])){
		
		$type = $_GET['type'];
		$BalanceChange = (int)$_POST['amount'];
		$memo = "";
		$isvalid = true;
		if($BalanceChange <= 0){
			flash("Amount must be greater than $0!");
			$isvalid = false;
		}
		if(isset($_POST['memo']) && !empty($_POST['memo'])){
		   $memo = $_POST['memo'];
		}
		else{
		   $memo = "N/A";
		}
	}
	if(isset($_POST['dest']) && $_POST['source'] == $_POST['dest']){
	    flash("Source and Destination account can not be the same!");
	    $isvalid = false;
	}
		if($isvalid){

	    switch($type){

		case 'deposit':
			do_bank_action($worldID, $_POST['source'], ($BalanceChange), '0', $memo);
			flash("Deposit Successful!");
			break;
		case 'withdraw':
			flash($_POST['source']);
			if(getRealTimeBalance($_POST['source']) >= $BalanceChange){
			    do_bank_action($_POST['source'], $worldID, ($BalanceChange), '1', $memo);
			    flash("Withdrawal Successful!");
			}else{
			    flash("You do not have enough to withdraw this amount");
			}break;
		case 'transfer':
			if(getRealTimeBalance($_POST['source']) >= $BalanceChange){
			    do_bank_action($_POST['dest'], $_POST['source'], ($BalanceChange * -1), '2', $memo);
			    flash("Your transaction has successfully been posted!");
			}else{
				flash("You do not have enough to transfer this amount");
			}break;
	   }
		}}

require(__DIR__ . '/../../partials/flash.php');
?>