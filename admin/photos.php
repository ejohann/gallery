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
                            
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Photo</th>
                                        <th>ID</th>
                                        <th>File Name</th>
                                        <th>Title</th>
                                        <th>Size</th>
                                    </tr>
                                </thead>
                                <tbody>
                                  
                                    <?php $photos = Photo::find_all(); ?>
                                    <?php foreach($photos as $photo): ?>
                                        <tr>
                                         <td><img width="100px" class="img-responsive" src="<?php echo $photo->image_path(); ?>"/>
                                            <div class="picture_link">
                                                <a href="delete_photo.php?photo_id=<?php echo $photo->id ?>">Delete</a>
                                                <a href="">Edit</a>
                                                <a href="">View</a>
                                            </div>
                                         </td>
                                         <td><?php echo $photo->id; ?></td>
                                         <td><?php echo $photo->photo_filename; ?></td>
                                         <td><?php echo $photo->photo_title; ?></td>
                                         <td><?php echo $photo->photo_size; ?></td>
                                         </tr>
                                      <?php endforeach;  ?>
                                 
                                </tbody>
                            </table>
                        </div>      
                       
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

  <?php include("includes/footer.php"); ?>