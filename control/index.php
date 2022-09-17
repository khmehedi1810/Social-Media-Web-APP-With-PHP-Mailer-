<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>MasterBari - Control Login</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">

    <link rel="stylesheet" type="text/css" href="login.css">

  </head>
<body class="bg-gradient-primary">

  <div class="container h-80">
    <div class="row align-items-center h-100">
        <div class="col-3 mx-auto">
            <div class="text-center">
                <img id="profile-img" class="rounded-circle profile-img-card" src="img/6b6psnA.png" />
                <p id="profile-name" class="profile-name-card"></p>
                <form  class="form-signin" method="POST" action="inc/login.php">
                    <input type="number" name="con_security_num" id="inputSecurity" class="form-control form-group" placeholder="Security Number " required autofocus>
                    <input type="email" name="con_email" id="inputEmail" class="form-control form-group" placeholder="Eamil Address" required>
                    <input type="password" name="con_pass" id="inputPassword" class="form-control form-group" placeholder="Password" required autofocus>
                    <input class="btn btn-lg btn-primary btn-block btn-signin" type="submit" name="autho_log" value="LOGIN">
                </form>
            </div>
        </div>
    </div>
  </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" ></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  </body>
</html>