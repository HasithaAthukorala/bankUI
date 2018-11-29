<?php
/**
 * Created by PhpStorm.
 * User: hasitha
 * Date: 11/23/18
 * Time: 7:34 PM
 */
session_start();
include_once 'class/Employee.php';
if(!isset($_SESSION['customer_id']))
{
    header('Location:index.php');
    exit();
}else{
    if($_SESSION['role'] == 'user'){
        header('Location:index.php');
        exit();
    }
    $employee = new Employee();
    $applications = array();
    $applications = $employee->getAllApplications();
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
    <title>Loan Applications</title>
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
    <script src="js/emp_loan.js" type="text/javascript"></script>
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

                <div class="panel-body">
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-12">
                                <section class="panel">
                                    <header class="panel-heading">
                                        All Applications
                                    </header>
                                    <div class="panel-body">
                                        <div class="adv-table">
                                            <table  class="display table table-bordered table-striped" id="products-table" width="100%">
                                                <tr>
                                                    <th>Id</th>
                                                    <th>Customer id</th>
                                                    <th>Purpose</th>
                                                    <th>Guarantor id</th>
                                                    <th>Source of funds</th>
                                                    <th>Collateral type</th>
                                                    <th>Collateral notes</th>
                                                    <th>Application status</th>
                                                    <th>Loan type</th>
                                                    <th>Loan amount</th>
                                                    <th>Action</th>
                                                </tr>
                                                <?php
                                                $x=0;
                                                foreach ($applications as $transaction){
                                                    $applicationID = $transaction['applicationID'];
                                                    $purpose = $transaction['purpose'];
                                                    $gurrantorID = $transaction['gurrantorID'];
                                                    $sourceOfFunds = $transaction['sourceOfFunds'];
                                                    $collateralType = $transaction['collateralType'];
                                                    $collateraNotes = $transaction['collateraNotes'];
                                                    $applicationStatus = $transaction['applicationStatus'];
                                                    $customerID = $transaction['customerID'];
                                                    $loanType = $transaction['loanType'];
                                                    $loanAmount = $transaction['loanAmount'];
                                                    echo " <tr>
                                        <td>$applicationID</td>
                                        <td>$customerID</td>
                                        <td>$purpose</td>
                                        <td>$gurrantorID</td>
                                        <td>$sourceOfFunds</td>
                                        <td>$collateralType</td>
                                        <td>$collateraNotes</td>
                                        <td>$applicationStatus</td>
                                        <td>$loanType</td>
                                        <td>$loanAmount</td>
                                        <td><div class=\"td_edit\"><button type=\"button\" class=\"btn btn-primary btn-xs edit_btn\" data-id=\"'+{$applicationID}+'\"><i class=\"fa fa-edit\"></i> Approve</button></div>
                                <div class=\"td_delete\"><button class=\"btn btn-danger btn-xs delete_btn\" data-id=\"'+{$applicationID}+'\"><i class=\"fa fa-trash\"></i>Reject</button></div></td>
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
                </div>
            </div>

        </div>
    </div>
</section>


</body>
</html>