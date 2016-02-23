<?php
$request = xmlrpc_encode_request("coap.unregisterAction", intval(array($_GET['id'])));
	
$context = stream_context_create(array('http' => array(
    'method' => "POST",
    'header' => "Content-Type: text/xml",
    'content' => $request
)));

$file = file_get_contents("http://localhost:8008", false, $context);

$response = xmlrpc_decode($file);

if($response)
	Header("Location: index.php?dropStatus=success");
else
	Header("Location: index.php?dropStatus=error");
?>