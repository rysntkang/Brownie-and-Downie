<?php
include "dbConnection.php";
include "entities/userEntity.php";
include "controller/loginController.php";

Class LoginTestValidAdmin extends \PHPUnit\Framework\TestCase {
    public function testValidAdminLogin()
    {   
        $username = 'admin';
        $password = 'admin';

        $login = new LoginController();
        $result = $login->loginUser($username, $password);

        $this->assertEquals('Success', $result);
    }
}
?>
