<?php
include "../../dbConnection.php";
include "../../entities/userClass.php";
include "../../entities/userProfileClass.php";
include "../../controller/createUserController.php";
include "../../controller/viewUserProfileController.php";

if(isset($_POST["createUser"]))
{
  $username = $_POST["username"];
  $firstName = $_POST["firstName"];
  $lastName = $_POST["lastName"];
  $address = $_POST["address"];
  $mobileNumber = $_POST["mobileNumber"];
  $password = $_POST["password"];
  $userProfileId = $_POST["profile"];

  $error = CreateUserController::createUser($username, $firstName, $lastName, $address, $mobileNumber, $password, $userProfileId);
  // createUser($username, $firstName, $lastName, $address, $mobileNumber, $password, $userProfileId)

  if($error != "Success")
  {
    echo "<script>alert('$error');</script>";
  }
  else
  {
    header("location:index.php?page=viewUserAccountBoundary");
  }
}
?>
<style>

    .card {
        margin-top: 5em !important;
        margin-left: auto;
        margin-right: auto;
        width: 90%;
        background-color: #d9d9d9;
    }

    .card-footer {
        background-color: #d9d9d9;
    }

    #profile {
        width: 300px;
        height: 40px;
    }

    #createButton {
        float: right;
        padding: auto;
    }

</style>

<div class="container">
    <div class="row">
        <div class="card">
            <div class="card-body">
            <form method="POST">
                <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" class="form-control" name="username">
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="firstName" class="form-label">First Name</label>
                            <input type="text" class="form-control" name="firstName">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="lastName" class="form-label">Last Name</label>
                            <input type="text" class="form-control" name="lastName">
                        </div>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="address" class="form-label">Address</label>
                    <input type="text" class="form-control" name="address">
                </div>

                <div class="mb-3">
                    <label for="mobileNumber" class="form-label">Mobile Number</label>
                    <input type="text" class="form-control" name="mobileNumber">
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" name="password">
                </div>

                <div class="mb-3">
                    <label for="profile" class="form-label">Profile</label>
                    <br>
                    <select class="form-select" id="profile" name="profile">
                        <?php
                        $userProfile = new ViewUserProfileController();
                        $array = $userProfile->viewUserProfile();
                        foreach($array as $row)
                        {
                        ?>
                        <option value=<?=$row['userProfileId']?>><?=$row['role']?></option>
                        <?php
                        }
                        ?>
                    </select>
                </div>
                <button class="btn btn-success" type="submit" name="createUser" id="createButton">Create</button>
            </form>
            </div>
        </div>
    </div>
</div>
