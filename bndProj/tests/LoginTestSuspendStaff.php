<?php
include "dbConnection.php";
include "entities/userEntity.php";
include "controller/loginController.php";

Class LoginTestSuspendStaff extends \PHPUnit\Framework\TestCase {
    public function testSuspendStaffLogin()
    {
        $username = 'JaysonShaw';
        $password = 'JaysonShaw';
        
        $login = new LoginController();
        $result = $login->loginUser($username, $password);
        
        $this->assertEquals('User has been suspended!', $result);
    }
}
?>
