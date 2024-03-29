<?php include("includes/header.php"); ?>
<?php if(!$session->is_signed_in()){ redirect("login.php"); } ?>

<?php 


 if(empty($_GET['photo_id']))
   {
    redirect("../index.php");
   }
  else
   {
     $photo_id = $database->escape($_GET['photo_id']);
     $photo = Photo::find_by_id($photo_id);
   }
  
   if(isset($_POST['update']))
    {
      if($photo)
       {
         $photo->photo_title = $_POST['title'];
         $photo->photo_caption = $_POST['caption'];
         $photo->photo_alternate_text = $_POST['alternate_text'];
         $photo->photo_description = $_POST['description'];

         $photo->save();
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
                        <h1 class="page-header"> Photos <small>Subheading</small>
                        </h1>
                        <form action="" method="post">
                        <div class="col-md-8">
                           
                           <div class="form-group">
                              <input type="text" name="title" value="<?php echo $photo->photo_title; ?>" class="form-control">
                           </div> 
                          
                          <div class="form-group">
                             <a href=""><img width="100px" class="thumbnail" src="<?php echo $photo->image_path() ;?>" /></a>
                           </div> 

                           <div class="form-group">
                               <label for="caption">Caption</label>
                              <input type="text" name="caption" value="<?php echo $photo->photo_caption; ?>"class="form-control">
                           </div> 

                           <div class="form-group">
                               <label for="alternate_text">Alternate Text</label>
                               <input type="text" name="alternate_text" value="<?php echo $photo->photo_alternate_text; ?>" class="form-control">
                           </div> 

                               <div class="form-group">
                               <label for="description">Description</label>
                              <textarea type="text" name="description" id="" rows="10" cols="30" class="form-control"><?php echo $photo->photo_description; ?> </textarea>
                           </div> 
                           
                        </div>  



                               <div class="col-md-4" >
                            <div  class="photo-info-box">
                                <div class="info-box-header">
                                   <h4>Save <span id="toggle" class="glyphicon glyphicon-menu-up pull-right"></span></h4>
                                </div>
                            <div class="inside">
                              <div class="box-inner">
                                 <p class="text">
                                   <span class="glyphicon glyphicon-calendar"></span> Uploaded on: April 22, 2030 @ 5:26
                                  </p>
                                  <p class="text ">
                                    Photo Id: <span class="data photo_id_box">34</span>
                                  </p>
                                  <p class="text">
                                    Filename: <span class="data">image.jpg</span>
                                  </p> 
                                 <p class="text">
                                  File Type: <span class="data">JPG</span>
                                 </p>
                                 <p class="text">
                                   File Size: <span class="data">3245345</span>
                                 </p>
                              </div>
                              <div class="info-box-footer clearfix">
                                <div class="info-box-delete pull-left">
                                    <a  href="delete_photo.php?photo_id=<?php echo $photo->id; ?>" class="btn btn-danger btn-lg ">Delete</a>   
                                </div>
                                <div class="info-box-update pull-right ">
                                    <input type="submit" name="update" value="Update" class="btn btn-primary btn-lg ">
                                </div>   
                              </div>
                            </div>          
                        </div>
                    </div> 
                    </form>   
                       
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

  <?php include("includes/footer.php"); ?>