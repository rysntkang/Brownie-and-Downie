<?php
include "../../../dbConnection.php";
include "../../../entities/userProfileEntity.php";
include "../../../controller/admin/updateUserProfileController.php";

$userProfileId = $_SESSION['userProfileId'];
$profileName = $_SESSION['profileName'];
$description = $_SESSION['description'];
$role = $_SESSION['role'];


if(isset($_POST["updateUserProfile"]))
{
    $profileName = $_POST["profileName"];
    $description = $_POST["description"];
    $role = $_POST["role"];
    
    $updateUserProfile = new UpdateUserProfileController();
    $result = $updateUserProfile->updateUserProfile($userProfileId, $profileName, $description, $role);

    if($result != "Success")
    {
        echo "<script>alert('$result');</script>";
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
                    <div class="mb-3">
                        <label for="profileName" class="form-label">Profile Name</label>
                        <input type="text" class="form-control" name="profileName" value="<?=$profileName?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <input type="text" class="form-control" name="description" value="<?=$description?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="role" class="form-label">Role</label>
                        <input type="text" class="form-control" name="role" value="<?=$role?>" required>
                    </div>
                    <button class="btn btn-success" type="submit" name="updateUserProfile" id="updateButton">Update</button>
                </form>
            </div>
        </div>
    </div>
</div>