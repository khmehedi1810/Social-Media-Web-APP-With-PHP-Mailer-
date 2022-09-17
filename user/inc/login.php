<?php
	include "../../inc/db.php";

	session_start();

	if ( isset($_POST['login']) ){
		$username = $_POST['username'];
		$password = $_POST['password'];

		$username = mysqli_real_escape_string($connection, $username);
		$password = mysqli_real_escape_string($connection, $password);

		//echo $username . "<br>" . $password;
		$hassedPass = sha1($password);


		$query = "SELECT * FROM users WHERE username = '$username' ";

		$select_user = mysqli_query($connection, $query);

		while ($row = mysqli_fetch_array($select_user) ) {
			
			$_SESSION['userid'] 	= $row['id'];
			$_SESSION['fullname'] 	= $row['fullname'];
			$_SESSION['username'] 	= $row['username'];
			$_SESSION['password'] 	= $row['password'];
			$_SESSION['email'] 		= $row['email'];
			$_SESSION['avater'] 	= $row['avater'];

		}

		if ( $_SESSION['username'] !== $username &&  $_SESSION['password']!== $hassedPass ){
			header("Location: ../error.php");
		}
		else if ( $_SESSION['username'] == $username &&  $_SESSION['password'] == $hassedPass ){
			header("Location: ../profile.php");
		}
		else{
			header("Location: ../error.php");
		}



	}

?>