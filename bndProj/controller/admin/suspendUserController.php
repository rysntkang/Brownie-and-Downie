<?php

class SuspendUserController extends UserEntity
{
    public function suspendUser($userId)
    {
        $user = new UserEntity();
        $user->set_userId($userId);

        $error = $user->suspend();
        return $error;
    }
}

?>