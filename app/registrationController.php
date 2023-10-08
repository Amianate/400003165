<?php

include "autoloader.php";
class registrationController
{
    private $pw;
    private $email;

    function __construct()
    {
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

        if($capFlag == false && $numFlag == false){
            throw new \Exception("Password MUST include 1 capital letter and 1 number minimum.");
        }
    }



    function checkName(){        
        $modelObj = new registrationModel();

        $response = $modelObj->searchUsername();
        if(isset($response)){            
            throw new \Exception($response);
        }
    }



    function checkEmail(){
        if (! filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
            throw new \Exception("This is not a valid email address.");
        }
    }

    function registerUser(){
    $modelObj = new registrationModel();    

        $response = $modelObj->insertUser();

        if(isset($response)){
            throw new \Exception($response);
        }
    }
}
