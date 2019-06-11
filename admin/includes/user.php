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
    public $user_upload_directory = "images";
    public $user_image_placeholder = "http://placehold.it/400x400&text=image";
    public $user_image_tmp_path;
    public $user_image_type;
    public $user_image_size;
 

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
     
    
    public function image_placeholder()
     {
         
      return empty($this->user_image) ? $this->user_image_placeholder : $this->user_upload_directory.DS.$this->user_image;
     }
    
     //method for passing the uploaded file as an argument
      public function set_file($file)
       {
         if(empty($file) || !$file || !is_array($file))
          {
            $this->custom_errors_array[] = "There was no file uploaded here";
            return false;
          }
         elseif($file['error'] != 0 )
          {
            $this->custom_errors_array[] = $this->upload_errors_array[$file['error']];
            return false;
          }
         else
          {
            $this->user_image = basename($file['name']);
            $this->user_image_tmp_path = $file['tmp_name'];
            $this->user_image_type = $file['type'];
            $this->user_image_size = $file['size'];
          }
       }

     public function save_user()
      {
        if($this->id)
         {
           if(!empty($this->user_image_tmp_path))
            {

              $target_path = SITE_ROOT.DS. 'admin' .DS. $this->user_upload_directory .DS. $this->user_image;
              if(file_exists($target_path))
               {
                 $this->custom_errors_array[] = "The file {$this->user_image} already exists";
                 return false;
               }
              else
               {
                   move_uploaded_file($this->user_image_tmp_path, $target_path);
                   unset($this->user_image_tmp_path);
               }
            }
           if($this->update())
             {
               return true;
             }             
         }
        else
         {
          if(!empty($this->custom_errors_array))
           {
            return false;
           }
          if(empty($this->user_image) || empty($this->user_image_tmp_path))
           {
            $this->custom_errors_array[] = "The file is not available";
            return false;
           }

           if(!empty($this->user_image_tmp_path))
            {
              $target_path = SITE_ROOT.DS. 'admin' .DS. $this->user_upload_directory .DS. $this->user_image;
               if(file_exists($target_path))
               {
                 $this->custom_errors_array[] = "The file {$this->user_image} already exists";
                 return false;
               }
              else
               {
                   move_uploaded_file($this->user_image_tmp_path, $target_path);
                   unset($this->user_image_tmp_path);
               }
            }
           if($this->create())
             {
               return true;
             }
         }
      }

  }




?>