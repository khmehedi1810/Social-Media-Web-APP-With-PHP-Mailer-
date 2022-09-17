<?php include "inc/header.php"; ?>

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800">Your Activities</h1>

          <div class="row">
          	<div class="col-md-12">
          		<div class="card shadow mb-4">
					<div class="card-header py-3">
					  <h6 class="m-0 font-weight-bold text-primary">You have reported these posts</h6>
					</div>
					<div class="card-body">
					  	<!-- start -->
					  	<div class="table-responsive">
                            <table class="table table-hover table-dark user-table">
                                <thead>
                                    <tr>
                                        <th class="border-top-0">#</th>
                                        <th class="border-top-0">Title</th>
                                        <th class="border-top-0">Thumbnail</th>
                                        <th class="border-top-0">Date</th>
                                        <th class="border-top-0">Author</th>
                                        <th class="border-top-0">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                        $userID = $id;
                                        //$query = "SELECT DISTINCT * FROM blog,report WHERE post_id = blog_id ORDER BY post_id DESC";
          								$selrepPst = "SELECT * FROM report,blog WHERE autId = '$userID' AND post_id = blog_id ORDER BY report_id DESC";
                                        $select_rep_pst = mysqli_query($connection, $selrepPst);
                                        $i = 0;
                                        while ( $row = mysqli_fetch_assoc($select_rep_pst) )
                                        {
                                          $post_id          = $row['post_id'];
                                          $report_id        = $row['report_id'];
                                          $post_title       = $row['post_title'];
                                          $post_thumb       = $row['post_thumb'];
                                          $post_date        = $row['post_date'];
                                          $post_author      = $row['post_author'];
                                          $post_status      = $row['post_status'];
                                          $i++;
                                        ?>
                                            <tr class="">
                                              <th scope="row"><?php echo $i; ?></th>
                                              <td><?php echo $post_title; ?></td>
                                              <td><img src="../user/img/posts/<?php echo $post_thumb; ?>" width="150"></td>
                                              <td><?php echo $post_date; ?></td>
                                              <td><?php echo $post_author; ?></td>
                                              <td>
                                                <div class="btn-group">
                                                	<a href="viewfullpost.php?view_post=<?php echo $post_id; ?>" class="btn btn-primary btn-sm">View</a>
                                                  <a href="profileactivity.php?delRep=<?php echo $report_id; ?>" class="btn btn-success btn-sm">Undo Report</a>
						                        </div>
                                              </td>
                                            </tr>

                                            <?php

                                        }
                                    ?>
                                </tbody>
                            </table>
                        </div>
					  	<!-- End -->
					</div>
				</div>
          	</div>
          </div>

          <div class="row">
          	<!-- Left Side -->
          	<div class="col-md-6">


          		<div class="card shadow mb-4">
					<div class="card-header py-3">
					  <h6 class="m-0 font-weight-bold text-primary">Update your activities</h6>
					</div>
					<div class="card-body text-center">
					  	<img src="img/download.png" class="img-fluid text-center">
					</div>
				</div>

				<?php // Update Comment
					if (isset($_GET['updateCom'])){
						$updateComt = $_GET['updateCom'];

						$query = "SELECT * FROM comments WHERE com_id = '$updateComt'";

						$read_cat = mysqli_query($connection, $query);

						while ($row = mysqli_fetch_assoc($read_cat)) {
							$the_com_id 	= $row['com_id'];
							$the_com_cmnt 	= $row['comnt'];

						?>


		<div class="card shadow mb-4">
			<div class="card-header py-3">
			  <h6 class="m-0 font-weight-bold text-primary">Update</h6>
			</div>
		<div class="card-body">
		  	<form action="" method="POST" accept-charset="utf-8"> 
		  		<div class="form-group">
		  			<label>Update Your Comment</label>
		  			<input type="text" name="updatecmnt" class="form-control" value="<?php echo $the_com_cmnt; ?>">
		  		</div>
		  		<div class="form-group">
		  			<input type="submit" name="updateCom" value="Update" class="btn btn-primary btn-sm">
		  		</div>
		  	</form>
		</div>
	</div>


					<?php	}
					}	

				?>

          	</div>



          	<!-- Right Side -->
          	<div class="col-md-6">
          		<div class="card shadow mb-4">
					<div class="card-header py-3">
					  <h6 class="m-0 font-weight-bold text-primary">You have commented these. </h6>
					</div>
					<div class="card-body">
					  	<table class="table">
						  <thead class="thead-dark">
						    <tr>
						      <th scope="col">#</th>
						      <th scope="col">Category Name</th>
						      <th scope="col">Action</th>
						    </tr>
						  </thead>
						  <tbody>

	  	<?php
	  		// Read All the Category
	  		$userid = $_SESSION['userid'];
	  		$query = "SELECT * FROM comments WHERE aut_id = '$userid' ";

	  		$allCmntofU = mysqli_query($connection, $query);
	  		$i = 0;
	  		while( $row = mysqli_fetch_assoc($allCmntofU) ){ 
	  				$com_id 	= $row['com_id'];
	  				$comnt 		= $row['comnt'];
	  				$blog_idD 	= $row['blog_id'];
	  				$i++;
	  			?>
  
	  			<tr>
			      <th scope="row"><?php echo $i; ?></th>
			      <td><?php echo $comnt; ?></td>
			      <td>
			      	<div class="btn-group">
			      		<a href="viewfullpost.php?view_post=<?php echo $blog_idD; ?>" class="btn btn-warning btn-sm">View</a>
			      		<a href="profileactivity.php?updateCom=<?php echo $com_id; ?>" class="btn btn-success btn-sm">Update</a>
			      		<a href="profileactivity.php?deleteCom=<?php echo $com_id; ?>" class="btn btn-danger btn-sm">Delete</a>
			      	</div>
			      </td>
			    </tr>
	  	<?php	}

	  	?>						    
						  </tbody>
						</table>
					</div>
				</div>
          	</div>
          </div>

        </div>
        <!-- /.container-fluid -->


        <?php
        	// Update Category

        	if (isset($_POST['updateCom'])){

        		$updatecmnt = $_POST['updatecmnt'];

        		$query = "UPDATE comments SET comnt='$updatecmnt' WHERE com_id='$updateComt'";

        		$update_category = mysqli_query($connection, $query);

        		if ( !$update_category ){
  					die("Query Failed " . mysqli_error($connection));
  				}
  				else{
  					header("Location: profileactivity.php");
  				}

        	}


        ?>

        <?php

        	//DElete report
        	if ( isset($_GET['deleteCom']) ){
        		$delCom =  $_GET['deleteCom'];

        		$query = "DELETE FROM comments WHERE com_id = '$delCom'";

        		$delete_rep = mysqli_query($connection, $query);

        		if ( !$delete_rep ){
  					die("Query Failed " . mysqli_error($connection));
  				}
  				else{
  					header("Location: profileactivity.php");
  				}
        	}

        ?>

        <?php

        	//DElete report
        	if ( isset($_GET['delRep']) ){
        		$delRep =  $_GET['delRep'];

        		$query = "DELETE FROM report WHERE report_id = '$delRep'";

        		$delete_rep = mysqli_query($connection, $query);

        		if ( !$delete_rep ){
  					die("Query Failed " . mysqli_error($connection));
  				}
  				else{
  					header("Location: profileactivity.php");
  				}
        	}

        ?>




      </div>
      <!-- End of Main Content -->

<?php include "inc/footer.php"; ?>

