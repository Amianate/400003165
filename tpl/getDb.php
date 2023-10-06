<?php

class database{
    private $pw = "";
    private $dbName = "user_management_system";
    private $host  = "localhost";
    private $username = "root";
    
    private $connection;
    
    function __construct()
    {
    
    }

    public function createConnection(){        
        $this->connection = new mysqli($this->host, $this->username, $this->pw, $this->dbName);
    
        // Check connection
        if ($this->connection->connect_error)
        {
            die("Connection error: " . $this->connection->connect_error);
        }        
        
        return $this->connection;
    }

    public function close()
    {
        $this->connection->close();
    }
}