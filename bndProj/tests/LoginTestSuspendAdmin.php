<?php
include "dbConnection.php";
include "entities/userEntity.php";
include "controller/loginController.php";

Class LoginTestSuspendAdmin extends \PHPUnit\Framework\TestCase {
    public function testSuspendAdminLogin()
    {
        $username = 'admin2';
        $password = 'admin2';
        
        $login = new LoginController();
        $result = $login->loginUser($username, $password);
        
        $this->assertEquals('User has been suspended!', $result);
    }
}
?>
