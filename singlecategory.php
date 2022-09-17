<?php include "inc/header.php"; ?>



<?php
if (isset($_GET['viewcat'])) {
  $viewcat = $_GET['viewcat'];


}
?>
<section class="parent-sec" id="beginpage">
	<div class="container">
		<div class="row">
			<!-- View All Blog Post -->
			<div class="col-md-8 bg-white">
				

		<?php

			if (isset($_GET['viewcat'])) {
			  $viewcat = $_GET['viewcat'];


			
  
				$readPost = "SELECT * FROM blog WHERE post_category='$viewcat' ORDER BY post_id DESC";
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
		


		<?php	
				}
			}
			else{ ?>

				<div class="alert alert-warning" role="alert">
				  No Category Selected!
				</div>

		<?php } ?>

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

   