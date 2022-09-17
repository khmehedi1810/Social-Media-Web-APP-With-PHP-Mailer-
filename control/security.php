<?php include "inc/header.php" ?>

<?php

    if ( isset($_POST['addmin']) ){

      $sec_key       = $_POST['sec_key'];
      $sec_email     = $_POST['sec_email'];
      $sec_pass       = $_POST['sec_pass'];

      $hashPass = sha1($sec_pass);

      $query = "INSERT INTO control (con_security_num, con_security_email, con_security_pass, showpass) VALUES ( '$sec_key', '$sec_email', '$hashPass', '$sec_pass')";

      $addpost = mysqli_query($connection, $query);
      

      if ( !$addpost ){
        die ("Query Failed. " . mysqli_error($connection));
      }
      else{
        header("Location: security.php");
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
                <h3 class="page-title mb-0 p-0">Security</h3>
                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Control Panel Login Set</li>
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
                        <h4 class="card-title">All Login Set</h4>
                        <h6 class="card-subtitle">List of Login Set.</h6>
                        <div class="table-responsive">
                            <table class="table user-table">
                                <thead>
                                    <tr>
                                        <th class="border-top-0">#</th>
                                        <th class="border-top-0">Security Key</th>
                                        <th class="border-top-0">Email</th>
                                        <th class="border-top-0">Password</th>
                                        <th class="border-top-0">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                        //$query = "SELECT DISTINCT * FROM blog,report WHERE post_id = blog_id ORDER BY post_id DESC";
                                        $selrepMin = "SELECT * FROM control ORDER BY con_id DESC";
                                        $select_rep_min = mysqli_query($connection, $selrepMin);
                                        $i = 0;
                                        while ( $row = mysqli_fetch_assoc($select_rep_min) )
                                        {
                                          $con_id                 = $row['con_id'];
                                          $con_security_num       = $row['con_security_num'];
                                          $con_security_email     = $row['con_security_email'];
                                          $con_security_pass      = $row['showpass'];
                                          $i++;
                                        ?>
                                            <tr class="bg-danger text-white">
                                              <th scope="row"><?php echo $i; ?></th>
                                              <td><?php echo $con_security_num; ?></td>
                                              <td><?php echo $con_security_email; ?></td>
                                              <td><?php echo $con_security_pass; ?></td>
                                              <td>
                                                <div class="btn-group">
                                                    <a href="security.php?delete=<?php echo $con_id; ?>" class="btn btn-warning">Delete</a>
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
                        <h4 class="card-title">Add New Login Set</h4>
                        <div >
                            <form action="" method="POST" enctype="multipart/form-data" accept-charset="utf-8">
                              <div class="form-group">
                                <label for="Title">Security Key:</label>
                                <input type="text" name="sec_key" class="form-control">
                              </div>

                              <div class="form-group">
                                <label for="Title">Email:</label>
                                <input type="email" name="sec_email" class="form-control">
                              </div>

                              <div class="form-group">
                                <label for="Title">Password:</label>
                                <input type="password" name="sec_pass" class="form-control">
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

                $query = "DELETE FROM control WHERE con_id = '$min_id'";

                $delete_min = mysqli_query($connection, $query);

                if ( !$delete_min ){
                    die("Query Failed " . mysqli_error($connection));
                }
                else{
                    header("Location: security.php");
                }
            }

        ?>

<?php include "inc/footer.php" ?>