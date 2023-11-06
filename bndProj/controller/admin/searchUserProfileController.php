<?php

class SearchUserProfileController extends UserProfileEntity
{
    public function searchUserProfile($profileName) {
        $profile = new UserProfileEntity();
        $profile->set_profileName($profileName);

        $error = $profile->search();
        return $error;
    }
}

?>