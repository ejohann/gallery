   <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Admin
                            <small>Subheading</small>
                        </h1>

                        <?php
                         
                         // $user = new User();
                          $id =1;
                          $find_user = User::find_user_by_id($id);
                          $user_details = $find_user->fetch_array();
                          
                          $user = User::instantiation($user_details);

                          

                           echo $user->username;
                        //  while($row = $all_users->fetch_array())
                          //   {

                             //   echo $row['username'];
                            // }



                        // $sql = "SELECT * FROM users WHERE id=1";

                        // $result = $database->query($sql);


                       //  $user_details = $result->fetch_array();

                       // echo $user_details['username'];

                         /*if($database->connection)
                          {
                            echo "We are connected";
                          }
                          else
                          {
                            echo "We are NOT connected";
                          } */

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