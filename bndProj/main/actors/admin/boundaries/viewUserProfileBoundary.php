<?php
//session_start();

include "../../../dbConnection.php";
include "../../../entities/userProfileEntity.php";
include "../../../controller/admin/viewUserProfileController.php";
include "../../../controller/admin/suspendUserProfileController.php";
include "../../../controller/admin/searchUserProfileController.php";

if(isset($_POST["suspendUserProfile"]))
{
    $userProfileId = $_POST["suspendUserProfile"];

    $suspend = new SuspendUserProfileController();
    $error = $suspend->suspendUserProfile($userProfileId);

    if($error != "Success")
    {
        echo "<script>alert('$error');</script>";
    }
}

if(isset($_POST["updateUserProfile"]))
{
    $updateUserProfileId = $_POST["updateUserProfile"];
    $updateProfileName = $_POST["updateProfileName"];
    $updateDescription = $_POST["updateDescription"];
    $updateRole = $_POST["updateRole"];

    $_SESSION['userProfileId'] = $updateUserProfileId;
    $_SESSION['profileName'] = $updateProfileName;
    $_SESSION['description'] = $updateDescription;
    $_SESSION['role'] = $updateRole;
    
    header("location:index.php?page=updateUserProfileBoundary");
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
            $profileName = $_POST["search"];
            
            $searchUserProfile = new SearchUserProfileController();
            $array = $searchUserProfile->searchUserProfile($profileName);

            if ($array[0] != "Success")
            {
                echo '<script>';
                echo "alert('$array[0]');";
                echo 'document.location = "index.php?page=viewUserProfileBoundary";';
                echo '</script>';
            }
            else
            {
                echo '<table class ="table">';
                echo '  <tr>';
                echo '      <th class="text-center">User Profile ID</th>';
                echo '      <th class="text-center">Name</th>';
                echo '      <th class="text-center">Description</th>';
                echo '      <th class="text-center">Role</th>';
                echo '      <th class="text-center" colspan="2">Actions</th>';
                echo '  </tr>';
                for($i = 1; $i < count($array); $i++)
                {
                    $row = $array[$i];
                    echo '  <tr>';
                    echo '      <td>' . $row['userProfileId'] . '</td>';
                    echo '      <td>' . $row['profileName'] . '</td>';
                    echo '      <td>' . $row['description'] . '</td>';
                    echo '      <td>' . $row['role'] . '</td>';
                    echo '      <td>';
                    echo '          <form method="POST">';
                    echo '              <input type="hidden" name="updateProfileName" value="' . $row['profileName'] . '"/>';
                    echo '              <input type="hidden" name="updateDescription" value="' . $row['description'] . '"/>';
                    echo '              <input type="hidden" name="updateRole" value="' . $row['role'] . '"/>';
                    echo '              <button class="btn btn-primary" style="height:40px" value="' . $row['userProfileId'] . '" name="updateUserProfile">UPDATE</button>';
                    if ($row["activated"] == true)
                    {
                        echo '              <button class="btn btn-danger" style="height:40px" value="' . $row['userProfileId'] . '" name="suspendUserProfile">SUSPEND</button>';
                    }
                    else
                    {
                        echo '              <button class="btn btn-success" style="height:40px" value="' . $row['userProfileId'] . '" name="suspendUserProfile">ACTIVATE</button>';
                    }
                    echo '          </form>';
                    echo '      </td>';
                    echo '  </tr>';
                }
                echo "</table>";
            }
        }
        else
        {
            $viewUserProfile = new ViewUserProfileController();
            $array = $viewUserProfile->viewUserProfile();

            echo '<table class ="table">';
            echo '  <tr>';
            echo '      <th class="text-center">User Profile ID</th>';
            echo '      <th class="text-center">Name</th>';
            echo '      <th class="text-center">Description</th>';
            echo '      <th class="text-center">Role</th>';
            echo '      <th class="text-center" colspan="2">Actions</th>';
            echo '  </tr>';
            foreach($array as $row)
            {
                echo '  <tr>';
                echo '      <td>' . $row['userProfileId'] . '</td>';
                echo '      <td>' . $row['profileName'] . '</td>';
                echo '      <td>' . $row['description'] . '</td>';
                echo '      <td>' . $row['role'] . '</td>';
                echo '      <td>';
                echo '          <form method="POST">';
                echo '              <input type="hidden" name="updateProfileName" value="' . $row['profileName'] . '"/>';
                echo '              <input type="hidden" name="updateDescription" value="' . $row['description'] . '"/>';
                echo '              <input type="hidden" name="updateRole" value="' . $row['role'] . '"/>';
                echo '              <button class="btn btn-primary" style="height:40px" value="' . $row['userProfileId'] . '" name="updateUserProfile">UPDATE</button>';
                if ($row["activated"] == true)
                {
                    echo '              <button class="btn btn-danger" style="height:40px" value="' . $row['userProfileId'] . '" name="suspendUserProfile">SUSPEND</button>';
                }
                else
                {
                    echo '              <button class="btn btn-success" style="height:40px" value="' . $row['userProfileId'] . '" name="suspendUserProfile">ACTIVATE</button>';
                }
                echo '          </form>';
                echo '      </td>';
                echo '  </tr>';
            }
            echo "</table>";
        }
        ?>
    </div>

</div>