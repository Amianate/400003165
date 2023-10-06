<?php

function searchUsername()
{
    require_once "getDb.php";

    $dbObj = new database();
    $dbConnection = $dbObj->createConnection();

    $query = "SELECT * FROM `users` WHERE username = '" . $_REQUEST['usernameField'] .  "';";

    $results = $dbConnection->query($query);

    if ($results->num_rows > 0) {
        return "Your username is not unique.";
    }
}

function insertUser()
{
    require_once "getDb.php";

    $dbObj = new database();

    try {
        $dbConnection = $dbObj->createConnection();
        $username = $_REQUEST['usernameField'];
        $pw = password_hash($_REQUEST['pwField'], PASSWORD_DEFAULT);
        $email = $_REQUEST['emailField'];
        $role = $_REQUEST['roleField'];

        // Adding the user to the database as a researcher by default 
        $query = "INSERT INTO `users`(`id`, `username`, `password`, `email`, `role`) VALUES ('NULL','" . $username ."' ,'" . $pw ."','". $email ."','". $role . "')";
        $results = $dbConnection->query($query);
        
    } catch (\Exception $e) {
        return "Could not insert new user.";
     }
}
