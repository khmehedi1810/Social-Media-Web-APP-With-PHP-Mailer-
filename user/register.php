<?php include "../inc/db.php"; ?>
1<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Register Users</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">
  <link href="css/style.css" rel="stylesheet">

</head>

<?php

  

?>

<body class="bg-gradient-primary">

  <div class="container">

    <div class="card o-hidden border-0 shadow-lg my-3">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
<?php 
      $message = '';
      $validUsername = 1;
      $validmess = '';
      if (isset($_POST['register'])) {
          
          $fname  = $_POST['fname'];
          $uname  = $_POST['uname'];
          $pass   = $_POST['pass'];
          $email  = $_POST['email'];
          $phone  = $_POST['phone'];
          $address= $_POST['address'];
          $image        = $_FILES['image']['name'];
          $image_tmp    = $_FILES['image']['tmp_name'];

        move_uploaded_file($image_tmp, "img/users/$image");
        $hpass= sha1($pass);

        // Check User name
        $checkUser = "SELECT username,email FROM users";
        $all_username = mysqli_query($connection, $checkUser);

        while ($row = mysqli_fetch_assoc($all_username)) { 
          $user_name  = $row['username'];
          $em_ail     = $row['email'];
          if ($user_name == $uname || $em_ail == $email) {
            $validUsername = 2;
          }
        }

        if ($validUsername == 2) {
            $validmess = '<div class="alert alert-warning">Username or Email already resistered. Please try something new.</div>';
        }
        else{

          if (empty($fname)|| empty($uname)|| empty($pass)|| empty($email)|| empty($phone)|| empty($address) || empty($image)) {
            $message = '<div class="alert alert-warning">Please fill all the feild properly.</div>';
          }
          else{
            $query  = "INSERT INTO users(fullname,username,password, email,phone,address,avater,active,report) VALUES('$fname','$uname','$hpass','$email','$phone','$address','$image','NO','NO')";
            $add_new_user = mysqli_query($connection, $query);

            if ( !$add_new_user ){
              die("Query Failed ". mysqli_error($connection));
            }
            else{
              header("Location: index.php");
            }
          }
        }

      }

?>

        <div class="row">
          <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
          <div class="col-lg-7 bg-light">
            <div class="p-5">
              <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
              </div>
               <form action="" method="POST" enctype="multipart/form-data">
                      <div class="row">
                        <div class="col">
                          <label for="fname">First Name</label>
                          <input type="text" required="" name="fname" class="form-control">
                        </div>
                        <div class="col">
                          <label for="uname">UserName</label>
                          <input type="text" required="" name="uname" class="form-control">
                        </div>
                      </div><br>



                      <div class="row">
                        <div class="col">
                          <label for="pass">Password</label>
                          <input type="password" required="" name="pass" class="form-control">
                        </div>
                        <div class="col">
                          <label for="phone">Phone</label>
                          <input type="text" required="" name="phone" class="form-control">
                        </div>
                      </div><br>


                        <div class="form-group">
                          <label for="email">Email</label>
                          <input type="email" required="" name="email" class="form-control">
                        </div>
                        <div class="form-group">
                          <label for="address">Address</label>
                          <input type="text" required="" name="address" class="form-control">
                        </div>
                        <div class="form-group">
                          <input type="file" required="" name="image" class="form-control">
                        </div>
                        <div class="form-group">
                          <input type="submit" name="register" class="btn btn-success" value="Register">
                        </div>
                      </form>
                      <?php echo $message; ?>
                      <?php echo $validmess; ?>
              <hr>
              <div class="text-center">
                <a class="small" href="forgot-password.php">Forgot Password?</a>
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

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

</body>

</html>
