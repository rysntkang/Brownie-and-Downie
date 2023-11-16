<?php
include "dbConnection.php";
include "entities/userEntity.php";
include "controller/loginController.php";

Class LoginTestInvalidManager extends \PHPUnit\Framework\TestCase {
    public function testInvalidManagerLogin()
    {
        $username = 'manager';
        $password = 'wrongManager';
        
        $login = new LoginController();
        $result = $login->loginUser($username, $password);
        
        $this->assertEquals('Incorrect username or password!', $result);
    }
}
?>
