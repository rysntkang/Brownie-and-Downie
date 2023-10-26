<?php

class WorkSlotClass extends Dbh
{
    private $workslotId;
    private $date;
    private $role;
    private $username_workslot;

    public function __construct() {
        // $this->workSlotId = $workSlotId;
        // $this->date = $date;
        // $this->role = $role;
        // $this->username_workslot;
    }

    public function get_workslotId() {
        return $this->workslotId;
    }

    public function set_workslotId($workslotId) {
		$this->workslotId = $workslotId;
	}

    public function get_date() {
        return $this->date;
    }

    public function set_date($date) {
        $this->date = $date;
    }

    public function get_role() {
        return $this->role;
    }

    public function set_role($role) {
        $this->role = $role;
    }

    public function get_usernameWorkslot() {
        return $this->usernameWorkslot;
    }

    public function set_username_workslot($username_workslot) {
        $this->username_workslot = $username_workslot;
    }

    protected function checkMaxShift($username_workslot, $date)
    {
        $resultCheck;
        $conn = $this->connectDB();
        $sql = "SELECT COUNT(workslotId) AS totalShift FROM workslot WHERE username_workslot = '$username_workslot' AND YEARWEEK(`date`, 0) = YEARWEEK('$this->date', 0)";
        $result = $conn->query($sql);

        //var_dump($result->fetch_assoc()['totalShift']);

        if ((5 - $result->fetch_assoc()['totalShift']) > 0)
		{
			$resultCheck = true;
		}
        else
        {
            $resultCheck = false;
        }
        return $resultCheck;
    }

    protected function create()
    {
        $error;
		$conn = $this->connectDB();
        $sql = "INSERT INTO workslot (date, role) VALUES ('$this->date', '$this->role')";
        $result = $conn->query($sql);

		$error = "Success";
		return $error;
    }

    protected function view()
    {
        $array = [];
        $conn = $this->connectDB();
        $sql = "SELECT * FROM workslot ORDER BY date ASC, role ASC";
        $result = $conn->query($sql);

        if ($result->num_rows > 0)
        {
            while ($row = $result->fetch_assoc())
            {
                $current = array(
                    'workslotId' => $row['workslotId'],
                    'date' => $row['Date'],
                    'role' => $row['Role'],
                    'username_workslot' => $row['username_workslot']
                );
                //$array[$row['workslotId']] = $current;
                array_push($array, $current);
            }
        }

        return $array;
    }

    protected function viewAvailable()
    {
        $array = [];
        $conn = $this->connectDB();
        $sql = "SELECT * FROM workslot WHERE role = '$this->role' ORDER BY date ASC";
        $result = $conn->query($sql);

        if ($result->num_rows > 0)
        {
            while ($row = $result->fetch_assoc())
            {
                $current = array(
                    'workslotId' => $row['workslotId'],
                    'date' => $row['Date'],
                    'role' => $row['Role'],
                    'username_workslot' => $row['username_workslot']
                );
                //$array[$row['workslotId']] = $current;
                array_push($array, $current);
            }
        }

        return $array;
    }

    protected function update()
    {
        $error;
        $conn = $this->connectDB();
        $sql = "UPDATE workslot SET date = '$this->date', role = '$this->role' WHERE workslotId = '$this->workslotId'";

        if(!$result = $conn->query($sql)) {
            $error = "Update failure";
            return $error;
        }

        $error = "Success";
        return $error;
    }

    protected function delete()
    {
        $error;
        $conn = $this->connectDB();
        $sql = "DELETE FROM workslot WHERE workslotId = '$this->workslotId'";
        $result = $conn->query($sql);

        $error = "Success";
        return $error;
    }

    protected function search()
    {
        $error;
        $array = [];
        $conn = $this->connectDB();
        $sql = "SELECT * FROM workslot WHERE date LIKE '%$this->date%'";

        if(!$result = $conn->query($sql)) {
            $error = "Search failure";
            return $error;
        }

        if ($result->num_rows > 0)
        {
            while ($row = $result->fetch_assoc())
            {
                $current = array(
                    'workslotId' => $row['workslotId'],
                    'date' => $row['Date'],
                    'role' => $row['Role'],
                    'username_workslot' => $row['username_workslot']
                );
                //$array[$row['userProfileId']] = $current;
                array_push($array, $current);
            }
            return $array;
        }
        else {
            $error = "No records found";
            return $error;
        }
    }

    protected function searchById()
    {
        $error;
        $array = [];
        $conn = $this->connectDB();
        $sql = "SELECT * FROM workslot WHERE workslotId = '$this->workslotId'";

        if(!$result = $conn->query($sql)) {
            $error = "Search failure";
            return $error;
        }

        if ($result->num_rows > 0)
        {
            while ($row = $result->fetch_assoc())
            {
                $current = array(
                    'workslotId' => $row['workslotId'],
                    'date' => $row['Date'],
                    'role' => $row['Role'],
                    'username_workslot' => $row['username_workslot']
                );
                //$array[$row['userProfileId']] = $current;
                array_push($array, $current);
            }
            return $array;
        }
        else {
            $error = "No records found";
            return $error;
        }
    }

    protected function searchByRoleDate()
    {
        $error;
        $array = [];
        $conn = $this->connectDB();
        $sql = "SELECT * FROM workslot WHERE role = '$this->role' AND date = '$this->date'";

        if(!$result = $conn->query($sql)) {
            $error = "Search failure";
            return $error;
        }

        if ($result->num_rows > 0)
        {
            while ($row = $result->fetch_assoc())
            {
                $current = array(
                    'workslotId' => $row['workslotId'],
                    'date' => $row['Date'],
                    'role' => $row['Role'],
                    'username_workslot' => $row['username_workslot']
                );
                //$array[$row['userProfileId']] = $current;
                array_push($array, $current);
            }
            return $array;
        }
        else {
            $error = "No records found";
            return $error;
        }
    }

    protected function assign()
    {
        $error;
		$conn = $this->connectDB();

        if($this->checkMaxShift($this->username_workslot, $this->date) == false) {
            $error = "User has been allocated maximum number of shifts! Will reject other pending shifts!";
            return $error;
        }

        echo $this->workslotId;
        echo $this->username_workslot;

        $sql = "UPDATE workslot SET username_workslot = '$this->username_workslot' WHERE workslotId = '$this->workslotId'";
        $result = $conn->query($sql);

		$error = "Success";
		return $error;
    }
    
}

?>