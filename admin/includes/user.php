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

    public static instantiation($user_details)
     {
        $new_object = new self; 

        $new_object->id = $user_details['id'];
        $new_object->username = $user_details['username'];
        $new_object->password = $user_details['password'];
        $new_object->user_firstname = $user_details['user_firstname'];
        $new_object->user_lastname = $user_details['user_lastname'];

     }

  }




?>