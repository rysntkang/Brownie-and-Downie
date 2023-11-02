<?php
class LoginController extends UserEntity{

    public function loginUser($username, $password) {
        $user = new UserEntity();
        $user->set_username($username);
        $user->set_password($password);

        $error = $user->login();

        return $error;
    }
}
?>