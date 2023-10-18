<?php

class UpdateUserProfileController extends UserProfile
{
    public static function updateUserProfile($name, $description, $role) 
    {
        $profile = new UserProfile();
        $profile->set_name($name);
        $profile->set_description($description);
        $profile->set_role($role);

        $error = $profile->updateProfile();
        return $error;
    }
}
?>