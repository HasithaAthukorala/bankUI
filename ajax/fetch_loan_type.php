<?php
/**
 * Created by PhpStorm.
 * User: hasitha
 * Date: 11/28/18
 * Time: 6:48 PM
 */

include_once '../class/Customer.php';

$customer = new Customer();

if(!empty($_POST))
{
    $request_data = $_POST;

    $customer_id = $_SESSION['customer_id'];

    $result = $customer->fetchAllTransactions($customer_id);

    echo $result;


}