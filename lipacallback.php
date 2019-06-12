<?php

	//DATA
	$CallbackResponse = file_get_contents('php://input');

	//Logging the response
	$LogFile= "LipaResponse.txt";
	//$JsonMpesaResponse = json_decode($MpesaResponse, true);

	//write to file
	$log = fopen($LogFile, "a");
	fwrite($log, $CallbackResponse);
	fclose($log);
	?>