<!-- WIP -->

<!-- 
    ----------------------------------------
    // CAFE STAFF

    #3 - As a cafe staff, I want to be able to view my bids, 
    so that I can know if I am approved to work on that slot.

-->
<?php
include "../../../dbConnection.php";
include "../../../entities/offerEntity.php";
include "../../../entities/workslotEntity.php";
include "../../../controller/staff/viewStaffOfferController.php";
include "../../../controller/manager/assignWorkslotController.php";
include "../../../controller/staff/acceptOfferController.php";

$userId = $_SESSION['currentUserId'];

if(isset($_POST["approve"]))
{
    $workslotId = $_POST["workslotId"];
    $workslotDate = $_POST["workslotDate"];
    $offerId = $_POST["approve"];
    $accepted = 1;
    
    $assignWorkslot = new AssignWorkslotController();
    $result = $assignWorkslot->assignWorkslot($workslotId, $workslotDate, $userId);

    if($result != "Success")
    {
        echo "<script>alert('$result');</script>";
    }
    else
    {
        $acceptOffer = new AcceptOfferController();
        $result = $acceptOffer->acceptOffer($offerId, $accepted);
        header("location:index.php?page=viewMyOffersBoundary");
    }
}

if(isset($_POST["reject"]))
{
    $offerId = $_POST["reject"];
    $accepted = 2;

    $acceptOffer = new AcceptOfferController();
    $result = $acceptOffer->acceptOffer($offerId, $accepted);
    header("location:index.php?page=viewMyOffersBoundary");
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
        // $array = ViewStaffOfferController::viewStaffOffer($username);
        $viewOffer = new ViewStaffOfferController();
        $array = $viewOffer->viewStaffOffer($userId);

        echo '<table class="table">';
        echo '  <tr>';
        echo '      <th>Date</th>';
        echo '      <th>Action</th>';
        echo '  </tr>';

        foreach($array as $offer)
        {
            echo '  <tr>';
            echo '      <td>' . $offer['date'] . '</td>';
            echo '      <td>';
            echo '          <form method="POST">';
            echo '              <input type="hidden" name="workslotId" value="' . $offer['workslotId'] . '"/>';
            echo '              <input type="hidden" name="workslotDate" value="' . $offer['date'] . '"/>';
            echo '              <button class="btn btn-success" style="height:40px" value="' . $offer['offerId'] . '" name="approve">Accept</button>';
            echo '              <button class="btn btn-danger" style="height:40px" value="' . $offer['offerId'] . '" name="reject">Reject</button>';
            echo '          </form>';
            echo '      </td>';
            echo '  </tr>';
        }
        echo '</table>';

        // echo '<table class="table">';
        // echo '  <tr>';
        // echo '      <th>Date</th>';
        // echo '      <th>Status</th>';
        // echo '      <th>Action</th>';
        // echo '  </tr>';
        // foreach($array as $offer)
        // {
        //     echo '  <tr>';
        //     echo '      <td>' . $offer['date'] . '</td>';
        //     if($offer['accepted'] == 0)
        //     {
        //         echo '      <td>Pending</td>';
        //         echo '      <td>';
        //         echo '          <form method="POST">';
        //         echo '              <input type="hidden" name="workslotId" value="' . $offer['workslotId'] . '"/>';
        //         echo '              <input type="hidden" name="workslotDate" value="' . $offer['date'] . '"/>';
        //         echo '              <button class="btn btn-success" style="height:40px" value="' . $offer['offerId'] . '" name="approve">Accept</button>';
        //         echo '              <button class="btn btn-danger" style="height:40px" value="' . $offer['offerId'] . '" name="reject">Reject</button>';
        //         echo '          </form>';
        //         echo '      </td>';
        //     }
        //     else if($offer['accepted'] == 1)
        //     {
        //         echo '      <td>Approved</td>';
        //         echo '      <td>';
        //         echo '          <form method="POST">';
        //         echo '              <input type="hidden" name="workslotId" value="' . $offer['workslotId'] . '"/>';
        //         echo '              <input type="hidden" name="workslotDate" value="' . $offer['date'] . '"/>';
        //         echo '              <button class="btn btn-success" style="height:40px" value="' . $offer['offerId'] . '" name="approve" disabled>Accept</button>';
        //         echo '              <button class="btn btn-danger" style="height:40px" value="' . $offer['offerId'] . '" name="reject" disabled>Reject</button>';
        //         echo '          </form>';
        //         echo '      </td>';
        //     }
        //     else
        //     {
        //         echo '      <td>Rejected</td>';
        //         echo '      <td>';
        //         echo '          <form method="POST">';
        //         echo '              <input type="hidden" name="workslotId" value="' . $offer['workslotId'] . '"/>';
        //         echo '              <input type="hidden" name="workslotDate" value="' . $offer['date'] . '"/>';
        //         echo '              <button class="btn btn-success" style="height:40px" value="' . $offer['offerId'] . '" name="approve" disabled>Accept</button>';
        //         echo '              <button class="btn btn-danger" style="height:40px" value="' . $offer['offerId'] . '" name="reject" disabled>Reject</button>';
        //         echo '          </form>';
        //         echo '      </td>';
        //     }
        //     echo '  </tr>';
        // }
        // echo '</table>';
        ?>
    </div>
</div>