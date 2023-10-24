<?php
include "../../../dbConnection.php";
include "../../../entities/workslotClass.php";
include "../../../entities/userProfileClass.php";
include "../../../controller/owner/updateWorkslotController.php";
include "../../../controller/owner/searchWorkslotController.php";
include "../../../controller/admin/viewUserProfileController.php";

$workslotId = $_SESSION['workslotId'];

if(isset($_POST["updateWorkslot"]))
{
  $date = $_POST["date"];
  $role = $_POST["role"];

  $error = UpdateWorkslotController::updateWorkslot($workslotId, $date, $role);

  if($error != "Success")
  {
    echo "<script>alert('$error');</script>";
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
                    <?php
                        // retrieve information of user profile with regards to userProfileId
                        $details = SearchWorkslotController::searchWorkslot($workslotId);
                        // var_dump($details);
                        $date = $details[0]['date'];
                        $role = $details[0]['role'];
                    ?>
                    <div class="mb-3">
                        <label for="date" class="form-label">Date</label>
                        <input type="date" class="form-control" name="date" value="<?=$date?>">
                    </div>
                    <div class="mb-3">
                        <label for="role" class="form-label">Role</label>
                        <br>
                        <select class="form-select" id="role" name="role">
                            <?php
                            $roles = new viewUserProfileController();
                            $array = $roles->viewUserProfile();
                            foreach($array as $row)
                            {
                                if($row['profileName'] == 'Cafe Staff')
                                {
                                    if($row['role'] == $role)
                                    {
                                        ?>
                                        <option value=<?=$row['role']?> selected><?=$row['role']?></option>
                                        <?php
                                    }
                                    else
                                    {
                                        ?>
                                        <option value=<?=$row['role']?>><?=$row['role']?></option>
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