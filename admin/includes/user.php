<?php 

 class User
  {
    

    public $id;
    public $username;
    public $password;
    public $user_firstname;
    public $user_lastname;

   public static function find_all_users()
    {
      global $database;
      $result_set = $database->query("SELECT * FROM users");
      return $result_set;
    }
  

   public static function find_user_by_id($user_id)
    {
      // global $database;
      $result_set = self::run_this_query("SELECT * FROM users WHERE id={$user_id}");
      return $result_set;
    }
  

   public static function run_this_query($sql)
    {  
      global $database;
      $result_set = $database->query($sql);
      return $result_set;
    }

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


     private function has_the_attribute($attribute)
      {
        $object_properties = get_object_vars($this);
        return array_key_exists($attribute, $oject_properties);
      }

  }




?>