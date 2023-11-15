<?php
include "../../../dbConnection.php";
include "../../../entities/workslotEntity.php";
include "../../../controller/manager/viewManagerWorkslotsController.php";
include "../../../controller/owner/searchWorkslotController.php";
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

                for ($i = 1; $i < sizeof($array); $i++)
                {
                    $workslotId = $array[$i]['workslotId'];
                    $date = $array[$i]['date'];
                    $role = $array[$i]['role'];
                    $username_workslot = $array[$i]['username'];
                    $name = $array[$i]['firstName'] . ' ' . $array[$i]['lastName'];

                    if(!isset($sorted[$date]))
                    {
                        $sorted[$date] = array();
                    }

                    $details = array(
                        'workslotId' => $workslotId,
                        'username' => $username_workslot,
                        'role' => $role,
                        'name' => $name
                    );

                    array_push($sorted[$date], $details);
                }

                echo '<table class="table">';
                foreach($sorted as $date => $workslots) {
                echo '<tr><th colspan="4">' . $date . '</th></tr>';
                echo '<tr><th>Role</th><th>Name</th></tr>';

                    foreach($workslots as $workslot) {
                        echo '<tr>';
                        echo '<td>' . $workslot['role'] . '</td>';
                        echo '<td>' . $workslot['name'] . '</td>';
                        echo '</tr>';
                    }
                }
                echo '</table>';
            }
        }
        else
        {
            $viewWorkslot = new ViewManagerWorkslotController();
            $array = $viewWorkslot->viewManagerWorkSlot();
            $sorted = array();

            for ($i = 0; $i < sizeof($array); $i++)
            {
                $workslotId = $array[$i]['workslotId'];
                $date = $array[$i]['date'];
                $role = $array[$i]['role'];
                $username_workslot = $array[$i]['username'];
                $name = $array[$i]['firstName'] . ' ' . $array[$i]['lastName'];

                if(!isset($sorted[$date]))
                {
                    $sorted[$date] = array();
                }

                $details = array(
                    'workslotId' => $workslotId,
                    'username' => $username_workslot,
                    'role' => $role,
                    'name' => $name
                );

                array_push($sorted[$date], $details);
            }
            
            echo '<table class="table">';
            foreach($sorted as $date => $workslots) {
                echo '<tr><th colspan="4">' . $date . '</th></tr>';
                echo '<tr><th>Role</th><th>Name</th></tr>';

                foreach($workslots as $workslot) {
                    echo '<tr>';
                    echo '<td>' . $workslot['role'] . '</td>';
                    echo '<td>' . $workslot['name'] . '</td>';
                    echo '</tr>';
                }
            }
            echo '</table>';
        }
        ?>
    </div>
</div>