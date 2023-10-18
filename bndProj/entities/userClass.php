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
            //$this->conn = mysqli_connect("localhost", "root", "", "314db");
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
}
?>
