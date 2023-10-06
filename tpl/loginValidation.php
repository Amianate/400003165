<?php

require_once "getDb.php";
require_once "loginController.php";

$dbObj = new database();

$dbConnection = $dbObj->createConnection();

$logController = new loginController();


try{
    $logController->checkPw();
}
catch(\Exception $e){
    $querystring = urlencode($e->getMessage());
    header("Location: login.php?error=" . $querystring);
    exit();
}

// If no errors are caught:


header("Location: gmDashboard.html");
    exit();