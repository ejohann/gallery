<?php include("includes/header.php"); ?>
<?php if(!$session->is_signed_in()){ redirect("login.php"); } ?>

<?php

 if(empty($_GET['user_id']))
   {
    redirect("../index.php");
   }
  else
   {
     $user_id = $database->escape($_GET['user_id']);
     $user = User::find_by_id($user_id);
   }

  ?>