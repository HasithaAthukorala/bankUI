<?php
/**
 * Created by PhpStorm.
 * User: hasitha
 * Date: 11/23/18
 * Time: 7:34 PM
 */
session_start();
include_once 'class/Customer.php';
include_once 'class/Bank.php';
if(!isset($_SESSION['customer_id']))
{
    header('Location:index.php');
    exit();
}else{
    if($_SESSION['role'] == 'employee'){
        header('Location:index.php');
        exit();
    }
    $customer_id = $_SESSION['customer_id'];
    $customer = new Customer();
    $bank = new Bank();
    $branches = array();
    $branches = $bank->getAllAtms();
    $customerAccounts = array();
    $customerAccounts = $customer->fetchAllAccounts($customer_id);
    $id = $_SESSION['id'];
    $allTransactions = array();
    $allTransactions = $customer->fetchAllATMTransactions($customer_id);
//    $customer_det = $customer->fetchCustomer($id);
}

$showMessage = false;

if(!empty($_GET))
{
    $request_data = $_GET;

   $result = $request_data["output"];

   $showMessage = true;

}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login V1</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.3/css/bootstrap-select.min.css" />

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.3/js/bootstrap-select.min.js"></script>

    <script src="vendor/bootstrap-select.min.js"></script>

    <script src="vendor/jquery/jquery-3.2.1.min.js"></script>
    <!--===============================================================================================-->
    <script src="vendor/bootstrap/js/popper.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <!--===============================================================================================-->
    <script src="vendor/select2/select2.min.js"></script>
    <!--===============================================================================================-->
    <script src="vendor/tilt/tilt.jquery.min.js"></script>
    <script>
        $('.js-tilt').tilt({
            scale: 1.1
        })
    </script>
    <script src="vendor/jquery.js"></script>
    <script src="vendor/bootstrap.min.js"></script>
    <script src="vendor/bootstrap-notify/bootstrap-notify.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.26.10/dist/sweetalert2.all.min.js"></script>
    <script type="text/javascript" src="vendor/jquery.validate.min.js"></script>
    <link rel="stylesheet" type="text/css" href="css/dashboard.css">
    <link rel="stylesheet" type="text/css" href="css/temp.css">
    <script type="text/javascript" src="js/dashboard.js"></script>
    <link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="js/transfer.js" type="text/javascript"></script>
    <!--===============================================================================================-->

    <style>
        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        td, th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #dddddd;
        }
    </style>
</head>
<body>
<section id="container" >
    <!------ Include the above in your HEAD tag ---------->
    <?php include_once 'header.php' ?>
    <div class="container-fluid main-container">
        <?php include_once 'sidebar.php' ?>
        <div class="col-md-10 content">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Funds Transfer To Third Party Account
                </div>
                <div class="panel-body">
                    <div class="panel-body">
                        <div class="form">
                            <form class="form-horizontal" id="transferForm" action="ajax/atm_transfer_request.php" method="post" ">
                                <div class="form-group ">
                                    <label for="cus_account" class="control-label col-lg-3">Your Account</label>
                                    <div class="col-lg-6">
                                        <select class="selectpicker" data-live-search="true" id="account" name="account" required>
                                            <option value="" hidden>Select account</option>
                                            <?php
                                            foreach ($customerAccounts as $account) {
                                                $account_num = $account['AccountId'];
                                                echo "<option value='{$account_num}'>$account_num</option>";
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <label for="transaction_amount" class="control-label col-lg-3">Transaction Amount (LKR)</label>
                                    <div class="col-lg-6">
                                        <input class=" form-control" id="transaction_amount" name="transaction_amount" type="text" placeholder="Transaction Amount (LKR)" required/>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <label for="branch" class="control-label col-lg-3">ATM</label>
                                    <div class="col-lg-6">
                                        <select class="selectpicker" data-live-search="true" id="branch" name="branch" required>
                                            <option value="" hidden>Select branch</option>
                                            <?php
                                            foreach ($branches as $branch) {
                                                $branchCode = $branch['ATMId'];
                                                echo "<option value='{$branchCode}'>$branchCode</option>";
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-lg-offset-3 col-lg-6">
                                        <button class="btn btn-primary" id="add_product" type="submit"">Transfer</button>
                                        <!--                                            <button class="btn btn-default" type="button">Reset</button>-->
                                    </div>
                                </div>

                            <?php
                                if($showMessage){
                                    if($result == 1) {
                                        echo "<div class=\"form-group\"><div class=\"col-lg-offset-3 col-lg-6\"><div><font color='#008b8b'>Transaction successful</font></div></div></div>";
                                    }else{
                                        echo "<div class=\"form-group\"><div class=\"col-lg-offset-3 col-lg-6\"><div><font color='#ff7f50'>Transaction failed</font></div></div></div>";
                                    }
                                }
                            ?>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <section class="panel">
                        <header class="panel-heading">
                            All Transactions
                        </header>
                        <div class="panel-body">
                            <div class="adv-table">
                                <table  class="display table table-bordered table-striped" id="transactions-table" width="100%">
                                    <tr>
                                        <th>Id</th>
                                        <th>From</th>
                                        <th>Amount</th>
                                        <th>Timestamp</th>
                                    </tr>
                                    <?php
                                    $x=0;
                                    foreach ($allTransactions as $transaction){
                                        $from = $transaction['fromAccountID'];
                                        $amount = $transaction['Amount'];
                                        $timeStamp = $transaction['TimeStamp'];
                                        $x = $x+1;
                                        echo " <tr>
                                        <td>$x</td>
                                        <td>$from</td>
                                        <td>$amount</td>
                                        <td>$timeStamp</td>
                                    </tr>";
                                    }
                                    ?>
                                </table>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
</section>


</body>
</html>
