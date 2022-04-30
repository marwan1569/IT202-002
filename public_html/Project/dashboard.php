<?php
require (__DIR__ . "/../../partials/nav.php"); 
?>
<h1>Dashboard</h1>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<link rel="stylesheet" href="<?php echo get_url('styles.css'); ?>">

<nav class="navbar navbar-expand-lg navbar-light bg-warning">
<div class="container-fluid">

<div class="collapse navbar-collapse" id="navContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
               <li class="nav1-item"> <a class="nav-link" href="<?php echo get_url('create_acct.php'); ?>"> Create Account </a></li>
                <li class="nav-item"><a class="nav-link" href="<?php echo get_url('profile.php'); ?>"> Profile </a></li>
                <li class ="nav-item " > <a class="nav-link" href="<?php echo get_url('transaction.php?type=deposit'); ?>"> Deposit </a></li>
                <li class ="nav-item" > <a class="nav-link" href="<?php echo get_url('transaction.php?type=withdraw'); ?>"> Withdraw </a></li>
                <li class ="nav-item" > <a class="nav-link" href="<?php echo get_url('transfer.php');?>"> Transfer </a></li>
                <li class ="nav-item" > <a class="nav-link" href="<?php echo get_url('view_accounts.php'); ?>"> My Accounts </a></li>
                <li class ="nav-item" > <a class="nav-link" href="<?php echo get_url('external_transfer.php?type=external_transfer');?>"> External Transfer </a></li>
            </ul>
        </div>
    </div>
</nav>

<?php
require(__DIR__ . "/../../partials/flash.php");
?>