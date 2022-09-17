<?php include "../inc/header.php"; ?>
<?php include "inc/functions.php"; ?>
<?php 

	session_start();
	session_unset();
	session_destroy();

?>

	<section>
		<div class="jumbotron ">
			<div class="container">
			    <div class="alert alert-danger py-5" role="alert">
				  <h4 class="alert-heading">Invalid!</h4>
				  <hr>
				  <a href="index.php" class="btn btn-primary">Login Here</a>
				</div>
			</div>
		</div>
	</section>


<?php include "../inc/footer.php" ?>