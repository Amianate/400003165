<?php

class createUserModel{
    
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
        $dbConnection = $dbObj->createConnection();

        // Attempting to insert a user into the db and throwing an error if unsuccessful 
        try {
            $username = $_REQUEST['usernameField'];
            $pw = password_hash($_REQUEST['pwField'], PASSWORD_DEFAULT);
            $email = $_REQUEST['emailField'];
            $role = $_REQUEST['roleField'];

            // Adding the user to the database as a researcher by default 
            $query = "INSERT INTO `users`(`id`, `username`, `password`, `email`, `role`) VALUES ('NULL','" . $username . "' ,'" . $pw . "','" . $email . "','" . $role . "')";
            $results = $dbConnection->query($query);
        } catch (\Exception $e) {
            return "Could not insert new user.";
        }
        
        // Getting the id no of the user we just inserted, to place it in the user_access_levels table
        $query = "SELECT * FROM `users` WHERE email = ?";
        $statement = $dbConnection->prepare($query);
        $statement->bind_param("s", $_REQUEST['emailField']);

        if ($statement->execute()) {    
            $result = $statement->get_result();

            // Check if a result was found
            if ($result->num_rows > 0) {
                session_start();

                $row = $result->fetch_assoc();

                // Placing the user information into the session variables
                $id = $row['id'];        
                $email = $row['email'];
                $role = $row['role'];

                $query = "INSERT INTO `user_access_levels`(`id`, `email`, `AccessLevel`) VALUES ('". $id ."','". $email . "','". $role . "')";
                $dbConnection->query($query);
            }
        }
    }
}
