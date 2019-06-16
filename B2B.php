<?php
/*Acces token creation*/
  $ConsumerKey = 'r8ETDeIBtREQPluI8Hj788iuweGSZa2R';
  $ConsumerSecret = 'hoQQiDpRxykiAgNb';

  $Headers =['Content-Type:application/json; charset=utf8'];

  $access_url = 'https://sandbox.safaricom.co.ke/oauth/v1/generate?grant_type=client_credentials';

  $curl = curl_init($access_url);
  curl_setopt($curl, CURLOPT_HTTPHEADER, $Headers);
  curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
  curl_setopt($curl, CURLOPT_HEADER, FALSE);
  curl_setopt($curl, CURLOPT_USERPWD, $ConsumerKey.":".$ConsumerSecret);

  $result = curl_exec($curl);
  $status = curl_getinfo($curl, CURLINFO_HTTP_CODE);
  $Result = json_decode($result);
  $accesstoken = $Result->access_token;
  echo $accesstoken;
/*Variables*/

$Initiator ='apiop29';
$SecurityCredential ='gm51Og+gFronTuNDb8Muc2cw3uBULDT/VfeTxYOwRzON01PHjnVAtUP/RZRN0xruCmCkPwbVGFNZnG68Or/FU3P6Gd0uzSv2Da7+bOANHK4d+I9RFREoXEFfxyta0a/o4ONTifaQbHaEYYfke1V6yD79AFa5ZM3DBJR3FR6F83D3nCvscxvV6QKNqKNS/+eAHsPRQuWDshX0W24NnYle0EUaZK2gD48HT8drOuOYJc9uHwXfkNItfHDJ43VvASW6BFAL1pj6JqoYD0Vmrev4B3GPQmThZWqE7ZnGPQUaucuwrN1v7A1DuD/j4qq+H+yGFV/yKyJ44kBHDeiJJEBVLw==';
$CommandID ='BusinessPayBill';
$SenderIdentifierType ='4';
$RecieverIdentifierType ='4';
$Amount ='1559';
$PartyA ='603038';
$PartyB ='600000';
$AccountReference ='SettlingBill';
$Remarks ='Lunch Bill';
$QueueTimeOutURL ='https://fuzzy-puma-25.localtunnel.me/mpesaAPI/b2bcallback.php';
$ResultURL ='https://fuzzy-puma-25.localtunnel.me/mpesaAPI/b2bcallback.php';


/*Main Function*/
$b2b_url = 'https://sandbox.safaricom.co.ke/mpesa/b2b/v1/paymentrequest';
$b2bHeader =['Content-Type:application/json','Authorization:Bearer AR8HHAMU3bBDcBXsHs74WTSNCjVh'];
$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, $b2b_url);
curl_setopt($curl, CURLOPT_HTTPHEADER, $b2bHeader); //setting custom header


$curl_post_data = array(
  //Fill in the request parameters with valid values
  'Initiator' => $Initiator,
  'SecurityCredential' => $SecurityCredential,
  'CommandID' => $CommandID,
  'SenderIdentifierType' => $SenderIdentifierType,
  'RecieverIdentifierType' => $RecieverIdentifierType,
  'Amount' => $Amount,
  'PartyA' => $PartyA,
  'PartyB' => $PartyB,
  'AccountReference' => $AccountReference,
  'Remarks' => $Remarks,
  'QueueTimeOutURL' => $QueueTimeOutURL,
  'ResultURL' => $ResultURL
);

$data_string = json_encode($curl_post_data);

curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_POSTFIELDS, $data_string);

$curl_response = curl_exec($curl);
print_r($curl_response);

echo $curl_response;
?>