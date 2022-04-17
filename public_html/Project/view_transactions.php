<?php require_once(__DIR__ . '/../../partials/nav.php'); ?>
<?php
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
    $stmt = $db->prepare("SELECT source.account_number as source, dest.account_number as dest, ExpectedTotal, memo, T.TransactionType, T.BalanceChange, T.created from Transactions as T JOIN Accounts as source on source.id = T.source JOIN Accounts as dest on dest.id = T.dest WHERE T.source =:id LIMIT 10");
    $r = $stmt->execute([":id" => $id]);
    if ($r) {
	$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    else {
        flash("There was a problem fetching the results");
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
        </table>
    <?php else: ?>
        <p>No results</p>
    <?php endif; ?>

<p></p>
  <!-- <ul class="pagination pagination-lg">
    <li>1</li>
    <li>2</li>
    <li>3</li>
    <li>4</li>
    <li>5</li>
  </ul> -->
<?php require(__DIR__ . '/../../partials/flash.php'); ?>