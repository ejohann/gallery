<?php 

class Db_object 
 {

   public static function find_all()
    {
     //  global $database;
      return self::run_this_query("SELECT * FROM " .self::$db_table. "");
     // return $result_set;
    }
  

   public static function find_by_id($id)
    {
      global $database;
      $id = $database->escape($id);
      $result_array = self::run_this_query("SELECT * FROM " .self::$db_table. " WHERE id={$id}");
      return !empty($result_array) ? array_shift($result_array) : false;
    }



    
 }













?>