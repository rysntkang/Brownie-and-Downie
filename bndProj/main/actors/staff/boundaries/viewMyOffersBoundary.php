<?php
include "../../../dbConnection.php";
include "../../../entities/offerEntity.php";
include "../../../controller/staff/viewStaffOfferController.php";
include "../../../controller/staff/acceptOfferController.php";

$userId = $_SESSION['currentUserId'];

if(isset($_POST["accept"]))
{
    $workslotId = $_POST["workslotId"];
    $workslotDate = $_POST["workslotDate"];
    $offerId = $_POST["accept"];
    $accepted = 1;

    $accept = new AcceptOfferController();
    $error = $accept->acceptOffer($offerId, $workslotId, $workslotDate, $userId, $accepted);

    if($error != "Success")
    {
        echo "<script>alert('$error');</script>";
    }
    else
    {
        header("location:index.php?page=viewMyOffersBoundary");
    }
}

if(isset($_POST["reject"]))
{
    $workslotId = $_POST["workslotId"];
    $workslotDate = $_POST["workslotDate"];
    $offerId = $_POST["reject"];
    $accepted = 2;

    $reject = new AcceptOfferController();
    $error = $reject->acceptOffer($offerId, $workslotId, $workslotDate, $userId, $accepted);
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
            echo '              <button class="btn btn-success" style="height:40px" value="' . $offer['offerId'] . '" name="accept">Accept</button>';
            echo '              <button class="btn btn-danger" style="height:40px" value="' . $offer['offerId'] . '" name="reject">Reject</button>';
            echo '          </form>';
            echo '      </td>';
            echo '  </tr>';
        }
        echo '</table>';
        ?>
    </div>
</div>