<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $db_name = "bad_db";
    $conn = new mysqli($servername, $username, $password, $db_name);

    if ($conn->connect_error) {
        die("Connection Error: " . $mysqli->connect_error);
    }
?>