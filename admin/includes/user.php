<?php 

 class User extends Db_object
  {
    
    protected static $db_table = "users";
    protected static $db_table_fields = array('username','password','user_firstname','user_lastname', 'user_image');
    public $id;
    public $username;
    public $password;
    public $user_firstname;
    public $user_lastname;
    public $user_image;

    

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
     
    
    
    

  }




?>