<?php
include "../../../dbConnection.php";
include "../../../entities/workslotClass.php";
include "../../../controller/owner/viewWorkslotController.php";
include "../../../controller/owner/searchWorkslotController.php";
include "../../../controller/owner/deleteWorkslotController.php";
include "../../../controller/owner/updateWorkslotController.php";

if(isset($_POST["deleteWorkslot"]))
{
  $workslotId = $_POST["deleteWorkslot"];

  $result = DeleteWorkslotController::deleteWorkslot($workslotId);

  if($result != "Success")
  {
    echo "<script>alert('$result');</script>";
  }
}

if(isset($_POST["updateWorkslot"]))
{
    $workslotId = $_POST["updateWorkslot"];
    echo $workslotId;
    $_SESSION['workslotId'] = $workslotId;
    header("location:index.php?page=updateWorkslotsBoundary");
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
        width: 100%;
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

</style>
<div class="container">
    <div class="row">
        <div class="search-container ml-auto">
        <form method="POST">
        <input type="date" name="search" id="myInput" placeholder="Search">
        <input type="submit" name="searchButton" value="Search">
        </form>
        <!-- <button id="search-button" onclick="openSearchDialog()">Search</button> -->
        </div>
    </div>
    <div class="row">
        <?php
        if(isset($_POST["searchButton"]))
        {
            $dateSearch = $_POST["search"];
            $array = SearchWorkslotController::searchWorkslot($dateSearch);
            if(gettype($array) == 'string')
            {
                echo "<script>";
                echo "alert('$array');";
                echo "document.location = 'index.php?page=viewWorkslotsBoundary';";
                echo "</script>";
            }
            else
            {
                // echo '<pre>'; print_r($array); echo '</pre>';
                $sorted = array();

                for ($i = 0; $i < sizeof($array); $i++)
                {
                    $workslotId = $array[$i]['workslotId'];
                    $date = $array[$i]['date'];
                    $role = $array[$i]['role'];
                    $username_workslot = $array[$i]['username_workslot'];

                    if(!isset($sorted[$date]))
                    {
                        $sorted[$date] = array();
                    }

                    $details = array(
                        'workslotId' => $workslotId,
                        'username_workslot' => $username_workslot,
                        'role' => $role
                    );

                    array_push($sorted[$date], $details);
                }

                echo '<table class="table">';
                foreach($sorted as $date => $workslots) {
                echo '<tr><th colspan="4">' . $date . '</th></tr>';
                echo '<tr><th>Role</th><th>Name</th><th class="text-center" colspan="2" style="width:20%">Actions</th></tr>';

                    foreach($workslots as $workslot) {
                        echo '<tr>';
                        echo '<td>' . $workslot['role'] . '</td>';
                        echo '<td>' . $workslot['username_workslot'] . '</td>';
                        echo '<td>';
                        ?>
                        <form method="POST">
                            <button class="btn btn-primary" style="height:40px" value="<?=$workslot['workslotId']?>" name="updateWorkslot">UPDATE</button>
                            <button class="btn btn-danger" style="height:40px" value="<?=$workslot['workslotId']?>" name="deleteWorkslot">DELETE</button>
                        </form>
                        <?php
                        echo '</td>';
                        echo '</tr>';
                    }
                }
                echo '</table>';
            }
        }
        else
        {
            $array = ViewWorkslotController::viewWorkSlot();
            $sorted = array();
            // echo '<pre>'; print_r($array); echo '</pre>';

            for ($i = 0; $i < sizeof($array); $i++)
            {
                $workslotId = $array[$i]['workslotId'];
                $date = $array[$i]['date'];
                $role = $array[$i]['role'];
                $username_workslot = $array[$i]['username_workslot'];

                if(!isset($sorted[$date]))
                {
                    $sorted[$date] = array();
                }

                $details = array(
                    'workslotId' => $workslotId,
                    'username_workslot' => $username_workslot,
                    'role' => $role
                );

                array_push($sorted[$date], $details);
            }

                //echo '<pre>'; print_r($sorted); echo '</pre>';
            
            echo '<table class="table">';
            foreach($sorted as $date => $workslots) {
                echo '<tr><th colspan="4">' . $date . '</th></tr>';
                echo '<tr><th>Role</th><th>Name</th><th class="text-center" colspan="2" style="width:20%">Actions</th></tr>';

                foreach($workslots as $workslot) {
                    echo '<tr>';
                    echo '<td>' . $workslot['role'] . '</td>';
                    echo '<td>' . $workslot['username_workslot'] . '</td>';
                    echo '<td>';
                    ?>
                    <form method="POST">
                        <button class="btn btn-primary" style="height:40px" value="<?=$workslot['workslotId']?>" name="updateWorkslot">UPDATE</button>
                        <button class="btn btn-danger" style="height:40px" value="<?=$workslot['workslotId']?>" name="deleteWorkslot">DELETE</button>
                    </form>
                    <?php
                    echo '</td>';
                    echo '</tr>';
                }
            }
            echo '</table>';
        }
        ?>
    </div>
</div>