<?php include "../inc/db.php"; ?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Somadhan - Forgot Password</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>
<?php $type = 1; ?>
<body class="bg-gradient-primary">

<?php
  $mes = '';
  $readuser = '';
  $reademail = '';
  $readphone = '';
  if (isset($_POST['checkpass'])) {
    $username  = $_POST['username'];
    $email     = $_POST['email'];
    $phone     = $_POST['phone'];

    $checkQuery = "SELECT username,email,phone FROM users WHERE username = '$username' AND email = '$email' AND phone = '$phone' ";
    $checkForPass = mysqli_query($connection, $checkQuery);
    while ($row = mysqli_fetch_assoc($checkForPass)){
    $readuser         = $row['username'];
    $reademail        = $row['email'];
    $readphone        = $row['phone'];
    }

    if ($readuser == $username && $reademail == $email && $readphone == $phone) {
       $type = 2;
    }
    else{
      $mes = '<div class="alert alert-warning">Not match. Try again</div>';
    }

  }

?>

<?php
  $ntmatch = '';
  if (isset($_POST['resetPass'])) {
    $newpass  = $_POST['newpass'];
    $compass  = $_POST['compass'];
    $us_again  = $_POST['us_again'];
    $em_again  = $_POST['em_again'];



    if ($newpass == $compass) {
      $hashpass = sha1($newpass);
        $uppaddquery = "UPDATE users SET password='$hashpass' WHERE username = '$us_again' AND email = '$em_again'";

        $uppass = mysqli_query($connection, $uppaddquery);

        if ( !$uppass ){
          die ("Query Failed. " . mysqli_error($connection));
        }
        else{
          header("Location: index.php");
        }
    }
    else{
       $ntmatch = '<div class="alert alert-warning">Not match. Try again</div>';
    }

  }


?>

  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-10 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-6 d-none d-lg-block bg-password-image"></div>
              <div class="col-lg-6">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-2">Forgot Your Password?</h1>
                    <p class="mb-4">We get it, stuff happens. Just enter your email address,Passworsd and User. If all three are match. Then you can reset your password. </p>
                  </div>
                  <?php if ($type == 1) { ?>
                    
                    <form class="user" action="" method="POST" enctype="multipart/form-data">
                      <div class="form-group">
                        <input type="text" required="" class="form-control form-control-user" name="username" placeholder="Enter username">
                      </div>
                      <div class="form-group">
                        <input type="email" required="" class="form-control form-control-user" name="email" placeholder="Enter email">
                      </div>
                      <div class="form-group">
                        <input type="text" required="" class="form-control form-control-user" name="phone" placeholder="Enter Phone No.">
                      </div>
                      <div class="form-group">
                        <input type="submit" value="Enter" class="btn btn-primary btn-user btn-block" name="checkpass">
                      </div>
                    </form>
                  <?php 
                    } 
                    elseif($type == 2){
                  ?>

                  <form class="user" action="" method="POST" enctype="multipart/form-data">
                      <input type="text" placeholder="Enter New Password" name="us_again" value="<?php echo $username; ?>" class="form-control sr-only form-control-line ps-0" readonly>
                      <input type="text" placeholder="Enter New Password" name="em_again" value="<?php echo $email; ?>" class="form-control sr-only form-control-line ps-0" readonly>
                      <div class="form-group">
                        <input type="password" required="" class="form-control form-control-user" name="newpass" placeholder="New Password">
                      </div>
                      <div class="form-group">
                        <input type="password" required="" class="form-control form-control-user" name="compass" placeholder="Confirm Password">
                      </div>
                      <div class="form-group">
                        <input type="submit" value="Reset Password" class="btn btn-primary btn-user btn-block" name="resetPass">
                      </div>
                    </form>


                  <?php } ?>

                  <?php 
                  echo $mes; 
                  echo $ntmatch;

                  ?>
                  <hr>
                  <div class="text-center">
                    <a class="small" href="register.php">Create an Account!</a>
                  </div>
                  <div class="text-center">
                    <a class="small" href="index.php">Already have an account? Login!</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

</body>

</html>
