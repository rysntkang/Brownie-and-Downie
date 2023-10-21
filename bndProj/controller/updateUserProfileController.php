<?php

class UpdateUserProfileController extends UserProfileClass
{
    public static function updateUserProfile($userProfileId, $name, $description, $role) 
    {
        $profile = new UserProfileClass();
        $profile->set_userProfileId($userProfileId);
        $profile->set_name($name);
        $profile->set_description($description);
        $profile->set_role($role);

        $error = $profile->update();
        return $error;
    }
}
?>