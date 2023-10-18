<?php

class SuspendUserProfileController extends UserProfileClass
{
    public static function suspendUserProfile($userProfileId)
    {
        $profile = new UserProfileClass();
        $profile->set_userProfileId($userProfileId);

        $error = $profile->suspendProfile();
        return $error;
    }
}

?>