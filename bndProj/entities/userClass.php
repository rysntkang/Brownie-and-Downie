<?php

class UserClass extends Dbh
{
	private $userId;
	private $username;
    private $password;
    private $firstName;
    private $lastName;
	private $address;
    private $mobileNumber;
	private $activated;
    private $userProfileId;

    public function __construct($userId = null, $username = null, $password = null, $firstName = null, $lastName = null, $address = null, $mobileNumber = null, $activated = null, $userProfileId = null){
            $this->userId = $userId;
            $this->username = $username;
            $this->password = $password;
			$this->firstName = $firstName;
            $this->lastName = $lastName;
            $this->address = $address;
            $this->mobileNumber = $mobileNumber;
            $this->activated = $activated;
			$this->userProfileId = $userProfileId;
    }

	public function set_username($username) {
		$this->username = $username;
	}

	public function get_username() {
		return $this->username;
	}

	public function set_password($password) {
		$this->password = $password;
	}

	public function get_password() {
		return $this->username;
	}

	public function set_firstName($firstName) {
		$this->firstName = $firstName;
	}

	public function get_firstName() {
		return $this->firstName;
	}

	public function set_lastName($lastName) {
		$this->lastName = $lastName;
	}

	public function get_lastName() {
		return $this->lastName;
	}

	public function set_address($address) {
		$this->address = $address;
	}

	public function get_address() {
		return $this->address;
	}

	public function set_mobileNumber($mobileNumber) {
		$this->mobileNumber = $mobileNumber;
	}

	public function get_mobileNumber() {
		return $this->mobileNumber;
	}

	public function set_activated($activated) {
		$this->activated = $activated;
	}

	public function get_activated() {
		return $this->activated;
	}

	public function set_userProfileId($userProfileId) {
		$this->userProfileId = $userProfileId;
	}

	public function get_userProfileId() {
		return $this->userProfileId;
	}

	protected function login()
	{
		$error;
		$conn = $this->connectDB();
        $sql = "SELECT * FROM user WHERE username = '$this->username' AND password = '$this->password'";
        $result = $conn->query($sql);
        
		if ($result->num_rows > 0)
		{
			$users = $result->fetch_assoc();
			if ($users["activated"] == 1)
			{
				session_start();
				$_SESSION['userId'] = $users["userId"];
				$_SESSION['username'] = $users["username"];
				$_SESSION['userProfileId'] = $users["userProfileId"];

				$error = "Success";
				return $error;
			}
			else
			{
				$error = "User has been suspended!";
				return $error;
			}
		}

		$error = "Incorrect username or password!";
		return $error;
	}

	protected function checkUsername($username)
    {
        $resultCheck;
        $conn = $this->connectDB();
        $sql = "SELECT userId FROM user WHERE username = '$username'";
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

	protected function checkMobileNumber($mobileNumber)
	{
		$resultCheck;
		$conn = $this->connectDB();
		$sql = "SELECT userId FROM user WHERE mobileNumber = '$mobileNumber'";
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

        if($this->checkUsername($this->username) == false || $this->checkMobileNumber($this->mobileNumber) == false) {
            $error = "Username or mobile number has already been used!";
            return $error;
        }

        $sql = "INSERT INTO user (username, password, firstName, lastName, address, mobileNumber, activated, userProfileId) 
		VALUES ('$this->username', '$this->password', '$this->firstName', '$this->lastName', '$this->address', '$this->mobileNumber', '$this->activated', '$this->userProfileId')";

        if(!$result = $conn->query($sql)) {
			$error = "Create user error";
			return $error;
		}

		$error = "Success";
		return $error;
    }

	protected function view()
    {
        $array;
        $conn = $this->connectDB();
        $sql = "SELECT * FROM user";
        $result = $conn->query($sql);

        if ($result->num_rows > 0)
        {
            while ($row = $result->fetch_assoc())
            {
                $current = array(
                    'userId' => $row['userId'],
                    'username' => $row['username'],
                    'password' => $row['password'],
                    'firstName' => $row['firstName'],
                    'lastName' => $row['lastName'],
					'address' => $row['address'],
					'mobileNumber' => $row['mobileNumber'],
					'activated' => $row['activated'],
					'userProfileId' => $row['userProfileId']
                );
                $array[$row['userId']] = $current;
            }
        }

        return $array;
    }

	protected function update()
    {
        $error;
        $conn = $this->connectDB();
        $sql = "UPDATE user SET firstName = '$this->firstName', lastName = '$this->lastName', address = '$this->address', mobileNumber = '$this->mobileNumber";

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

        $sql = "UPDATE user SET activated = NOT activated WHERE userId = '$this->userId'";
        if(!$result = $conn->query($sql)) {
            $error = "Suspend failure";
            return $error;
        }

        $error = "Success";
        return $error;
    }

	protected function search()
    {
        $error;
        $array;
        $conn = $this->connectDB();
        $sql = "SELECT * FROM user WHERE username = '$this->username'";

        if(!$result = $conn->query($sql)) {
            $error = "Search failure";
            return $error;
        }

        if ($result->num_rows > 0)
        {
            while ($row = $result->fetch_assoc())
            {
                $current = array(
                    'userId' => $row['userId'],
                    'username' => $row['username'],
                    'password' => $row['password'],
                    'firstName' => $row['firstName'],
                    'lastName' => $row['lastName'],
					'address' => $row['address'],
					'mobileNumber' => $row['mobileNumber'],
					'activated' => $row['activated'],
					'userProfileId' => $row['userProfileId']
                );
                $array[$row['userId']] = $current;
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
