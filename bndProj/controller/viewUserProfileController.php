<?php

class ViewUserProfileController extends UserProfile
{
    public function viewUserProfile()
    {
        $array;
        $array = $this->viewProfile();

        return $array;
    }
}
?>