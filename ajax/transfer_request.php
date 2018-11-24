<?php
/**
 * Created by PhpStorm.
 * User: hasitha
 * Date: 11/25/18
 * Time: 1:07 AM
 */
include_once '../class/Bank.php';

$bank = new Bank();

if(!empty($_POST))
{
    $request_data = $_POST;

    $account_number = $request_data['account_number'];
    $confirm_account_number = $request_data['confirm_account_number'];
    $branch = $request_data['branch'];
    $amount = $request_data['amount'];

    $result = $customer->userLogin($username,$password);

    echo $result;


}