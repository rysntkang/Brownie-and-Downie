<?php

class BidEntity extends Dbh
{
    private $bidId;
    private $workslotId_bids;
    private $date;
    private $userProfileId_bids;
    private $userId_bids;
    private $approval;

    public function __construct() {

    }

    public function get_bidId() {
        return $this->bidId;
    }

    public function set_bidId($bidId) {
		$this->bidId = $bidId;
	}

    public function get_workslotIdBids() {
        return $this->workslotId_bids;
    }

    public function set_workslotIdBids($workslotId_bids) {
		$this->workslotId_bids = $workslotId_bids;
	}

    public function get_date() {
        return $this->date;
    }

    public function set_date($date) {
        $this->date = $date;
    }

    public function get_userProfileIdBids() {
        return $this->userProfileId_bids;
    }

    public function set_userProfileIdBids($userProfileId_bids) {
		$this->userProfileId_bids = $userProfileId_bids;
	}

    public function get_userIdBids() {
        return $this->userId_bids;
    }

    public function set_userIdBids($userId_bids) {
		$this->userId_bids = $userId_bids;
	}

    public function get_approval() {
        return $this->approval;
    }

    public function set_approval($approval) {
		$this->approval = $approval;
	}

    protected function checkUsername()
    {
        $resultCheck;
        $conn = $this->connectDB();
        $sql = "SELECT bidId FROM bids WHERE workslotId_bids = '$this->workslotId_bids' AND userId_bids = '$this->userId_bids';";
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

        if($this->checkUsername() == false) {
            $error = "Bid already submitted";
            return $error;
        }

        $sql = "INSERT INTO bids (workslotId_bids, date, userProfileId_bids, userId_bids, approval) VALUES ('$this->workslotId_bids', '$this->date', '$this->userProfileId_bids', '$this->userId_bids', '$this->approval')";
        $result = $conn->query($sql);

		$error = "Success";
		return $error;
    }

    protected function viewStaff()
    {
        $array = [];
        $conn = $this->connectDB();
        $sql = "SELECT bids.bidId, bids.workslotId_bids, bids.date, userprofile.role, user.username, bids.approval
                FROM bids
                LEFT OUTER JOIN userprofile ON bids.userprofileId_bids = userprofile.userProfileId
                LEFT OUTER JOIN user ON bids.userId_bids = user.userId
                WHERE userId_bids = '$this->userId_bids'
                ORDER BY date DESC, role ASC;";
        $result = $conn->query($sql);

        if ($result->num_rows > 0)
        {
            while ($row = $result->fetch_assoc())
            {
                $current = array(
                    'bidId' => $row['bidId'],
                    'workslotId_bids' => $row['workslotId_bids'],
                    'date' => $row['date'],
                    'role' => $row['role'],
                    'username' => $row['username'],
                    'approval' => $row['approval']
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
        // $sql = "SELECT * FROM bids WHERE approval = '0' ORDER BY date ASC, role ASC";
        $sql = "SELECT bids.bidId, bids.workslotId_bids, bids.date, bids.userId_bids, userprofile.role, user.username, bids.approval
                FROM bids
                LEFT OUTER JOIN userprofile ON bids.userprofileId_bids = userprofile.userProfileId
                LEFT OUTER JOIN user ON bids.userId_bids = user.userId
                WHERE approval = 0
                ORDER BY date DESC, role ASC;";
        $result = $conn->query($sql);

        if ($result->num_rows > 0)
        {
            while ($row = $result->fetch_assoc())
            {
                $current = array(
                    'bidId' => $row['bidId'],
                    'workslotId_bids' => $row['workslotId_bids'],
                    'date' => $row['date'],
                    'userId_bids' => $row['userId_bids'],
                    'role' => $row['role'],
                    'username' => $row['username'],
                    'approval' => $row['approval']
                );
                array_push($array, $current);
            }
        }

        return $array;
    }

    protected function approve()
    {
        $error;
		$conn = $this->connectDB();

        $sql = "UPDATE bids SET approval = '$this->approval' WHERE bidId = '$this->bidId'";
        $result = $conn->query($sql);

		$error = "Success";
		return $error;
    }
}
?>