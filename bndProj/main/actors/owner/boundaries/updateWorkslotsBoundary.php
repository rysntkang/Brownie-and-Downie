<?php
include "../../../dbConnection.php";
include "../../../entities/workslotEntity.php";
include "../../../entities/userProfileEntity.php";
include "../../../controller/owner/updateWorkslotController.php";
include "../../../controller/admin/viewUserProfileController.php";

$workslotId = $_SESSION['workslotId'];
$role = $_SESSION['role'];
$date = $_SESSION['date'];

if(isset($_POST["updateWorkslot"]))
{
    $date = $_POST["date"];
    $userProfileId = $_POST["userProfileId"];

    $updateWorkslot = new UpdateWorkslotController();
    $result = $updateWorkslot->updateWorkslot($workslotId, $date, $userProfileId);

    if($result != "Success")
    {
        echo "<script>alert('$result');</script>";
    }
    else
    {
        header("location:index.php?page=viewWorkslotsBoundary");
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

    #role {
        width: 300px;
        height: 40px;
    }

    #updateButton {
        float: right;
        padding: auto;
    }

</style>

<div class="container">
    <div class="row">
        <div class="card">
            <div class="card-body">
                <form method="POST">
                    <div class="mb-3">
                        <label for="date" class="form-label">Date</label>
                        <input type="date" class="form-control" name="date" value="<?=$date?>">
                    </div>
                    <div class="mb-3">
                        <label for="role" class="form-label">Role</label>
                        <br>
                        <select class="form-select" id="role" name="userProfileId">
                            <?php
                            $roles = new viewUserProfileController();
                            $array = $roles->viewUserProfile();
                            foreach($array as $row)
                            {
                                if($row['profileName'] == 'Cafe Staff' && $row['activated'] == TRUE)
                                {
                                    if($row['role'] == $role)
                                    {
                                        ?>
                                        <option value=<?=$row['userProfileId']?> selected><?=$row['role']?></option>
                                        <?php
                                    }
                                    else
                                    {
                                        ?>
                                        <option value=<?=$row['userProfileId']?>><?=$row['role']?></option>
                                        <?php
                                    }
                                }
                            }
                            ?>
                        </select>
                    </div>
                    <button class="btn btn-success" type="submit" name="updateWorkslot" id="updateButton">Update</button>
                </form>
            </div>
        </div>
    </div>
</div>