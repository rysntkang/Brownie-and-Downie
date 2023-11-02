<?php
include "../../../dbConnection.php";
include "../../../entities/workslotEntity.php";
include "../../../entities/userProfileEntity.php";
include "../../../controller/owner/createWorkslotController.php";
include "../../../controller/admin/viewUserProfileController.php";

if(isset($_POST["createWorkslot"]))
{
    $date = $_POST["date"];
    $userProfileId = $_POST["userProfileId"];

    if(empty($date))
    {
        $error = "Please pick a date";
        echo "<script>alert('$error');</script>";
    }
    else
    {
        // $result = createWorkslotController::createWorkslot($date, $role);
        $createWorkslot = new CreateWorkslotController();
        $result = $createWorkslot->createWorkslot($date, $userProfileId);

        if($result != "Success")
        {
            echo "<script>alert('$error');</script>";
        }
        else
        {
            header("location:index.php?page=viewWorkslotsBoundary");
        }
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

    #createButton {
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
                        <input type="date" class="form-control" id="date" name="date">
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
                                if($row['profileName'] == 'Cafe Staff')
                                {
                                    ?>
                                    <option value=<?=$row['userProfileId']?>><?=$row['role']?></option>
                                    <?php
                                }
                            }
                            ?>
                        </select>
                    </div>
                    <button class="btn btn-success" type="submit" name="createWorkslot" id="createButton">Create</button>
                </form>
            </div>
        </div>
    </div>
</div>