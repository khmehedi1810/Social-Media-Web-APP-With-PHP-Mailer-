<?php
	include "../inc/db.php";
	if (isset($_GET['postID'])) {
	$postID = $_GET['postID'];

		$uppstSta = "UPDATE blog SET post_status ='Published' WHERE post_id = '$postID'";

        $update_ac_status = mysqli_query($connection, $uppstSta);

        if ( !$update_ac_status ){
          die ("Query Failed. " . mysqli_error($connection));
        }
        else{
          header("Location: mailsend.php");
    	}

    	$sel_Location = "SELECT * FROM blog WHERE post_id = '$postID'";
	    $select_postLoc = mysqli_query($connection, $sel_Location);
	    while ( $row = mysqli_fetch_assoc($select_postLoc) )
	    {
	      $post_ide          = $row['post_id'];
	      $location          = $row['location'];
	    }

	    $selrepMin = "SELECT * FROM publicrepresentatives WHERE rep_location='$location'";
        $select_rep_min = mysqli_query($connection, $selrepMin);
        while ( $row = mysqli_fetch_assoc($select_rep_min) )
        {
          $rep_id             = $row['rep_id'];
          $rep_email          = $row['rep_email'];
          $rep_location       = $row['rep_location'];
        }
        



	}
	

	include('smtp/PHPMailerAutoload.php');
	$html='http://localhost/somadhan.org/singlepost.php?postid='. $postID;
	$toEm = $rep_email;
	echo smtp_mailer($toEm,'From Somadhan. Something is heppen in your area Please find it out.',$html);
	function smtp_mailer($to,$subject, $msg){
		$mail = new PHPMailer(); 
		$mail->SMTPDebug  = 3;
		$mail->IsSMTP(); 
		$mail->SMTPAuth = true; 
		$mail->SMTPSecure = 'tls'; 
		$mail->Host = "smtp.gmail.com";
		$mail->Port = 587; 
		$mail->IsHTML(true);
		$mail->CharSet = 'UTF-8';
		$mail->Username = "somadhanbd2021@gmail.com";
		$mail->Password = "somadhan2021";
		$mail->SetFrom("somadhanbd2021@gmail.com");
		$mail->Subject = $subject;
		$mail->Body =$msg;
		$mail->AddAddress($to);
		$mail->SMTPOptions=array('ssl'=>array(
			'verify_peer'=>false,
			'verify_peer_name'=>false,
			'allow_self_signed'=>false
		));
		if(!$mail->Send()){
			//echo $mail->ErrorInfo;faildemail.php
			header("Location: faildemail.php");
		}else{
			header("Location: publishpost.php");
		}
	}


?>