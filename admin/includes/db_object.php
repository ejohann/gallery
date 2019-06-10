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
       $calling_class = get_called_class();
       $new_object = new $calling_class; 
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


      protected function properties() 
     {
      //return get_object_vars($this);
      $properties = array();

      foreach(static::$db_table_fields as $db_field)
       {
           if($this->has_the_attribute($db_field))
             {
                $properties[$db_field] = $this->$db_field;
             }

       }
       return $properties;
     }


    protected function clean_properties()
     {
       global $database;
       $clean_properties = array();

       foreach($this->properties() as $key => $value)
        {
           $clean_properties[$key] = $database->escape($value);
        }
       return $clean_properties;
     }

    public function save()
     {
       return isset($this->id) ? $this->update() : $this->create();
     }

    public function create()
     {
         global $database;
         $properties = $this->clean_properties();
         $insert_user = "INSERT INTO " .static::$db_table. " (" .implode(",", array_keys($properties)). ") ";
         $insert_user .= "VALUES ('". implode("','", array_values($properties)) ."')";
          
          if($database->query($insert_user))
            {
               $this->id = $database->the_insert_id();
               return true;
            }
          else
            {
              return false;
            }
     }

    public function update()
     {
         global $database;
         $properties = $this->clean_properties();
         $properties_pairs = array();

         foreach($properties as $key => $value)
           {

             $properties_pairs[] = "{$key}='{$value}'";
           }
 
         $update_user = "UPDATE " .static::$db_table. " SET ";
         $update_user .= implode(",",  $properties_pairs);
         $update_user .= " WHERE id = " .$database->escape($this->id). "";
          
        $database->query($update_user);

        return (mysqli_affected_rows($database->connection) == 1) ? true : false;   
     }

    public function delete()
     {
       global $database;
       $user_id = $database->escape($this->id);
       $delete_user = "DELETE FROM " .static::$db_table. " WHERE id = $user_id";
       
       return ($database->query($delete_user)) ? true : false ;
     }


 }













?>