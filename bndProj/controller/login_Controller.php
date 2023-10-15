<?php
require("../entities/user_Class.php");

class loginController {
    public static function loginController($conn, $username, $password) {
        $username = $conn->real_escape_string($username);
        $password = $conn->real_escape_string($password);

        $user = User::login($conn, $username, $password);

        return $user;
    }
}
?>