<?php include("includes/init.php"); ?>
<?php if(!$session->is_signed_in()){ redirect("login.php"); } ?>

<?php 
  if(empty($_GET['comment_id']))
   {
   	redirect("../index.php");
   }

   $comment = Comment::find_by_id($database->escape($_GET['comment_id']));

   if($comment)
    {
      $comment->delete();
      $session->message("Photo {$photo->photo_filename} was deleted successfully");
      redirect("photo_comments.php?photo_id=$comment->photo_id");
    }
   else
    {
    	redirect("photo_comments.php?photo_id=$comment->photo_id");
    }
   
?>