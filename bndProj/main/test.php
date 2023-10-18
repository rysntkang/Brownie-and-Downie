<?php
session_start();
require "../controller/createUserProfileController.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // pass values
    $userprofilename = $_POST["profileName"];
    $description = $_POST["description"];
    $role = $_POST["role"];
    echo $userprofilename;
    echo $description;
    echo $role;
    
    $userProfile = new createUserProfileController($userprofilename, $description, $role);
    $userProfile->createUser();
    // $result = CreateUserProfileController::createUserProfile($conn, $userprofilename, $description, $role);
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
        Profile Name    : <input type="text" name="profileName">
        <br>
        Description     :<input type="text" name="description">
        <br>
        Role            :<input type="text" name="role">
        <br>
        <input type="submit">
    </form>
    <br><br>

</body>
</html>