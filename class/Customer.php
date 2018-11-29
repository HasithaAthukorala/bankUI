<?php
/**
 * Created by PhpStorm.
 * User: hasitha
 * Date: 11/23/18
 * Time: 7:58 PM
 */

include_once "dbcontroller.php";

class Customer
{
    private $results = array();
    private $dbcontroller = "";

    public function __construct()
    {
        $dbcontroller = new DBController();
        if (!empty($dbcontroller)) {
            $this->dbcontroller = $dbcontroller;
        }
    }

    /*
        you should hookup the DAO here
    */

    public function userLogin($username, $password)
    {
        $username = $this->dbcontroller->connectDB()->real_escape_string($username);
        $password = $this->dbcontroller->connectDB()->real_escape_string($password);
//        $query = "SELECT COUNT(*) AS 'result' FROM UserLogin WHERE EXISTS(SELECT passsword
//             FROM UserLogin
//             WHERE username = '{$username}'
//               AND password = MD5('{$password}')
//               AND role = 'user');";
        $query = "SELECT * FROM `UserLogin` WHERE `username` = '{$username}' AND `passsword` = MD5('{$password}')";
        $this->results = $this->dbcontroller->checkExistance($query);


        return $this->results;
    }

    public function fetchCustomer($userID)
    {
        $userID = $this->dbcontroller->connectDB()->real_escape_string($userID);
//        $query = "SELECT * FROM `UserLogin` WHERE `username` = '{$username}' AND `passsword` = MD5('{$password}')";
//        $this->results = $this->dbcontroller->checkExistance($query);


        return $this->results;
    }

    public function transferRequest($account,$account_num,$branch,$amount){
        $account_num = $this->dbcontroller->connectDB()->real_escape_string($account_num);
        $branch = $this->dbcontroller->connectDB()->real_escape_string($branch);
        $amount = $this->dbcontroller->connectDB()->real_escape_string($amount);
        $query = "CALL creditTransferAccounts('{$account}','{$account_num}','{$branch}',{$amount});";
        $this->results = $this->dbcontroller->getBoolean($query);
        return $this->results;
    }

    public function transferATMRequest($account,$branch,$amount){
        $branch = $this->dbcontroller->connectDB()->real_escape_string($branch);
        $amount = $this->dbcontroller->connectDB()->real_escape_string($amount);
        $query = "CALL atmWithdraw('{$account}','{$branch}',{$amount});";
        $this->results = $this->dbcontroller->getBoolean($query);
        return $this->results;
    }

    public function submit_loan($guarantor,$purpose,$sourceOfFunds,$collateralType,$collateraNotes,$applicationStatus,$customerID,$loanType,$loanAmount){
        $date = date("Y-m-d H:m:s");
        $query = "CALL create_loanApplication 
('{$guarantor}','{$purpose}','{$sourceOfFunds}','{$collateralType}','{$collateraNotes}','{$customerID}','{$loanType}','{$loanAmount}','{$date}','{$date}')";
        $this->results = $this->dbcontroller->getBoolean($query);
        return $this->results;

    }

//    public function atmTransferRequest($account,$branch,$amount){
//        $account_num = $this->dbcontroller->connectDB()->real_escape_string($account_num);
//        $branch = $this->dbcontroller->connectDB()->real_escape_string($branch);
//        $amount = $this->dbcontroller->connectDB()->real_escape_string($amount);
//        $query = "CALL creditTransferAccounts('{$account}','{$account_num}','{$branch}',{$amount});";
//        $this->results = $this->dbcontroller->getBoolean($query);
//        return $this->results;
//    }

    public function fetchAllAccounts($customerID){
        $customerID = $this->dbcontroller->connectDB()->real_escape_string($customerID);
        $query = "SELECT AccountId FROM `Account` WHERE CustomerId = '{$customerID}'";
        $this->results = $this->dbcontroller->executeQuery($query);
        return $this->results;
    }

    public function fetchAllATMTransactions($customerID){
        $customerID = $this->dbcontroller->connectDB()->real_escape_string($customerID);
        $query = "SELECT * FROM `atmTransactionHistoryView` WHERE `fromCustomerId` = '{$customerID}'";
        $this->results = $this->dbcontroller->executeQuery($query);
        return $this->results;
    }

    public function fetchAllTransactions($customerID){
        $customerID = $this->dbcontroller->connectDB()->real_escape_string($customerID);
        $query = "SELECT * FROM `transactionHistoryView` WHERE `fromCustomerId` = '{$customerID}' OR toCustomerId = '{$customerID}'";
        $this->results = $this->dbcontroller->executeQuery($query);
        return $this->results;
    }


}