   <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Admin
                            <small>Subheading</small>
                        </h1>

                        <?php
                      /*
                          $this_user = User::find_by_id(4);
                          
                         $this_user->username = "Jay";
                         $this_user->user_firstname = "JIGGAWHO";



                          $this_user->save();
                        
                        */
                          $photos = Photo::find_all();
                        
                          foreach($photos as $photo)
                           {
                              echo $photo->photo_title;
                           } 
                           
                              
                           /*
                          $user = new User();

                          $user->username = "Williams";
                          $user->password = "password";
                          $user->user_firstname = "William";
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