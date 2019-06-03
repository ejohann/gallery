<?php 

 class User
  {
   

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

  }




?>