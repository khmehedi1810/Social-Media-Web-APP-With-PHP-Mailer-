<?php

	// Complain Page
	function delete_complains(){

		global $connection;

		if ( isset($_GET['delete']) ){
			$id = $_GET['delete'];
			$query = "DELETE FROM complain WHERE id='$id'";

			$delete_complains = mysqli_query($connection, $query);

			if ( !$delete_complains ){
				die("Query Failed ". mysqli_error($connection));
			}
			else{
				header("Location: report.php");
			}
		}

	}


?>