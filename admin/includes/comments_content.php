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
                                  
                                    <?php $comments = Comment::find_all(); ?>
                                    <?php foreach($comments as $comment): ?>
                                        <tr>
                                         
                                         <td><?php echo $comment->id; ?></td>
                                         <td><?php echo $comment->photo_id; ?> </td>
                                         <td><?php echo $comment->author; ?> </td>
                                         <td><?php echo $comment->content; ?></td>
                                         
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