<?php

class UpdateUserProfileController extends UserProfileEntity
{
    public function updateUserProfile($userProfileId, $profileName, $description, $role) 
    {
        $profile = new UserProfileEntity();
        $profile->set_userProfileId($userProfileId);
        $profile->set_profileName($profileName);
        $profile->set_description($description);
        $profile->set_role($role);

        $error = $profile->update();
        return $error;
    }
}
?>