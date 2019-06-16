<?php
/*Access token */
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

/*Variables*/
//$CommandID ='';
$Initiator ='apiop29';
$SecurityCredential ='Da3LRsYbY0g/2aj6nY08fF3IOD5G3Q9yCB79HulmbrSTJNxe3hd9BQisCgsHI7s9Xkx5b6cQBgGPa8LOi7xbXDhBMiOnV3NaWcALjqioUMIlc1QtV1LNguJlC+RTY0eCNM9gTAkaXuqaAwXFkI2VO/dmDSZNnPR802Pddh1kUJHOlRf6MY8EHlRLygVdmSxxrDVJkDrR7p1Dv8dw7fJGMSYhexUzLaWWr2dR4ne4hUBx3EWhq9cytMQGVSboVaKRlpOFPAWMa/0gV5iZ1i34uZy+lXea3Zy7+n5QX0uu6DxoJSY23SGmGt/PbyzNO5BZeIvKNcRc0V/Q+ZoTsJtylg==';
$CommandID ='AccountBalance';
$PartyA ='603038';
$IdentifierType ='4';
$Remarks ='Balance';
$QueueTimeOutURL ='https://old-falcon-21.localtunnel.me/mpesaAPI/balancecallback.php';
$ResultURL ='https://old-falcon-21.localtunnel.me/mpesaAPI/balancecallback.php';

/*Main function*/
$balance_url = 'https://sandbox.safaricom.co.ke/mpesa/accountbalance/v1/query';

$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, $balance_url);
$TokenHeader = ['Content-Type:application/json','Authorization:Bearer '.$accesstoken];
curl_setopt($curl, CURLOPT_HTTPHEADER, $TokenHeader); //setting custom header


$curl_post_data = array(
  //Fill in the request parameters with valid values
  //'CommandID' => $CommandID,
  'Initiator' => $Initiator,
  'SecurityCredential' => $SecurityCredential,
  'CommandID' => $CommandID,
  'PartyA' => $PartyA,
  'IdentifierType' => $IdentifierType,
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