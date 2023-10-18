<?php

class SuspendUserProfileController extends UserProfile
{
    public static function suspendUserProfile($userProfileId)
    {
        $profile = new UserProfile();
        $profile->set_userProfileId($userProfileId);

        $error = $profile->suspendProfile();
        return $error;
    }
}

?>