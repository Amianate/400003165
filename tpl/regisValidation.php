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
        $length = strlen($pw);
    }

    function returnError($string)
    {
        throw new \Exception($string);
    }
}


    // echo $_POST["usernameField"];
    // echo $_POST["emailField"];
    // echo $_POST["pwField"];
