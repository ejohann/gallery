   <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header"> Users <small>Subheading</small>
                        </h1>
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
                                         <td>  </td>
                                         <td><?php echo $user->username; ?></td>
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