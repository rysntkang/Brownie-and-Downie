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

    public function get_workslotId($workslotId) {
        return $this->workslotId;
    }

    public function set_workslotId($workslotId) {
		$this->workslotId = $workslotId;
	}

    public function get_date($date) {
        return $this->date;
    }

    public function set_date($date) {
        $this->date = $date;
    }

    public function get_role($role) {
        return $this->role;
    }

    public function set_role($role) {
        $this->role = $role;
    }

    public function get_usernameWorkslot($usernameWorkslot) {
        return $this->usernameWorkslot;
    }

    public function set_usernameWorkslot($usernameWorkslot) {
        $this->usernameWorkslot = $usernameWorkslot;
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
        $sql = "SELECT * FROM workslot WHERE date = '$this->date'";

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
    
}

?>