<?php
include "../../../dbConnection.php";
include "../../../entities/workSlotEntity.php";
include "../../../entities/bidEntity.php";
include "../../../controller/staff/viewAvailableWorkslotController.php";
include "../../../controller/staff/searchByRoleDateWorkslotController.php";
include "../../../controller/staff/createBidController.php";

$userProfileId = $_SESSION['currentUserProfileId'];
$username = $_SESSION['currentUsername'];
$userId = $_SESSION['currentUserId'];

$viewAvailable = new ViewAvailableWorkslotController();
$array = $viewAvailable->viewAvailableWorkSlot($userProfileId);

$allDates = [];
foreach($array as $a) {
    $currentDate = $a['date'];
    if(!in_array($currentDate, $allDates, true)) {
        array_push($allDates, $currentDate);
    }
}

if(isset($_POST["submitBid"]))
{
    $workslotId = $_POST["submitBid"];
    $workslotDate = $_POST["workslotDate"];
    $approval = 0;

    $submitBid = new CreateBidController();
    $result = $submitBid->createBid($workslotId, $workslotDate, $userProfileId, $userId, $approval);

    if($result != "Success")
    {
        echo "<script>alert('$result');</script>";
    }
    else
    {
        echo "<script>alert('Bid successfully submitted');</script>";
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

    #date {
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


    #date {
        width: 300px;
        height: 40px;
    }
    
</style>

<div class="container">
    <div class="row">
        <div class="card">
            <div class="card-body">
                <form method="POST">
                    <div class="mb-3">
                        <label for="date" class="form-label">Search Date:</label>
                        <br>
                        <select class="form-select" id="date" name="selectDate">
                            <?php
                            foreach($allDates as $currentDate) {
                                echo '<option value=' . $currentDate . '>' . $currentDate . '</option>';
                            }
                            ?>
                        </select>
                    </div>

                    <div class="card-footer text-center">
                        <button type="submit" class="btn btn-light">Reset</button>
                        <button type="submit" name="searchDate" class="btn btn-light">Search</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="row">
        <?php
        if(isset($_POST["searchDate"])) {
            $date = $_POST["selectDate"];
            $searchByRoleDate = new SearchByRoleDateWorkSlotController();
            $array = $searchByRoleDate->searchByRoleDateWorkslot($userProfileId, $date);

            if($array[0] != "Success")
            {
                echo "<script>";
                echo "alert('$array[0]');";
                echo "document.location = 'index.php?page=viewAndSearchAvailableBidsBoundary';";
                echo "</script>";
            }
            else
            {
                echo '<table class="table">';
                echo '  <tr>';
                echo '      <th>Date</th>';
                echo '      <th>Status</th>';
                echo '      <th>Action</th>';
                echo '  </tr>';

                for($i = 1; $i < count($array); $i++) {
                    $workslot = $array[$i];
                    echo '  <tr>';
                    echo '      <td>' . $workslot['date'] . '</td>';
                    echo '      <td>Available</td>';
                    echo '      <td>';
                    echo '          <form method="POST">';
                    echo '              <input type="hidden" name="workslotDate" value="' . $workslot['date'] . '"/>';
                    echo '              <button class="btn btn-success" style="height:40px" value="' . $workslot['workslotId'] . '" name="submitBid">Submit Bid</button>';
                    echo '          </form>';
                    echo '      </td>';
                    echo '  </tr>';
                }
                echo '</table>';
            }
        }
        else {
            echo '<table class="table">';
            echo '  <tr>';
            echo '      <th>Date</th>';
            echo '      <th>Status</th>';
            echo '      <th>Action</th>';
            echo '  </tr>';

            foreach($array as $workslot) {
                echo '  <tr>';
                echo '      <td>' . $workslot['date'] . '</td>';
                echo '      <td>Available</td>';
                echo '      <td>';
                echo '          <form method="POST">';
                echo '              <input type="hidden" name="workslotDate" value="' . $workslot['date'] . '"/>';
                echo '              <button class="btn btn-success" style="height:40px" value="' . $workslot['workslotId'] . '" name="submitBid">Submit Bid</button>';
                echo '          </form>';
                echo '      </td>';
                echo '  </tr>';
            }
            echo '</table>';
        }
        ?>                  
    </div>
</div>