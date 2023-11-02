<?php

class SuspendUserProfileController extends UserProfileEntity
{
    public function suspendUserProfile($userProfileId)
    {
        $profile = new UserProfileEntity();
        $profile->set_userProfileId($userProfileId);

        $error = $profile->suspend();
        return $error;
    }
}

?>