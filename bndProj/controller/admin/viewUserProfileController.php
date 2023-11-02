<?php

class ViewUserProfileController extends UserProfileEntity
{
    public function viewUserProfile()
    {
        // $array;
        // $array = $this->view();
        $profile = new UserProfileEntity();
        $array = $profile->view();

        return $array;
    }
}
?>