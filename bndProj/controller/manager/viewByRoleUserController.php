<?php

class ViewByRoleUserController extends UserEntity
{
    public function viewByRoleUser($userProfileId)
    {
        $user = new UserEntity();
        $user->set_userProfileId($userProfileId);
        $array = $user->viewByRole();

        return $array;
    }
}
?>
