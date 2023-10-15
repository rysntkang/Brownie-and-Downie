<?php

class DB 
{
    public function connectDB() 
    {
        $host = "localhost";
        $dbname = "test_db";
        $username = "root";
        $password = "";

        $mysqli = new mysqli(hostname: $host,
                             username: $username,
                             password: $password,
                             database: $dbname);

        if ($mysqli->connect_error) {
            die("Connection Error: " . $mysqli->connect_error);
        }

        return $mysqli;
    }
}
?>