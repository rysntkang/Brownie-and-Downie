<?php

class ViewUserProfileController extends UserProfileClass
{
    public function viewUserProfile()
    {
        $array;
        $array = $this->view();

        return $array;
    }
}
?>