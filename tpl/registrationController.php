<?php

class regisistrationController
{
    private $name;
    private $pw;
    private $email;

    function __construct()
    {
            $this->name = $_POST["usernameField"];
            $this->pw = $_POST["pwField"];
            $this->email = $_POST["emailField"];
    }

    function checkPw()
    {
        $capFlag = false;
        $numFlag = false;
        $length = strlen($this->pw);

        //Checking pw length
        if($length < 10){
            throw new \Exception("The password is not long enough");
        }

        //Checking for caps 
        for($x = 0; $x < $length; $x++){
            if( ctype_upper($this->pw[$x]) ){
                $capFlag = true;
            }
        } 

        // Checking for numbers
        for($x = 0; $x < $length; $x++){
            if( ctype_digit($this->pw[$x]) ){
                $numFlag = true;
            }
        } 

        if($capFlag == true && $numFlag == true){
            //Do something with the database
            echo password_hash($this->pw, PASSWORD_DEFAULT);
        }
        else{
            throw new \Exception("The password MUST include at least 1 capital letter and 1 number.");
        }
    }

    function checkName(){
        // Get usernames here
        // Compare current username with others stored and return the appropriate thing
    }

    function checkEmail(){
        if (! filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
            throw new \Exception("This is not a valid email address.");
        }
    }
}


    // echo $_POST["usernameField"];
    // echo $_POST["emailField"];
    // echo $_POST["pwField"];
