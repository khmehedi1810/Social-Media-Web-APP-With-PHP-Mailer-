<?php include "inc/header.php" ?>

<?php

    if ( isset($_POST['addmin']) ){

      $mis_nam       = $_POST['mis_nam'];
      $min_email     = $_POST['min_email'];
      $min_phn       = $_POST['min_phn'];
      $min_location  = $_POST['min_location'];


      $query = "INSERT INTO publicrepresentatives (rep_name, rep_email, rep_phone, rep_location) VALUES ( '$mis_nam', '$min_email', '$min_phn', '$min_location')";

      $addpost = mysqli_query($connection, $query);
      

      if ( !$addpost ){
        die ("Query Failed. " . mysqli_error($connection));
      }
      else{
        header("Location: publicrepresentatives.php");
      }

    }

?>

<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="page-breadcrumb">
        <div class="row align-items-center">
            <div class="col-md-6 col-8 align-self-center">
                <h3 class="page-title mb-0 p-0">সংসদ সদস্য</h3>
                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">সংসদ সদস্য</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <div class="col-md-6 col-4 align-self-center">
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <!-- ============================================================== -->
        <!-- Start Page Content -->
        <!-- ============================================================== -->
        <div class="row">
            <!-- column -->
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">All <b class="text-success">সংসদ সদস্য</b></h4>
                        <h6 class="card-subtitle">List of Public Representatives.</h6>
                        <div class="table-responsive">
                            <table class="table user-table">
                                <thead>
                                    <tr>
                                        <th class="border-top-0">#</th>
                                        <th class="border-top-0">Name</th>
                                        <th class="border-top-0">Email</th>
                                        <th class="border-top-0">Phone</th>
                                        <th class="border-top-0">Elected Area</th>
                                        <th class="border-top-0">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                        //$query = "SELECT DISTINCT * FROM blog,report WHERE post_id = blog_id ORDER BY post_id DESC";
                                        $selrepMin = "SELECT * FROM publicrepresentatives ORDER BY rep_id DESC";
                                        $select_rep_min = mysqli_query($connection, $selrepMin);
                                        $i = 0;
                                        while ( $row = mysqli_fetch_assoc($select_rep_min) )
                                        {
                                          $rep_id             = $row['rep_id'];
                                          $rep_name           = $row['rep_name'];
                                          $rep_email          = $row['rep_email'];
                                          $rep_phone          = $row['rep_phone'];
                                          $rep_location       = $row['rep_location'];
                                          $i++;
                                        ?>
                                            <tr class="bg-danger text-white">
                                              <th scope="row"><?php echo $i; ?></th>
                                              <td><?php echo $rep_name; ?></td>
                                              <td><?php echo $rep_email; ?></td>
                                              <td><?php echo $rep_phone; ?></td>
                                              <td><?php echo $rep_location; ?></td>
                                              <td>
                                                <div class="btn-group">
                                                    <a href="publicrepresentatives.php?delete=<?php echo $rep_id; ?>" class="btn btn-warning">Delete</a>
                                                </div>
                                              </td>
                                            </tr>

                                            <?php

                                        }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Add Public Representatives(সংসদ সদস্য)</h4>
                        <h6 class="card-subtitle">Add Public Representatives to send them problems that happed in their area.</h6>
                        <div >
                            <form action="" method="POST" enctype="multipart/form-data" accept-charset="utf-8">
                              <div class="form-group">
                                <label for="Title">Name:</label>
                                <input type="text" name="mis_nam" class="form-control">
                              </div>

                              <div class="form-group">
                                <label for="Title">Email:</label>
                                <input type="email" name="min_email" class="form-control">
                              </div>

                              <div class="form-group">
                                <label for="Title">Phone:</label>
                                <input type="text" name="min_phn" class="form-control">
                              </div>

                              <div class="form-group">
                                <label for="Description">নির্বাচনী এলাকা </label>
                                <select name="min_location" class="form-control">

                                  <optgroup label="Dhaka">
                                    <optgroup label="Gazipur">
                                      <option value="Gazipur">Gazipur Sadar</option>
                                      <option value="Kaliakair">Kaliakair</option>
                                      <option value="Kaliganj">Kaliganj</option>
                                    </optgroup>
                                    <optgroup label="Manikganj">
                                      <option value="Manikganj">Manikganj Sadar</option>
                                      <option value="Singair">Singair</option>
                                      <option value="Daulatpur">Daulatpur</option>
                                    </optgroup>
                                    <optgroup label="Narayanganj">
                                      <option value="Narayanganj">Narayanganj Sadar</option>
                                      <option value="Sonargaon">Sonargaon</option>
                                      <option value="Rupganj">Rupganj</option>
                                    </optgroup>
                                    <optgroup label="Tangail">
                                      <option value="Tangail">Tangail Sadar</option>
                                      <option value="Delduar">Delduar</option>
                                      <option value="Mirzapur">Mirzapur</option>
                                    </optgroup>
                                  </optgroup>

                                  <optgroup label="Chittagong">
                                    <optgroup label="Comilla">
                                      <option value="Comilla">Comilla Sadar</option>
                                      <option value="Daudkandi">Daudkandi</option>
                                    </optgroup>
                                    <optgroup label="Chandpur">
                                      <option value="Chandpur">Chandpur Sadar</option>
                                      <option value="Kachua">Kachua</option>
                                      <option value="Hajiganj">Hajiganj</option>
                                    </optgroup>
                                    <optgroup label="Rangamati">
                                      <option value="Rangamati">Rangamati Sadar</option>
                                      <option value="Kaptai">Kaptai</option>
                                      <option value="Kaukhali">Kaukhali</option>
                                    </optgroup>
                                  </optgroup>

                                  <optgroup label="Rajshahi">
                                    <optgroup label="Natore">
                                      <option value="Natore">Natore</option>
                                      <option value="Lalpur">Lalpur</option>
                                      <option value="Baraigram">Baraigram</option>
                                    </optgroup>
                                    <optgroup label="Pabna">
                                      <option value="Bera">Bera</option>
                                      <option value="Chatmohar">Chatmohar</option>
                                      <option value="Ishwardi">Ishwardi</option>
                                    </optgroup>
                                    <optgroup label="Sirajganj">
                                      <option value="Ullahpara">Ullahpara</option>
                                      <option value="Shahjadpur">Shahjadpur</option>
                                      <option value="Tarash">Tarash</option>
                                      <option value="Belkuchi">Belkuchi</option>
                                      <option value="Chauhali">Chauhali</option>
                                    </optgroup>
                                  </optgroup>

                                </select>
                              </div>

                              <div class="form-group">
                                <input type="submit" name="addmin" value="Submit" class="btn btn-primary btn-sm">
                              </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- End PAge Content -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Right sidebar -->
        <!-- ============================================================== -->
        <!-- .right-sidebar -->
        <!-- ============================================================== -->
        <!-- End Right sidebar -->
        <!-- ============================================================== -->
    </div>
        <?php

            //DElete Category
            if ( isset($_GET['delete']) ){
                $min_id =  $_GET['delete'];

                $query = "DELETE FROM publicrepresentatives WHERE rep_id = '$min_id'";

                $delete_min = mysqli_query($connection, $query);

                if ( !$delete_min ){
                    die("Query Failed " . mysqli_error($connection));
                }
                else{
                    header("Location: publicrepresentatives.php");
                }
            }

        ?>

<?php include "inc/footer.php" ?>