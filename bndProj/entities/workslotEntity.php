<?php

class WorkslotEntity extends Dbh
{
    private $workslotId;
    private $date;
    private $userProfileId_workslot;
    private $userId_workslot;

    public function __construct() {
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

    public function get_usrProfileIdWorkslot() {
        return $this->userProfileId_workslot;
    }

    public function set_userProfileIdWorkslot($userProfileId_workslot) {
        $this->userProfileId_workslot = $userProfileId_workslot;
    }

    public function get_userIdWorkslot() {
        return $this->userIdWorkslot;
    }

    public function set_userIdWorkslot($userId_workslot) {
        $this->userId_workslot = $userId_workslot;
    }

    protected function create()
    {
        $error;
		$conn = $this->connectDB();
        $sql = "INSERT INTO workslot (date, userProfileId_workslot) VALUES ('$this->date', '$this->userProfileId_workslot')";
        $result = $conn->query($sql);

		$error = "Success";
		return $error;
    }

    protected function view()
    {
        $array = [];
        $conn = $this->connectDB();
        $sql = "SELECT workslot.workslotId, workslot.Date, workslot.userProfileId_workslot, userprofile.role, user.username
                FROM workslot
                LEFT OUTER JOIN userprofile ON workslot.userprofileId_workslot = userprofile.userProfileId
                LEFT OUTER JOIN user ON workslot.userId_workslot = user.userId
                ORDER BY date DESC, role ASC;";
        $result = $conn->query($sql);

        if ($result->num_rows > 0)
        {
            while ($row = $result->fetch_assoc())
            {
                $current = array(
                    'workslotId' => $row['workslotId'],
                    'date' => $row['Date'],
                    'userProfileId_workslot' => $row['userProfileId_workslot'],
                    'role' => $row['role'],
                    'username' => $row['username']
                );
                array_push($array, $current);
            }
        }

        return $array;
    }

    protected function viewManager()
    {
        $array = [];
        $conn = $this->connectDB();
        $sql = "SELECT workslot.workslotId, workslot.Date, workslot.userProfileId_workslot, userprofile.role, user.username
                FROM workslot
                LEFT OUTER JOIN userprofile ON workslot.userprofileId_workslot = userprofile.userProfileId
                LEFT OUTER JOIN user ON workslot.userId_workslot = user.userId
                WHERE date >= CURRENT_DATE
                ORDER BY date ASC, role ASC;";
        $result = $conn->query($sql);

        if ($result->num_rows > 0)
        {
            while ($row = $result->fetch_assoc())
            {
                $current = array(
                    'workslotId' => $row['workslotId'],
                    'date' => $row['Date'],
                    'userProfileId_workslot' => $row['userProfileId_workslot'],
                    'role' => $row['role'],
                    'username' => $row['username']
                );
                array_push($array, $current);
            }
        }

        return $array;
    }

    protected function viewAvailable()
    {
        $array = [];
        $conn = $this->connectDB();
        $sql = "SELECT workslot.workslotId, workslot.Date, userprofile.role, user.username
                FROM workslot
                LEFT OUTER JOIN userprofile ON workslot.userprofileId_workslot = userprofile.userProfileId
                LEFT OUTER JOIN user ON workslot.userId_workslot = user.userId
                WHERE userProfileId_workslot = '$this->userProfileId_workslot'
                AND userId_workslot IS NULL
                AND date > CURRENT_DATE
                ORDER BY date ASC;";
        $result = $conn->query($sql);

        if ($result->num_rows > 0)
        {
            while ($row = $result->fetch_assoc())
            {
                $current = array(
                    'workslotId' => $row['workslotId'],
                    'date' => $row['Date'],
                    'role' => $row['role'],
                    'username' => $row['username']
                );
                array_push($array, $current);
            }
        }

        return $array;
    }

    protected function viewAssigned()
    {
        $array = [];
        $conn = $this->connectDB();
        $sql = "SELECT workslot.workslotId, workslot.Date, userprofile.role, user.username
                FROM workslot
                LEFT OUTER JOIN userprofile ON workslot.userprofileId_workslot = userprofile.userProfileId
                LEFT OUTER JOIN user ON workslot.userId_workslot = user.userId
                WHERE userId_workslot = '$this->userId_workslot'
                AND date >= CURRENT_DATE
                ORDER BY date ASC;";
        $result = $conn->query($sql);

        if ($result->num_rows > 0)
        {
            while ($row = $result->fetch_assoc())
            {
                $current = array(
                    'workslotId' => $row['workslotId'],
                    'date' => $row['Date'],
                    'role' => $row['role'],
                    'username' => $row['username']
                );
                array_push($array, $current);
            }
        }

        return $array;
    }

    protected function viewUnassigned()
    {
        $array = [];
        $conn = $this->connectDB();
        $sql = "SELECT workslot.workslotId, workslot.Date, workslot.userProfileId_workslot, userprofile.role, user.username
                FROM workslot
                LEFT OUTER JOIN userprofile ON workslot.userprofileId_workslot = userprofile.userProfileId
                LEFT OUTER JOIN user ON workslot.userId_workslot = user.userId
                WHERE date > CURRENT_DATE
                AND userId_workslot IS NULL
                ORDER BY date DESC, role ASC;";
        $result = $conn->query($sql);

        if ($result->num_rows > 0)
        {
            while ($row = $result->fetch_assoc())
            {
                $current = array(
                    'workslotId' => $row['workslotId'],
                    'date' => $row['Date'],
                    'userProfileId_workslot' => $row['userProfileId_workslot'],
                    'role' => $row['role'],
                    'username' => $row['username']
                );
                array_push($array, $current);
            }
        }

        return $array;
    }

    protected function update()
    {
        $error;
        $conn = $this->connectDB();
        $sql = "UPDATE workslot SET date = '$this->date', userProfileId_workslot = '$this->userProfileId_workslot' WHERE workslotId = '$this->workslotId'";
        $result = $conn->query($sql);

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

    protected function dropAssigned()
    {
        $error;
        $conn = $this->connectDB();
        $sql = "UPDATE workslot SET userId_workslot = NULL WHERE workslotId = '$this->workslotId'";
        $result = $conn->query($sql);

        $error = "Success";
        return $error;
    }

    protected function search()
    {
        $error;
        $array = [];
        $conn = $this->connectDB();
        $sql = "SELECT workslot.workslotId, workslot.Date, userprofile.role, user.username 
                FROM workslot 
                LEFT OUTER JOIN userprofile ON workslot.userprofileId_workslot = userprofile.userProfileId
                LEFT OUTER JOIN user ON workslot.userId_workslot = user.userId
                WHERE date LIKE '%$this->date%';";
        $result = $conn->query($sql);

        if ($result->num_rows > 0)
        {
            while ($row = $result->fetch_assoc())
            {
                $current = array(
                    'workslotId' => $row['workslotId'],
                    'date' => $row['Date'],
                    'role' => $row['role'],
                    'username' => $row['username']
                );
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
        $sql = "SELECT workslot.workslotId, workslot.Date, userprofile.role, user.username
                FROM workslot
                LEFT OUTER JOIN userprofile ON workslot.userprofileId_workslot = userprofile.userProfileId
                LEFT OUTER JOIN user ON workslot.userId_workslot = user.userId
                WHERE userProfileId_workslot = '$this->userProfileId_workslot'
                AND userId_workslot IS NULL
                AND date = '$this->date'
                ORDER BY date DESC;";
        $result = $conn->query($sql);

        if ($result->num_rows > 0)
        {
            while ($row = $result->fetch_assoc())
            {
                $current = array(
                    'workslotId' => $row['workslotId'],
                    'date' => $row['Date'],
                    'role' => $row['role'],
                    'username' => $row['username']
                );
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