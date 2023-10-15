<?php
require("../dbConnection.php");

class User {
    public $firstName;
    public $lastName;
    public $username;
    public $password;
    public $mobileNumber;
    public $userProfileId;

    public function __construct($firstName, $lastName, $username, $password, $mobileNumber, $userProfileId) {
  		$this->userId = $userId;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->username = $username;
        $this->password = $password;
        $this->mobileNumber = $mobileNumber;
        $this->userProfileId = $userProfileId;
    }

	public static function login($conn, $username, $password) {
	$username = $conn->real_escape_string($username);
	$password = $conn->real_escape_string($password);

	$stmt = $conn->prepare("
	SELECT userId, firstName, lastName, mobileNumber, userProfileId FROM users
	WHERE username = ?
	AND password = ?
	");
	$stmt->bind_param("ss", $username, $password);
	$stmt->execute();
	$stmt->bind_result($userId, $firstName, $lastName, $mobileNumber, $userProfileId);

	if ($stmt->fetch()) {
	session_start();
	$_SESSION['userId'] = $userId;
	
	return array(
		'userId' => $userId,
		'firstName' => $firstName,
		'lastName' => $lastName,
		'username' => $username,
		'password' => $password,
		'mobileNumber' => $mobileNumber,
		'userProfileId' => $userProfileId

	);

	}
	}

}
?>
