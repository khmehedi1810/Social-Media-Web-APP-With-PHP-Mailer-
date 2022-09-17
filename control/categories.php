<?php include "inc/header.php" ?>
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row align-items-center">
                    <div class="col-md-6 col-8 align-self-center">
                        <h3 class="page-title mb-0 p-0">Dashboard</h3>
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Categories</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                    <div class="col-md-6 col-4 align-self-center">
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800">All Post Categories</h1>


          <div class="row">
          	<!-- Left Side -->
          	<div class="col-md-6">

          		<?php
          			$message = "";
          			if ( isset($_POST['addCat']) ){
          				$category = mysqli_real_escape_string($connection, $_POST['category']);

          				if ( empty($category) ){
          					$message = '<div class="alert alert-warning">Category Name is Missing.</div>';
          				}
          				else{
          					$query = "INSERT INTO categories (cat_name) VALUES ('$category')";

	          				$add_category_name = mysqli_query($connection, $query);

	          				if ( !$add_category_name ){
	          					die("Query Failed " . mysqli_error($connection));
	          				}
	          				else{
	          					header("Location: categories.php");
	          				}
          				}
          			}
          		?>


          		<div class="card shadow mb-4">
					<div class="card-header py-3">
					  <h6 class="m-0 font-weight-bold text-primary text-center">Add New Category</h6>
					</div>
					<div class="card-body">
					  	<form action="" method="POST" accept-charset="utf-8">
					  		<div class="form-group">
					  			<label>Category Name</label>
					  			<input type="text" name="category" class="form-control">
					  		</div>
					  		<div class="form-group">
					  			<input type="submit" name="addCat" value="Add" class="btn btn-primary btn-sm">
					  		</div>
					  	</form>
					  	<?php echo $message; ?>
					</div>
				</div>

				<?php // Update Category
					if (isset($_GET['update'])){
						$the_cat_id = $_GET['update'];

						$query = "SELECT * FROM categories WHERE cat_id = '$the_cat_id'";

						$read_cat = mysqli_query($connection, $query);

						while ($row = mysqli_fetch_assoc($read_cat)) {
							$the_cat_id 	= $row['cat_id'];
							$the_cat_name 	= $row['cat_name'];

						?>


		<div class="card shadow mb-4">
			<div class="card-header py-3">
			  <h6 class="m-0 font-weight-bold text-primary text-center">Update Category Name</h6>
			</div>
		<div class="card-body">
		  	<form action="" method="POST" accept-charset="utf-8"> 
		  		<div class="form-group">
		  			<label>Update Category Name</label>
		  			<input type="text" name="updatecategory" class="form-control" value="<?php echo $the_cat_name; ?>">
		  		</div>
		  		<div class="form-group">
		  			<input type="submit" name="updateCat" value="Update" class="btn btn-primary btn-sm">
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
					  <h6 class="m-0 font-weight-bold text-primary text-center">View All Categories</h6>
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
	  		$query = "SELECT * FROM categories";

	  		$all_cat_name = mysqli_query($connection, $query);
	  		$i = 0;
	  		while( $row = mysqli_fetch_assoc($all_cat_name) ){ 
	  				$cat_id 	= $row['cat_id'];
	  				$cat_name 	= $row['cat_name'];
	  				$i++;
	  			?>

	  			<tr>
			      <th scope="row"><?php echo $i; ?></th>
			      <td><?php echo $cat_name; ?></td>
			      <td>
			      	<div class="btn-group">
			      		<a href="categories.php?update=<?php echo $cat_id; ?>" class="btn btn-success btn-sm">Update</a>
			      		<a href="categories.php?delete=<?php echo $cat_id; ?>" class="btn btn-danger btn-sm">Delete</a>
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

        	if (isset($_POST['updateCat'])){

        		$updatecategory = $_POST['updatecategory'];

        		$query = "UPDATE categories SET cat_name='$updatecategory' WHERE cat_id='$the_cat_id'";

        		$update_category = mysqli_query($connection, $query);

        		if ( !$update_category ){
  					die("Query Failed " . mysqli_error($connection));
  				}
  				else{
  					header("Location: categories.php");
  				}

        	}


        ?>



        <?php

        	//DElete Category
        	if ( isset($_GET['delete']) ){
        		$the_cat_id =  $_GET['delete'];

        		$query = "DELETE FROM categories WHERE cat_id = '$the_cat_id'";

        		$delete_cat = mysqli_query($connection, $query);

        		if ( !$delete_cat ){
  					die("Query Failed " . mysqli_error($connection));
  				}
  				else{
  					header("Location: categories.php");
  				}
        	}

        ?>


      <!-- End of Main Content -->
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
<?php include "inc/footer.php" ?>