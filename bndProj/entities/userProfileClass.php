<?php
require("../dbConnection.php");

class UserProfile {

    // check if userProfile already exists in the database
    public function checkUserProfile($conn, $name) {
        $name = $conn->real_escape_string($name);

        $stmt = $conn->prepare("
        SELECT userProfileId FROM userprofile
        WHERE name = ?
        ");
        $stmt->bind_param("s", $name);
        if(!$stmt->execute()) {
            $stmt = null;
            echo "stmt failed";
            exit();
        }

        $resultCheck;
        if($stmt->rowCount() > 0) {
            $resultCheck = false;
        }
        else {
            $resultCheck = true;
        }

        return $resultCheck;
    }

    // function to create user profile
    public function create($conn, $name, $description, $role) {
        $name = $conn->real_escape_string($name);
        $description = $conn->real_escape_string($description);
        $role = $conn->real_escape_string($role);

        $stmt = $conn->prepare("
        INSERT INTO userprofile (name, description, role
        VALUES (?, ?, ?)
        ");
        $stmt->bind_param("sss", $name, $description, $role);
        if(!$stmt->execute()) {
            $stmt = null;
            echo "stmt failed";
            exit();
        }

        $stmt = null;
        // should return status code according to use case description?
    }
}
?>
