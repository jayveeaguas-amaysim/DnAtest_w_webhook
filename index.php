<?php

$method = $_SERVER['REQUEST_METHOD'];

// Process only when method is POST
if($method == "POST"){
	$requestBody = file_get_contents('php://input');
	$json = json_decode($requestBody);

	$text = $json->result->parameters->text;

	switch ($text) {
		case "hi":
			$speech = "Hiya too";
			break;

		case "bye":
			$speech = "bye too";
			break;

		case "anything":
			$speech = "anything can be done!";
			break;

		default:
			$speech = "What did you say?";
			break;
	}

	$response = new \stdClass();
	$response->speech = "";
	$response->displayText = "";
	$response->source = "webhook";
	echo json_encode($response);
}
else
{
	echo "method not allowed";
}

?>