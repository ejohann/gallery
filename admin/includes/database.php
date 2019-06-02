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

     	$this->connection = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

        if(mysqli_connect_errno())
        {
  	        die("Connection failed " . mysqli_error());
        }
      // return $this->connection;
     }

 }

$database = new Database();
//$database->open_db_connection();




public function query($sql)
 {
 	$result = mysqli_query($this->connection, $sql);	
    confirm_query($result);
 	return $result;
 }


 private function confirm_query($result)
  {
     if(!$result)
 	 {
 	 	die("Query failed : " . mysqli_error($this->connection));
 	 }
  }

  public function escape($string)
   { 
      return mysqli_real_escape_string($this->connection, $string);
   }

?>