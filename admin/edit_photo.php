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
                        <h1 class="page-header"> Photos <small>Subheading</small>
                        </h1>

                        <div class="col-md-12">
                           
                           <div class="form-group">
                              <input type="text" name="title" class="form-control">
                           </div> 

                           <div class="form-group">
                               <label for="caption">Caption</label>
                              <input type="text" name="caption" class="form-control">
                           </div> 

                           <div class="form-group">
                               <label for="alternate_text">Alternate Text</label>
                               <input type="text" name="alternate_text" class="form-control">
                           </div> 

                               <div class="form-group">
                               <label for="description">Description</label>
                              <textarea type="text" name="description" id="" rows="10" cols="30" class="form-control"> </textarea>
                           </div> 
                           
                        </div>      
                       
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

  <?php include("includes/footer.php"); ?>