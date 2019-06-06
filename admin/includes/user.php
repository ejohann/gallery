<?php 

 class User
  {
    
    protected static $db_table = "users";
    protected static $db_table_fields = array('username','password','user_firstname','user_lastname');
    public $id;
    public $username;
    public $password;
    public $user_firstname;
    public $user_lastname;

   public static function find_all_users()
    {
     //  global $database;
      return self::run_this_query("SELECT * FROM " .self::$db_table. "");
     // return $result_set;
    }
  

   public static function find_user_by_id($user_id)
    {
      // global $database;
      $result_array = self::run_this_query("SELECT * FROM " .self::$db_table. " WHERE id={$user_id}");

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


    //method to verify a user
    public static function verify_user($username, $password)
     {
       global $database;

       $username = $database->escape($username);
       $password = $database->escape($password);

       $select_user = "SELECT * FROM " .self::$db_table. " WHERE username = '{$username}' AND password = '{$password}' LIMIT 1";
       $result_array = self::run_this_query($select_user);

       return !empty($result_array) ? array_shift($result_array) : false;
      
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

    
    protected function properties() 
     {
      //return get_object_vars($this);
      $properties = array();

      foreach(self::$db_table_fields as $db_field)
       {
           if($this->has_the_attribute($db_field))
             {
                $properties[$db_field] = $this->$db_field;
             }

       }
       return $properties;
     }


    public function save()
     {
       return isset($this->id) ? $this->update() : $this->create();
     }

    public function create()
     {
         global $database;
         $properties = $this->properties();
         $insert_user = "INSERT INTO " .self::$db_table. " (" .implode(",", array_keys($properties)). ") ";
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
         $properties = $this->properties();
         $properties_pairs = array();

         foreach($properties as $key => $value)
           {

             $properties_pairs[] = "{$key}='{$value}'";
           }
 
        /*
         $username = $database->escape($this->username);
         $password = $database->escape($this->password);
         $user_firstname = $database->escape($this->user_firstname);
         $user_lastname = $database->escape($this->user_lastname);
         $user_id = $database->escape($this->id); */

         $update_user = "UPDATE " .self::$db_table. " SET ";
         $update_user .= .implode(",",  $properties_pairs);
         $update_user .= " WHERE id = " .$database->escape($this->id). "";
          
        $database->query($update_user);

        return (mysqli_affected_rows($database->connection) == 1) ? true : false;   
     }

    public function delete()
     {
       global $database;
       $user_id = $database->escape($this->id);
       $delete_user = "DELETE FROM " .self::$db_table. " WHERE id = $user_id";
       
       return ($database->query($delete_user)) ? true : false ;
     }

  }




?>