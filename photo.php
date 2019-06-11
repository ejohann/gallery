<?php require_once("admin/includes/init.php"); ?>

<?php

  if(empty($_GET['photo_id']))
   {
     redirect("index.php");
   }
  
  $photo = Photo::find_by_id($_GET['photo_id']);

  //echo $photo->photo_title;

$message = "";
if(isset($_POST['submit']))
 {
   $author = trim($_POST['author']);
   $content = trim($_POST['content']);

   $new_comment = Comment::create_comment($photo->id, $author, $content);
   if($new_comment && $new_comment->save())
    {
        redirect("photo.php?photo_id={$photo->id}");
    }
   else
   {
     $message = "There was a problem saving the comment";
     $author = "";
     $content = ""; 
   }

 }

 $comments = Comment::find_the_comments($photo->id);

?>


<?php include("includes/header.php"); ?>
   

        <div class="row">

            <!-- Blog Post Content Column -->
            <div class="col-lg-8">

                <!-- Blog Post -->

                <!-- Title -->
                <h1>Blog Post Title</h1>

                <!-- Author -->
                <p class="lead">
                    by <a href="#">Start Bootstrap</a>
                </p>

                <hr>

                <!-- Date/Time -->
                <p><span class="glyphicon glyphicon-time"></span> Posted on August 24, 2013 at 9:00 PM</p>

                <hr>

                <!-- Preview Image -->
                <img class="img-responsive" src="http://placehold.it/900x300" alt="">

                <hr>

                <!-- Post Content -->
                <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus, vero, obcaecati, aut, error quam sapiente nemo saepe quibusdam sit excepturi nam quia corporis eligendi eos magni recusandae laborum minus inventore?</p>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ut, tenetur natus doloremque laborum quos iste ipsum rerum obcaecati impedit odit illo dolorum ab tempora nihil dicta earum fugiat. Temporibus, voluptatibus.</p>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eos, doloribus, dolorem iusto blanditiis unde eius illum consequuntur neque dicta incidunt ullam ea hic porro optio ratione repellat perspiciatis. Enim, iure!</p>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Error, nostrum, aliquid, animi, ut quas placeat totam sunt tempora commodi nihil ullam alias modi dicta saepe minima ab quo voluptatem obcaecati?</p>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Harum, dolor quis. Sunt, ut, explicabo, aliquam tenetur ratione tempore quidem voluptates cupiditate voluptas illo saepe quaerat numquam recusandae? Qui, necessitatibus, est!</p>

                <hr>

                <!-- Blog Comments -->








                <!-- Comments Form -->
                <div class="well">
                    <?php echo $message; ?>
                    <h4>Leave a Comment:</h4>

                    <form role="form" method="post">
                        <div class="form-group">
                             <label for="author">Author</label>
                            <input type="text" name="author" class="form-control" rows="3">
                        </div>
                        <div class="form-group">
                            <label for="content">Comment</label>
                            <textarea name="content" class="form-control" rows="3"></textarea>
                        </div>
                        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>

                <hr>








                <!-- Posted Comments -->
                 <?php foreach($comments as $comment) : ?>
                         

                <!-- Comment -->
                <div class="media">
                    <a class="pull-left" href="#">
                        <img class="media-object" src="http://placehold.it/64x64" alt="">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading"><?php echo $comment->author; ?>
                            <small>August 25, 2014 at 9:30 PM</small>
                        </h4>
                       <?php echo $comment->content?>
                    </div>
                </div>
            <?php endforeach; ?>

            </div>

            <!-- Blog Sidebar Widgets Column -->
            <div class="col-md-4">
          <?php include("includes/sidebar.php"); ?>

            </div>

        </div>
        <!-- /.row -->

        <?php include("includes/footer.php"); ?>
