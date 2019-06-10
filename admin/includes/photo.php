<?php 

  class Photo extends Db_object
    {
     
      protected static $db_table = "photos";
      protected static $db_table_fields = array('id','photo_title','photo_description','photo_filename','photo_type', 'photo_size');
      public $id;
      public $photo_title;
      public $photo_description;
      public $photo_filename;
      public $photo_type;
      public $photo_size;
      
      public $tmp_path;
      public $upload_directory = "images";
      public $custom_errors_array = array();
      public $upload_errors_array = array(
       UPLOAD_ERR_OK => "File uploaded successfully",
       UPLOAD_ERR_INI_SIZE => "The uploaded file exceeds the upload_max_filesize directive",
       UPLOAD_ERR_FORM_SIZE => "The uploaded file exceeds the MAX_FILE_SIZE directive",
       UPLOAD_ERR_PARTIAL => "The uploaded file was partially uploaded",
       UPLOAD_ERR_NO_FILE => "No file was uploaded",
       UPLOAD_ERR_NO_TMP_DIR => "Missing a temporary directory",
       UPLOAD_ERR_CANT_WRITE => "Failed to write file to disk",
       UPLOAD_ERR_EXTENSION => "A PHP extension stopped the file upload"
        ); 

     
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
      	    $this->photo_filename = basename($file['name']);
      	    $this->tmp_path = $file['tmp_name'];
      	    $this->photo_type = $file['type'];
      	    $this->photo_size = $file['size'];
      	  }

       }

     public function save()
      {
        if($this->id)
         {
         	$this->update();
         }
        else
         {
         	if(!empty($this->custom_errors_array))
         	 {
         	 	return false;
         	 }
         	if(empty($this->photo_filename) || empty($this->tmp_path))
         	 {
         	 	$this->custom_errors_array[] = "The file is not available";
         	 	return false;
         	 }
         	$target_path = SITE_ROOT.DS. 'admin' .DS. $this->upload_directory .DS. $this->photo_filename;
         	if(file_exists($target_path))
         	 {
         	 	$this->custom_errors_array[] = "The file {$this->photo_filename} already exists";
         	 	return false;
         	 }
         	if(move_uploaded_file($this->tmp_path, $target_path))
         	 {
         	 	if($this->create())
         	 	 {
         	 	 	unset($this->tmp_path);
         	 	 	return true;
         	 	 }
         	 }
         	else
         	 {
         	 	$this->custom_errors_array[] = "The file directory does not have permissions";
         	 	return false;
         	 }
         	// $this->create();
         }
        
      }

      public function image_path()
       {

       	return $this->upload_directory .DS. $this->photo_filename;
       }

    } 








?>