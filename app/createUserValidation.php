<?php

require_once "getDb.php";
require_once "createUserController.php";

$dbObj = new database();

$dbConnection = $dbObj->createConnection();

$createController = new createUserController();


// Trying and catching any username errors
try {
    $createController->checkName();
} catch (\Exception $e) {
    $querystring = urlencode($e->getMessage());
    header("Location: createUser.php?name=" . $querystring);
    exit();
}


// Trying and catching any email errors
try {
    $createController->checkEmail();
} catch (\Exception $e) {
    $querystring = urlencode($e->getMessage());
    header("Location: createUser.php?email=" . $querystring);
    exit();
}


// Trying and catching any password errors
try {
    $createController->checkPw();
} catch (\Exception $e) {
    $querystring = urlencode($e->getMessage());
    header("Location: createUser.php?pw=" . $querystring);
    exit();
}


// If no errors are caught:
try {
    // Enter user to database
    $createController->registerUser();
    // USe the role variable to redirect the user to the appropriate dashboard
    session_start();
    if (isset($_SESSION["role"])) {

        if ($_SESSION["role"] == "Research Study Manager") {
            header("Location: smDashboard.php");
            exit();
        } 
        else if ($_SESSION["role"] == "Researcher") {
            header("Location: researcher.php");
            exit();
        }
        else {
            header("Location: gmDashboard.php");
            exit();
    } 
    }
    
} catch (\Exception $e) {
    // Do if user could not be inserted
    $querystring = urlencode($e->getMessage());
    header("Location: createUser.php?entry=" . $querystring);
    exit();
}
