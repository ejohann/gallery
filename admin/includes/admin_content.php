   <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Admin
                            <small>Subheading</small>
                        </h1>

                        <?php
                      
                          $this_user = User::find_by_id(4);
                          
                         $this_user->username = "Jay";
                         $this_user->user_firstname = "JIGGAWHO";



                          $this_user->save();
                          /*
                       
                          $users = User::find_all_users();
                        
                          foreach($users as $user)
                           {
                              echo $user->username;
                           } 
                              
                         
                          $user = new User();

                          $user->username = "WillS";
                          $user->password = "password";
                          $user->user_firstname = "Will";
                          $user->user_lastname = "Smith";

                          $user->save();
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