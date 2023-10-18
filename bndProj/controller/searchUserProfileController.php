<?php

class SearchUserProfileController extends UserProfile
{
    public static function searchUserProfile($name) {
        $profile = new UserProfile();
        $profile->set_profileName($name);

        $error = $profile->searchProfile();
        return $error;
    }
}

?>