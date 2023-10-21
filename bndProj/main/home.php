<?php
session_start();

include "../../dbConnection.php";
include "../../entities/workSlotClass.php";
include "../../controller/viewWorkSlotController.php";

// if(isset($_POST["suspendUserProfile"]))
// {
//   $userProfileId = $_POST["suspendUserProfile"];

//   $error = SuspendUserProfileController::suspendUserProfile($userProfileId);

//   if($error != "Success")
//   {
//     echo "<script>alert('$error');</script>";
//   }
// }
?>

<!DOCTYPE html>
<html lang="en" class="" style="height: auto;">
<head>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://kit.fontawesome.com/f2f42d264c.js" crossorigin="anonymous"></script>
</head>
<style>
    .nav-link {
        margin-right: 1em !important;
        font-size: 16px;
        color: #0F0E0E;
    }

    .navbar-collapse {
        justify-content: flex-end;
    }

    .navbar {
        /*background-color: #f8f9fa;*/
        background-color: #d9d9d9;
    }

    .navbar-brand {
        margin-left: 1em !important;
        color: #0F0E0E;
    }

    .table {
        margin-top: 1em !important;
        margin-left: auto;
        margin-right: auto;
        border-style: solid;
        border-color: black;
        background-color: #D9D9D9;
        width: 90%;
        text-align: center;
    }

    th, td , tr{
      border-style: solid;
      border-color: black;
    }

    body {
      background-color: #554D4D;
    }

    .search-container {
      float: right;
      margin: 1em;
    }

    .search-container input {
      height: 35px;
      margin-left: 1em;
      text-align: center;
    }

</style>
<body>
<nav class="navbar navbar-expand-lg top-navbar">
  <a class="navbar-brand" href="home.php">Brownies and Downies</a>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="#"><?php echo $_SESSION['username']?> <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <button type="button" class="btn btn-primary">Logout</button>
      </li>
    </ul>
  </div>
</nav>

<table class="table">
  <thead>
    <tr>
        <th class="text-center">User Profile ID</th>
        <th class="text-center">Name</th>
        <th class="text-center">Description</th>
        <th class="text-center">Role</th>
        <th class="text-center" colspan="2">Actions</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $userProfile = new ViewUserProfileController();
    $array = $userProfile->viewUserProfile();
    foreach($array as $row)
    {
    ?>
        <tr>
            <td><?=$row["userProfileId"]?></td>
            <td><?=$row["name"]?></td>
            <td><?=$row["description"]?></td>
            <td><?=$row["role"]?></td>
            <td>
                <form method="POST">
                <button class="btn btn-primary" style="height:40px" value="<?=$row['userProfileId']?>" name="updateUserProfile">UPDATE</button>
                <?php
                if($row["activated"] == true) {
                ?>
                <button class="btn btn-danger" style="height:40px" value="<?=$row['userProfileId']?>" name="suspendUserProfile">SUSPEND</button>
                <?php
                }
                else {
                ?>
                <button class="btn btn-success" style="height:40px" value="<?=$row['userProfileId']?>" name="suspendUserProfile">ACTIVATE</button>
                <?php
                }
                ?>
                </form>
            </td>
        </tr>
    <?php
    }
    ?>
  </tbody>
</table>

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
</body>
</html>