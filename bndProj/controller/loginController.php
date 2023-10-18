<?php
class LoginController extends UserClass{

    public static function loginUser($username, $password) {
        $user = new UserClass();
        $user->set_username($username);
        $user->set_password($password);

        $error = $user->login();

        return $error;
    }
    // public $firstName;
    // public $lastName;
    // public $username;
    // public $password;
    // public $mobileNumber;
    // public $userProfileId;

    // public function __construct($firstName, $lastName, $username, $password, $mobileNumber, $userProfileId) {
  	// 	$this->userId = $userId;
    //     $this->firstName = $firstName;
    //     $this->lastName = $lastName;
    //     $this->username = $username;
    //     $this->password = $password;
    //     $this->mobileNumber = $mobileNumber;
    //     $this->userProfileId = $userProfileId;
    // }

    // public static function loginUser($conn, $username, $password) {
    //     $username = $conn->real_escape_string($username);
    //     $password = $conn->real_escape_string($password);

    //     $user = User::login($conn, $username, $password);

    //     return $user;
    // }
}
?>