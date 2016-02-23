<?php
include_once("class.DatabaseManager.php");
include_once("class.LoginManager.php");
$DatabaseManager = new DatabaseManager();
$LoginManager = new LoginManager();

$DatabaseManager->addConnector(
$LoginManager->getUserId(), 
$_POST['connectorType'], 
$_POST['connectorName'], 
$_POST['consumerKey'], 
$_POST['consumerSecret'], 
$_POST['accessToken'], 
$_POST['accessTokenSecret']);

Header("Location: connectors.php");
?>