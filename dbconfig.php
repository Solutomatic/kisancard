<?php

class Database
{   
    private $host = "localhost";
    private $db_name = "ramlal";
    private $username = "root";
    private $password = "";
	
	/*private $host = "localhost";
    private $db_name = "rentinde_frieght";
    private $username = "rentinde_frieght";
    private $password = "frieght123";*/
	
    public $conn;
     
    public function dbConnection()
	{
     
	    $this->conn = null;    
        try
		{
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
			$this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);	
        }
		catch(PDOException $exception)
		{
            echo "Connection error: " . $exception->getMessage();
        }
         
        return $this->conn;
    }
}
?>