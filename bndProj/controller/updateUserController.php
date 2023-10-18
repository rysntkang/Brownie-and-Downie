<?php

class UpdateUserController extends UserClass
{
    public static function updateUser($firstName, $lastName, $address, $mobileNumber) 
    {
        $user = new UserClass();
        $user->set_firstName($firstName);
        $user->set_lastName($lastName);
        $user->set_address($address);
        $user->set_mobileNumber($mobileNumber);

        $error = $user->update();
        return $error;
    }
}
?>