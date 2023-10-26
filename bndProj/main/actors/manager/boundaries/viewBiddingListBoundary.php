<!-- WIP -->

<!-- 
    #3 - As a cafe manager, I want to be able to view the bidding list, 
    so that I can view all the bids submitted by the cafe staff
    
    #4 - As a cafe manager, I want to be able to approve or reject staff bids, 
    so that cafe staff are informed for which day they will be working.

-->
<?php
include "../../../dbConnection.php";
include "../../../entities/bidClass.php";
include "../../../entities/workSlotClass.php";
include "../../../controller/manager/viewManagerBidController.php";
include "../../../controller/manager/approveBidController.php";
include "../../../controller/manager/assignWorkslotController.php";

if(isset($_POST["approve"]))
{
    $workslotId = $_POST["workslotId"];
    $workslotDate = $_POST["workslotDate"];
    $username = $_POST["username"];
    $bidId = $_POST["approve"];
    $approval = 1;
    
    $result = AssignWorkslotController::assignWorkslot($workslotId, $workslotDate, $username);

    if($result != "Success")
    {
        echo "<script>alert('$result');</script>";
    }
    else
    {
        $result2 = ApproveBidController::approveBid($bidId, $approval);
        header("location:index.php?page=viewBiddingListBoundary");
    }
}

if(isset($_POST["reject"]))
{
    // $workslotId = $_POST["workslotId"];
    // $workslotDate = $_POST["workslotDate"];
    // $username = $_POST["username"];
    $bidId = $_POST["reject"];
    $approval = 2;

    $result = ApproveBidController::approveBid($bidId, $approval);
    header("location:index.php?page=viewBiddingListBoundary");
    
    // $result = AssignWorkslotController::assignWorkslot($workslotId, $workslotDate, $username);

    // if($result != "Success")
    // {
    //     echo "<script>alert('$result');</script>";
    // }
    // else
    // {
    //     $result2 = ApproveBidController::approveBid($bidId, $approval);
    //     header("location:index.php?page=viewBiddingListBoundary");
    // }
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

    #profile {
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


</style>
<!-- 
<head>
    <style>
        table {
            border-collapse: collapse;
            width: 80%;
            margin: 20px auto;
        }

        th, td {
            text-align: center;
            padding: 8px;
        }

        td button {
            display: inline-block;
            margin: 0 auto;
        }
    </style>
</head> -->
<body>
    <?php
    $array = ViewManagerBidController::viewManagerBid();

    echo '<table class="table">';
    echo '  <tr>';
    echo '      <th>Date</th>';
    echo '      <th>Role</th>';
    echo '      <th>Name</th>';
    echo '      <th>Action</th>';
    echo '  </tr>';
    foreach($array as $bid)
    {
        echo '  <tr>';
        echo '      <td>' . $bid['date'] . '</td>';
        echo '      <td>' . $bid['role'] . '</td>';
        echo '      <td>' . $bid['username_bids'] . '</td>';
        echo '      <td>';
        echo '          <form method="POST">';
        echo '              <input type="hidden" name="workslotId" value="' . $bid['workslotId'] . '"/>';
        echo '              <input type="hidden" name="workslotDate" value="' . $bid['date'] . '"/>';
        echo '              <input type="hidden" name="username" value="' . $bid['username_bids'] . '"/>';
        echo '              <button class="btn btn-success" style="height:40px" value="' . $bid['bidId'] . '" name="approve">Approve</button>';
        echo '              <button class="btn btn-danger" style="height:40px" value="' . $bid['bidId'] . '" name="reject">Reject</button>';
        echo '          </form>';
        echo '      </td>';
        echo '  </tr>';
    }
    echo '</table>';
    ?>
    <!-- <table class="table">
        <tr>
            <th>DATE</th>
            <th>ROLE</th>
            <th>NAME</th>
            <th>ACTION</th>
        </tr>
        <tr>
            <td>2023-10-24</td>
            <td>Sample Role</td>
            <td>John Doe</td>
            <td><button type="submit">Approve</button> <button type="submit">Reject</button></td>
        </tr>
        <tr>
            <td>2023-10-25</td>
            <td>Another Role</td>
            <td>Jane Smith</td>
            <td><button type="submit">Approve</button> <button type="submit">Reject</button></td>
        </tr>
        You can add more rows with data as needed
    </table> -->
</body>