<?php

class ViewUserProfileController extends UserProfileEntity
{
    public function viewUserProfile()
    {
        $profile = new UserProfileEntity();
        $array = $profile->view();

        return $array;
    }
}
?>