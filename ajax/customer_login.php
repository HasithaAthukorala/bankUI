<?php
/**
 * Created by PhpStorm.
 * User: hasitha
 * Date: 11/23/18
 * Time: 8:06 PM
 */
include_once '../class/Customer.php';

$customer = new Customer();

if(!empty($_POST))
{
    $customer_data = $_POST;

    $username = $customer_data['username'];
    $password = $customer_data['password'];

    $result = $customer->userLogin($username,$password);

    echo $result;


}