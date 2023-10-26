<?php

class SearchByIdUserProfileController extends UserProfileClass
{
    public static function searchByIdUserProfile($userProfileId) {
        $profile = new UserProfileClass();
        $profile->set_userProfileId($userProfileId);

        $error = $profile->searchById();
        return $error;
    }
}

?>