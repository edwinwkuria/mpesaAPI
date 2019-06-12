<?php

header("Content-Type: application/json");
$response = '{
	"ResultCode": 0,
	"ResultDesc": "Confirmation Received Successfully"
	}';

	//DATA
	$MpesaResponse= file_get_contents('php://input');

	//Logging the response
	$LogFile= "ValidationResponse.txt";
	$JsonMpesaResponse = json_decode($MpesaResponse, true);

	//write to file
	$log =fopen($LogFile, "a");
	fwrite($log, $MpesaResponse);
	fclose($log);

	echo $response;
	?>