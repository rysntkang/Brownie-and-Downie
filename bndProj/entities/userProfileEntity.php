<?php

class UserProfileEntity extends Dbh
{
	private $profileName;
    private $description;
    private $role;
    private $userProfileId;
    private $activated;

    public function __construct(){

    }

    public function get_userProfileId() {
        return $this->userProfileId;
    }

    public function set_userProfileId($userProfileId) {
		$this->userProfileId = $userProfileId;
	}

    public function get_profileName() {
        return $this->profileName;
    }

    public function set_profileName($profileName) {
        $this->profileName = $profileName;
    }

    public function get_description() {
        return $this->description;
    }

    public function set_description($description) {
        $this->description = $description;
    }

    public function get_role() {
        return $this->role;
    }

    public function set_role($role) {
        $this->role = $role;
    }

    public function set_activated($activated) {
		$this->activated = $activated;
	}

	public function get_activated() {
		return $this->activated;
	}

    protected function checkUserProfileUsed()
    {
        $resultCheck;
        $conn = $this->connectDB();
        $sql = "SELECT userId FROM user WHERE userProfileId = '$this->userProfileId' AND activated = 1;";
        $result = $conn->query($sql);

        if ($result->num_rows > 0)
        {
            $resultCheck = true;
        }
        else
        {
            $resultCheck = false;
        }
        return $resultCheck;
    }

    protected function activatedStatus()
    {
        $conn = $this->connectDB();
        $sql = "SELECT activated FROM userProfile WHERE userProfileId = '$this->userProfileId'";
        $result = $conn->query($sql);

        $status = $result->fetch_assoc();

        return $status['activated'];
    }

    protected function create()
    {
        $error;
		$conn = $this->connectDB();
        $sql = "INSERT INTO userprofile (profileName, description, role, activated) VALUES ('$this->profileName', '$this->description', '$this->role', '$this->activated')";
        $result = $conn->query($sql);

		$error = "Success";
		return $error;
    }

    protected function view()
    {
        $array = [];
        $conn = $this->connectDB();
        $sql = "SELECT * FROM userprofile";
        $result = $conn->query($sql);

        if ($result->num_rows > 0)
        {
            while ($row = $result->fetch_assoc())
            {
                $current = array(
                    'userProfileId' => $row['userProfileId'],
                    'profileName' => $row['profileName'],
                    'description' => $row['description'],
                    'role' => $row['role'],
                    'activated' => $row['activated']
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
        $sql = "UPDATE userprofile SET profileName = '$this->profileName', description = '$this->description', role = '$this->role' WHERE userProfileId = '$this->userProfileId'";
        $result = $conn->query($sql);

        $error = "Success";
        return $error;
    }

    protected function suspend()
    {
        $error;
        $conn = $this->connectDB();

        if($this->activatedStatus() == true && $this->checkUserProfileUsed() == true) {
            $error = "User Profile is currently being used!";
            return $error;
        }

        $sql = "UPDATE userprofile SET activated = NOT activated WHERE userprofileid = '$this->userProfileId'";
        $result = $conn->query($sql);

        $error = "Success";
        return $error;
    }

    protected function search()
    {
        $error;
        $array = [];
        $conn = $this->connectDB();
        $sql = "SELECT * FROM userprofile WHERE profileName = '$this->profileName'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0)
        {
            $error = "Success";
            array_push($array, $error);
            while ($row = $result->fetch_assoc())
            {
                $current = array(
                    'userProfileId' => $row['userProfileId'],
                    'profileName' => $row['profileName'],
                    'description' => $row['description'],
                    'role' => $row['role'],
                    'activated' => $row['activated']
                );
                array_push($array, $current);
            }
            return $array;
        }
        else {
            $error = "No records found";
            array_push($array, $error);
            return $array;
        }
    }
}
?>
