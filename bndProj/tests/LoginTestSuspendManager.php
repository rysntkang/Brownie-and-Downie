<?php
include "dbConnection.php";
include "entities/userEntity.php";
include "controller/loginController.php";

Class LoginTestSuspendManager extends \PHPUnit\Framework\TestCase {
    public function testSuspendManagerLogin()
    {
        $username = 'ChrisYin';
        $password = 'ChrisYin';
        
        $login = new LoginController();
        $result = $login->loginUser($username, $password);
        
        $this->assertEquals('User has been suspended!', $result);
    }
}
?>
