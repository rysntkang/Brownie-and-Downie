<?php
include "../../../dbConnection.php";
// include "../../../entities/offerClass.php";
include "../../../entities/workSlotEntity.php";
include "../../../controller/owner/viewWorkslotController.php";

if(isset($_POST["offer"]))
{
    $workslotId = $_POST["offer"];
    $workslotDate = $_POST["workslotDate"];
    $workslotUserProfileId = $_POST["workslotUserProfileId"];
    $workslotRole = $_POST["workslotRole"];

    $_SESSION['workslotId'] = $workslotId;
    $_SESSION['workslotDate'] = $workslotDate;
    $_SESSION['workslotUserProfileId'] = $workslotUserProfileId;
    $_SESSION['workslotRole'] = $workslotRole;
    header("location:index.php?page=offerWorkslotBoundary");
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

    #date {
        width: 300px;
        height: 40px;
    }

    #staff {
        width: 300px;
        height: 40px;
    }
    
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


</style>

<div class="container">
    <div class="row">
        <?php
        // $array = ViewWorkslotController::viewWorkslot();
        $viewWorkslot = new ViewWorkslotController();
        $array = $viewWorkslot->viewWorkslot();

        echo '<table class="table">';
        echo '  <tr>';
        echo '      <th>Date</th>';
        echo '      <th>Role</th>';
        echo '      <th>Action</th>';
        echo '  </tr>';
        foreach($array as $workslot)
        {
            if($workslot['username'] == NULL)
            {
                echo '  <tr>';
                echo '      <td>' . $workslot['date'] . '</td>';
                echo '      <td>' . $workslot['role'] . '</td>';
                echo '      <td>';
                echo '          <form method="POST">';
                echo '              <input type="hidden" name="workslotDate" value="' . $workslot['date'] . '"/>';
                echo '              <input type="hidden" name="workslotUserProfileId" value="' . $workslot['userProfileId_workslot'] . '"/>';
                echo '              <input type="hidden" name="workslotRole" value="' . $workslot['role'] . '"/>';
                echo '              <button class="btn btn-success" style="height:40px" value="' . $workslot['workslotId'] . '" name="offer">Offer</button>';
                echo '          </form>';
                echo '      </td>';
                echo '  </tr>';
            }
        }
        echo '</table>';
        ?>
    </div>
</div>