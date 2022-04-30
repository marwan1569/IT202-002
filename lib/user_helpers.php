<?php

/**
 * Passing $redirect as true will auto redirect a logged out user to the $destination.
 * The destination defaults to login.php
 */
function is_logged_in($redirect = false, $destination = "login.php")
{
    $isLoggedIn = isset($_SESSION["user"]);
    if ($redirect && !$isLoggedIn) {
        //if this triggers, the calling script won't receive a reply since die()/exit() terminates it
        flash("You must be logged in to view this page", "warning");
        die(header("Location: $destination"));
    }
    return $isLoggedIn;
}
function has_role($role)
{
    if (is_logged_in() && isset($_SESSION["user"]["roles"])) {
        foreach ($_SESSION["user"]["roles"] as $r) {
            if ($r["name"] === $role) {
                return true;
            }
        }
    } 
    return false;
}
function get_username()
{
    if (is_logged_in()) { //we need to check for login first because "user" key may not exist
        return se($_SESSION["user"], "username", "", false);
    }
    return "";
}
function get_user_email()
{
    if (is_logged_in()) { //we need to check for login first because "user" key may not exist
        return se($_SESSION["user"], "email", "", false);
    }
    return "";
}
function get_user_id()
{
    if (is_logged_in()) { //we need to check for login first because "user" key may not exist
        return se($_SESSION["user"], "id", false, false);
    }
    return false;
}
function get_account_balance()
{
    if (is_logged_in() && isset($_SESSION["user"]["account"])) {
        return (int)se($_SESSION["user"]["account"], "balance", 0, false);
    }
    return 0;
}
function do_bank_action($account1, $account2, $amountChange, $type, $memo){
    $db = getDB();
    $stmt = $db ->prepare("SELECT balance FROM Accounts WHERE id=:id");
    $r = $stmt->execute([ ":id" => $account1]);
    $src =$stmt->fetch(PDO::FETCH_ASSOC);
    $src_total =$src['balance'];

    if ($account1 > 1 && $src_total < $amountChange){
        flash ("You do not have enough money available for this transaction");
        return false;
    }

    $src_total -= $amountChange;

    $stmt = $db ->prepare("SELECT balance FROM Accounts WHERE id=:id");
    $r = $stmt->execute([ ":id" => $account2]);
    $dest = $stmt->fetch(PDO::FETCH_ASSOC);
    $dest_total =$dest['balance'];
    $dest_total += $amountChange;

    $query = "INSERT INTO `Transactions` (`source`, `dest`, `BalanceChange`, `TransactionType`, `memo`, `ExpectedTotal`) 
    VALUES(:p1a1, :p1a2, :p1change, :type, :memo, :a1total), 
            (:p2a1, :p2a2, :p2change, :type, :memo, :a2total)";
    
    $stmt = $db->prepare($query);
    $stmt->bindValue(":p1a1", $account1);
    $stmt->bindValue(":p1a2", $account2);
    $stmt->bindValue(":p1change", $amountChange*-1);
    $stmt->bindValue(":type", $type);
    $stmt->bindValue(":memo", $memo);
    $stmt->bindValue(":a1total", $src_total);
    // $stmt->bindValue(":date", $date);
    //flip data for other half of transaction
    $stmt->bindValue(":p2a1", $account2);
    $stmt->bindValue(":p2a2", $account1);
    $stmt->bindValue(":p2change", ($amountChange));
    $stmt->bindValue(":type", $type);
    $stmt->bindValue(":memo", $memo);
    $stmt->bindValue(":a2total", $dest_total);
    // $stmt->bindValue(":date", $date);
    $r = $stmt->execute();
    if($r){
        updateAccount($account1, $src_total);
        updateAccount($account2, $dest_total);
    }
    else{
        $e = $stmt->errorInfo();
        flash("Error creating: " . var_export($e, true));
    }
    
    return $r;
}
function updateAccount($id, $bal){
    $db = getDB();
    $stmt = $db->prepare("UPDATE Accounts set balance=:bal where id=:id");
    $r = $stmt->execute([
        ":bal"=>$bal,
        // ":modified"=>$date,
        ":id"=>$id
    ]);
    if($r){
        return $r;
    }
    else{
        $e = $stmt->errorInfo();
        flash("Error updating: " . var_export($e, true));
    }
    return $r;
}
function getRealTimeBalance($balanceChange){
    $db = getDB();
    $q = "SELECT ifnull(SUM(balance), 0) as total from Accounts WHERE id=:id";
    $stmt = $db->prepare($q);
    $s = $stmt->execute([":id" =>$balanceChange]);
    if ($s){
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        $total = (float)$result["total"]; 
        return $total;
    }
    return 0;
}

function do_bank_extTransfer($account1, $LastName, $accNum, $amountChange, $type, $memo, $date){
    $db = getDB();
    $stmt = $db ->prepare("SELECT balance FROM Accounts WHERE id=:id");
    $r = $stmt->execute([ ":id" => $account1]);
    $src =$stmt->fetch(PDO::FETCH_ASSOC);
    $src_total =$src['balance'];

    if ($src_total < $amountChange){
        flash ("You do not have enough money available for this transaction");
        return false;
    }

    $src_total -= $amountChange;

    $stmt = $db ->prepare("SELECT Accounts.id FROM Accounts JOIN Users on Users.id=Accounts.user_id WHERE Accounts.account_number like :accNum AND Users.LastName like :LastName");
    $r = $stmt->execute([ ":accNum" => "%$accNum", ":LastName" => "%$LastName%"]);
    if ($r) {
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
    }
    else {
        $e = $stmt->errorInfo();
    flash($e[2]);
    }
    $account2 = $result['id'];
    $stmt = $db ->prepare("SELECT balance FROM Accounts WHERE id=:id");
    $r = $stmt->execute([ ":id" => $account2]);
    $dest = $stmt->fetch(PDO::FETCH_ASSOC);
    $dest_total =$dest['balance'];
    $dest_total += $amountChange;
    $query = "INSERT INTO `Transactions` (`source`, `dest`, `BalanceChange`, `TransactionType`, `memo`, `ExpectedTotal`)  VALUES(:p1a1, :p1a2, :p1change, :type, :memo, :a1total), 
            (:p2a1, :p2a2, :p2change, :type, :memo, :a2total)";
$stmt = $db->prepare($query);
error_log("query: $query");
    $stmt->bindValue(":p1a1", $account1);
    $stmt->bindValue(":p1a2", $account2);
    $stmt->bindValue(":p1change", $amountChange*-1);
    $stmt->bindValue(":type", $type);
    $stmt->bindValue(":memo", $memo);
    $stmt->bindValue(":a1total", $src_total);
    // $stmt->bindValue(":date", $date);
    //flip data for other half of transaction
    $stmt->bindValue(":p2a1", $account2);
    $stmt->bindValue(":p2a2", $account1);
    $stmt->bindValue(":p2change", ($amountChange));
    $stmt->bindValue(":type", $type);
    $stmt->bindValue(":memo", $memo);
    $stmt->bindValue(":a2total", $dest_total);
    // $stmt->bindValue(":date", $date);
      $r = $stmt->execute();
      if($r){
        updateAccount($account1, $src_total, $date);
        updateAccount($account2, $dest_total, $date);
      }
      else{
          $e = $stmt->errorInfo();
          flash("Error creating: " . var_export($e, true));
      }
      return $r;
  }

