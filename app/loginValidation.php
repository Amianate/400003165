<?php
include "autoloader.php";

$dbObj = new database();
$dbConnection = $dbObj->createConnection();

$logController = new loginController();

// Validate passsword
try{
    $logController->checkPw();
}
catch(\Exception $e){
    $querystring = urlencode($e->getMessage());
    header("Location: login.php?error=" . $querystring);
    exit();
}

// Validate email
try{
    $logController->checkEmail();
}
catch(\Exception $e){
    $querystring = urlencode($e->getMessage());
    header("Location: login.php?error=" . $querystring);
    exit();
}


// If no errors are caught, redirect to the appropriate pages
if($_SESSION["role"] == "Research Study Manager"){
    header("Location: smDashboard.php");
    exit();
}
else if($_SESSION["role"] == "Research Group Manager"){
    header("Location: gmDashboard.php");
    exit();
}
else{
    header("Location: researcher.php");
    exit();
}