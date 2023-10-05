<?php

class regisValidation
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
    }

    // function returnError($string)
    // {
    //     throw new \Exception($string);
    // }
}


    // echo $_POST["usernameField"];
    // echo $_POST["emailField"];
    // echo $_POST["pwField"];
