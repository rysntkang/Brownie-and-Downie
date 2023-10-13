<?php
  require("../controller/login_controller.php");

  if ($_SERVER["REQUEST_METHOD"] === "POST")
  {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $loginUser = new loginUser($username, $password);
    $loginUser->loginUser();
  }
?>

<!DOCTYPE html>
<html lang="en" class="" style="height: auto;">

<head>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>

<body>
<style>
    body{
      background-image: url('../image/michal-parzuchowski-ItaV89TNkks-unsplash.jpg');
      background-size:cover;
      background-repeat:no-repeat;
      backdrop-filter: contrast(1);
    }
    #page-title{
      text-shadow: 6px 4px 7px black;
      font-size: 3.5em;
      color: #fff4f4 !important;
      background: #8080801c;
    }
</style>

<h1 class="text-center text-white px-4 py-5" id="page-title"><b>Brownies and Downies</b></h1>

<div class="login-box col-md-auto align-items-center">
  <div class="card card-navy my-3">
    <div class="card-body">
      <p class="login-box-msg">Enter your credentials:</p>
      <form action="login.php" method="post">
        <div class="input-group mb-3">
          <input type="text" class="form-control" id="username" name="username" autofocus placeholder="Username">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" id="password" name="password" autofocus placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
          </div>
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
          </div>
      </form>
    </div>
  </div>
</div>

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>

</body>
</html>