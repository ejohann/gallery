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

     if(isset($_POST['update_user']))
  	  {
         if($user)
          {
            if(!empty($_POST['password']) && $_POST['password'] != $user->password)
             {
                 $user->password = $_POST['password'];
             } 
          
            $user->username = $_POST['username'];
            $user->user_firstname = $_POST['user_firstname'];
            $user->user_lastname = $_POST['user_lastname'];
            $user->set_file($_FILES['image_upload']);
            $user->save_user();
       }
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
  <div class="container-fluid">
     <!-- Page Heading -->
     <div class="row">
        <div class="col-lg-12">
          <h1 class="page-header"> Add User <small>Subheading</small></h1>
             
             <div class="col-md-6">
                <img class="img-responsive" src="<?php echo $user->image_placeholder() ;?>" />
             </div>
             
             <form action="" method="post" enctype="multipart/form-data">
             
             <div class="col-md-6">
             	<div class="form-group">
                   <input type="file" name="image_upload" class="form-control">
                </div> 

                <div class="form-group">
                	<label for="username">Username</label>
                   <input type="text" name="username" value="<?php echo $user->username; ?>" class="form-control">
                </div> 
                          
                <div class="form-group">
                    <label for="user_firstname">First name</label>
                    <input type="text" name="user_firstname" value="<?php echo $user->user_firstname; ?>" class="form-control">
                </div> 

                <div class="form-group">
                    <label for="user_lastname">Last name</label>
                    <input type="text" name="user_lastname" value="<?php echo $user->user_lastname; ?>" class="form-control">
                </div> 

                <div class="form-group">
                    <label for="password">password</label>
                    <input type="password" name="password" class="form-control">
                </div> 

                <div class="form-group">
                    <input type="submit" name="update_user" class="btn btn-primary pull-right" value="Update User">
                </div> 
             </div>  
           </form>   
                       
        </div>
      </div><!-- /.row -->
   </div><!-- /.container-fluid -->
</div><!-- /#page-wrapper -->

<?php include("includes/footer.php"); ?>