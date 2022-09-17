<?php include "inc/header.php"; ?>
<?php 
	if (isset($_GET['view_post'])) {
		$view_post = $_GET['view_post'];

		$query = "SELECT * FROM blog WHERE post_id = '$view_post'";
	    $select_post = mysqli_query($connection, $query);
	    while ( $row = mysqli_fetch_assoc($select_post) )
	    {
	      $post_id          = $row['post_id'];
	      $post_title       = $row['post_title'];
	      $long_title       = $row['long_title'];
	      $post_desc        = $row['post_desc'];
	      $post_thumb       = $row['post_thumb'];
	      $post_date        = $row['post_date'];
	      $location      	= $row['location'];
	      $post_author      = $row['post_author'];
	      $post_authorID    = $row['aut_id'];
	      $post_category    = $row['post_category'];
	      $post_status      = $row['post_status'];
	    }
	}
?>
<?php 
    if (empty($view_post)) {
        echo '<div class="alert alert-warning mb-5" style="width: 600px;margin: 0 auto; margin-top: 60px;border-radius: 10px;">No! Post Selected</div>';
    }
    else{
?>

<?php 
	if (empty($post_id)) {
		echo '<div class="alert alert-warning mb-5" style="width: 600px;margin: 0 auto; margin-top: 60px;border-radius: 10px;">This post is Missing!</div>';
	}
	else{

?>

	<div class="container">
		<div class="row">
			<div class="alert alert-secondary p-4" role="alert">
			  <nav aria-label="breadcrumb">
				  <ol class="breadcrumb">
				    <li class="breadcrumb-item"><a href="../?activeUs=activeUs">Home</a></li>
				    <li class="breadcrumb-item active" aria-current="page">Post / Category: <?php echo $post_category; ?></li>
				  </ol>
			  </nav>
			  <div class="pb-3">
			  	<h2><b><?php echo $post_title; ?></b></h2>
			  </div>
			  <center>
			  	<div class="card fulpstimg">
				  <img class="card-img-top" src="img/posts/<?php echo $post_thumb; ?>" alt="Card image cap">
				  <div class="card-body">
				    <p class="card-text"><i class="fas fa-user"></i> Post Date: <?php echo $post_date; ?> | <i class="fas fa-clock"></i> By: <?php echo $post_author; ?></p>
				    <p><i class="fas fa-map-marker"></i> Location: <?php echo $location; ?></p>
				  </div>
				</div>
			  </center>
			  <div class="py-4">
			  	<p class="long_title"><b><?php echo $long_title; ?></b></p>
			  </div>

			  <div class="pb-2">
			  	<p class="long_title"><?php echo $post_desc; ?></p>
			  </div>

			  <!-- Comment box -->
				<div class="container mt-2 mb-4">
				    <div class="d-flex justify-content-center row">
				        <div class="col-md-12">
				            <div class="d-flex flex-column comment-section" id="myGroup">
				                
				                <div class="bg-white p-2">
				                    <div class="d-flex flex-row fs-12">
				                        <!-- <div class="like p-2 cursor"><i class="fa fa-thumbs-o-up"></i><span class="ml-1">Like</span></div> -->
				                        <div class="like p-2 cursor action-collapse" data-toggle="collapse" aria-expanded="true" aria-controls="collapse-1" href="#collapse-1"><i class="fa fa-commenting-o"></i><span class="ml-1">Comment</span></div>
				                        <?php 

				                              $userIdd = $id;
				                              $autId = '';
				                              $blogId = '';

				                        	  $selrepus = "SELECT * FROM report WHERE autId = '$userIdd' AND blog_id = '$post_id'";
											  $selkrep = mysqli_query($connection, $selrepus);

											  while ($row = mysqli_fetch_assoc($selkrep)) { 
											    $report_id   = $row['report_id'];
											    $autId       = $row['autId'];
											    $blogId      = $row['blog_id'];
											  }

											  if ( ($autId == $userIdd) && ($blogId == $post_id)) { ?>

												<div class="like p-2 cursor text-right text-danger" ><i class="fas fa-exclamation-triangle"></i><span class="mr-1"> Reported</span></div>
											  	  
											<?php  } else{ ?> 

												<div class="like p-2 cursor text-right" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-exclamation-triangle"></i><span class="mr-1"> Report</span></div>

											<?php }

				                         ?>
				                        

				                    </div>
				                </div>
				                <div id="collapse-1" class="bg-light p-2 collapse" data-parent="#myGroup">
				                    <div class="d-flex flex-row align-items-start"><img class="rounded-circle" src="img/users/<?php echo $_SESSION['avater'];  ?>" width="40">
				                    	<form action="" id="comment_form" class="w-100" method="POST">
				                    		<input type="text" name="name" readonly="" value="<?php echo $username; ?>" class="name sr-only" >
				                    		<input type="text" readonly="" name="blid" class="blid sr-only" value="<?php echo $post_id; ?>"> 
				                    		<input type="text" name="id" readonly="" value="<?php echo $id; ?>" class="id sr-only" >
				                    		<div class="form-group ">
				                    			<textarea name="comment" required="" class="comment form-control ml-1 shadow-none textarea w-100"></textarea>
				                    		</div>
				                    	</form>
				                    </div>
				                    <div class="mt-2 text-right"><a data-toggle="collapse" href="javascript:void(0)" class="btn btn-primary btn-sm submit">Submit</a><button class="btn btn-outline-primary btn-sm ml-1 shadow-none" type="button">Cancel</button></div>
				                </div>
				            </div>
				        </div>
				    </div>
				</div>

			  <!-- End Comment box -->
			  
			</div>
		</div>

		<div class="row">
			<div class="col-md-12">
				<div class="comment_listing"></div>
				<!-- <div class="comment_listing"></div> -->
				
			</div>
		</div>


	</div>

<?php } ?>
<!-- Modal -->


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Report This Post</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="" method="POST">
      <div class="modal-body">
      		<input type="text" name="postId" class="sr-only" value="<?php echo $post_id; ?>">
      		<input type="text" name="userId" class="sr-only" value="<?php echo $id; ?>">
	        <div class="form-check">
			  <input class="form-check-input" type="radio" name="reports" id="exampleRadios1" value="False Information" checked>
			  <label class="form-check-label" for="exampleRadios1">
			    False Information
			  </label>
			</div>
			<div class="form-check">
			  <input class="form-check-input" type="radio" name="reports" id="exampleRadios2" value="Nudity">
			  <label class="form-check-label" for="exampleRadios2">
			    Nudity
			  </label>
			</div>
			<div class="form-check">
			  <input class="form-check-input" type="radio" name="reports" id="exampleRadios3" value="Harassment">
			  <label class="form-check-label" for="exampleRadios3">
			    Harassment
			  </label>
			</div>
			<div class="form-check">
			  <input class="form-check-input" type="radio" name="reports" id="exampleRadios4" value="Violence">
			  <label class="form-check-label" for="exampleRadios4">
			    Violence
			  </label>
			</div>
			<div class="form-check">
			  <input class="form-check-input" type="radio" name="reports" id="exampleRadios5" value="Terrorism">
			  <label class="form-check-label" for="exampleRadios5">
			    Terrorism
			  </label>
			</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <input type="Submit" name="sunmit" value="Send" class="btn btn-primary">
      </div>
      </form>
    </div>
  </div>
</div>

<?php

    if ( isset($_POST['sunmit']) ){
    	$postId        = $_POST['postId'];
    	$userId        = $_POST['userId'];
    	$reports       = $_POST['reports'];

    	$query = "INSERT INTO report (blog_id, autId, report_write) VALUES ( '$postId', '$userId', '$reports')";

	    $addrep = mysqli_query($connection, $query);
	      

	    if ( !$addrep ){
	        die ("Query Failed. " . mysqli_error($connection));
	    }
	    else{
	        header("Refresh:0");
	    }

    }

?>

<!-- End -->
<script type="text/javascript">
	var postid = "<?php echo $post_id; ?>";
	function listComments()
		{
			$.ajax({
				url:'comment_list.php?postid='+postid,
				success:function(res){
					$('.comment_listing').html(res);
				}
			})
		}
	$(function(){
		
		
		listComments();
		setInterval(function(){
			listComments();
		},10000);
		$('.submit').click(function(){
			var name = $('.name').val();
			var id = $('.id').val();
			var blid = $('.blid').val();
			var comment = $('.comment').val();
			$.ajax({
				url:'save_comment.php',
				data:'blid='+blid+'&id='+id+'&name='+name+'&comment='+comment,
				type:'post',
				success:function()
				{
					$('#comment_form')[0].reset();
					listComments();

				}
			})
		})
	})
</script>

<?php } ?>
<?php include "inc/footer.php"; ?>