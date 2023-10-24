<?php

class SearchUserController extends UserClass
{
    public static function searchUser($userIdOrName) {
        $user = new UserClass();
        $user->set_username($userIdOrName);
        $user->set_userId($userIdOrName);

        $error = $user->search();
        return $error;
    }
}

?>
