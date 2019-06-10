<?php include("includes/header.php"); ?>

<?php if(!$session->is_signed_in()){ redirect("login.php"); } ?>

<?php 
   $message = "";
   if(isset($_POST['submit']))
    {
      $photo = new Photo();
      $photo->photo_title = $_POST['title'];
      $photo->set_file($_FILES['file_upload']);
      if($photo->save())
       {
        $message = "Photo uploaded successfully";
       }
      else
       {
         $message = join("<br/>", $photo->custom_errors_array);
       }
    }

?>

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
        


           <!-- TOP MENU ITEM -->
           <?php include "includes/top_navigation.php"; ?>
           <!-- CLOSE TOP MENU ITEM-->

            <!-- SIDEBAR MENU ITEMS -->
             <?php include "includes/side_navigation.php"; ?>
            <!-- CLOSE SIDEBAR MENU ITEMS -->
           
            <!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper">
          <?php echo $message; ?>
          <?php include "includes/upload_content.php"; ?>

        </div>
        <!-- /#page-wrapper -->

  <?php include("includes/footer.php"); ?>