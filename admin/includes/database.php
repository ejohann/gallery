<?php

require_once("new_config.php");

class Database
 {

    public $connection;


    function __contruct()
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

     }

 }

$database = new Database();
//$database->open_db_connection();


?>