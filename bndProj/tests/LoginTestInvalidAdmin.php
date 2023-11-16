<?php
include "dbConnection.php";
include "entities/userEntity.php";
include "controller/loginController.php";

Class LoginTestInvalidAdmin extends \PHPUnit\Framework\TestCase {
    public function testInvalidAdminLogin()
    {
        $username = 'admin';
        $password = 'wrongAdmin';
        
        $login = new LoginController();
        $result = $login->loginUser($username, $password);
        
        $this->assertEquals('Incorrect username or password!', $result);
    }
}
?>
