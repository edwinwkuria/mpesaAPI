<?php 


	$ConsumerKey = 'r8ETDeIBtREQPluI8Hj788iuweGSZa2R';
	$ConsumerSecret = 'hoQQiDpRxykiAgNb';

	$Headers =['Content-Type:application/json; charset=utf8'];

	$url = 'https://sandbox.safaricom.co.ke/oauth/v1/generate?grant_type=client_credentials';

	$curl = curl_init($url);
	curl_setopt($curl, CURLOPT_HTTPHEADER, $Headers);
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
	curl_setopt($curl, CURLOPT_HEADER, FALSE);
	curl_setopt($curl, CURLOPT_USERPWD, $ConsumerKey.":".$ConsumerSecret);

	$result = curl_exec($curl);
	$status = curl_getinfo($curl, CURLINFO_HTTP_CODE);
	$Result = json_decode($result);
	$accesstoken = $Result->access_token;

	echo $accesstoken;
	curl_close($curl);
	?>
