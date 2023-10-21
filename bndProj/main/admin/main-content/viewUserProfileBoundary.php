<?php
//session_start();

include "../../dbConnection.php";
include "../../entities/userProfileClass.php";
include "../../controller/viewUserProfileController.php";
include "../../controller/suspendUserProfileController.php";
include "../../controller/searchUserProfileController.php";

if(isset($_POST["suspendUserProfile"]))
{
  $userProfileId = $_POST["suspendUserProfile"];

  $error = SuspendUserProfileController::suspendUserProfile($userProfileId);

  if($error != "Success")
  {
    echo "<script>alert('$error');</script>";
  }
}
?>

<style>
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

<div class="container">
    <div class="row">
        <div class="search-container ml-auto">
        <form method="POST">
        <input type="text" name="search" id="myInput" placeholder="Search">
        </form>
        </div>
    </div>
    <div class="row">
        <?php
        if(isset($_POST["search"]))
        {
            $value = $_POST["search"];
        
            $result = SearchUserProfileController::searchUserProfile($value);
        ?>
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
            foreach($result as $row)
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
            }
            ?>
        </tbody>
        </table>

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
    </div>
</div>