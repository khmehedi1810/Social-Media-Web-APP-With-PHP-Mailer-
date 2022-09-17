<?php 
	include "inc/header.php";  
	$bio = "Null";
?>

<?php
	$user = $_SESSION['username'];
	$query = "SELECT * FROM users WHERE username = '$user'";
	$showPost = mysqli_query($connection, $query);

	while ($row = mysqli_fetch_assoc($showPost)) { 
		$id          = $row['id'];
      	$fullname    = $row['fullname'];
        $username    = $row['username'];
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


        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
	        <div class="row">

	            <!-- Area Chart -->
	            <div class="col-xl-8 col-lg-7">
	              <div class="card shadow mb-4">
	                <!-- Card Header - Dropdown -->
	                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
	                  <h6 class="m-0 font-weight-bold text-primary">Profile Details</h6>
	                  <div class="dropdown no-arrow">
	                    
	                  </div>
	                </div>
	                <!-- Card Body -->
	                <div class="card-body">
	                    <div class="contaner">
	                    	<div class="row">
	                    		<div class="col-md-4 bg-light">
	                    			<div class="m-1">
	                    				<b><p>ID: </p></b>
	                    				<p><?php echo $id; ?></p>
	                    			</div>
	                    		</div>
	                    		<div class="col-md-4 bg-light">
	                    			<div class="m-1">
	                    				<b><p>Name: </p></b>
	                    				<p><?php echo $fullname; ?></p>
	                    			</div>
	                    		</div>
	                    		<div class="col-md-4 bg-light">
	                    			<div class="m-1">
	                    				<b><p>User Name: </p></b>
	                    				<p><?php echo $username; ?></p>
	                    			</div>
	                    		</div>
	                    	</div><br>
	                    	<div class="row">
	                    		<div class="col-md-4 bg-light">
	                    			<div class="m-1">
	                    				<b><p>Phone: </p></b>
	                    				<p><?php echo $phone; ?></p>
	                    			</div>
	                    		</div>
	                    		<div class="col-md-4 bg-light">
	                    			<div class="m-1">
	                    				<b><p>Email: </p></b>
	                    				<p><?php echo $email; ?></p>
	                    			</div>
	                    		</div>
	                    		<div class="col-md-4 bg-light">
	                    			<div class="m-1">
	                    				<b><p>Address: </p></b>
	                    				<p><?php echo $address; ?></p>
	                    			</div>
	                    		</div>
	                    	</div><br>
	                    	<div class="row">
	                    		<div class="col-md-4 bg-light">
	                    			<div class="m-1">
	                    				<b><p>NID: </p></b>
	                    				<p><?php echo $nid; ?></p>
	                    			</div>
	                    		</div>
	                    		<div class="col-md-4 bg-light">
	                    			<div class="m-1">
	                    				<b><p>DOB: </p></b>
	                    				<p><?php echo $dob; ?></p>
	                    			</div>
	                    		</div>
	                    		<div class="col-md-4 bg-light">
	                    			<div class="m-1">
	                    				<b><p>FB Profile: </p></b>
	                    				<p><?php echo $fbprofile; ?></p>
	                    			</div>
	                    		</div>
	                    	</div><br>
	                    	<div class="row">
	                    		<div class="col-md-12 bg-light">
	                    			<div class="m-1">
	                    				<b><p>BIO: </p></b>
	                    				<p><?php echo $bio; ?></p>
	                    			</div>
	                    		</div>
	                    	</div>	                    	
	                    </div>
	                </div>
	              </div>
	            </div>

	            <!-- Pie Chart -->
	            <div class="col-xl-4 col-lg-5">
	              <div class="card shadow mb-4">
	                <!-- Card Header - Dropdown -->
	                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
	                  <h6 class="m-0 font-weight-bold text-primary">Profile Photo</h6>
	                  <div class="dropdown no-arrow">
	                    
	                  </div>
	                </div>
	                <!-- Card Body -->
	                <div class="card-body">
	                  	<div class="text-center">
						  <img class="img-profile rounded-circle" width="300" height="250" src="img/users/<?php echo $_SESSION['avater'];  ?>">
						</div>
						<br>
						<div>
							<center><h3><u><?php echo $fullname; ?></u></h3></center>
						</div>
	                </div>
	              </div>
	            </div>
	        </div>

        </div>
        <!-- /.container-fluid -->

    </div>
      <!-- End of Main Content -->
<?php include "inc/footer.php"; ?>