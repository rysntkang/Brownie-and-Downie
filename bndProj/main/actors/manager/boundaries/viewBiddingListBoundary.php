<?php
include "../../../dbConnection.php";
include "../../../entities/bidEntity.php";
include "../../../controller/manager/viewManagerBidController.php";
include "../../../controller/manager/approveBidController.php";

if(isset($_POST["approve"]))
{
    $workslotId = $_POST["workslotId"];
    $workslotDate = $_POST["workslotDate"];
    $userId = $_POST["userId"];
    $bidId = $_POST["approve"];
    $approval = 1;

    $approve = new ApproveBidController();
    $error = $approve->approveBid($bidId, $workslotId, $workslotDate, $userId, $approval);

    if ($error != "Success")
    {
        echo "<script>alert('$error');</script>"; 
    }
    else
    {
        header("location:index.php?page=viewBiddingListBoundary");
    }
}

if(isset($_POST["reject"]))
{
    $workslotId = $_POST["workslotId"];
    $workslotDate = $_POST["workslotDate"];
    $userId = $_POST["userId"];
    $bidId = $_POST["reject"];
    $approval = 2;
    
    $reject = new ApproveBidController();
    $error = $reject->approveBid($bidId, $workslotId, $workslotDate, $userId, $approval);
    header("location:index.php?page=viewBiddingListBoundary");
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
        width: 100%;
        text-align: center;
    }

    th, td , tr{
      border-style: solid;
      border-color: black;
    }


</style>

<div class="container">
    <div class="row">
        <?php
        $viewBids = new ViewManagerBidController();
        $array = $viewBids->viewManagerBid();

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
            echo '      <td>' . $bid['username'] . '</td>';
            echo '      <td>';
            echo '          <form method="POST">';
            echo '              <input type="hidden" name="workslotId" value="' . $bid['workslotId_bids'] . '"/>';
            echo '              <input type="hidden" name="workslotDate" value="' . $bid['date'] . '"/>';
            echo '              <input type="hidden" name="userId" value="' . $bid['userId_bids'] . '"/>';
            echo '              <button class="btn btn-success" style="height:40px" value="' . $bid['bidId'] . '" name="approve">Approve</button>';
            echo '              <button class="btn btn-danger" style="height:40px" value="' . $bid['bidId'] . '" name="reject">Reject</button>';
            echo '          </form>';
            echo '      </td>';
            echo '  </tr>';
        }
        echo '</table>';
        ?>
    </div>
</div>