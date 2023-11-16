<?php
include "dbConnection.php";
include "entities/userEntity.php";
include "controller/loginController.php";

Class LoginTestInvalidStaff extends \PHPUnit\Framework\TestCase {
    public function testInvalidStaffLogin()
    {
        $username = 'staff';
        $password = 'wrongStaff';
        
        $login = new LoginController();
        $result = $login->loginUser($username, $password);
        
        $this->assertEquals('Incorrect username or password!', $result);
    }
}
?>
