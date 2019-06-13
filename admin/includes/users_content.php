   <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header"> Users </h1>
                        <a href="add_user.php" class="btn btn-primary">Add User</a>
                        <div class="col-md-12">
                            
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        
                                        <th>ID</th>
                                        <th>Photo</th>
                                        <th>Username</th>
                                        <th>First name</th>
                                        <th>Last name</th>
                                    </tr>
                                </thead>
                                <tbody>
                                  
                                    <?php $users = User::find_all(); ?>
                                    <?php foreach($users as $user): ?>
                                        <tr>
                                         
                                         <td><?php echo $user->id; ?></td>
                                         <td><img class="user-image-thumbnail" src="<?php echo $user->image_placeholder(); ?>"/>  </td>
                                         <td><?php echo $user->username; ?>
                                             <div class="action_link">
                                                <a class="delete_link" href="delete_user.php?user_id=<?php echo $user->id ?>">Delete</a>
                                                <a href="edit_user.php?user_id=<?php echo $user->id ?>">Edit</a>
                                                <a href="">View</a>
                                            </div>
                                         </td>
                                         <td><?php echo $user->user_firstname; ?></td>
                                         <td><?php echo $user->user_lastname; ?></td>
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