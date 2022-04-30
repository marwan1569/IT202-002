<?php require_once(__DIR__ . '/../../partials/nav.php'); ?>
<?php
$StartDate="0000-00-00";
$EndDate=date('Y-m-d');
if (!is_logged_in()) {
    //this will redirect to login and kill the rest of this script (prevent it from executing)
    flash("You need to be logged in to access this page");
    die(header("Location: login.php"));
}
?>

<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
</head>


<?php  
$page = 1;
$per_page = 10;
if(isset($_GET["page"])){
    try {
        $page = (int)$_GET["page"];
    }
    catch(Exception $e){

    }
}

?>

<?php
//fetching
$id = -1;
if(isset($_GET["id"])){
    $id = $_GET["id"];
}
$results = [];
if (isset($id)) {
    $db = getDB();
    $stmt = $db->prepare("SELECT source.account_number as source, dest.account_number as dest, ExpectedTotal, memo, T.TransactionType, T.BalanceChange, T.created from Transactions as T JOIN Accounts as source on source.id = T.source JOIN Accounts as dest on dest.id = T.dest WHERE T.source =:id and T.created BETWEEN :StartDate AND :EndDate order by created DESC LIMIT :Pagecount OFFSET :offset");

    $stmt->bindValue(":offset", (int)(($page-1) * $per_page), PDO::PARAM_INT);
    $stmt->bindValue(":Pagecount", $per_page, PDO::PARAM_INT);
    $stmt->bindValue(":StartDate", $StartDate, PDO::PARAM_STR);
    $stmt->bindValue(":EndDate", $EndDate, PDO::PARAM_STR);
    $stmt->bindValue(":id", $id);
    $stmt->execute();
	$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    if(isset($_POST["submit"])){
        $edate=date('Y-m-d', strtotime($_POST["EndDate"]. ' + 1 day'));
        $stmt = $db->prepare("SELECT source.account_number as source, dest.account_number as dest, ExpectedTotal, memo, T.TransactionType, T.BalanceChange, T.created from Transactions as T JOIN Accounts as source on source.id = T.source JOIN Accounts as dest on dest.id = T.dest WHERE T.source =:id and T.created BETWEEN :StartDate AND :EndDate LIMIT 10");
        $r = $stmt->execute([":id" => $id,":StartDate"=>$_POST["StartDate"],":EndDate"=>$edate]);
        if ($r) {
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $StartDate=$_POST["StartDate"];
        $EndDate=$_POST["EndDate"];
        }
        else {
            flash("There was a problem fetching the results");
        }  
    }
}
?>

<table class="table table-bordered">
    <?php if (count($results) > 0): ?>
        <thead>
	 <tr class="text-center">
	   <th scope="col">Account Number (dest)</th>
           <th scope="col">Account Number (source)</th>
           <th scope="col">Transaction Type</th>
           <th scope="col">Change</th>
           <th scope="col">Memo</th>
           <th scope="col">Balance</th>
           <th scope="col">Created Date</th>

	  </tr>
	</thead>

            <?php foreach ($results as $r): ?>
                <tbody>
		  <tr>
                    <td class="text-center"><?php se($r["source"]);?></td>
                    <td class="text-center"><?php se($r["dest"]);?></td>

                    <?php if ($r["TransactionType"] == '0'){ ?>
                        <td class="text-center">Withdraw</td>

                   <?php }else {  ?>
                    <td class="text-center">Deposit</td>


                   <?php } ?>
                    <td class="text-center"><?php se($r["BalanceChange"]);?></td>
                    <td class="text-center"><?php se($r["memo"]);?></td>
                    <td class="text-center"><?php se($r["ExpectedTotal"]);?></td>
                    <td class="text-center"><?php se($r["created"]);?></td>

                </tr>
            <?php endforeach; ?>
	  </tbody>
      <div class="mb-3">
      <form method="POST">
        <label for="StartDate">Start Date</label>
        <input type="text" name="StartDate" id="Start Date" value="<?php se($StartDate); ?>" />
        <div class="mb-3">
        <label for="EndDate">End Date</label>
        <input type="text" name="EndDate" id="End Date" value="<?php se($EndDate); ?>" />
        <input type="submit" name="submit" value="Apply"/>
        </form>
        </table>
    <?php else: ?>
        <p>No results</p>
    <?php endif; ?>

<p></p>
<ul class="pagination pagination-lg">
<li><a href="<?php echo get_url('view_transactions.php?id=' . $id); ?>&page=1">1</a></li>
<li><a href="<?php echo get_url('view_transactions.php?id=' . $id); ?>&page=2">2</a></li>
    <li><a href="<?php echo get_url('view_transactions.php?id=' . $id); ?>&page=3">3</a></li>
    <li><a href="<?php echo get_url('view_transactions.php?id=' . $id); ?>&page=4">4</a></li>
    <li><a href="<?php echo get_url('view_transactions.php?id=' . $id); ?>&page=5">5</a></li>
    <li><a href="<?php echo get_url('view_transactions.php?id=' . $id); ?>&page=6">6</a></li>
    <li><a href="<?php echo get_url('view_transactions.php?id=' . $id); ?>&page=7">7</a></li>
    <li><a href="<?php echo get_url('view_transactions.php?id=' . $id); ?>&page=8">8</a></li>
    <li><a href="<?php echo get_url('view_transactions.php?id=' . $id); ?>&page=9">9</a></li>
    <li><a href="<?php echo get_url('view_transactions.php?id=' . $id); ?>&page=10">10</a></li>
    <li?><a href="<?php echo get_url('view_transactions.php?id=' . $id); ?>&page=1&type=" . $type>Deposit</a></li>
  </ul>
<?php require(__DIR__ . '/../../partials/flash.php'); ?>