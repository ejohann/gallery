<?php include("includes/header.php"); ?>
<?php if(!$session->is_signed_in()){ redirect("login.php"); } ?>
<?php 
 if(empty($_GET['photo_id']))
  {
    redirect("photos.php");
  }
  else
  {
    $photo_id = $database->escape($_GET['photo_id']);
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
                        <h1 class="page-header"> Comments <small>Subheading</small>
                        </h1>
                                 <div class="col-md-12">
                            
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        
                                        <th>ID</th>
                                        <th>Photo ID</th>
                                        <th>Author</th>
                                        <th>Content</th>
                                     
                                    </tr>
                                </thead>
                                <tbody>
                                  
                                    <?php $comments = Comment::find_the_comments($photo_id); ?>
                                    <?php foreach($comments as $comment): ?>
                                        <tr>
                                         
                                         <td><?php echo $comment->id; ?></td>
                                         <td><?php echo $comment->photo_id; ?> </td>
                                         <td><?php echo $comment->author; ?> </td>
                                         <td><?php echo $comment->content; ?>
                                              <div class="action_link">
                                                <a href="delete_photo_comment.php?comment_id=<?php echo $comment->id ?>">Delete</a>
                                            </div>

                                         </td>
                                         
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