<?php

class UserProfileClass extends Dbh
{
	private $profileName;
    private $description;
    private $role;
    private $userProfileId;

    public function __construct($name = null, $description = null, $role = null, $userProfileId = null){
            $this->name = $name;
            $this->description = $description;
            $this->role = $role;
            $this->userProfileId = $userProfileId;
    }

    public function get_userProfileId($userProfileId) {
        return $this->userProfileId;
    }

    public function set_userProfileId($userProfileId) {
		$this->userProfileId = $userProfileId;
	}

    public function get_profileName($profileName) {
        return $this->profileName;
    }

    public function set_profileName($profileName) {
        $this->profileName = $profileName;
    }

    public function get_description($description) {
        return $this->description;
    }

    public function set_description($description) {
        $this->description = $description;
    }

    public function get_role($role) {
        return $this->role;
    }

    public function set_role($role) {
        $this->role = $role;
    }

    protected function checkUserProfile($name)
    {
        $resultCheck;
        $conn = $this->connectDB();
        $sql = "SELECT userProfileId FROM userprofile WHERE name = '$this->name'";
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
        $sql = "SELECT userId FROM user WHERE userProfileId = '$this->userProfileId'";
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

        if($this->checkUserProfile($this->name) == false) {
            $error = "User profile name has already been used!";
            return $error;
        }

        $sql = "INSERT INTO userprofile (name, description, role) VALUES ('$this->name', '$this->description', '$this->role')";
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
                    'name' => $row['profileName'],
                    'description' => $row['description'],
                    'role' => $row['role'],
                    'activated' => $row['activated']
                );
                //$array[$row['userProfileId']] = $current;
                array_push($array, $current);
            }
        }

        return $array;
    }

    protected function update()
    {
        $error;
        $conn = $this->connectDB();
        $sql = "UPDATE userprofile SET profileName = '$this->name', description = '$this->description', role = '$this->role' WHERE userProfileId = '$this->userProfileId'";

        if(!$result = $conn->query($sql)) {
            $error = "Update failure";
            return $error;
        }

        $error = "Success";
        return $error;
    }

    protected function suspend()
    {
        $error;
        $conn = $this->connectDB();

        if($this->activatedStatus($this->userProfileId) == true && $this->checkUserProfileUsed($this->userProfileId) == false) {
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
        $sql = "SELECT * FROM userprofile WHERE profilename = '$this->name'";

        if(!$result = $conn->query($sql)) {
            $error = "Search failure";
            return $error;
        }

        if ($result->num_rows > 0)
        {
            while ($row = $result->fetch_assoc())
            {
                $current = array(
                    'userProfileId' => $row['userProfileId'],
                    'name' => $row['profileName'],
                    'description' => $row['description'],
                    'role' => $row['role'],
                    'activated' => $row['activated']
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
