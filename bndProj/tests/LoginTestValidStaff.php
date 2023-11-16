<?php
include "dbConnection.php";
include "entities/userEntity.php";
include "controller/loginController.php";

Class LoginTestValidStaff extends \PHPUnit\Framework\TestCase {
    public function testValidStaffLogin()
    {   
        $username = 'KurtTay';
        $password = 'KurtTay';

        $login = new LoginController();
        $result = $login->loginUser($username, $password);

        $this->assertEquals('Success', $result);
    }
}
?>
