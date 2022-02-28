<?php
session_start();
session_unset();
session_destroy();
session_start();
require(__DIR__ . "/../../partials/flash.php");
flash("Successfully logged out", "success");
header("Location: login.php");
