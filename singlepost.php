<?php include "inc/header.php"; ?>



<?php
if (isset($_GET['postid'])) {
  $viewcat = $_GET['postid'];


}
?>
<section class="parent-sec" id="beginpage">
	<div class="container">
		<div class="row">
			<!-- View All Blog Post -->
			<div class="col-md-8 bg-white">
				

		<?php

			if (isset($_GET['postid'])) {
			  $viewcat = $_GET['postid'];


			
  
				$readPost = "SELECT * FROM blog WHERE post_id='$viewcat'";
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
					<p><b><?php echo $long_title; ?></b></p>
					<p><?php echo $post_desc; ?></p>
				</div>
				<hr>
		


		<?php	
				}
			}
			else{ ?>

				<div class="alert alert-warning" role="alert">
				  No Post Selected!
				</div>

		<?php } ?>

			</div>

			<!-- Sidebar -->
			<div class="col-md-4 d-none d-sm-block fixd custom-sitebar">
				<!-- Latest Post -->
				<div class="card my-4 sidebar">
					<div class="card-header py-2">
					  <h6 class="m-0 font-weight-bold text-primary"><i class="mdi mdi-18px me-2 mdi-comment"></i>Comments:</h6>
					</div>
					<!--  -->
					<div class="card p-3">
	                        <ul class="comt-sec">
	                        <?php
	                        
	                        $selconqiery = "SELECT * FROM comments WHERE blog_id = '$post_id' ORDER BY com_id DESC";
	                        $select_post_com = mysqli_query($connection, $selconqiery);

	                        while ($row = mysqli_fetch_assoc($select_post_com)) { 
	                            $com_id     = $row['com_id'];
	                            $aut_nam    = $row['aut_nam'];
	                            $comnt      = $row['comnt'];
	                            $com_date   = $row['com_date'];

	                          ?>
	                         

	                          <li class="nav-item">
	                          
	                            <p class="d-flex justify-content-between">
	                                <span class="text-left"><i class="mdi me-2 mdi-account"></i><b><?php echo $aut_nam; ?></b>  <?php echo $com_date; ?></span>
	                                
	                            </p>
	                            <p><span><?php echo $comnt; ?></span></p>
	                          </li>


	                        <?php }

	                        ?>
	                        </ul>
	                </div>
					<!--  -->
				</div>

			</div>
		</div>
	</div>
</section>


<?php include "inc/footer.php"; ?>

   