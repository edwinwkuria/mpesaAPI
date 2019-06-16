<?php

	//DATA
	$BalanceResponse = file_get_contents('php://input');
	//Logging the response
	$LogFile = "BalanceResponse.json";
	//$JsonB2BResponse = json_decode($B2BResponse, true);

	//write to file
	$log = fopen($LogFile, "a");
	fwrite($log, $BalanceResponse);
	fclose($log);
