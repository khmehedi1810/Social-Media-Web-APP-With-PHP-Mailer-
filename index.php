<?php include "inc/header.php"; ?>


<section class="parent-sec">
	<div class="container">
		<div class="row">
			<!-- View All Blog Post -->
			<div class="col-md-8 bg-white">

			<div class="my-4 ">
				<h4 class="font-weight-bold">Select Your Area</h4>
				<!--  -->
					<div class="search-form">
						<div class="form-group">
							<select class="form-control" id="search" name="state">
								<option value="" class="selected">Division</option>
								<optgroup label="Dhaka">
									<option value="Gazipur1">Gazipur</option>
									<option value="Manikganj1">Manikganj</option>
									<option value="Narayanganj1">Narayanganj</option>
									<option value="Tangail1">Tangail</option>
								<optgroup label="Chittagong">
									<option value="Comilla1">Comilla</option>
									<option value="Chandpur1">Chandpur</option>
									<option value="Rangamati1">Rangamati</option>
								</optgroup>
								<optgroup label="Rajshahi">
									<option value="Natore1">Natore</option>
									<option value="Pabna1">Pabna</option>
									<option value="Sirajganj1">Sirajganj</option>
								</optgroup>
					    	</select>
						</div>

						<div id="Gazipur1" class="form-group"> <em>Gazipur > Select Upazila</em>
							<form action="" method="POST">
								<select class="form-control" name="upazilla">
							      <option value="Gazipur">Gazipur Sadar</option>
							      <option value="Kaliakair">Kaliakair</option>
							      <option value="Kaliganj">Kaliganj</option>
							    </select>
							    <div class="text-right py-2">
							    	<input type="submit" value="Search" name="sech" class="btn btn-sm btn-primary">
							    </div>
							</form>
						</div>

						<div id="Manikganj1" class="form-group"> <em>Manikganj > Select Upazila</em>
							<form action="" method="POST">
								<select class="form-control" name="upazilla">
									<option value="Manikganj">Manikganj Sadar</option>
								    <option value="Singair">Singair</option>
								    <option value="Daulatpur">Daulatpur</option>
							    </select>
							    <div class="text-right py-2">
							    	<input type="submit" value="Search" name="sech" class="btn btn-sm btn-primary">
							    </div>
							</form>
						</div>

						<div id="Narayanganj1" class="form-group"> <em>Narayanganj > Select Upazila</em>
							<form action="" method="POST">
								<select class="form-control" name="upazilla">
									<option value="Narayanganj">Narayanganj Sadar</option>
								    <option value="Sonargaon">Sonargaon</option>
								    <option value="Rupganj">Rupganj</option>
							    </select>
							    <div class="text-right py-2">
							    	<input type="submit" value="Search" name="sech" class="btn btn-sm btn-primary">
							    </div>
							</form>
						</div>

						<div id="Tangail1" class="form-group"> <em>Tangail > Select Upazila</em>
							<form action="" method="POST">
								<select class="form-control" name="upazilla">
									<option value="Tangail">Tangail Sadar</option>
								    <option value="Delduar">Delduar</option>
								    <option value="Mirzapur">Mirzapur</option>
							    </select>
							    <div class="text-right py-2">
							    	<input type="submit" value="Search" name="sech" class="btn btn-sm btn-primary">
							    </div>
							</form>
						</div>

						<div id="Comilla1" class="form-group"> <em>Comilla > Select Upazila</em>
							<form action="" method="POST">
								<select class="form-control" name="upazilla">
									<option value="Comilla">Comilla Sadar</option>
								    <option value="Daudkandi">Daudkandi</option>
							    </select>
							    <div class="text-right py-2">
							    	<input type="submit" value="Search" name="sech" class="btn btn-sm btn-primary">
							    </div>
							</form>
						</div>

						<div id="Chandpur1" class="form-group"> <em>Chandpur > Select Upazila</em>
							<form action="" method="POST">
								<select class="form-control" name="upazilla">
									<option value="Chandpur">Chandpur Sadar</option>
								    <option value="Kachua">Kachua</option>
								    <option value="Hajiganj">Hajiganj</option>
							    </select>
							    <div class="text-right py-2">
							    	<input type="submit" value="Search" name="sech" class="btn btn-sm btn-primary">
							    </div>
							</form>
						</div>

						<div id="Rangamati1" class="form-group"> <em>Rangamati > Select Upazila</em>
							<form action="" method="POST">
								<select class="form-control" name="upazilla">
									<option value="Rangamati">Rangamati Sadar</option>
								    <option value="Kaptai">Kaptai</option>
								    <option value="Kaukhali">Kaukhali</option>
							    </select>
							    <div class="text-right py-2">
							    	<input type="submit" value="Search" name="sech" class="btn btn-sm btn-primary">
							    </div>
							</form>
						</div>

						<div id="Natore1" class="form-group"> <em>Natore > Select Upazila</em>
							<form action="" method="POST">
								<select class="form-control" name="upazilla">
									<option value="Natore">Natore</option>
								    <option value="Lalpur">Lalpur</option>
								    <option value="Baraigram">Baraigram</option>
							    </select>
							    <div class="text-right py-2">
							    	<input type="submit" value="Search" name="sech" class="btn btn-sm btn-primary">
							    </div>
							</form>
						</div>

						<div id="Pabna1" class="form-group"> <em>Pabna > Select Upazila</em>
							<form action="" method="POST">
								<select class="form-control" name="upazilla">
									<option value="Bera">Bera</option>
								    <option value="Chatmohar">Chatmohar</option>
								    <option value="Ishwardi">Ishwardi</option>
							    </select>
							    <div class="text-right py-2">
							    	<input type="submit" value="Search" name="sech" class="btn btn-sm btn-primary">
							    </div>
							</form>
						</div>

						<div id="Sirajganj1" class="form-group"> <em>Sirajganj > Select Upazila</em>
							<form action="" method="POST">
								<select class="form-control" name="upazilla">
									<option value="Ullahpara">Ullahpara</option>
								    <option value="Shahjadpur">Shahjadpur</option>
								    <option value="Tarash">Tarash</option>
								    <option value="Belkuchi">Belkuchi</option>
								    <option value="Chauhali">Chauhali</option>
							    </select>
							    <div class="text-right py-2">
							    	<input type="submit" value="Search" name="sech" class="btn btn-sm btn-primary">
							    </div>
							</form>
						</div>

					</div>
				<!--  -->
			</div>



			<?php

				if (isset($_POST['sech'])) {
					$srch = $_POST['upazilla'];
				}
				if (empty($srch)) {
					$readPost = "SELECT * FROM blog WHERE post_status='Published' ORDER BY post_id DESC";
					echo "Sort by Location: All";
				}
				else{
					$readPost = "SELECT * FROM blog WHERE post_status='Published' AND location='$srch' ORDER BY post_id DESC";
					echo "<b>Sort by Location:</b> ".$srch;
				}
  
				
				$showPost = mysqli_query($connection, $readPost);

				while ($row = mysqli_fetch_assoc($showPost)) { 
					$post_id          = $row['post_id'];
	              	$post_title       = $row['post_title'];
	              	$long_title       = $row['long_title'];
	                $post_desc        = $row['post_desc'];
	                $post_thumb       = $row['post_thumb'];
	                $post_date        = $row['post_date'];
	                $post_author      = $row['post_author'];
	                $post_category    = $row['post_category'];
	                $post_status      = $row['post_status'];
				?>
					
					<div class="blog-post">
					<h2><b><?php echo $post_title; ?></b></h2>
					<div class="blog-thumbnail">
						<img src="user/img/posts/<?php echo $post_thumb; ?>" class="img-fluid post-img">
						<div class="blog-date">
							<h6><?php echo $post_date; ?></h6>
						</div>
					</div>
					<div class="blog-info">
						<ul>
							<li><i class="fa fa-folder-open-o"></i>Category - <?php echo $post_category; ?></li>
							<li><i class="fa fa-user"></i>Posted By - <?php echo $post_author; ?></li>
						</ul>
					</div>
					<p><b><?php echo $long_title; ?>...</b></p>
					<a href="user/viewfullpost.php?view_post=<?php echo $post_id; ?>" class="btn btn-primary btn-sm">Read More</a>
				</div>
				<hr>
		


			<?php	}

			?>

			</div>

			<!-- Sidebar -->
			<div class="col-md-4 d-none d-sm-block fixd custom-sitebar">
				<!-- Latest Post -->
				<div class="card my-4 sidebar">
					<div class="card-header py-2">
					  <h6 class="m-0 font-weight-bold text-primary">Trending Topics</h6>
					</div>
					<div class="card-body">
					  	<ul>
					  		<?php

				                //$selmostcom = "SELECT blog_id, count(*) as NUM FROM comments GROUP BY blog_id";
				                //$selmostcom = "SELECT blog_id, COUNT(blog_id) FROM comments GROUP BY blog_id HAVING COUNT(blog_id)>1";
				                //$selmostcom = "SELECT blog_id, COUNT(blog_id) FROM comments GROUP BY blog_id ORDER BY blog_id DESC";
				                $selmostcom = "SELECT blog_id,post_id,post_title FROM comments,blog WHERE blog_id = post_id GROUP BY blog_id ORDER BY COUNT(blog_id) DESC LIMIT 5";

				                $slelectMostcom = mysqli_query($connection, $selmostcom);

				                while ($row = mysqli_fetch_assoc($slelectMostcom)) { 
				                    $blog_idd = $row['blog_id'];
				                    $post_id  = $row['post_id'];
				                    $post_title  = $row['post_title'];
				                  ?>
				                 

				                  <li class="nav-item">
				                    <a class="nav-link" href="user/viewfullpost.php?view_post=<?php echo $blog_idd; ?>">#<?php echo $post_title; ?></a>
				                  </li>


				              <?php }

				              ?>
					  	</ul>
					</div>
				</div>

				<!-- Top Category -->
				<div class="card mb-4 sidebar">
					<div class="card-header py-2">
					  <h6 class="m-0 font-weight-bold text-primary">Latest Category</h6>
					</div>
					<div class="card-body">
					  	<ul>
					  		<?php

				                $selCat = "SELECT * FROM categories ORDER BY cat_id DESC";
				                $select_all_categories = mysqli_query($connection, $selCat);

				                while ($row = mysqli_fetch_assoc($select_all_categories)) { 
				                    $cat_id = $row['cat_id'];
				                    $cat_name = $row['cat_name'];

				                  ?>
				                 

				                  <li class="nav-item">
				                    <a class="nav-link" href="singlecategory.php?viewcat=<?php echo $cat_name; ?>"><?php echo $cat_name; ?></a>
				                  </li>


				              <?php }

				              ?>
					  	</ul>
					</div>
				</div>

				<!-- Top Category -->
				<div class="card mb-5 sidebar">
					<div class="card-header py-2">
					  <h6 class="m-0 font-weight-bold text-primary">Important Links</h6>
					</div>
					<div class="card-body">
					  	<ul>
					  		<li class="nav-item"><a class="nav-link" href="tel:999">Call Police</a></li>
					  		<li class="nav-item"><a class="nav-link" href="tel:999">Ambulance</a></li>
					  		<li class="nav-item"><a class="nav-link" href="http://www.fireservice.gov.bd/site/page/7676b3e3-aa06-4214-91b9-17d4cf042b4e/%E0%A6%B8%E0%A6%95%E0%A6%B2-%E0%A6%B8%E0%A7%8D%E0%A6%9F%E0%A7%87%E0%A6%B6%E0%A6%A8%E0%A7%87%E0%A6%B0-%E0%A6%A8%E0%A6%AE%E0%A7%8D%E0%A6%AC%E0%A6%B0/" target="_blank">Fire Service</a></li>
					  	</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>


<?php include "inc/footer.php"; ?>

   