<!DOCTYPE html>
<html lang="en" class="" style="height: auto;">
<?php require_once('../config.php') ?>
<?php include("../header.php") ?>

<?php

session_start();
require '../controller/loginController.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Pass values t
    $username = $_POST['logUsername'];
    $password = $_POST['logPassword'];

    $user = LoginController::loginUser($conn, $username, $password);

    if ($user == null) {
      $error = "Invalid username and/or password.";
    }
    else {
      $_SESSION['uid'] = $user['uid'];
      redirectHomePage($user['userProfileId']);
    }

}

function redirectHomePage($userProfileId){
  if ($userProfileId == 1){
    redirect("main/admin");
  }
  elseif ($userProfileId == 2){
    redirect("main/cafestaff");
  }

}
?>

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
<br>
<br>
<br>
<h1 class="text-center text-white px-4 py-5" id="page-title"><b>Brownies and Downies</b></h1>

<div class="login-box col-md-auto align-items-center">
  <div class="card card-navy my-3">
    <div class="card-body">
      <p class="login-box-msg">Enter your credentials:</p>
      <form id="login-frm" method="post">
        <div class="input-group mb-3">
          <input type="text" class="form-control" name="logUsername" id="logUsername" autofocus placeholder="Username">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="text" class="form-control" name="logPassword" id="logPassword" autofocus placeholder="Password">
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
            <button type="submit" class="btn btn-primary btn-block">Log In</button>
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