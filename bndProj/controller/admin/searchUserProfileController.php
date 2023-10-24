<?php

class SearchUserProfileController extends UserProfileClass
{
    public static function searchUserProfile($userProfileIdOrName) {
        $profile = new UserProfileClass();
        $profile->set_userProfileId($userProfileIdOrName);
        $profile->set_profileName($userProfileIdOrName);

        $error = $profile->search();
        return $error;
    }
}

?>