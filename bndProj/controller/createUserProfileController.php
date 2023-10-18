<?php

class CreateUserProfileController extends UserProfile
{
    public static function createUserProfile($name, $description, $role) {
        $profile = new UserProfile();
        $profile->set_name($name);
        $profile->set_description($description);
        $profile->set_role($role);

        $error = $profile->createProfile();
        return $error;
    }
}
?>