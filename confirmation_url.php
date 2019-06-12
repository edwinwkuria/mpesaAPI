<?php
require 'vendor/autoload.php';
 
use App\SQLiteConnection;
use App\SQLiteInsert;
header("Content-Type: application/json");
$response = '{
	"ResultCode": 0,
	"ResultDesc": "Confirmation Received Successfully"
	}';

	//DATA
	$MpesaResponse= file_get_contents('php://input');

	//Logging the response
	$LogFile= "MPESAConfirmationResponse.txt";
	$JsonMpesaResponse = json_decode($MpesaResponse, true);

		//write to file
	$log =fopen($LogFile, "a");
	fwrite($log, $MpesaResponse);
	fclose($log);

	//Saving response to the database
	$pdo = (new SQLiteConnection())->connect();
	$sqlite = new SQLiteInsert($pdo);
	$TransactionType = $JsonMpesaResponse['TransactionType'];
	$TransID = $JsonMpesaResponse['TransID'];
	$TransTime = $JsonMpesaResponse['TransTime'];
	$TransAmount = $JsonMpesaResponse['TransAmount'];
	$BusinessShortCode = $JsonMpesaResponse['BusinessShortCode'];
	$BillRefNumber = $JsonMpesaResponse['BillRefNumber'];
	$OrgAccountBalance = $JsonMpesaResponse['OrgAccountBalance'];
	$MSISDN = $JsonMpesaResponse['MSISDN'];
	$FirstName = $JsonMpesaResponse['FirstName'];
	$MiddleName = $JsonMpesaResponse['MiddleName'];
	$LastName = $JsonMpesaResponse['LastName'];
	$sqlite->insertTask($TransactionType, $TransID, $TransTime, $TransAmount, $BusinessShortCode, $BillRefNumber,$OrgAccountBalance,$MSISDN,$FirstName, $MiddleName,$LastName);

	echo $response;
	?>