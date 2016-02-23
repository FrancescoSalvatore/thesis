<?php
class LoginManager
{
	function __construct()
	{
		session_start();
	}
	
	function isLoggedIn()
	{
		if($_SESSION['userID'])
			return true;
		else
			return false;
	}
	
	function loginCreate($userID)
	{
		$_SESSION['userID'] = $userID;
	}
	
	function getUserId()
	{
		return $_SESSION['userID'];
	}
	
	function logout()
	{
		session_destroy();
	}
}
?>