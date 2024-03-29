<?php

require_once("new_config.php");

class Database
 {

    public $connection;

    function __construct()
     {
     	$this->open_db_connection();
     } 

    public function open_db_connection()
     {

     //	$this->connection = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
        $this->connection = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME, DB_PORT);
        if($this->connection->connect_errno)
        {
  	        die("Connection failed " . $this->connection->connect_errno);
        }
      // return $this->connection;
     }


public function query($sql)
 {
 	$result = $this->connection->query($sql);	
    $this->confirm_query($result);
 	return $result;
 }


 private function confirm_query($result)
  {
     if(!$result)
 	 {
 	 	die("Query failed : " . $this->connection->connect_errno);
 	 }
  }

  public function escape($string)
   { 
      return $this->connection->real_escape_string($string);
   }

  public function the_insert_id()
   { 
      return $this->connection->insert_id;
   }

 }

$database = new Database();
//$database->open_db_connection();





?>