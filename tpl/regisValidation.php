<?php

require_once "getDb.php";
require_once "registrationController.php";

$dbObj = new database();

$dbConnection = $dbObj->createConnection();

$regController = new registrationController();


// Trying and catching any username errors
try {
    $regController->checkName();
} catch (\Exception $e) {
    $querystring = urlencode($e->getMessage());
    header("Location: registration.php?name=" . $querystring);
    exit();
}


// Trying and catching any email errors
try {
    $regController->checkEmail();
} catch (\Exception $e) {
    $querystring = urlencode($e->getMessage());
    header("Location: registration.php?email=" . $querystring);
    exit();
}


// Trying and catching any password errors
try {
    $regController->checkPw();
} catch (\Exception $e) {
    $querystring = urlencode($e->getMessage());
    header("Location: registration.php?pw=" . $querystring);
    exit();
}


// If no errors are caught:
try {
    // Enter user to database
    $regController->registerUser();
    header("Location: login.php");
    exit();
    
} catch (\Exception $e) {
    // Do if user could not be inserted
    $querystring = urlencode($e->getMessage());
    header("Location: registration.php?entry=" . $querystring);
    exit();
}
