<?php

class SearchUserProfileController extends UserProfileEntity
{
    public function searchUserProfile($userProfileIdOrName) {
        $profile = new UserProfileEntity();
        $profile->set_userProfileId($userProfileIdOrName);
        $profile->set_profileName($userProfileIdOrName);

        $error = $profile->search();
        return $error;
    }
}

?>