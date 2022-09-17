<?php
if (isset($_GET['postid'])) {
$postid = $_GET['postid'];

}
?>
<ul class="comt-sec">
<?php
$link = mysqli_connect("localhost","root","","somadhan");
$query = "SELECT * FROM comments WHERE blog_id = '$postid' ORDER BY com_id DESC";
$select_sin_com = mysqli_query($link, $query);

while ($row = mysqli_fetch_assoc($select_sin_com)) { 
    $aut_nam 	= $row['aut_nam'];
    $comnt 		= $row['comnt'];
    $com_date 	= $row['com_date'];

  ?>
 

  <li class="nav-item">
    <p><span><b><?php echo $aut_nam; ?></b></span> <span><?php echo $com_date; ?></span></p>
    <p><span><?php echo $comnt; ?></span></p>
  </li>


<?php }

?>
</ul>