<?php
    require(__DIR__ . "/../../../partials/nav.php");
    $db = getDB();
    if((isset($_POST['FirstName'])|| isset($_POST['LastName']))){
        $FirstName='';
        $LastName='';
        if(isset($_POST['FirstName'] )){
            $FirstName=$_POST['FirstName'];}
            if(isset($_POST['LastName'] )){
                $LastName=$_POST['LastName'];}
        $stmt = $db ->prepare("SELECT * FROM Users WHERE FirstName like :FirstName AND LastName like :LastName");
    $r = $stmt->execute([ ":FirstName" => "%$FirstName%", ":LastName" => "%$LastName%"]);
    if ($r) {
        $user_results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    else {
        $e = $stmt->errorInfo();
    flash($e[2]);
    
    }
}
     if(isset($_POST['search'])&& isset($_POST['account'])){
        $Account=$_POST['account'];
        $stmt = $db ->prepare("SELECT * FROM Accounts WHERE account_number like :account_number");
    $r = $stmt->execute([ ":account_number" => "%$Account%" ]);
    if ($r) {
        $acct_result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    else {
        $e = $stmt->errorInfo();
    flash($e[2]);
    } 
    
}


    ?>
<form method="POST"> 
        <input type="number" name="account" min="999" max="9999" placeholder="account number"/>
        <input type="text" name="FirstName" placeholder="Enter First Name of user"/>
	<input type="text" name="LastName" placeholder="Enter Last Name of user"/>
		<input type="submit" name="search" value="Search"/>
</form>
    
    <table class="table table-bordered " style="background-color: white;">
        <?php if (isset($user_results) > 0): ?>
            <thead>
         <tr class="text-center">
           <th scope="col">First Name</th>
               <th scope="col">Last Name</th>
          </tr>
        </thead>
    
                <?php foreach ($user_results as $r): ?>
                    <tbody>
                    
                    
              <tr>
                        <td class="text-center"><?php se($r["FirstName"]);?></td>
                        <td class="text-center"><?php se($r["LastName"]);?></td>
    
                        
    
    
                    </tr>
                    </tbody>
    
                <?php endforeach; ?>
                <?php endif; ?>
                <table class="table table-bordered " style="background-color: white;">
        <?php if (isset($acct_result) > 0): ?>
            <thead>
         <tr class="text-center">
           <th scope="col">Account Number</th>
               <th scope="col">Account Type </th>
               <th scope="col">Account balance </th>
          </tr>
        </thead>
    
                <?php foreach ($acct_result as $r): ?>
                    <tbody>
                    
                    
              <tr>
                        <td class="text-center"><?php se($r["account_number"]);?></td>
                        <td class="text-center"><?php se($r["account_type"]);?></td>
                        <td class="text-center"><?php se($r["balance"]);?></td>
    
                        
    
    
                    </tr>
                    </tbody>
    
                <?php endforeach; ?>
                <?php endif; ?>