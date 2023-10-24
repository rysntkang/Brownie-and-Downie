<?php

class UpdateUserController extends UserClass
{
    public static function updateUser($userId, $username, $firstName, $lastName, $address, $mobileNumber, $password) 
    {
        $user = new UserClass();
        $user->set_userId($userId);
        $user->set_username($username);
        $user->set_firstName($firstName);
        $user->set_lastName($lastName);
        $user->set_address($address);
        $user->set_mobileNumber($mobileNumber);
        $user->set_password($password);

        $error = $user->update();
        return $error;
    }
}
?>