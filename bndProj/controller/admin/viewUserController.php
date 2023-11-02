<?php

class ViewUserController extends UserEntity
{
    public function viewUser()
    {
        $user = new UserEntity();
        $array = $user->view();

        return $array;
    }
}
?>