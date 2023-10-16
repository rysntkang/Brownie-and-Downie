<?php
require("../entities/userProfileClass.php");

class CreateUserProfileController {
    private $name;
    private $description;
    private $role;

    public function __construct($name, $description, $role) {
  		$this->name = $name;
        $this->description = $description;
        $this->role = $role;
    }

    // function to createUserProfile using UserProfileClass
    public function createUserProfile($conn, $name, $description, $role) {
        $name = $conn->real_escape_string($name);
        $description = $conn->real_escape_string($description);
        $role = $conn->real_escape_string($role);

        // check if input is empty
        if ($this->emptyInput() == false) {
            // return status code according to use case description
            echo "Empty Input!";
            exit();
        }
        if ($this->userProfileExists() == false) {
            echo "User Profile already exists";
            exit();
        }

        $userProfile = UserProfile::create($conn, $name, $description, $role);
    }

    // function to check if input is empty
    protected function emptyInput() {
        $result;
        if(empty($this->name) || empty($this->description) || empty($this->role)) {
            $result = false;
        }
        else {
            $result = true;
        }
        return $result;
    }

    // function to check if userProfile already exists
    protected function userProfileExists() {
        $result;
        if (!UserProfileClass::checkUserProfile($this->name)) {
            $result = false;
        }
        else {
            $result = true;
        }

        return $result;
    }
}
?>