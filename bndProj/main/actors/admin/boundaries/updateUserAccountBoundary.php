<?php
include "../../../dbConnection.php";
include "../../../entities/userClass.php";
include "../../../entities/userProfileClass.php";
include "../../../controller/admin/updateUserController.php";
include "../../../controller/admin/searchUserController.php";
include "../../../controller/admin/searchUserProfileController.php";

$userId = $_SESSION['userId'];

if(isset($_POST["updateUser"]))
{
    $username = $_POST["username"];
    $firstName = $_POST["firstName"];
    $lastName = $_POST["lastName"];
    $address = $_POST["address"];
    $mobileNumber = $_POST["mobileNumber"];
    $password = $_POST["password"];

    $error = UpdateUserController::updateUser($userId, $username, $firstName, $lastName, $address, $mobileNumber, $password);

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
                    // retrieve information of user with regards to userId
                    $details = SearchUserController::searchUser($userId);
                    // var_dump($details);
                    $username = $details[0]['username'];
                    $password = $details[0]['password'];
                    $firstName = $details[0]['firstName'];
                    $lastName = $details[0]['lastName'];
                    $address = $details[0]['address'];
                    $mobileNumber = $details[0]['mobileNumber'];
                    $userProfileId = $details[0]['userProfileId'];

                    $userProfileDetails = SearchUserProfileController::searchUserProfile($userProfileId);
                    $role = $userProfileDetails[0]['role'];
                ?>
                <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" class="form-control" name="username" value="<?=$username?>">
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="firstName" class="form-label">First Name</label>
                            <input type="text" class="form-control" name="firstName"  value="<?=$firstName?>">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="lastName" class="form-label">Last Name</label>
                            <input type="text" class="form-control" name="lastName" value="<?=$lastName?>">
                        </div>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="address" class="form-label">Address</label>
                    <input type="text" class="form-control" name="address" value="<?=$address?>">
                </div>

                <div class="mb-3">
                    <label for="mobileNumber" class="form-label">Mobile Number</label>
                    <input type="text" class="form-control" name="mobileNumber" value="<?=$mobileNumber?>">
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" name="password" value="<?=$password?>">
                </div>

                <div class="mb-3">
                    <label for="profile" class="form-label">Profile</label>
                    <br>
                    <select class="form-select" id="profile" disabled>
                        <option value="option1"><?=$role?></option>
                        <option value="option2">Cashier</option>
                        <option value="option3">Waiter</option>
                        <!-- Add more options as needed -->
                    </select>
                </div>
                <button class="btn btn-success" type="submit" name="updateUser" id="updateButton">Update</button>
            </form>
            </div>
        </div>
    </div>
</div>