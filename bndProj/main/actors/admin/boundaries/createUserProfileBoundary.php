<?php
include "../../../dbConnection.php";
include "../../../entities/userProfileClass.php";
include "../../../controller/admin/createUserProfileController.php";

if(isset($_POST["createUserProfile"]))
{
    $profileName = $_POST["profileName"];
    $description = $_POST["description"];
    $role = $_POST["role"];

    if(empty($profileName) || empty($description) || empty($role))
    {
        $error = "Please fill in all fields";
        echo "<script>alert('$error');</script>";
    }
    else
    {
        $error = CreateUserProfileController::createUserProfile($profileName, $description, $role);

        if($error != "Success")
        {
            echo "<script>alert('$error');</script>";
        }
        else
        {
            header("location:index.php?page=viewUserProfileBoundary");
        }
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
                        <label for="profileName" class="form-label">Profile Name</label>
                        <input type="text" class="form-control" name="profileName">
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <input type="text" class="form-control" name="description">
                    </div>
                    <div class="mb-3">
                        <label for="role" class="form-label">Role</label>
                        <input type="text" class="form-control" name="role">
                    </div>
                    <button class="btn btn-success" type="submit" name="createUserProfile" id="createButton">Create</button>
                </form>
            </div>
        </div>
    </div>
</div>