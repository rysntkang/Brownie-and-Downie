<?php
require_once("config.php");
session_start();

unset($_SESSION['uid']);
session_destroy();

redirect("index.php");
exit();
?>
