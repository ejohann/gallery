<?php require_once("init.php"); ?>

<?php 
   
  $user = new User();
  if(isset($_POST['image_name']))
   {
   	 $user->ajax_save_user_image($_POST['image_name'], $_POST['user_id']);
   }

  if(isset($_POST['photo_id']))
   {
   	Photo::ajax_show_photo_info($_POST['photo_id']);
   }

?>