<?php

class UserProfileEntity extends Dbh
{
	private $profileName;
    private $description;
    private $role;
    private $userProfileId;

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

    protected function checkUserProfile($name)
    {
        $resultCheck;
        $conn = $this->connectDB();
        $sql = "SELECT userProfileId FROM userprofile WHERE profileName = '$this->profileName'";
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

    protected function checkUserProfileUsed($userProfileId)
    {
        $resultCheck;
        $conn = $this->connectDB();
        $sql = "SELECT userId FROM user WHERE userProfileId = '$this->userProfileId' AND activated = 0;";
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

    protected function activatedStatus($userProfileId)
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
        $sql = "INSERT INTO userprofile (profileName, description, role, activated) VALUES ('$this->profileName', '$this->description', '$this->role', true)";
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

        if($this->activatedStatus($this->userProfileId) == true && $this->checkUserProfileUsed($this->userProfileId) == true) {
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
            return $error;
        }
    }

    protected function searchOne()
    {
        $error;
        $array = [];
        $conn = $this->connectDB();
        $sql = "SELECT * FROM userprofile WHERE userProfileId = '$this->userProfileId' OR role = '$this->role'";
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
            return $array;
        }
        else {
            $error = "No records found";
            return $error;
        }
    }
}
?>
