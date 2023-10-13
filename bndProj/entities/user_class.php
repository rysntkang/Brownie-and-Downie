<?php

require("db_class.php");

class User extends DB 
{
    public function login($username, $password)
    {
        $conn = $this->connectDb();
        $sql = "SELECT * FROM user WHERE username = '$username' AND password = '$password'";
        $result = $conn->query($sql);
        $user = $result->fetch_assoc();

        return $user;
    }
}
?>