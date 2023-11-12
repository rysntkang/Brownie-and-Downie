<?php
include "../../../dbConnection.php";
include "../../../entities/workslotEntity.php";
include "../../../controller/owner/viewWorkslotController.php";
include "../../../controller/owner/searchWorkslotController.php";
include "../../../controller/owner/deleteWorkslotController.php";
include "../../../controller/owner/updateWorkslotController.php";

if(isset($_POST["deleteWorkslot"]))
{
    $workslotId = $_POST["deleteWorkslot"];

    $deleteWorkslot = new DeleteWorkslotController();
    $result = $deleteWorkslot->deleteWorkslot($workslotId);

    if($result != "Success")
    {
        echo "<script>alert('$result');</script>";
    }
}

if(isset($_POST["updateWorkslot"]))
{
    $workslotId = $_POST["updateWorkslot"];
    $updateDate = $_POST["updateDate"];
    $updateRole = $_POST["updateRole"];

    $_SESSION['workslotId'] = $workslotId;
    $_SESSION['date'] = $updateDate;
    $_SESSION['role'] = $updateRole;
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

    .btn-primary {
        margin:2px;
    }

</style>
<div class="container">
    <div class="row">
        <div class="search-container ml-auto">
            <form method="POST">
                <input type="date" name="search" id="myInput" placeholder="Search">
                <input type="submit" name="searchButton" value="Search">
            </form>
        </div>
    </div>
    <div class="row">
        <?php
        if(isset($_POST["searchButton"]))
        {
            $dateSearch = $_POST["search"];
            $searchWorkslot = new SearchWorkslotController();
            $array = $searchWorkslot->searchWorkslot($dateSearch);
            if(gettype($array) == 'string')
            {
                echo "<script>";
                echo "alert('$array');";
                echo "document.location = 'index.php?page=viewWorkslotsBoundary';";
                echo "</script>";
            }
            else
            {
                $sorted = array();

                for ($i = 0; $i < sizeof($array); $i++)
                {
                    $workslotId = $array[$i]['workslotId'];
                    $date = $array[$i]['date'];
                    $role = $array[$i]['role'];
                    $username_workslot = $array[$i]['username'];

                    if(!isset($sorted[$date]))
                    {
                        $sorted[$date] = array();
                    }

                    $details = array(
                        'workslotId' => $workslotId,
                        'username' => $username_workslot,
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
                        echo '<td>' . $workslot['username'] . '</td>';
                        echo '<td>';
                        echo '<form method="POST">';
                        echo '<input type="hidden" name="updateDate" value="' . $date . '"/>';
                        echo '<input type="hidden" name="updateRole" value="' . $workslot['role'] . '"/>';
                        echo '<button class="btn btn-primary" style="height:40px" value=' . $workslot['workslotId']. ' name="updateWorkslot">UPDATE</button>';
                        echo '<button class="btn btn-danger" style="height:40px" value=' . $workslot['workslotId']. ' name="deleteWorkslot">DELETE</button>';
                        echo '</form>';
                        echo '</td>';
                        echo '</tr>';
                    }
                }
                echo '</table>';
            }
        }
        else
        {
            $viewWorkslot = new ViewWorkslotController();
            $array = $viewWorkslot->viewWorkSlot();
            $sorted = array();

            for ($i = 0; $i < sizeof($array); $i++)
            {
                $workslotId = $array[$i]['workslotId'];
                $date = $array[$i]['date'];
                $role = $array[$i]['role'];
                $username_workslot = $array[$i]['username'];

                if(!isset($sorted[$date]))
                {
                    $sorted[$date] = array();
                }

                $details = array(
                    'workslotId' => $workslotId,
                    'username' => $username_workslot,
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
                    echo '<td>' . $workslot['username'] . '</td>';
                    echo '<td>';
                    echo '<form method="POST">';
                    echo '<input type="hidden" name="updateDate" value="' . $date . '"/>';
                    echo '<input type="hidden" name="updateRole" value="' . $workslot['role'] . '"/>';
                    echo '<button class="btn btn-primary" style="height:40px" value=' . $workslot['workslotId']. ' name="updateWorkslot">UPDATE</button>';
                    echo '<button class="btn btn-danger" style="height:40px" value=' . $workslot['workslotId']. ' name="deleteWorkslot">DELETE</button>';
                    echo '</form>';
                    echo '</td>';
                    echo '</tr>';
                }
            }
            echo '</table>';
        }
        ?>
    </div>
</div>