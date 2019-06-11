<?php include("includes/header.php"); ?>
<?php if(!$session->is_signed_in()){ redirect("login.php"); } ?>

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
          <form action="" method="post" enctype="multipart/form-data">
            <div class="col-md-8">
                <div class="form-group">
                	<label for="username">Username</label>
                   <input type="text" name="username" class="form-control">
                </div> 
                          
                <div class="form-group">
                    <label for="user_firstname">First name</label>
                    <input type="text" name="user_firstname" class="form-control">
                </div> 

                <div class="form-group">
                    <label for="user_lastname">Last name</label>
                    <input type="text" name="alternate_text" class="form-control">
                </div> 

                <div class="form-group">
                    <label for="password">password</label>
                    <input type="password" name="password" class="form-control">
                </div> 

                <div class="form-group">
                    <input type="submit" name="create_user" class="btn btn-primary" value="Create User">
                </div> 
             </div>  
           </form>   
                       
        </div>
      </div><!-- /.row -->
   </div><!-- /.container-fluid -->
</div><!-- /#page-wrapper -->

<?php include("includes/footer.php"); ?>