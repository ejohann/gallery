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
      $session->message("Comment with id: {$comment->id} was deleted successfully");
      redirect("comments.php");
    }
   else
    {
    	redirect("comments.php");
    }
   
?>