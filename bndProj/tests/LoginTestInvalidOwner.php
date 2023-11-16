<?php
include "dbConnection.php";
include "entities/userEntity.php";
include "controller/loginController.php";

Class LoginTestInvalidOwner extends \PHPUnit\Framework\TestCase {
    public function testInvalidOwnerLogin()
    {
        $username = 'owner';
        $password = 'wrongOwner';
        
        $login = new LoginController();
        $result = $login->loginUser($username, $password);
        
        $this->assertEquals('Incorrect username or password!', $result);
    }
}
?>
