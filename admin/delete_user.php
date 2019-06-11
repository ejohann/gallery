<?php include("includes/init.php"); ?>
<?php if(!$session->is_signed_in()){ redirect("login.php"); } ?>

<?php 
  if(empty($_GET['user_id']))
   {
   	redirect("../index.php");
   }

   
?>