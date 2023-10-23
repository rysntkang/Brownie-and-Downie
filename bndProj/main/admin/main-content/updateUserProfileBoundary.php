<?php
include "../../dbConnection.php";
include "../../entities/userProfileClass.php";
include "../../controller/updateUserProfileController.php";
include "../../controller/searchUserProfileController.php";

$userProfileId = $_SESSION['userProfileId'];

if(isset($_POST["updateUserProfile"]))
{
  $profileName = $_POST["profileName"];
  $description = $_POST["description"];
  $role = $_POST["role"];

  $error = UpdateUserProfileController::updateUserProfile($userProfileId, $profileName, $description, $role);

  if($error != "Success")
  {
    echo "<script>alert('$error');</script>";
  }
  else
  {
    header("location:index.php?page=viewUserProfileBoundary");
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

    #updateButton {
        float: right;
        padding: auto;
    }

</style>

<div class="container">
    <div class="row">
        <div class="card">
            <div class="card-body">
                <form method="POST">
                    <?php
                        // retrieve information of user profile with regards to userProfileId
                        $details = SearchUserProfileController::searchUserProfile($userProfileId, NULL);
                        // var_dump($details);
                        $profileName = $details[0]['profileName'];
                        $description = $details[0]['description'];
                        $role = $details[0]['role'];
                    ?>
                    <div class="mb-3">
                        <label for="profileName" class="form-label">Profile Name</label>
                        <input type="text" class="form-control" name="profileName" value="<?=$profileName?>">
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <input type="text" class="form-control" name="description" value="<?=$description?>">
                    </div>
                    <div class="mb-3">
                        <label for="role" class="form-label">Role</label>
                        <input type="text" class="form-control" name="role" value="<?=$role?>">
                    </div>
                    <button class="btn btn-success" type="submit" name="updateUserProfile" id="updateButton">Update</button>
                </form>
            </div>
        </div>
    </div>
</div>