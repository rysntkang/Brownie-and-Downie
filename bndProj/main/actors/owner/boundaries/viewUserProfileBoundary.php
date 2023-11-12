<?php
include "../../../dbConnection.php";
include "../../../entities/userProfileClass.php";
include "../../../controller/admin/viewUserProfileController.php";
include "../../../controller/admin/suspendUserProfileController.php";
include "../../../controller/admin/searchUserProfileController.php";
?>

<style>
    .table {
        margin-top: 1em !important;
        margin-left: auto;
        margin-right: auto;
        border-style: solid;
        border-color: black;
        background-color: #D9D9D9;
        width: 100%;
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
            $userProfileIdOrName = $_POST["search"];
        
            $result = SearchUserProfileController::searchUserProfile($userProfileIdOrName);
            if(gettype($result) == 'string')
            {
                echo "<script>alert('$result');</script>";
            }
            else
            {
                ?>
                <table class="table">
                <thead>
                    <tr>
                    <th class="text-center">User Profile ID</th>
                    <th class="text-center">Name</th>
                    <th class="text-center">Description</th>
                    <th class="text-center">Role</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach($result as $row)
                    {
                    ?>
                    <tr>
                    <td><?=$row["userProfileId"]?></td>
                    <td><?=$row["profileName"]?></td>
                    <td><?=$row["description"]?></td>
                    <td><?=$row["role"]?></td>
                    </tr>
        <?php
                    }
            }
        ?>
        </tbody>
        </table>
        <?php
        }
        else 
        {
        ?>

        <table class="table">
        <thead>
            <tr>
            <th class="text-center">User Profile ID</th>
            <th class="text-center">Name</th>
            <th class="text-center">Description</th>
            <th class="text-center">Role</th>
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
            <td><?=$row["profileName"]?></td>
            <td><?=$row["description"]?></td>
            <td><?=$row["role"]?></td>
            </tr>
            <?php
            }
            ?>
        </tbody>
        </table>
        <?php
        }
        ?>
    </div>
</div>