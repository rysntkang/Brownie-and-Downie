<?php
    
class CreateUserController extends UserEntity
{
    // public static function createUser($name, $description, $role) {
    //     $profile = new UserProfile();
    //     $profile->set_name($name);
    //     $profile->set_description($description);
    //     $profile->set_role($role);

    //     $error = $profile->createProfile();
    //     return $error;
    // }

    public function createUser($username, $firstName, $lastName, $address, $mobileNumber, $password, $userProfileId) {
        $user = new UserEntity();
        $user->set_username($username);
        $user->set_firstName($firstName);
        $user->set_lastName($lastName);
        $user->set_address($address);
        $user->set_mobileNumber($mobileNumber);
        $user->set_password($password);
        $user->set_userProfileId($userProfileId);
        $user->set_activated(1);

        $error = $user->create();
        return $error;
    }
}
?>