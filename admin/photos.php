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
                                   <?php  
                                     $photos = Photo::find_all();
                                     foreach($photos as $photo)
                                      {  
                                        $photo_destination = $photo->upload_directory .DS. $photo->photo_filename;
                                         echo "<tr>";
                                         echo "<td><img src='{$photo_destination}' /></td>";
                                         echo "<td>{$photo->id}</td>";
                                         echo "<td>{$photo->photo_filename}</td>";
                                         echo "<td>{$photo->photo_title}</td>";
                                         echo "<td>{$photo->photo_size}</td>";
                                         echo "</tr>";
                                      } 
                                    ?>
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