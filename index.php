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
    ?>

    <div class="row">
        <div class="col-md-12">
          <div class="thumbnails row">
            <?php foreach($photos as $photo): ?>
              <div class="col-xs-6 col-md-3">
                <a class="thumbnail" href="photo.php?photo_id=<?php echo $photo->id; ?>">
                  <img class="img-responsive home_page_photo" src="admin/<?php echo $photo->image_path(); ?>"  alt="" /> 
                </a>    
              </div>
          <?php endforeach; ?>
        </div>

        <div class="row">
          <ul class="pager">
            <?php 
              if($paginate->page_total() > 1)
               {
                  if($paginate->has_next())
                   {
                      echo "<li class='next'><a href='index.php?page={$paginate->next_page()}'>Next</a></li> ";
                   }

                  for($i=1; $i<= $paginate->page_total(); $i++)
                   {
                      if($i == $paginate->current_page)
                       {
                          echo "<li class='active'>{$i}</li>";
                       }
                      else
                       {
                          echo "<li><a href='index.php?page={$i}'>{$i}</a></li>";
                       }
                   }

                  if($paginate->has_previous())
                   {
                      echo "<li class='previous'><a href='index.php?page={$paginate->previous_page()}'>Previous</a></li> ";
                   }
               }
            ?>
          </ul>        
        </div>
    </div>

    <?php include("includes/footer.php"); ?>
