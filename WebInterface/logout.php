<?php
include("class.LoginManager.php");

$LoginManager = new LoginManager();
$LoginManager->logout();

Header("Location: login.php");

?>