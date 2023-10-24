<?php

class SuspendUserController extends UserClass
{
    public static function suspendUser($userId)
    {
        $user = new UserClass();
        $user->set_userId($userId);

        $error = $user->suspend();
        return $error;
    }
}

?>