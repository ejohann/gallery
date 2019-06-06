<?php 

class Db_object 
 {

   // returns all records in a table
   public static function find_all()
    {
     //  global $database;
      return self::run_this_query("SELECT * FROM " .self::$db_table. "");
     // return $result_set;
    }
  

   //returns array of results by an id
   public static function find_by_id($id)
    {
      global $database;
      $id = $database->escape($id);
      $result_array = self::run_this_query("SELECT * FROM " .self::$db_table. " WHERE id={$id}");
      return !empty($result_array) ? array_shift($result_array) : false;
    }


  
    // runs any query and returns an object array
   public static function run_this_query($sql)
    {  
      global $database;
      $result_set = $database->query($sql);
      $the_object_array = array();
      while($row = $result_set->fetch_array())
       {
       	 $the_object_array[] = self::instantiation($row);
       }
      return $the_object_array;
    }


    

 }













?>