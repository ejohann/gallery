<?php include("includes/header.php"); ?>
<?php if(!$session->is_signed_in()){ redirect("login.php"); } ?>

<?php
 
 if(empty($_GET['user_id']))
   {
    redirect("../index.php");
   }
  else
   {
   	 $message = "";
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
            if($user->save_user())
             {
                $message = "User information updated successfully";
             }
           else
            {
              $message = join("<br/>", $user->custom_errors_array);
            }
       }
  	}
   }

  ?>




<div class="modal fade" id="photo-library">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Gallery System Library</h4>
      </div>
      <div class="modal-body">
          <div class="col-md-9">
             <div class="thumbnails row">
            
                <!-- PHP LOOP HERE CODE HERE-->
                
               <div class="col-xs-2">
                 <a role="checkbox" aria-checked="false" tabindex="0" id="" href="#" class="thumbnail">
                   <img class="modal_thumbnails img-responsive" src="<!-- PHP LOOP HERE CODE HERE-->" data="<!-- PHP LOOP HERE CODE HERE-->">
                 </a>
                  <div class="photo-id hidden"></div>
               </div>

                    <!-- PHP LOOP HERE CODE HERE-->

             </div>
          </div><!--col-md-9 -->

  <div class="col-md-3">
    <div id="modal_sidebar"></div>
  </div>

   </div><!--Modal Body-->
      <div class="modal-footer">
        <div class="row">
               <!--Closes Modal-->
              <button id="set_user_image" type="button" class="btn btn-primary" disabled="true" data-dismiss="modal">Apply Selection</button>
        </div>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->







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
  <div class="container-fluid">
     <!-- Page Heading -->
     <div class="row">
        <div class="col-lg-12">
          <h1 class="page-header"> Edit User <small>Subheading</small></h1>
             
             <div class="col-md-6">
                <a href="#" data-toggle="modal" data-target="#photo-library" ><img class="img-responsive" src="<?php echo $user->image_placeholder() ;?>" /></a>
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
                 <a class="btn btn-danger pull-left" href="delete_user.php?user_id=<?php echo $user->id ?>">Delete</a>
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