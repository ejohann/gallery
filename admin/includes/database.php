<?php



class Database
 {

    private $connection; 

    public function open_db_connection()
     {

     	$this->connection = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

        if(mysqli_connect_errno())
        {
  	        die("Connection failed " . mysqli_error());
        }

     }

 }


?>