<?php

	//DATA
	$B2BResponse = file_get_contents('php://input')
	//Logging the response
	$LogFile = "B2BResponse.txt";
	//$JsonB2BResponse = json_decode($B2BResponse, true);

	//write to file
	$log = fopen($LogFile, "a");
	fwrite($log, $B2BResponse);
	fclose($log);
