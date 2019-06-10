<?php 

class Db_object 
 {

   // returns all records in a table
   public static function find_all()
    {
     //  global $database;
      return static::run_this_query("SELECT * FROM " .static::$db_table. "");
     // return $result_set;
    }
  

   //returns array of results by an id
   public static function find_by_id($id)
    {
      global $database;
      $id = $database->escape($id);
      $result_array = static::run_this_query("SELECT * FROM " .static::$db_table. " WHERE id={$id}");
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
       	 $the_object_array[] = static::instantiation($row);
       }
      return $the_object_array;
    }


     // makes an object from db result
    public static function instantiation($user_details)
     {
       $new_object = new self; 
       foreach($user_details as $the_attribute => $value)
       	 {
             if($new_object->has_the_attribute($the_attribute))
              {
              	$new_object->$the_attribute = $value; 
              }
         }
        return $new_object;
     }

     // check if an attribute exists in an object
     private function has_the_attribute($attribute)
      {
        $object_properties = get_object_vars($this);
        return array_key_exists($attribute, $object_properties);
      }


 }













?>