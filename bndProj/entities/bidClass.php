<?php

class BidClass extends Dbh
{
    private $bidId;
    private $workslotId;
    private $date;
    private $role;
    private $username_bids;
    private $approval;

    public function __construct() {

    }

    public function get_bidId() {
        return $this->bidId;
    }

    public function set_bidId($bidId) {
		$this->bidId = $bidId;
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

    public function get_username_bids() {
        return $this->username_bids;
    }

    public function set_username_bids($username_bids) {
		$this->username_bids = $username_bids;
	}

    public function get_approval() {
        return $this->approval;
    }

    public function set_approval($approval) {
		$this->approval = $approval;
	}

    protected function checkUsername($workslotId, $username_bids)
    {
        $resultCheck;
        $conn = $this->connectDB();
        $sql = "SELECT bidId FROM bids WHERE workslotId = '$workslotId' AND username_bids = '$username_bids'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0)
		{
			$resultCheck = false;
		}
        else
        {
            $resultCheck = true;
        }
        return $resultCheck;
    }

    protected function create()
    {
        $error;
		$conn = $this->connectDB();

        if($this->checkUsername($this->workslotId, $this->username_bids) == false) {
            $error = "Bid already submitted";
            return $error;
        }

        $sql = "INSERT INTO bids (workslotId, date, role, username_bids, approval) VALUES ('$this->workslotId', '$this->date', '$this->role', '$this->username_bids', '$this->approval')";
        $result = $conn->query($sql);

		$error = "Success";
		return $error;
    }

    protected function view()
    {
        $array = [];
        $conn = $this->connectDB();
        $sql = "SELECT * FROM bids WHERE username_bids = '$this->username_bids'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0)
        {
            while ($row = $result->fetch_assoc())
            {
                $current = array(
                    'bidId' => $row['bidId'],
                    'workslotId' => $row['workslotId'],
                    'date' => $row['date'],
                    'role' => $row['role'],
                    'username_bids' => $row['username_bids'],
                    'approval' => $row['approval']
                );
                //$array[$row['userId']] = $current;
                array_push($array, $current);
            }
        }

        return $array;
    }
}
?>