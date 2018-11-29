<?php
/**
 * Created by PhpStorm.
 * User: hasitha
 * Date: 11/28/18
 * Time: 11:39 PM
 */

include_once '../class/Customer.php';

$customer = new Customer();

if(!empty($_POST))
{
    $request_data = $_POST;

    $from_account = $request_data['account'];
    $branch = $request_data['branch'];
    $amount = $request_data['transaction_amount'];

    $result = $customer->transferATMRequest($from_account,$branch,$amount);


    if ($result==1){

        header('Location:../ATMtranfer.php?output=1');
        exit();
    }else{
        header('Location:../ATMtranfer.php?output=0');
        exit();
    }


}