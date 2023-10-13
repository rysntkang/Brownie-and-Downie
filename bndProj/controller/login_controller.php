<?php

require("../entities/user_class.php");

class loginUser extends User
{
    private $username;
    private $password;

    public function __construct($username, $password)
    {
        $this->username = $username;
        $this->password = $password;
    }

    public function loginUser()
    {
        $user = $this->login($this->username, $this->password);

        if ($user)
        {
            echo $user["user_profile"];
        }
        else
        {
            echo "Invalid username or password";
        }
    }
}

?>