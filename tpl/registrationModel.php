<?php
require_once "getDb.php";

$dbObj = new database();
$dbConnection = $dbObj->createConnection();


if (isset($_REQUEST['usernameField'])) {
    $query = "SELECT `users`.`username` FROM `users`;";
    $results = $dbConnection->query($query);

    if ($results->num_rows > 0) {

        while ($row = $results->fetch_assoc()) {
            if ($row == $_REQUEST['usernameField']) {
                echo "Your username is not unique.";
            }
        }
    } else {
        echo "Please enter a username";
    }
}   
