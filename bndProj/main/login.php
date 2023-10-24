<?php 
require_once('../config.php');
include "../dbConnection.php";
include "../entities/userClass.php";
include "../controller/loginController.php";
include("../header.php");

//if ($_SERVER["REQUEST_METHOD"] == "POST") 
if(isset($_POST["submit"]))
{
    $username = $_POST['logUsername'];
    $password = $_POST['logPassword'];

    // check for empty input
    if(empty($username) || empty($password))
    {
      $error = "Please fill in all fields";
      echo "<script>alert('$error');</script>";
    }
    else
    {
      $error = loginController::loginUser($username, $password);

      if($error == "Success")
      {
        redirectHomePage($_SESSION["userProfileId"]);
      }
      else
      {
        echo "<script>alert('$error');</script>";
      }      
    }
}

function redirectHomePage($userProfileId){
  if ($userProfileId == 1){
    redirect("main/actors/admin");
  }
  elseif ($userProfileId == 2){
    redirect("main/actors/owner");
  }
  elseif ($userProfileId == 3){
    redirect("main/actors/manager");
  }
  else {
    redirect("main/actors/staff");
  }

}
?>

<!DOCTYPE html>
<html lang="en" class="" style="height: auto;">
<body class="login-page">
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
            <button type="submit" name="submit" class="btn btn-primary btn-block">Log In</button>
          </div>
      </form>
    </div>
  </div>
</div>

</body>
</html>