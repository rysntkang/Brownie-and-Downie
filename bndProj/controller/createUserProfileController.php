<?php

class CreateUserProfileController extends UserProfileClass
{
    public static function createUserProfile($name, $description, $role) {
        $profile = new UserProfileClass();
        $profile->set_profileName($name);
        $profile->set_description($description);
        $profile->set_role($role);

        $error = $profile->create();
        return $error;
    }
}
?>