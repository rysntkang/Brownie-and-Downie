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

    protected function create()
    {
        $error;
		$conn = $this->connectDB();

        if($this->checkUsername() == false) {
            $error = "Offer already submitted";
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
                //$array[$row['userId']] = $current;
                array_push($array, $current);
            }
        }

        return $array;
    }

    protected function accept()
    {
        $error;
		$conn = $this->connectDB();

        $sql = "UPDATE offer SET accepted = '$this->accepted' WHERE offerId = '$this->offerId'";
        $result = $conn->query($sql);

		$error = "Success";
		return $error;
    }
}
?>