<?php

class ViewUserController extends UserClass
{
    public static function viewUser()
    {
        $user = new UserClass();
        $array = $user->view();

        return $array;
    }
}
?>