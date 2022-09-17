<?php


	function delete_user(){

		global $connection;

		if ( isset($_GET['delete']) ){
			$id = $_GET['delete'];
			$query = "DELETE FROM users WHERE id='$id'";

			$delete_users = mysqli_query($connection, $query);

			if ( !$delete_users ){
				die("Query Failed ". mysqli_error($connection));
			}
			else{
				header("Location: allusers.php");
			}
		}

	}


?>