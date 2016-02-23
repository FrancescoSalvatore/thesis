<?php
if($_POST['eventType'] == "0")
	$request = xmlrpc_encode_request("coap.addAction", array($_POST['actionName'], intval($_POST['connector']), $_POST['resourceURI']));
else
	$request = xmlrpc_encode_request("coap.addAction", array($_POST['actionName'], intval($_POST['connector']), $_POST['resourceURI'], intval($_POST['period'])));
	
$context = stream_context_create(array('http' => array(
    'method' => "POST",
    'header' => "Content-Type: text/xml",
    'content' => $request
)));

$file = file_get_contents("http://localhost:8008", false, $context);

$response = xmlrpc_decode($file);

if($response == "1")
	Header("Location: index.php?addStatus=success");
else
	Header("Location: index.php?addStatus=error");
?>