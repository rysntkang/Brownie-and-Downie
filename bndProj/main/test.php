<?php
require "../dbConnection.php";
require "../entities/workSlotClass.php";
require "../controller/viewWorkSlotController.php";

if(isset($_POST["submit"]))
{
    // // pass values
    // $username = $_POST["username"];
    // $firstName = $_POST["firstName"];
    // $lastName = $_POST["lastName"];
    // $address = $_POST["address"];
    // $mobileNumber = $_POST["mobileNumber"];
    // $password = $_POST["password"];
    // $profileId = $_POST["profileId"];
    
    // $error = CreateUserController::createUser($username, $firstName, $lastName, $address, $mobileNumber, $password, $profileId);

    // echo "<script>alert('$error');</script>";
}

// $userProfile = new ViewWorkSlotController();
// $array = $userProfile->viewWorkSlot();
// foreach($array as $row)
// {
//     echo $row['workslotId'];
// }
?>

<!DOCTYPE html>
<html lang="en">
<head>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://kit.fontawesome.com/f2f42d264c.js" crossorigin="anonymous"></script>
</head>
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

    body {
      background-color: #554D4D;
    }
</style>
<body>
    <div class="container">
        <h2>View Slots</h2>           
        <table class="table">
          <thead>
            <tr>
                <th>Date</th>
                <th>Role</th>
                <th>Name</th>
                <th class="text-center" colspan="2">Actions</th>
            </tr>
          </thead>
            <?php
                $userProfile = new ViewWorkSlotController();
                $array = $userProfile->viewWorkSlot();
                $sorted = array();

                for ($i = 0; $i < sizeof($array); $i++)
                {
                    $workslotId = $array[$i]['workslotId'];
                    $date = $array[$i]['date'];
                    $role = $array[$i]['role'];
                    $username_workslot = $array[$i]['username_workslot'];


                    if(!isset($sorted[$date]))
                    {
                        $sorted[$date] = array();
                    }

                    $details = array(
                        'workslotId' => $workslotId,
                        'username_workslot' => $username_workslot,
                        'role' => $role
                    );

                    array_push($sorted[$date], $details);
                }

                foreach ($sorted as $row)
                {
                    $max = count($row);

                    $date = key($sorted);

                    for($i = 0; $i < $max; $i++)
                    {
                        $name = $row[$i]['username_workslot'];
                        $role = $row[$i]['role'];
                        $workslotId = $row[$i]['workslotId'];
            ?>
            <tr>
            <?php
                if ($i === 0) {
                    echo '<td rowspan="' . $max . '">' . $date . '</td>';
                }
            ?>
            <td><?=$role?></td>
            <td><?=$name?></td>
            <td>
                <form method="POST">
                <button class="btn btn-primary" style="height:40px" value="<?=$workslotId?>" name="updatWorkslot">UPDATE</button>
                <button class="btn btn-danger" style="height:40px" value="<?=$workslotId?>" name="updatWorkslot">DELETE</button>
                </form>
            </td>
            </tr>
            <?php            
                    }
                }
            ?>
        </table>
      </div>

</body>
</html>