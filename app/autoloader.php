<?php

class Autoloader{
    function __construct()
    {
        spl_autoload_register();        
    }
}