<?php
  $ConsumerKey = '9mUH1u0lp8NnYkSl4ADqD2o3ymq79G6I';
  $ConsumerSecret = '48sHu7ohs6Otyegf';

  $Headers =['Content-Type:application/json; charset=utf8'];

  $access_token_url = 'https://sandbox.safaricom.co.ke/oauth/v1/generate?grant_type=client_credentials';

  $curl = curl_init($access_token_url);
  curl_setopt($curl, CURLOPT_HTTPHEADER, $Headers);
  curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
  curl_setopt($curl, CURLOPT_HEADER, FALSE);
  curl_setopt($curl, CURLOPT_USERPWD, $ConsumerKey.":".$ConsumerSecret);

  $result = curl_exec($curl);
  $status = curl_getinfo($curl, CURLINFO_HTTP_CODE);
  $Result = json_decode($result);
  $accesstoken = $Result->access_token;

  echo $accesstoken;

$lipa_url = 'https://sandbox.safaricom.co.ke/mpesa/stkpush/v1/processrequest';

$BusinessShortCode = '174379';
$Timestamp = date('YmdHis');
$PartyA = '254715081317';
$CallBackURL = 'https://strange-eel-45.localtunnel.me/mpesaAPI/lipacallback.php';
$AccountReference = 'ZOO/2019';
$TransactionDesc = 'Cart Payment';
$Passkey = 'bfb279f9aa9bdbcf158e97dd71a467cd2e0c893059b10f78e6b72ada1ed2c919';
$Password = base64_encode($BusinessShortCode.$Passkey.$Timestamp);
$Amount = '2';

$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, $lipa_url);
$lipa_header =['Content-Type:application/json','Authorization:Bearer '.$accesstoken];
curl_setopt($curl, CURLOPT_HTTPHEADER,$lipa_header); //setting custom header


$curl_post_data = array(
  //Fill in the request parameters with valid values
  'BusinessShortCode' => $BusinessShortCode,
  'Password' => $Password,
  'Timestamp' => $Timestamp,
  'TransactionType' => 'CustomerPayBillOnline',
  'Amount' => $Amount,
  'PartyA' => $PartyA,
  'PartyB' => $BusinessShortCode,
  'PhoneNumber' => $PartyA,
  'CallBackURL' => $CallBackURL,
  'AccountReference' => $AccountReference,
  'TransactionDesc' => $TransactionDesc
);

$data_string = json_encode($curl_post_data);

curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_POSTFIELDS, $data_string);

$curl_response = curl_exec($curl);
print_r($curl_response);

echo $curl_response;
echo $Timestamp;
?>