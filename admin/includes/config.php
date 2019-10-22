<?php


const DB_HOST = 'localhost';
const DB_PORT = '3307';
const DB_USER = 'root';
const DB_PASSWORD = '';
const DB_NAME = 'gallery_db';


$connection = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME, DB_PORT);

if($connection)
 {
 	echo "We are connected";
 }
 else
  {
  	die("Connection failed " . mysqli_error($connection));
  }


?>