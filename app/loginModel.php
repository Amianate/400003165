<?php


class loginModel
{
    function findPw()
    {
        require_once "database.php";

        $dbObj = new database();
        $dbConnection = $dbObj->createConnection();

        $query = "SELECT users.password FROM users;";

        $results = $dbConnection->query($query);

        if ($results->num_rows > 0) {
            // If the password matches the hashed one stored
            foreach ($results as $row) {

                if (password_verify($_REQUEST['pwField'], $row['password'])) {
                    return true;
                };
            }
        } else {
            return false;
        }
    }

    function findEmail()
    {
        require_once "database.php";

        $dbObj = new database();
        $dbConnection = $dbObj->createConnection();

        $query = "SELECT * FROM `users` WHERE email = ?";
        $statement = $dbConnection->prepare($query);
        $statement->bind_param("s", $_REQUEST['emailField']);

        if ($statement->execute()) {
            $result = $statement->get_result();

            // Check if a row was found
            if ($result->num_rows > 0) {
                session_start();

                $row = $result->fetch_assoc();

                // Placing the user information into the session variables
                $_SESSION["username"] = $row['username'];
                $_SESSION["pw"] = $row['password'];
                $_SESSION["email"] = $row['email'];
                $_SESSION["role"] = $row['role'];

                $statement->close();
                return true;
            }
        } else {
            $statement->close();
            return false;
        }
    }
}
