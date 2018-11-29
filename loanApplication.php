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
    $branches = $bank->getAllBranches();
    $customerAccounts = array();
    $customerAccounts = $customer->fetchAllAccounts($customer_id);
    $id = $_SESSION['id'];
    $guarantors = array();
    $guarantors = $bank->getAllCustomers();
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
    <title>Loan Application</title>
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
                    Loan Application
                </div>
                <div class="panel-body">
                    <div class="panel-body">
                        <div class="form">
                            <form class="form-horizontal" id="transferForm" method="post" action="ajax/submit_loan_application.php" >
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
                                    <label for="cus_account" class="control-label col-lg-3">Guarantor</label>
                                    <div class="col-lg-6">
                                        <select class="selectpicker" data-live-search="true" id="guarantor" name="guarantor">
                                            <option value="" hidden>Select guarantor</option>
                                            <?php
                                            foreach ($guarantors as $guarantor) {
                                                $account_num = $guarantor['CustomerId'];
                                                echo "<option value='{$account_num}'>$account_num</option>";
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <label for="account_number" class="control-label col-lg-3">Purpose</label>
                                    <div class="col-lg-6">
                                        <input class=" form-control" id="purpose" name="purpose" type="text" placeholder="Purpose for the loan" required/>
                                    </div>
                                </div>

                                <div class="form-group ">
                                    <label for="source_of_funds" class="control-label col-lg-3">Source of funds</label>
                                    <div class="col-lg-6">
                                        <input class=" form-control" id="source_of_funds" name="source_of_funds" type="text" placeholder="Source of funds"/>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <label for="collateral_type" class="control-label col-lg-3">Collateral type</label>
                                    <div class="col-lg-6">
                                        <input class=" form-control" id="collateral_type" name="collateral_type" type="text" placeholder="Collateral type"/>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <label for="collateral_notes" class="control-label col-lg-3">Collateral notes</label>
                                    <div class="col-lg-6">
                                        <input class=" form-control" id="collateral_notes" name="collateral_notes" type="text" placeholder="Collateral notes"/>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <label for="loan_amount" class="control-label col-lg-3">Loan amount</label>
                                    <div class="col-lg-6">
                                        <input class=" form-control" id="loan_amount" name="loan_amount" type="text" placeholder="Loan Amount"/>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <label for="loan_type" class="control-label col-lg-3">Loan type</label>
                                    <div class="col-lg-6">
                                        <select class="selectpicker" data-live-search="true" id="loan_type" name="loan_type">
                                            <option value="" hidden>Select loan type</option>
                                            <option value='1'>1</option>
                                            <option value='2'>2</option>
                                            <option value='3'>3</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <div class="col-lg-6">
                                        <?php
                                        echo "<input class=\" form-control\" id=\"customer_id\" name=\"customer_id\" type=\"hidden\" placeholder=\"Purpose for the loan\" value=\"{$customer_id}\" h/>";
                                        ?>

                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-lg-offset-3 col-lg-6">
                                        <button class="btn btn-primary" type="submit" id="add_product">Send application</button>
                                        <!--                                            <button class="btn btn-default" type="button">Reset</button>-->
                                    </div>
                                </div>
                                <?php
                                if($showMessage){
                                    if($result == 1) {
                                        echo "<div class=\"form-group\"><div class=\"col-lg-offset-3 col-lg-6\"><div><font color='#008b8b'>Sent successfuly</font</div></div></div>";
                                    }else{
                                        echo "<div class=\"form-group\"><div class=\"col-lg-offset-3 col-lg-6\"><div><font color='#ff7f50'>Sending failed</font></div></div></div>";
                                    }
                                }
                                ?>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


</body>
</html>
