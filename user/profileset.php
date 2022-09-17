<?php include "inc/header.php"; ?>
<?php
	$user = $_SESSION['username'];
	$query = "SELECT * FROM users WHERE username = '$user'";
	$showPost = mysqli_query($connection, $query);

	while ($row = mysqli_fetch_assoc($showPost)) { 
		$id          = $row['id'];
      	$fullname    = $row['fullname'];
        $username    = $row['username'];
        $password    = $row['password'];
        $email       = $row['email'];
        $phone       = $row['phone'];
        $nid         = $row['nid'];
        $dob         = $row['dob'];
        $address     = $row['address'];
        $avater    	 = $row['avater'];
        $fbprofile   = $row['fbprofile'];
        $bio    	 = $row['bio'];
	}

?>

<?php

  //Password
  $errmess = '';
  if (isset($_POST['changpass'])) {
      $cpass          =   $_POST['cpass'];
      $npass          =   $_POST['npass'];

      $hnpass= sha1($cpass);
      $upPass= sha1($npass);

      if ($hnpass == $password) {
	      $query = "UPDATE users SET password='$upPass' WHERE id= '$id'";

	      $updateCRS = mysqli_query($connection, $query);

	      if ( !$updateCRS ){
	        echo '<div class="alert alert-warning" style="width: 600px;margin: 0 auto; margin-top: 100px;border-radius: 10px;">WRONG! Something goes wrong.</div>';
	      }
	      else{
	        header("Location: inc/logout.php");
	      }
	  }
      else{

      	$errmess = '<div class="alert alert-warning" style="width: 600px;margin: 0 auto; margin-top: 100px;border-radius: 10px;">WRONG! Password does not match.</div>';

      }
  }

?>


		<!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
	        <div class="row">

	            <!-- Area Chart -->
	            <div class="col-xl-12 col-lg-12">
	              <div class="card shadow mb-4">
	                <!-- Card Header - Dropdown -->
	                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
	                  <h6 class="m-0 font-weight-bold text-primary">Profile Setting</h6>
	                  <div class="dropdown no-arrow">
	                    
	                  </div>
	                </div>
	                <!-- Card Body -->
	                <div class="card-body">
	                    <div class="contaner">
	                    	<div class="row">
	                    		<div class="col-md-4 bg-light">
	                    			<div class="text-center">
									  <img class="img-profile rounded" width="250" height="200" src="img/users/<?php echo $_SESSION['avater'];  ?>">
									</div>
									<form action="" method="POST" enctype="multipart/form-data"><br>
										<div class="form-group">
				                          <label for="address">Change Photo</label>
				                          <input type="file" name="uimage" class="form-control">
				                        </div>
				                        <div class="form-group">
				                          <input type="submit" name="upic" class="btn btn-success" value="Upload">
				                        </div>
				                    </form>
									<br>
									<h4>Change Password</h4>
									<form action="" method="POST" enctype="multipart/form-data"><br>
										<div class="form-group">
				                          <label for="address">Current Password</label>
				                          <input type="password" name="cpass" class="form-control">
				                        </div>
				                        <div class="form-group">
				                          <label for="address">New Password</label>
				                          <input type="password" name="npass" class="form-control">
				                        </div>
				                        <div class="form-group">
				                          <input type="submit" name="changpass" class="btn btn-success" value="Change">
				                        </div>
				                    </form><br>
				                    <?php echo $errmess; ?>
	                    		</div>
	                    		<div class="col-md-8">
	                    			<form action="" method="POST" enctype="multipart/form-data">
				                      <div class="row">
				                        <div class="col">
				                          <label for="fname">First Name</label>
				                          <input type="text" required="" name="uname" class="form-control" value="<?php echo $fullname; ?>">
				                        </div>
				                        <div class="col">
				                          <label for="uname">UserName</label>
				                          <input type="text" disabled="" name="uuser" class="form-control" value="<?php echo $username; ?>">
				                        </div>
				                      </div><br>

				                      <div class="row">
				                        <div class="col">
				                          <label for="email">Email</label>
				                          <input type="email" required="" name="uemail" class="form-control" value="<?php echo $email; ?>">
				                        </div>
				                        <div class="col">
				                          <label for="phone">Phone</label>
				                          <input type="text" required="" name="uphone" class="form-control" value="<?php echo $phone; ?>">
				                        </div>
				                      </div><br>

				                      <div class="row">
				                        <div class="col">
				                          <label for="email">NID</label>
				                          <input type="number" required="" name="unid" class="form-control" value="<?php echo $nid; ?>">
				                        </div>
				                        <div class="col">
				                          <label for="phone">DOB</label>
				                          <input type="text" required="" name="udob" class="form-control" value="<?php echo $dob; ?>">
				                        </div>
				                      </div><br>

				                        <div class="form-group">
				                          <label for="address">Address</label>
				                          <input type="text" required="" name="uaddress" class="form-control" value="<?php echo $address; ?>">
				                        </div>
				                        <div class="form-group">
				                          <label for="address">FB Profile Link</label>
				                          <input type="text" required="" name="ufblink" class="form-control" value="<?php echo $fbprofile; ?>">
				                        </div>
				                        <div class="form-group">
										    <label for="exampleFormControlTextarea1">BIO</label>
										    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="bio"><?php echo $bio; ?></textarea>
										 </div>

				                        <div class="form-group">
				                          <input type="submit" name="update" class="btn btn-success" value="Update">
				                        </div>
				                    </form>

	                    			<!--  -->
	                    		</div>
	                    	</div><br>	                    	
	                    </div>
	                </div>
	              </div>
	            </div>
	        </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

<!-- Update -->
<?php

  // Course Update Info
  if (isset($_POST['update'])) {
      $uname          =   $_POST['uname'];
      $uemail         =   $_POST['uemail'];
      $uphone         =   $_POST['uphone'];
      $unid           =   $_POST['unid'];
      $udob           =   $_POST['udob'];
      $uaddress       =   $_POST['uaddress'];
      $ufblink        =   $_POST['ufblink'];
      $bio     		  =   mysqli_real_escape_string($connection, $_POST['bio']);

      $query = "UPDATE users SET fullname='$uname', email='$uemail', phone='$uphone', nid='$unid', dob='$udob', address='$uaddress', bio='$bio', fbprofile='$ufblink' WHERE id= '$id'";

      $updateCRS = mysqli_query($connection, $query);

      if ( !$updateCRS ){
        echo '<div class="alert alert-warning" style="width: 600px;margin: 0 auto; margin-top: 100px;border-radius: 10px;">WRONG! Something goes wrong.</div>';
      }
      else{
        header("Location: profile.php");
      }
  }

  if (isset($_POST['upic'])) {
  	  $uimage        		= $_FILES['uimage']['name'];
  	  $uimage_tmp    		= $_FILES['uimage']['tmp_name'];

  	  move_uploaded_file($uimage_tmp, "img/users/$uimage");

  	  $query = "UPDATE users SET avater='$uimage' WHERE id= '$id'";
  	  unlink("img/users/".$avater);
      $updatepic = mysqli_query($connection, $query);

      if ( !$updatepic ){
        echo '<div class="alert alert-warning" style="width: 600px;margin: 0 auto; margin-top: 100px;border-radius: 10px;">WRONG! Something goes wrong.</div>';
      }
      else{
        header("Location: inc/logout.php");
      }
  }



?>

<?php include "inc/footer.php"; ?>

