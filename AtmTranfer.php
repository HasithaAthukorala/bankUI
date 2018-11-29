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
    $customer_id = $_SESSION['customer_id'];
    $customer = new Customer();
    $bank = new Bank();
    $branches = array();
    $branches = $bank->getAllBranches();
    $customerAccounts = array();
    $customerAccounts = $customer->fetchAllAccounts($customer_id);
    $id = $_SESSION['id'];
//    $customer_det = $customer->fetchCustomer($id);

    $showMessage = false;

    if(!empty($_GET))
    {
        $request_data = $_GET;

        $result = $request_data["output"];

        $showMessage = true;

    }
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
<!--    <script src="js/transfer.js" type="text/javascript"></script>-->
    <!--===============================================================================================-->
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
                            <form class="form-horizontal" id="transferForm" action="ajax/atm_transfer_request.php" " >
                                <div class="form-group ">
                                    <label for="cus_account" class="control-label col-lg-3">Your Account</label>
                                    <div class="col-lg-6">
                                        <select class="selectpicker" data-live-search="true" id="account" name="account">
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
                                        <input class=" form-control" id="transaction_amount" name="transaction_amount" type="text" placeholder="Transaction Amount (LKR)"/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-lg-offset-3 col-lg-6">
                                        <button class="btn btn-primary" type="submit" id="add_product">Transfer</button>
                                        <!--                                            <button class="btn btn-default" type="button">Reset</button>-->
                                    </div>
                                </div>
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
                                    <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>From</th>
                                        <th>To</th>
                                        <th>Branch</th>
                                        <th>Amount</th>
                                        <th>Time</th>
                                    </tr>
                                    </thead>

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
