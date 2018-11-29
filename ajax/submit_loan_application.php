<?php
/**
 * Created by PhpStorm.
 * User: hasitha
 * Date: 11/28/18
 * Time: 11:49 PM
 */

include_once '../class/Customer.php';

$customer = new Customer();

if(!empty($_POST))
{
    $request_data = $_POST;

    $account = $request_data['customer_id'];
    $guarantor = $request_data['guarantor'];
    $purpose = $request_data['purpose'];
    $source_of_funds = $request_data['source_of_funds'];
    $collateral_type = $request_data['collateral_type'];
    $collateral_notes = $request_data['collateral_notes'];
    $loan_amount = $request_data['loan_amount'];
    $loan_type = $request_data['loan_type'];

    $result = $customer->submit_loan($guarantor,$purpose,$source_of_funds,$collateral_type,$collateral_notes,'false',$account,$loan_type,$loan_amount);

    if ($result==1){

        header('Location:../loanApplication.php?output=1');
        exit();
    }else{
        header('Location:../loanApplication.php?output=0');
        exit();
    }


}