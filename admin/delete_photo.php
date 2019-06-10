<?php include("includes/init.php"); ?>
<?php if(!$session->is_signed_in()){ redirect("login.php"); } ?>

<?php 
  if(empty($_GET['photo_id']))
   {
   	redirect("../index.php");
   }

   $photo = Photo::find_by_id($database->escape($_GET['photo_id']));

   // echo $photo->photo_title;

   if($photo)
    {
      $photo->delete_photo();
      redirect("photos.php");
    }
   else
    {
    	redirect("photos.php");
    }
?>