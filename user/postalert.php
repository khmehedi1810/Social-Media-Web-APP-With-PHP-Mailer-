<?php
include('smtp/PHPMailerAutoload.php');
$html='A new POST found in Pending List. Check it quick.'.'http://localhost/somadhan.org/control/pendingpost.php';
echo smtp_mailer('somadhanbd2021@gmail.com','New Post Alert',$html);
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
		header("Location: faildemail.php");
	}else{
		header("Location: view-all-post.php");
	}
}
?>