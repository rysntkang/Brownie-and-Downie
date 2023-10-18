<?php

class SearchUserProfileController extends UserClass
{
    public static function searchUser($username) {
        $user = new UserClass();
        $user->set_username($username);

        $error = $user->searchProfile();
        return $error;
    }
}

?>