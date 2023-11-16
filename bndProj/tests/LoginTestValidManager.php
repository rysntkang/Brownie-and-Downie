<?php
include "dbConnection.php";
include "entities/userEntity.php";
include "controller/loginController.php";

Class LoginTestValidManager extends \PHPUnit\Framework\TestCase {
    public function testValidManagerLogin()
    {   
        $username = 'manager';
        $password = 'manager';

        $login = new LoginController();
        $result = $login->loginUser($username, $password);

        $this->assertEquals('Success', $result);
    }
}
?>
