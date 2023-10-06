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
