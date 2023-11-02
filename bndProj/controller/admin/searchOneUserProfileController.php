<?php

class SearchOneUserProfileController extends UserProfileEntity
{
    public function searchOneUserProfile($userProfileId, $role) {
        $profile = new UserProfileEntity();
        $profile->set_userProfileId($userProfileId);
        $profile->set_role($role);

        $error = $profile->searchOne();
        return $error;
    }
}

?>