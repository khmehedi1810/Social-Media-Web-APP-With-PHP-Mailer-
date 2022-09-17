<?php include "db.php"; ?>


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Website Title -->
    <title>Somadhan - Try to develop out motherland | Home</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

    <!-- Font Awesome CDN -->
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>

    <!-- Theme CSS File -->
    <link rel="stylesheet" type="text/css" href="css/style.css">

  </head>

<?php
if (isset($_GET['activeUs'])) {
  $activeUs = $_GET['activeUs'];
}
?>


  <body>
    <!-- Header Section Start -->
    <header class="sticky-top m-0 p-0 py-2">
      <div class="container">
        <div class="row">
          <div class="col-lg-2 text-center">
            <a href="index.php"><img src="img/My Post u.png" width="150" height="65"></a>
          </div>
          <div class="col-lg-8 d-flex align-items-center justify-content-center">
            <h5 class="text-white font-weight-bold">To take the country forward by solving major problem</h5>
          </div>
          <div class="col-lg-2 d-flex justify-content-center">
            <div class="d-flex align-items-center justify-content-end">
              <!-- <a href="admin/"><iframe class="ovr" src="admin/#okkk" scrolling="no"></iframe></a> -->
              <?php 

                if (empty($activeUs)) { ?>
                  <a href="user/index.php" class="btn btn-primary btn-sm mr-1">Sign-In</a>
                  <a href="user/register.php" class="btn btn-secondary btn-sm ">Sign-Up</a>
               <?php  

                  }
                  else{ 
                    // $selacUser = "SELECT * FROM users WHERE id = '$activeusID'";
                    // $showAcUS = mysqli_query($connection, $selacUser);

                    // while ($row = mysqli_fetch_assoc($showAcUS)) { 
                    //       $id          = $row['id'];
                    //       $username1    = $row['username'];
                    //       $avater      = $row['avater'];
                    // } ?>

                    <a href="user/addpost.php" class="btn btn-primary btn-sm mr-1">Write Post</a>

                <?php  } ?>

              
            </div>
          </div>
          <!--  -->
        </div>
      </div>
    </header>
    <!-- Header Section End -->