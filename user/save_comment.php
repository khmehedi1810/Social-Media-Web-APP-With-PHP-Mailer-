<?php
$link = mysqli_connect("localhost","root","","somadhan");
$blid = mysqli_real_escape_string($link,$_POST['blid']);
$name = mysqli_real_escape_string($link,$_POST['name']);
$id = mysqli_real_escape_string($link,$_POST['id']);
$comment = mysqli_real_escape_string($link,$_POST['comment']);
$comment_date = date('Y-m-d H:i:s');

$q = "INSERT INTO comments (blog_id,aut_id,aut_nam,comnt,com_date) VALUES('$blid','$id','$name','$comment','$comment_date')";
mysqli_query($link,$q);
?>