<?php
 
namespace App;
 
/**
 * PHP SQLite Insert Demo
 */
class SQLiteInsert {
 
    /**
     * PDO object
     * @var \PDO
     */
    private $pdo;
 
    /**
     * Initialize the object with a specified PDO object
     * @param \PDO $pdo
     */
    public function __construct($pdo) {
        $this->pdo = $pdo;
    } 

    public function insertTask($TransactionType,$TransID,$TransTime,$TransAmount,$BusinessShortCode,$BillRefNumber,
        $OrgAccountBalance,$MSISDN,$FirstName,$MiddleName,$LastName) {
        $sql = 'INSERT INTO mobile_payments(TransactionType,TransID,TransTime,TransAmount,BusinessShortCode,BillRefNumber,OrgAccountBalance,MSISDN,FirstName,MiddleName,LastName) '
                . 'VALUES(:TransactionType,:TransID,:TransTime,:TransAmount,:BusinessShortCode,:BillRefNumber,:OrgAccountBalance,:MSISDN,:FirstName,:MiddleName,:LastName)';
 
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            ':TransactionType' => $TransactionType,
            ':TransID' => $TransID,
            ':TransTime' => $TransTime,
            ':TransAmount' => $TransAmount,
            ':BusinessShortCode' => $BusinessShortCode,
            ':BillRefNumber' => $BillRefNumber,
            //':InvoiceNumber' => $InvoiceNumber,
            ':OrgAccountBalance' => $OrgAccountBalance,
            //':ThirdPartyTransID' => $ThirdPartyTransID,
            ':MSISDN' => $MSISDN,
            ':FirstName' => $FirstName,
            ':MiddleName' => $MiddleName,
            ':LastName' => $LastName,
        ]);
    }
 
}