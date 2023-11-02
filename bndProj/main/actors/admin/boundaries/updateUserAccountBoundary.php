<?php
include "../../../dbConnection.php";
include "../../../entities/userEntity.php";
include "../../../entities/userProfileEntity.php";
include "../../../controller/admin/updateUserController.php";
include "../../../controller/admin/viewUserProfileController.php";

$userId = $_SESSION['userId'];
$username = $_SESSION['username'];
$firstName = $_SESSION['firstName']; 
$lastName = $_SESSION['lastName'];
$mobileNumber = $_SESSION['mobileNumber'];
$address = $_SESSION['address'];
$password = $_SESSION['password'];
$userProfileId = $_SESSION['userProfileId'];

if(isset($_POST["updateUser"]))
{
    $username = $_POST["username"];
    $firstName = $_POST["firstName"];
    $lastName = $_POST["lastName"];
    $address = $_POST["address"];
    $mobileNumber = $_POST["mobileNumber"];
    $password = $_POST["password"];

    $updateUser = new UpdateUserController();
    $result = $updateUser->updateUser($userId, $username, $firstName, $lastName, $address, $mobileNumber, $password);

    if($result != "Success")
    {
        echo "<script>alert('$result');</script>";
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
                <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" class="form-control" name="username" value="<?=$username?>" required>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="firstName" class="form-label">First Name</label>
                            <input type="text" class="form-control" name="firstName"  value="<?=$firstName?>" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="lastName" class="form-label">Last Name</label>
                            <input type="text" class="form-control" name="lastName" value="<?=$lastName?>" required>
                        </div>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="address" class="form-label">Address</label>
                    <input type="text" class="form-control" name="address" value="<?=$address?>" required>
                </div>

                <div class="mb-3">
                    <label for="mobileNumber" class="form-label">Mobile Number</label>
                    <input type="text" class="form-control" name="mobileNumber" value="<?=$mobileNumber?>" required>
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" name="password" value="<?=$password?>" required>
                </div>

                <div class="mb-3">
                    <label for="profile" class="form-label">Profile</label>
                    <br>
                    <select class="form-select" id="profile" name="profile" disabled>
                        <?php
                        $userProfile = new ViewUserProfileController();
                        $array = $userProfile->viewUserProfile();
                        foreach($array as $row)
                        {
                            if ($userProfileId == $row['userProfileId'])
                            {
                                echo '<option value=' . $row['userProfileId'] . ' selected>' . $row['role'] . '</option>';
                            }
                            else
                            {
                                echo '<option value=' . $row['userProfileId'] . '>' . $row['role'] . '</option>';
                            }
                        }
                        ?>
                    </select>
                </div>
                <button class="btn btn-success" type="submit" name="updateUser" id="updateButton">Update</button>
            </form>
            </div>
        </div>
    </div>
</div>