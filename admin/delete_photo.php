<?php include("includes/init.php"); ?>
<?php if(!$session->is_signed_in()){ redirect("login.php"); } ?>

<?php 
  if(empty($_GET['photo_id']))
   {
   	redirect("../index.php");
   }

   $photo = Photo::find_by_id($database->escape($_GET['photo_id']));

   if($photo)
    {
      $photo->delete_photo();
      $session->message("Photo was deleted successfully");
      redirect("photos.php");
    }
   else
    {
      $session->message(join("<br/>", $photo->custom_errors_array));
    	redirect("photos.php");
    }
?>