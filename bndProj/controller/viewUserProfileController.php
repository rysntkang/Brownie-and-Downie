<?php

class ViewUserProfileController extends UserProfileClass
{
    public function viewUserProfile()
    {
        $array;
        $array = $this->viewProfile();

        return $array;
    }
}
?>