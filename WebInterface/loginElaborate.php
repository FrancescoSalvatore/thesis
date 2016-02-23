<?php
include("class.LoginManager.php");
include("class.DatabaseManager.php");
$LoginManager = new LoginManager();
$DatabaseManager = new DatabaseManager();

if($DatabaseManager->checkLogin($_POST['user'], md5($_POST['password'])) == false)
{
	Header("Location: login.php?error=1");
	die();
}


$userID = $DatabaseManager->getUserIdFromEmail($_POST['user']);

$LoginManager->loginCreate($userID);
Header("Location: index.php");
?>