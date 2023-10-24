<?php

class ViewUserProfileController extends UserProfileClass
{
    public static function viewUserProfile()
    {
        // $array;
        // $array = $this->view();
        $profile = new UserProfileClass();
        $array = $profile->view();

        return $array;
    }
}
?>