<?php

class UpdateUserProfileController extends UserProfileClass
{
    public static function updateUserProfile($name, $description, $role) 
    {
        $profile = new UserProfileClass();
        $profile->set_name($name);
        $profile->set_description($description);
        $profile->set_role($role);

        $error = $profile->updateProfile();
        return $error;
    }
}
?>