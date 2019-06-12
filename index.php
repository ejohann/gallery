<?php include("includes/header.php"); ?>

<?php 
  
  $page = !empty($_GET['page']) ? (int)$_GET['page'] : 1;
  $items_per_page = 4;
  $items_total_count = Photo::count_all();

  $paginate = new Paginate($page, $items_per_page, $items_total_count);

  $select_by_page = "SELECT * FROM photos ";
  $select_by_page .= "LIMIT {$paginate->items_per_page} ";
  $select_by_page .= "OFFSET {$paginate->offset()}";

  $photos = Photo::run_this_query($select_by_page);
   
  //$photos = Photo::find_all();
  
?>

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-12">

           <div class="thumbnails row">
            <?php foreach($photos as $photo): ?>
             

                <div class="col-xs-6 col-md-3">

                 <a class="thumbnail" href="photo.php?photo_id=<?php echo $photo->id; ?>"><img class="img-responsive home_page_photo" src="admin/<?php echo $photo->image_path(); ?>"  alt="" /> </a>    
             
                </div>

             <?php endforeach; ?>
            </div>

           <div class="row">
               <ul class="pager">
                   <li class="previous"><a href="">Previous</a></li>
                   <li class="next"><a href="">Next</a></li>
               </ul>        

           </div>

            </div>




            <!-- Blog Sidebar Widgets Column -->
            <!--<div class="col-md-4">

            
                 <?php // include("includes/sidebar.php"); ?>



         </div> -->
        <!-- /.row -->

        <?php include("includes/footer.php"); ?>
