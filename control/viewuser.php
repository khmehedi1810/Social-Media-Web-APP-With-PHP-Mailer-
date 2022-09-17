<?php include "inc/header.php" ?>

<?php 
if (isset($_GET['view_user'])) {
	$view_user = $_GET['view_user'];

    $query = "SELECT * FROM users WHERE id = '$view_user'";
    $select_user = mysqli_query($connection, $query);
    while ( $row = mysqli_fetch_assoc($select_user) )
    {
        $u_id         = $row['id'];
        $u_fullname   = $row['fullname'];
        $u_username   = $row['username'];
        $u_email      = $row['email'];
        $u_phone      = $row['phone'];
        $nid          = $row['nid'];
        $dob          = $row['dob'];
        $u_pp         = $row['avater'];
        $address      = $row['address'];
        $fbprofile    = $row['fbprofile'];
        $bio          = $row['bio'];
        $active       = $row['active'];
        $report       = $row['report'];
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
                <h3 class="page-title mb-0 p-0">Users Details</h3>
                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">User</a></li>
                            <li class="breadcrumb-item active" aria-current="page">This User</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <div class="col-md-6 col-4 align-self-center">
            </div>
        </div>
    </div>
    <?php 
        if (empty($view_user)) {
            echo '<div class="alert alert-warning mb-5" style="width: 600px;margin: 0 auto; margin-top: 60px;border-radius: 10px;">No! User Selected</div>';
        }
        else{
    ?>


<!-- Total post count -->
<?php
$query = "SELECT * FROM blog WHERE aut_id = '$u_id' ";
$all_bg_by_user = mysqli_query($connection, $query);
$postCount = 0;
while ($row = mysqli_fetch_assoc($all_bg_by_user)){
  $post_id          = $row['post_id'];
  $postCount++;}
  ?>
    <div class="container-fluid">
        <!-- ============================================================== -->
        <!-- Start Page Content -->
        <!-- ============================================================== -->
        <div class="row">
            <!-- Column -->
            <div class="col-lg-4 col-xlg-3">
                <!-- Column -->
                <div class="card">
                    <img class="card-img-top" src="assets/images/background/profile-bg.jpg"
                        alt="Card image cap">
                    <div class="card-body little-profile text-center">
                        <div class="pro-img">
                            <img src="../user/img/users/<?php 
                              if( !$u_pp ){
                                echo 'title_logo.png';
                              }
                              else{
                                echo $u_pp;
                              }
                             ?>"  alt="User">
                           
                        </div>
                        <h3 class="mb-0"><?php echo $u_fullname;?></h3>
                        <p><a href="mailto:"><?php echo $u_email; ?></a></p>
                        <?php 
                            if ($active == 'YES') {
                        ?>
                        <p class="text-success">Active User</p>
                        <p>Total Post:</p>
                        <center><p class="btn btn-danger"><?php echo $postCount; ?></p></center>
                        <?php } 

                        else{ ?>
                        <p class="text-danger">Not Active User</p>

                        <?php } ?>

                        <?php if ($report == 'YES') { ?>
                            <p><b><span class="badge badge-danger">This user is REPORTED</span></b></p>
                        <?php } ?>
                    </div>

                </div>
                <div class="card">
                    <div class="card-body bg-info">
                        <h4 class="text-white card-title">Update Status</h4>
                    </div>
                    <div class="card-body">
                        <div class="message-box contact-box">
                            <div class="message-widget contact-widget">
                                <?php 
                                    if ($active == 'YES') { ?>
                                        <form method="POST" class="form-horizontal form-material mx-2">
                                            
                                             <div class="form-group">
                                                <div class="col-sm-12 text-center">
                                                    <input type="submit" name="up_deactive" value="Deactivate" class="btn btn-danger text-white">
                                                </div>
                                            </div>
                                        </form>
                                    <?php }
                                    else{ ?>

                                        <form method="POST" class="form-horizontal form-material mx-2">
                                           
                                             <div class="form-group">
                                                <div class="col-sm-12 text-center">
                                                    <input type="submit" name="up_active" value="Activate" class="btn btn-success text-white">
                                                </div>
                                            </div>
                                        </form>

                                   <?php }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
                <?php 
                    $checkPST = "SELECT * FROM blog WHERE aut_id = '$u_id'";
                    $checkHavePst = mysqli_query($connection, $checkPST);
                    while ($row = mysqli_fetch_assoc($checkHavePst)){
                      $post_idDDa          = $row['post_id'];
                    } 
                    if (empty($post_idDDa)) {
                        
                    ?>
                    <div class="card">
                        <div class="card-body bg-danger text-center">
                            <h4 class="text-white card-title">DELETE THIS USER</h4>
                            <a href="" class="text-warning" data-toggle="modal" data-target="#deleTeaMod">Delete</a>
                        </div>
                    </div>

                    <?php }else{ ?>
                    <div class="card">
                        <div class="card-body bg-danger text-center">
                            <h4 class="text-white card-title">DELETE THIS USER</h4>
                            <p>This user have some post. You cann't DELETE this user.</p>
                        </div>
                    </div>
                    <?php }?>

                <!-- Column -->
            </div>
            <div class="col-lg-8 col-xlg-9">
                <div class="card">
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs profile-tab" role="tablist">
                        <li class="nav-item"> <a class="nav-link" data-bs-toggle="tab" href="#profile"
                                role="tab">Profile</a> </li>
                        <li class="nav-item"> <a class="nav-link" data-bs-toggle="tab" href="#settings"
                                role="tab">Settings</a>
                        </li>
                        <li class="nav-item sr-only"> <a class="nav-link" data-bs-toggle="tab" href="#usermes"
                                role="tab">Message</a>
                        </li>
                    </ul>
                    <!-- Tab panes -->
                    <div class="tab-content">
                        <!--second tab-->
                        <div class="tab-pane active" id="profile" role="tabpanel">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-3 col-xs-6 b-r"> <strong>Full Name</strong>
                                        <br>
                                        <p class="text-muted"><?php echo $u_fullname; ?></p>
                                    </div>
                                    <div class="col-md-3 col-xs-6 b-r"> <strong>User ID</strong>
                                        <br>
                                        <p class="text-muted"><?php echo $u_id; ?></p>
                                    </div>
                                    <div class="col-md-3 col-xs-6 b-r"> <strong>Mobile</strong>
                                        <br>
                                        <p class="text-muted"><?php echo $u_phone; ?></p>
                                    </div>
                                    <div class="col-md-3 col-xs-6"> <strong>Email</strong>
                                        <br>
                                        <p class="text-muted"><?php echo $u_email; ?></p>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-md-3 col-xs-6 b-r"> <strong>NID</strong>
                                        <br>
                                        <p class="text-muted"><?php echo $nid; ?></p>
                                    </div>
                                    <div class="col-md-3 col-xs-6 b-r"> <strong>DOB</strong>
                                        <br>
                                        <p class="text-muted"><?php echo $dob; ?></p>
                                    </div>
                                    <div class="col-md-3 col-xs-6 b-r"> <strong>Address</strong>
                                        <br>
                                        <p class="text-muted"><?php echo $address; ?></p>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class=""> <strong>Your Facebook Profile link</strong>
                                        <br>
                                        <a href="<?php echo $fbprofile; ?>" target="_blank" class="">Facebook Profile</a>
                                    </div>
                                </div>
                                <hr>
                            </div>
                        </div>
                        <div class="tab-pane" id="settings" role="tabpanel">
                            <div class="card-body">
                                <form class="form-horizontal form-material mx-2" method="POST">
                                    
                                    <div class="form-group">
                                        <label for="example-email" class="col-md-12">Update Email</label>
                                        <div class="col-md-12">
                                            <input type="email" value="<?php echo $u_email; ?>" 
                                                class="form-control form-control-line ps-0" name="upTeaemail"
                                                id="example-email">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <input type="submit" class="btn btn-success text-white" name="Update_Email">
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="tab-pane sr-only" id="usermes" role="tabpanel">
                            <div class="card-body">
                                <form class="form-horizontal form-material mx-2" method="POST">
                                    
                                    <div class="form-group">
                                        <label for="example-email" class="col-md-12">Update Email</label>
                                        <div class="col-md-12">
                                            <input type="email" value="<?php echo $u_email; ?>" 
                                                class="form-control form-control-line ps-0" name="upTeaemail"
                                                id="example-email">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <input type="submit" class="btn btn-success text-white" name="Update_Email">
                                        </div>
                                    </div>
                                </form>
                            </div>
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
<?php } ?>
<!-- Delete Student Modal-->
  <div class="modal fade" id="deleTeaMod" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Are you SURE?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">For any kinds of Irrelevant work, You can Delete any Teacher.</div>
        <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <form method="POST">
                <input type="submit" class="btn btn-danger" name="delTea" value="DELETE">
            </form>
        </div>
      </div>
    </div>
  </div>

<?php 
    // De-activate profile
    if (isset($_POST['up_deactive'])) {

        $query = "UPDATE users SET active ='NO' WHERE id = '$u_id'";

        $update_ac_status = mysqli_query($connection, $query);

        if ( !$update_ac_status ){
          die ("Query Failed. " . mysqli_error($connection));
        }
        else{
          header("Location: pendinguser.php");
        }
    }

    // Activate Profile
    if (isset($_POST['up_active'])) {

        $query = "UPDATE users SET active ='YES' WHERE id = '$u_id'";

        $update_ac_status = mysqli_query($connection, $query);

        if ( !$update_ac_status ){
          die ("Query Failed. " . mysqli_error($connection));
        }
        else{
          header("Location: activeusers.php");
        }

    }

    // Update user's email
    if (isset($_POST['Update_Email'])) {
        $upTeaemail     = $_POST['upTeaemail'];
        $query = "UPDATE users SET email ='$upTeaemail' WHERE id = '$u_id'";

        $upEmailAdd = mysqli_query($connection, $query);

        if ( !$upEmailAdd ){
          die ("Query Failed. " . mysqli_error($connection));
        }
        else{
          header("Location: allusers.php");
        }

    }
    //delete users
    if (isset($_POST['delTea'])) {
        $query = "DELETE FROM users WHERE id ='$u_id'";

            $delete_teacherACC = mysqli_query($connection, $query);

            if ( !$delete_teacherACC ){
                die("Query Failed ". mysqli_error($connection));
            }
            else{
                header("Location: dashboard.php");
            }
    }


?>


<?php include "inc/footer.php" ?>
