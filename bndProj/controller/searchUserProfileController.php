<?php

class SearchUserProfileController extends UserProfileClass
{
    public static function searchUserProfile($name) {
        $profile = new UserProfileClass();
        $profile->set_profileName($name);

        $error = $profile->search();
        return $error;
    }
}

?>