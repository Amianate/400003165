<?php

class loginController
{
    // private $pw;
    private $email;

    function __construct()
    {
            // $this->pw = $_POST["pwField"];
            $this->email = $_POST["emailField"];
    }

    function checkPw(){
        include_once "loginModel.php";

        if(!findPw()){
            throw new \Exception("Invalid password");
        }
    }

    function checkEmail(){        
        include_once "loginModel.php";
        
        // Checking if the email is valid
        if (! filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
            throw new \Exception("Invalid email/password");
        }
        // Checking for the password in the database
        if (!findEmail()){
            throw new \Exception("Invalid email/password");
        }


    }
}


    // echo $_POST["usernameField"];
    // echo $_POST["emailField"];
    // echo $_POST["pwField"];
