<?php

class Database 
{
    private $conn;
    /** Connects to database **/
    function dbConnect() 
	{
	
		try 
		{
			$this->conn = new PDO('mysql:host='.HOST.';dbname='.DB_NAME, DB_USER,DB_PASS);
			$this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			return $this->conn;
		} 
		catch(PDOException $e) 
		{
			echo 'ERROR: ' . $e->getMessage();
		}
    }

    /** Disconnects from database **/

	function __destruct() 
	{
	   $this->conn = null;
	}

}
