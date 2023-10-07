<?php

include "loginModel.php";
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
        $modelObj = new loginModel();

        if(!$modelObj->findPw()){
            throw new \Exception("Invalid email/password");
        }
    }

    function checkEmail(){        
        $modelObj = new loginModel();
        
        // Checking if the email is valid
        if (! filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
            throw new \Exception("Invalid email/password");
        }
        // Checking for the password in the database
        if (!$modelObj->findEmail()){
            throw new \Exception("Invalid email/password");
        }


    }
}