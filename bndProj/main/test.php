<?php
require "../dbConnection.php";
require "../entities/userClass.php";
require "../controller/createUserController.php";

if(isset($_POST["submit"]))
{
    // pass values
    $username = $_POST["username"];
    $firstName = $_POST["firstName"];
    $lastName = $_POST["lastName"];
    $address = $_POST["address"];
    $mobileNumber = $_POST["mobileNumber"];
    $password = $_POST["password"];
    $profileId = $_POST["profileId"];
    
    $error = CreateUserController::createUser($username, $firstName, $lastName, $address, $mobileNumber, $password, $profileId);

    echo "<script>alert('$error');</script>";
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <form action="test.php" method="post">
        username        : <input type="text" name="username">
        <br>
        first name      :<input type="text" name="firstName">
        <br>
        last name       :<input type="text" name="lastName">
        <br>
        address    : <input type="text" name="address">
        <br>
        mobile number    : <input type="text" name="mobileNumber">
        <br>
        password   : <input type="text" name="password">
        <br>
        Profile    : <input type="text" name="profileId">
        <br>
        <input type="submit" name="submit">
    </form>
    <br><br>

</body>
</html>