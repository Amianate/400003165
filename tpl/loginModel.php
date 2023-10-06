<?php

function findPw()
{
    require_once "getDb.php";

    $dbObj = new database();
    $dbConnection = $dbObj->createConnection();

    $query = "SELECT users.password FROM users;";
    
    $results = $dbConnection->query($query);

    if ($results->num_rows < 0) {

        // If the password matches the hashed one stored
        foreach ($result as $row) {

            if(password_verify($_REQUEST['pwField'], $row['password'])){
                return true;
            };
        }
    }
    else{
        return false;
    }
}

function findEmail(){

}
