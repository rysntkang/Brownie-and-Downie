<?php
require_once("config.php");
session_start();

unset($_SESSION['userId']);
unset($_SESSION['username']);
unset($_SESSION['userProfileId']);
session_destroy();

redirect("main/loginBoundary.php");
exit();
?>
