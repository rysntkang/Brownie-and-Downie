<?php

class ViewUserController extends UserClass
{
    public function viewUser()
    {
        $array;
        $array = $this->view();

        return $array;
    }
}
?>