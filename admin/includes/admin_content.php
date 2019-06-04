   <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Admin
                            <small>Subheading</small>
                        </h1>

                        <?php
                          $this_user = User::find_user_by_id(2);
                          
                          $this_user->user_lastname = "Jones";

                          $this_user->update();
                        
                      /*    $users = User::find_all_users();
                        
                          foreach($users as $user)
                           {
                              echo $user->username;
                           } 
                              
                          
                          $user = new User();

                          $user->username = "Jazzy";
                          $user->password = "password";
                          $user->user_firstname = "Jazzy";
                          $user->user_lastname = "Jeff";

                          $user->create();
                           */
                         ?>

                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-file"></i> Blank Page
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->