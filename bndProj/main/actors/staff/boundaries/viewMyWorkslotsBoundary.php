<?php
include "../../../dbConnection.php";
include "../../../entities/workslotEntity.php";
include "../../../controller/staff/viewAssignedWorkslotController.php";
include "../../../controller/staff/dropAssignedWorkslotController.php";

$userId = $_SESSION['currentUserId'];

if(isset($_POST["dropWorkslot"]))
{
    $workslotId = $_POST["dropWorkslot"];

    $dropWorkslot = new DropAssignedWorkslotController();
    $result = $dropWorkslot->dropAssignedWorkslot($workslotId);

    
    if($result != "Success")
    {
        echo "<script>alert('$result');</script>";
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

    .container {
        text-align: center;
    }

    .form-container {
        display: flex;
        align-items: center;
    }

    .form-container select, .form-container button {
        margin: 5px;
    }
    
</style>

<div class="container">
    <div class="row">
        <?php
        $viewAssigned = new ViewAssignedWorkSlotController();
        $array = $viewAssigned->viewAssignedWorkslot($userId);

        echo '<table class="table">';
        echo '  <tr>';
        echo '      <th>Date</th>';
        echo '      <th>Role</th>';
        echo '      <th>Action</th>';
        echo '  </tr>';
        foreach($array as $assigned)
        {
            echo '  <tr>';
            echo '      <td>' . $assigned['date'] . '</td>';
            echo '      <td>' . $assigned['role'] . '</td>';
            echo '      <td>';
            echo '          <form method="POST">';
            echo '              <button class="btn btn-danger" style="height:40px" value="' . $assigned['workslotId'] . '" name="dropWorkslot">Drop</button>';
            echo '          </form>';
            echo '      </td>';
            echo '  </tr>';
        }
        echo '</table>';
        ?>
    </div>
</div>