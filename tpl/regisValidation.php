<?php

require_once "getDb.php";
require_once "registrationController.php";

$dbObj = new database();

$dbConnection = $dbObj->createConnection();

$regController = new regisistrationController();

// Trying and catching any username errors
try{
    $regController->checkName();
}
catch(\Exception $e){
    $querystring = urlencode($e->getMessage());
    header("Location: registration.php?name=" . $querystring);
    exit();
}

// Trying and catching any email errors
try{
    $regController->checkEmail();
}
catch(\Exception $e){
    $querystring = urlencode($e->getMessage());
    header("Location: registration.php?email=" . $querystring);
    exit();
}

// Trying and catching any password errors
try{
    $regController->checkPw();
}
catch(\Exception $e){
    $querystring = urlencode($e->getMessage());
    header("Location: registration.php?pw=" . $querystring);
    exit();
}
