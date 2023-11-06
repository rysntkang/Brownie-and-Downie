<?php

class SearchUserController extends UserEntity
{
    public function searchUser($username) {
        $user = new UserEntity();
        $user->set_username($username);

        $error = $user->search();
        return $error;
    }
}

?>
