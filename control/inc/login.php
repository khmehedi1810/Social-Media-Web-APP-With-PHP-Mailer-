<?php 
	include "../../inc/db.php";
	ob_start();
	session_start();
	if (isset($_POST['autho_log'])) {

	    $con_security_num 	= $_POST['con_security_num'];
	    $con_email 			= $_POST['con_email'];
		$con_pass			= $_POST['con_pass'];

		if (empty($con_security_num) || empty($con_email) || empty($con_pass)) {
			header("Location: logout.php");
		}
		else{
			$con_security_num 	= mysqli_real_escape_string($connection, $con_security_num);
			$con_email 			= mysqli_real_escape_string($connection, $con_email);
			$con_pass 			= mysqli_real_escape_string($connection, $con_pass);

			$hassedPass = sha1($con_pass);

			$query = "SELECT * FROM control WHERE con_security_email = '$con_email' ";

			$selectControler = mysqli_query($connection, $query);

			while ($row = mysqli_fetch_array($selectControler) ) {
				
				$_SESSION['con_id'] 			= $row['con_id'];
				$_SESSION['con_security_num'] 	= $row['con_security_num'];
				$_SESSION['con_security_email'] = $row['con_security_email'];
				$_SESSION['con_security_pass'] 	= $row['con_security_pass'];

			}

			if ( $_SESSION['con_security_num'] !== $con_security_num ||  $_SESSION['con_security_email'] !== $con_email ||  $_SESSION['con_security_pass'] !== $hassedPass ){
				header("Location: ../error.php");
			}
			else if ( $_SESSION['con_security_num'] == $con_security_num &&  $_SESSION['con_security_email'] == $con_email &&  $_SESSION['con_security_pass'] == $hassedPass ){
				header("Location: ../dashboard.php");
			}
			else{
				header("Location: ../index.php");
			}
		}
	}


ob_end_flush();
?>


