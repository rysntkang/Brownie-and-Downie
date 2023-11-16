<?php
include "dbConnection.php";
include "entities/userEntity.php";
include "controller/loginController.php";

Class LoginTestSuspendOwner extends \PHPUnit\Framework\TestCase {
    public function testSuspendOwnerLogin()
    {
        $username = 'AnnabelleLee';
        $password = 'AnnabelleLee';
        
        $login = new LoginController();
        $result = $login->loginUser($username, $password);
        
        $this->assertEquals('User has been suspended!', $result);
    }
}
?>
