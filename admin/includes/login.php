
<?php require_once("init.php"); ?>

<?php 

if($session->is_signed_in())
 {
 	redirect("../index.php");
 }



?>