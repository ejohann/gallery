<?php include("includes/header.php"); ?>

<?php 
  
  $photos = Photo::find_all();
  
?>

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-12">

    
            <?php foreach($photos as $photo): ?>
          
         

            <?php endforeach; ?>

            </div>




            <!-- Blog Sidebar Widgets Column -->
            <!--<div class="col-md-4">

            
                 <?php // include("includes/sidebar.php"); ?>



         </div> -->
        <!-- /.row -->

        <?php include("includes/footer.php"); ?>
