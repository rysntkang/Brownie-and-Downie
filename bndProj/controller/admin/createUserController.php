<?php
    
class CreateUserController extends UserEntity
{

    public function createUser($username, $firstName, $lastName, $address, $mobileNumber, $password, $userProfileId, $activated) {
        $user = new UserEntity();
        $user->set_username($username);
        $user->set_firstName($firstName);
        $user->set_lastName($lastName);
        $user->set_address($address);
        $user->set_mobileNumber($mobileNumber);
        $user->set_password($password);
        $user->set_userProfileId($userProfileId);
        $user->set_activated($activated);

        $error = $user->create();
        return $error;
    }
}
?>