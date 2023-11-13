<?php
include "../../../dbConnection.php";
include "../../../entities/userEntity.php";
include "../../../entities/offerEntity.php";
include "../../../controller/manager/viewByRoleUserController.php";
include "../../../controller/manager/createOfferController.php";

$workslotId = $_SESSION['workslotId'];
$workslotDate = $_SESSION['workslotDate'];
$workslotUserProfileId = $_SESSION['workslotUserProfileId'];
$workslotRole = $_SESSION['workslotRole'];

$viewUsers = new ViewByRoleUserController();
$users = $viewUsers->viewByRoleUser($workslotUserProfileId);

if(isset($_POST["offer"]))
{
    $userId = $_POST["chosenUser"];
    $accepted = 0;
    
    $offer = new CreateOfferController();
    $error = $offer->createOffer($workslotId, $workslotDate, $workslotUserProfileId, $userId, $accepted);

    if($error != "Success")
    {
        echo "<script>alert('$error');</script>";
    }
    else
    {
        echo "<script>alert('Offer successfully submitted');</script>";
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

    #chosenUser {
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
        <table class="table">
            <tr>
                <th>Date</th>
                <th>Role</th>
            </tr>
            <tr>
                <td><?php echo $workslotDate ?></td>
                <td><?php echo $workslotRole ?></td>
            </tr>
        </table>
    </div>
    <div class="row">
        <div class="card">
            <div class="card-body">
            <form method="POST">
                <div class="mb-3">
                    <label for="staff" class="form-label">Available Staff</label>
                    <br>
                    <select class="form-select" id="chosenUser" name="chosenUser">
                        <?php
                        foreach($users as $user) {
                            echo '<option value=' . $user['userId'] . '>' . $user['username'] . '</option>';
                        }
                        ?>
                    </select>
                </div>

                <div class="card-footer text-center">
                    <button class="btn btn-success" type="submit" name="offer">Offer</button>
                </div>
            </form>
            </div>
        </div>
    </div>
</div>