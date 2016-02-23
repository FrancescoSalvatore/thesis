<?php 
class DatabaseManager
{
	private $connectionString = "mysql:host=localhost;dbname=coap";
	private $db = null;
	
	function __construct()
	{
		$this->db = new PDO($this->connectionString, "root", "");
	}
	
	function getActions()
	{
		$query = $this->db->prepare("SELECT * FROM action");
		$query->execute();
		return $query->fetchAll();
	}
	
	function getConnectors()
	{
		$query = $this->db->prepare("SELECT * FROM user_connection");
		$query->execute();
		$temp = $query->fetchAll();
		foreach($temp as $key => $value)
		{
			$security_token = explode(',', $value["ConnectionInfo"]);
			$temp[$key]["ConsumerKey"] = $security_token[0];
			$temp[$key]["ConsumerSecret"] = $security_token[1];
			$temp[$key]["AccessToken"] = $security_token[2];
			$temp[$key]["AccessTokenSecret"] = $security_token[3];
		}
		return $temp;
	}
	
	function getConnectorTypeNameById($id)
	{
		$query = $this->db->prepare("SELECT * FROM connector WHERE ConnectorID = ?");
		$query->execute(array($id));
		$data = $query->fetch();
		return $data["ConnectorName"];
	}
	
	function getConnectorTypes()
	{
		$query = $this->db->prepare("SELECT * FROM connector");
		$query->execute();
		return $query->fetchAll();
	}
	
	function addConnector($userID, $connectorID, $name, $consumer_key, $consumer_secret, $access_token, $access_token_secret)
	{
		$query = $this->db->prepare("INSERT INTO user_connection (UserID, ConnectorID, ConnectionInfo, ConnectionName) VALUES (?, ?, ?, ?)");
		$connectionInfo = $consumer_key.",".$consumer_secret.",".$access_token.",".$access_token_secret;
		return $query->execute(array($userID, $connectorID, $connectionInfo, $name));
	}
	
	function checkLogin($username, $password)
	{
		$query = $this->db->prepare("SELECT * FROM user WHERE Email = ?");
		$query->execute(array($username));
		if($query->rowCount() == 0)
			return false;
		$data = $query->fetch();
		if($data["Password"] == $password)
			return true;
		else
			return false;
	}
	
	function getUserIdFromEmail($email)
	{
		$query = $this->db->prepare("SELECT UserID FROM user WHERE Email = ?");
		$query->execute(array($email));
		$data = $query->fetch();
		return $data["UserID"];
	}
	
	function getEmailFromUserId($userId)
	{
		$query = $this->db->prepare("SELECT Email FROM user WHERE UserID = ?");
		$query->execute(array($userId));
		$data = $query->fetch();
		return $data["Email"];
	}
	
	
}
 ?>