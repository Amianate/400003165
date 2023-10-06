<?php

require_once "getDb.php";
require_once "registrationController.php";

$dbObj = new database();

$dbConnection = $dbObj->createConnection();

$regController = new regisistrationController();

try{
    $regController->checkPw();
}
catch(\Exception $e){
    $querystring = urlencode($e->getMessage());
    header("Location: registration.php?pw=" . $querystring);
    exit();
}
