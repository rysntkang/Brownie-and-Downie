<?php

class OfferEntity extends Dbh
{
    private $offerId;
    private $workslotId_offer;
    private $date;
    private $userProfileId_offer;
    private $userId_offer;
    private $accepted;

    public function __construct() {

    }

    public function get_offerId() {
        return $this->offerId;
    }

    public function set_offerId($offerId) {
		$this->offerId = $offerId;
	}

    public function get_workslotIdOffer() {
        return $this->workslotId;
    }

    public function set_workslotIdOffer($workslotId_offer) {
		$this->workslotId_offer = $workslotId_offer;
	}

    public function get_date() {
        return $this->date;
    }

    public function set_date($date) {
        $this->date = $date;
    }

    public function get_userProfileIdOffer() {
        return $this->role;
    }

    public function set_userProfileIdOffer($userProfileId_offer) {
		$this->userProfileId_offer = $userProfileId_offer;
	}

    public function get_userIdOffer() {
        return $this->userId_offer;
    }

    public function set_userIdOffer($userId_offer) {
		$this->userId_offer = $userId_offer;
	}

    public function get_accepted() {
        return $this->accepted;
    }

    public function set_accepted($accepted) {
		$this->accepted = $accepted;
	}

    protected function checkUsername()
    {
        $resultCheck;
        $conn = $this->connectDB();
        $sql = "SELECT offerId FROM offer WHERE workslotId_offer = '$this->workslotId_offer' AND userId_offer = '$this->userId_offer'";
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

    protected function checkMaxShift()
    {
        $resultCheck;
        $conn = $this->connectDB();
        $sql = "SELECT COUNT(workslotId) AS totalShift FROM workslot WHERE userId_workslot = '$this->userId_offer' AND YEARWEEK(`date`, 0) = YEARWEEK('$this->date', 0)";
        $result = $conn->query($sql);

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

    protected function checkAlreadyAssigned()
    {
        $resultCheck;
        $conn = $this->connectDB();
        $sql = "SELECT workslotId FROM workslot WHERE Date = '$this->date' AND userId_workslot = '$this->userId_offer'";
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

    protected function slotAlreadyAssigned()
    {
        $resultCheck;
        $conn = $this->connectDB();
        $sql = "SELECT userId_workslot FROM workslot WHERE workslotId = $this->workslotId_offer";
        $result = $conn->query($sql);

        if ($result->fetch_assoc()['userId_workslot'] == NULL)
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
            $error = "Offer already submitted";
            return $error;
        }

        if($this->checkMaxShift() == false) {
            $error = "User has been allocated maximum number of shifts!";
            return $error;
        }

        if($this->checkAlreadyAssigned() == false) {
            $error = "User has already been assigned a workslot on this day!";
            return $error;
        }

        $sql = "INSERT INTO offer (workslotId_offer, date, userProfileId_offer, userId_offer, accepted) VALUES ('$this->workslotId_offer', '$this->date', '$this->userProfileId_offer', '$this->userId_offer', '$this->accepted')";
        $result = $conn->query($sql);

		$error = "Success";
		return $error;
    }

    protected function viewStaff()
    {
        $array = [];
        $conn = $this->connectDB();
        $sql = "SELECT offer.offerId, offer.workslotId_offer, offer.date, userprofile.role, user.username, offer.accepted
                FROM offer
                LEFT OUTER JOIN userprofile ON offer.userprofileId_offer = userprofile.userProfileId
                LEFT OUTER JOIN user ON offer.userId_offer = user.userId
                WHERE userId_offer = '$this->userId_offer'
                AND accepted = 0
                AND date > CURRENT_DATE
                ORDER BY date ASC;";
        $result = $conn->query($sql);

        if ($result->num_rows > 0)
        {
            while ($row = $result->fetch_assoc())
            {
                $current = array(
                    'offerId' => $row['offerId'],
                    'workslotId' => $row['workslotId_offer'],
                    'date' => $row['date'],
                    'role' => $row['role'],
                    'username' => $row['username'],
                    'accepted' => $row['accepted']
                );
                array_push($array, $current);
            }
        }

        return $array;
    }

    protected function accept()
    {
        $error;
        $conn = $this->connectDB();

        if($this->accepted == 1)
        {
            if ($this->slotAlreadyAssigned() == true) {
                $error = "Slot has already been assigned! Rejecting offer!";
                $sql = "UPDATE offer SET accepted = '2' WHERE offerId = '$this->offerId'";
                $result = $conn->query($sql);
                return $error;
            }

            if($this->checkMaxShift() == false) {
                $error = "User has been allocated maximum number of shifts! Rejecting offer!";
                $sql = "UPDATE offer SET accepted = '2' WHERE offerId = '$this->offerId'";
                $result = $conn->query($sql);
                return $error;
            }
    
            if($this->checkAlreadyAssigned() == false) {
                $error = "User has already been assigned a workslot on this day! Rejecting offer!";
                $sql = "UPDATE offer SET accepted = '2' WHERE offerId = '$this->offerId'";
                $result = $conn->query($sql);
                return $error;
            }
    
            $sql = "UPDATE workslot SET userId_workslot = '$this->userId_offer' WHERE workslotId = '$this->workslotId_offer';";
            $sql .= "UPDATE offer SET accepted = '$this->accepted' WHERE offerId = '$this->offerId';";
            if ($conn->multi_query($sql))
            {
                do {
                    if ($result = $conn->store_result()) {
                        $result->free();
                    }
                } while ($conn->more_results() && $conn->next_result());
            }
            $conn->close();
    
            $error = "Success";
            return $error;
        }
        else
        {
            $sql = "UPDATE offer SET accepted = '$this->accepted' WHERE offerId = '$this->offerId'";
            $result = $conn->query($sql);

            $error = "Success";
            return $error;
        }
    }
}
?>