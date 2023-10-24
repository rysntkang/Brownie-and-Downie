<?php

class UpdateUserProfileController extends UserProfileClass
{
    public static function updateUserProfile($userProfileId, $profileName, $description, $role) 
    {
        $profile = new UserProfileClass();
        $profile->set_userProfileId($userProfileId);
        $profile->set_profileName($profileName);
        $profile->set_description($description);
        $profile->set_role($role);

        $error = $profile->update();
        return $error;
    }
}
?>