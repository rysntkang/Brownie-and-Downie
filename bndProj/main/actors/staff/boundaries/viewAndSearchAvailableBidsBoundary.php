<!-- WIP -->

<!-- 
    ----------------------------------------
    //VIEW AVAILABLE BIDS
    #5 - As a cafe staff, I want to be able to view the available bids for the work slot,
    so that I know when to work.


    ----------------------------------------
    //SEARCH FOR WORK SLOTS
    #7 - As a cafe staff, I want to be able to search for work slots 
    so that I can make bids more easily. 


    ----------------------------------------


-->
<?php
include "../../../dbConnection.php";
include "../../../entities/workSlotEntity.php";
include "../../../entities/bidEntity.php";
include "../../../controller/staff/viewAvailableWorkslotController.php";
include "../../../controller/staff/searchByRoleDateWorkslotController.php";
include "../../../controller/staff/createBidController.php";

// retrieve role pertaining to userProfileId
$userProfileId = $_SESSION['currentUserProfileId'];
$username = $_SESSION['currentUsername'];
$userId = $_SESSION['currentUserId'];

// $array = ViewAvailableWorkslotController::viewAvailableWorkSlot($role);
$viewAvailable = new ViewAvailableWorkslotController();
$array = $viewAvailable->viewAvailableWorkSlot($userProfileId);
$dates = [];
foreach($array as $a) {
    $date = $a['date'];
    if(!in_array($date, $dates, true)) {
        array_push($dates, $date);
    }
}

if(isset($_POST["submitBid"]))
{
    $workslotId = $_POST["submitBid"];
    $workslotDate = $_POST["workslotDate"];
    
    // $result = createBidController::createBid($workslotId, $workslotDate, $role, $username);
    $submitBid = new CreateBidController();
    $result = $submitBid->createBid($workslotId, $workslotDate, $userProfileId, $userId);

    if($result != "Success")
    {
        echo "<script>alert('$result');</script>";
    }
    else
    {
        echo "<script>alert('Bid submitted');</script>";
        // header("location:index.php?page=viewAndSearchAvailableBidsBoundary");
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
                            foreach($dates as $date) {
                                echo '<option value=' . $date . '>' . $date . '</option>';
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
            // $searchedArray = SearchByRoleDateWorkSlotController::searchByRoleDateWorkslot($role, $date);
            $searchByRoleDate = new SearchByRoleDateWorkSlotController();
            $searchedArray = $searchByRoleDate->searchByRoleDateWorkslot($userProfileId, $date);

            echo '<table class="table">';
            echo '  <tr>';
            echo '      <th>Date</th>';
            echo '      <th>Status</th>';
            echo '      <th>Action</th>';
            echo '  </tr>';

            foreach($searchedArray as $workslot) {
                echo '  <tr>';
                echo '      <td>' . $workslot['date'] . '</td>';
                if ($workslot['username'] == NULL) {
                    echo '      <td>Available</td>';
                    echo '      <td>';
                    echo '          <form method="POST">';
                    echo '              <input type="hidden" name="workslotDate" value="' . $workslot['date'] . '"/>';
                    echo '              <button class="btn btn-success" style="height:40px" value="' . $workslot['workslotId'] . '" name="submitBid">Submit Bid</button>';
                    echo '          </form>';
                    echo '      </td>';
                }
                else {
                    echo '      <td>Full</td>';
                    echo '      <td>';
                    echo '          <form method="POST">';
                    echo '              <button class="btn btn-success" style="height:40px" value=' . $workslot['workslotId'] . 'name="submitBid" disabled>Submit Bid</button>';
                    echo '          </form>';
                    echo '      </td>';
                }
                echo '  </tr>';
            }
            echo '</table>';
        }
        else {
            // echo '<pre>'; print_r($array); echo '</pre>';
            echo '<table class="table">';
            echo '  <tr>';
            echo '      <th>Date</th>';
            echo '      <th>Status</th>';
            echo '      <th>Action</th>';
            echo '  </tr>';

            foreach($array as $workslot) {
                echo '  <tr>';
                echo '      <td>' . $workslot['date'] . '</td>';
                if ($workslot['username'] == NULL) {
                    echo '      <td>Available</td>';
                    echo '      <td>';
                    echo '          <form method="POST">';
                    echo '              <input type="hidden" name="workslotDate" value="' . $workslot['date'] . '"/>';
                    echo '              <button class="btn btn-success" style="height:40px" value="' . $workslot['workslotId'] . '" name="submitBid">Submit Bid</button>';
                    echo '          </form>';
                    echo '      </td>';
                }
                else {
                    echo '      <td>Full</td>';
                    echo '      <td>';
                    echo '          <form method="POST">';
                    echo '              <button class="btn btn-success" style="height:40px" value=' . $workslot['workslotId'] . 'name="submitBid" disabled>Submit Bid</button>';
                    echo '          </form>';
                    echo '      </td>';
                }
                echo '  </tr>';
            }
            echo '</table>';
        }
        ?>                  
    </div>
</div>