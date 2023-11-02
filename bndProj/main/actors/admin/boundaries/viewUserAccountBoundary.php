<?php
include "../../../dbConnection.php";
include "../../../entities/userEntity.php";
include "../../../controller/admin/viewUserController.php";
include "../../../controller/admin/suspendUserController.php";
include "../../../controller/admin/searchUserController.php";

if(isset($_POST["suspendUser"]))
{
    $userId = $_POST["suspendUser"];

    // $result = SuspendUserController::suspendUser($userId);
    $suspend = new SuspendUserController();
    $result = $suspend->suspendUser($userId);

    if($result != "Success")
    {
        echo "<script>alert('$result');</script>";
    }
}

if(isset($_POST["updateUser"]))
{
    $updateUserId = $_POST["updateUser"];
    $updateUserProfileId = $_POST["updateUserProfileId"];
    $updateUsername = $_POST["updateUsername"];
    $updateFirstName = $_POST["updateFirstName"];
    $updateLastName = $_POST["updateLastName"];
    $updateMobileNumber = $_POST["updateMobileNumber"];
    $updateAddress = $_POST["updateAddress"];
    $updatePassword = $_POST["updatePassword"];

    $_SESSION['userId'] = $updateUserId;
    $_SESSION['userProfileId'] = $updateUserProfileId;
    $_SESSION['username'] = $updateUsername;
    $_SESSION['firstName'] = $updateFirstName;
    $_SESSION['lastName'] = $updateLastName;
    $_SESSION['mobileNumber'] = $updateMobileNumber;
    $_SESSION['address'] = $updateAddress;
    $_SESSION['password'] = $updatePassword;

    header("location:index.php?page=updateUserAccountBoundary");
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
            $userIdOrName = $_POST["search"];
        
            //$result = SearchUserController::searchUser($userIdOrName);
            $searchUser = new SearchUserController();
            $result = $searchUser->searchUser($userIdOrName);
            if(gettype($result) == 'string')
            {
                // echo "<script>alert('$result');</script>";
                echo '<script>';
                echo "alert('$result');";
                echo 'document.location = "index.php?page=viewUserAccountBoundary";';
                echo '</script>';
            }
            else
            {
                echo '<table class ="table">';
                echo '  <tr>';
                echo '      <th class="text-center">User ID</th>';
                echo '      <th class="text-center">Username</th>';
                echo '      <th class="text-center">First Name</th>';
                echo '      <th class="text-center">Last Name</th>';
                echo '      <th class="text-center">Mobile Number</th>';
                echo '      <th class="text-center">Address</th>';
                echo '      <th class="text-center" colspan="2">Actions</th>';
                echo '  </tr>';
                foreach($result as $row)
                {
                    echo '  <tr>';
                    echo '      <td>' . $row['userId'] . '</td>';
                    echo '      <td>' . $row['username'] . '</td>';
                    echo '      <td>' . $row['firstName'] . '</td>';
                    echo '      <td>' . $row['lastName'] . '</td>';
                    echo '      <td>' . $row['mobileNumber'] . '</td>';
                    echo '      <td>' . $row['address'] . '</td>';
                    echo '      <td>';
                    echo '          <form method="POST">';
                    echo '              <input type="hidden" name="updateUsername" value="' . $row['username'] . '"/>';
                    echo '              <input type="hidden" name="updateFirstName" value="' . $row['firstName'] . '"/>';
                    echo '              <input type="hidden" name="updateLastName" value="' . $row['lastName'] . '"/>';
                    echo '              <input type="hidden" name="updateMobileNumber" value="' . $row['mobileNumber'] . '"/>';
                    echo '              <input type="hidden" name="updateAddress" value="' . $row['address'] . '"/>';
                    echo '              <input type="hidden" name="updatePassword" value="' . $row['password'] . '"/>';
                    echo '              <input type="hidden" name="updateUserProfileId" value="' . $row['userProfileId'] . '"/>';
                    echo '              <button class="btn btn-primary" style="height:40px" value="' . $row['userId'] . '" name="updateUser">UPDATE</button>';
                    if ($row["activated"] == true)
                    {
                        echo '              <button class="btn btn-danger" style="height:40px" value="' . $row['userId'] . '" name="suspendUser">SUSPEND</button>';
                    }
                    else
                    {
                        echo '              <button class="btn btn-success" style="height:40px" value="' . $row['userId'] . '" name="suspendUser">ACTIVATE</button>';
                    }
                    echo '          </form>';
                    echo '      </td>';
                    echo '  </tr>';
                }
                echo "</table>";
            }
        }else
        {
            $viewUser = new ViewUserController();
            $result = $viewUser->viewUser();
            echo '<table class ="table">';
            echo '  <tr>';
            echo '      <th class="text-center">User ID</th>';
            echo '      <th class="text-center">Username</th>';
            echo '      <th class="text-center">First Name</th>';
            echo '      <th class="text-center">Last Name</th>';
            echo '      <th class="text-center">Mobile Number</th>';
            echo '      <th class="text-center">Address</th>';
            echo '      <th class="text-center" colspan="2">Actions</th>';
            echo '  </tr>';
            foreach($result as $row)
            {
                echo '  <tr>';
                echo '      <td>' . $row['userId'] . '</td>';
                echo '      <td>' . $row['username'] . '</td>';
                echo '      <td>' . $row['firstName'] . '</td>';
                echo '      <td>' . $row['lastName'] . '</td>';
                echo '      <td>' . $row['mobileNumber'] . '</td>';
                echo '      <td>' . $row['address'] . '</td>';
                echo '      <td>';
                echo '          <form method="POST">';
                echo '              <input type="hidden" name="updateUsername" value="' . $row['username'] . '"/>';
                echo '              <input type="hidden" name="updateFirstName" value="' . $row['firstName'] . '"/>';
                echo '              <input type="hidden" name="updateLastName" value="' . $row['lastName'] . '"/>';
                echo '              <input type="hidden" name="updateMobileNumber" value="' . $row['mobileNumber'] . '"/>';
                echo '              <input type="hidden" name="updateAddress" value="' . $row['address'] . '"/>';
                echo '              <input type="hidden" name="updatePassword" value="' . $row['password'] . '"/>';
                echo '              <input type="hidden" name="updateUserProfileId" value="' . $row['userProfileId'] . '"/>';
                echo '              <button class="btn btn-primary" style="height:40px" value="' . $row['userId'] . '" name="updateUser">UPDATE</button>';
                if ($row["activated"] == true)
                {
                    echo '              <button class="btn btn-danger" style="height:40px" value="' . $row['userId'] . '" name="suspendUser">SUSPEND</button>';
                }
                else
                {
                    echo '              <button class="btn btn-success" style="height:40px" value="' . $row['userId'] . '" name="suspendUser">ACTIVATE</button>';
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