<?php
include "../../../dbConnection.php";
include "../../../entities/bidEntity.php";
include "../../../controller/staff/viewStaffBidController.php";

$userId = $_SESSION['currentUserId'];
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
        $viewBid = new ViewStaffBidController();
        $array = $viewBid->viewStaffBid($userId);

        echo '<table class="table">';
        echo '  <tr>';
        echo '      <th>Date</th>';
        echo '      <th>Status</th>';
        echo '  </tr>';
        foreach($array as $bid)
        {
            echo '  <tr>';
            echo '      <td>' . $bid['date'] . '</td>';
            if($bid['approval'] == 0)
            {
                echo '      <td>Pending</td>';
            }
            else if($bid['approval'] == 1)
            {
                echo '      <td>Approved</td>';
            }
            else
            {
                echo '      <td>Rejected</td>';
            }
            echo '  </tr>';
        }
        echo '</table>';
        ?>
    </div>
</div>