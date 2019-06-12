<?php
 
require 'vendor/autoload.php';
 
use App\SQLiteConnection;
use App\SQLiteInsert;
 try{

$pdo = (new SQLiteConnection())->connect();
$sqlite = new SQLiteInsert($pdo);
$TransID = 'NGHS25';
$sqlite->insertTask("Paybill", $TransID, 20190123132325, 500, 576432, "B14/456/2019",5674.00,254715081317,"john", "j","doe");

}
catch(PDOException $e) {
  echo 'Message: ' .$e->getMessage();
}
    ?>