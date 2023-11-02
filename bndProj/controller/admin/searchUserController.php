<?php

class SearchUserController extends UserEntity
{
    public function searchUser($userIdOrName) {
        $user = new UserEntity();
        $user->set_username($userIdOrName);
        $user->set_userId($userIdOrName);

        $error = $user->search();
        return $error;
    }
}

?>
