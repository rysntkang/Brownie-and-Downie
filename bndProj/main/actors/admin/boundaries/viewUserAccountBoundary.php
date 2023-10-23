<?php
//session_start();

include "../../../dbConnection.php";
include "../../../entities/userClass.php";
include "../../../controller/viewUserController.php";
include "../../../controller/suspendUserController.php";
include "../../../controller/searchUserController.php";

if(isset($_POST["suspendUser"]))
{
  $userId = $_POST["suspendUser"];

  $error = SuspendUserController::suspendUser($userId);

  if($error != "Success")
  {
    echo "<script>alert('$error');</script>";
  }
}

if(isset($_POST["updateUser"]))
{
    $userId = $_POST["updateUser"];
    $_SESSION['userId'] = $userId;
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
            $userIdOrName = $_POST["search"];
        
            $result = SearchUserController::searchUser($userIdOrName);
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
                    <th class="text-center">User ID</th>
                    <th class="text-center">Username</th>
                    <th class="text-center">First Name</th>
                    <th class="text-center">Last Name</th>
                    <th class="text-center">Mobile Number</th>
                    <th class="text-center">Address</th>
                    <th class="text-center" colspan="2">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach($result as $row)
                    {
                    ?>
                    <tr>
                    <td><?=$row["userId"]?></td>
                    <td><?=$row["username"]?></td>
                    <td><?=$row["firstName"]?></td>
                    <td><?=$row["lastName"]?></td>
                    <td><?=$row["mobileNumber"]?></td>
                    <td><?=$row["address"]?></td>
                    <td>
                        <form method="POST">
                        <button class="btn btn-primary" style="height:40px" value="<?=$row['userId']?>" name="updateUser">UPDATE</button>
                        <?php
                        if($row["activated"] == true) {
                        ?>
                        <button class="btn btn-danger" style="height:40px" value="<?=$row['userId']?>" name="suspendUser">SUSPEND</button>
                        <?php
                        }
                        else {
                        ?>
                        <button class="btn btn-success" style="height:40px" value="<?=$row['userId']?>" name="suspendUser">ACTIVATE</button>
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
        <?php
        }
        else 
        {
        ?>

        <table class="table">
        <thead>
            <tr>
            <th class="text-center">User ID</th>
            <th class="text-center">Username</th>
            <th class="text-center">First Name</th>
            <th class="text-center">Last Name</th>
            <th class="text-center">Mobile Number</th>
            <th class="text-center">Address</th>
            <th class="text-center" colspan="2">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $user = new ViewUserController();
            $array = $user->viewUser();
            foreach($array as $row)
            {
            ?>
            <tr>
            <td><?=$row["userId"]?></td>
            <td><?=$row["username"]?></td>
            <td><?=$row["firstName"]?></td>
            <td><?=$row["lastName"]?></td>
            <td><?=$row["mobileNumber"]?></td>
            <td><?=$row["address"]?></td>
            <td>
                <form method="POST">
                <button class="btn btn-primary" style="height:40px" value="<?=$row['userId']?>" name="updateUser">UPDATE</button>
                <?php
                if($row["activated"] == true) {
                ?>
                <button class="btn btn-danger" style="height:40px" value="<?=$row['userId']?>" name="suspendUser">SUSPEND</button>
                <?php
                }
                else {
                ?>
                <button class="btn btn-success" style="height:40px" value="<?=$row['userId']?>" name="suspendUser">ACTIVATE</button>
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
        <?php
        }
        ?>
    </div>
</div>