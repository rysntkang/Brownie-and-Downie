<?php
include "dbConnection.php";
include "entities/userEntity.php";
include "controller/loginController.php";

Class LoginTestValidOwner extends \PHPUnit\Framework\TestCase {
    public function testValidOwnerLogin()
    {   
        $username = 'owner';
        $password = 'owner';

        $login = new LoginController();
        $result = $login->loginUser($username, $password);

        $this->assertEquals('Success', $result);
    }
}
?>
