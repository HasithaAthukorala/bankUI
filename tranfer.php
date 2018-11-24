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
//    $customer_det = $customer->fetchCustomer($customer_id);
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
    <!--===============================================================================================-->
</head>
<body>
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
                        <form class="form-horizontal" id="transferForm" >
                            <div class="form-group ">
                                <label for="account_number" class="control-label col-lg-3">Account Number</label>
                                <div class="col-lg-6">
                                    <input class=" form-control" id="account_number" name="account_number" type="text" placeholder="Account Number"/>
                                </div>
                            </div>
                            <div class="form-group ">
                                <label for="confirm_account_number" class="control-label col-lg-3">Confirm Account Number</label>
                                <div class="col-lg-6">
                                    <input class=" form-control" id="confirm_account_number" name="confirm_account_number" type="text" placeholder="Confirm Account Number"/>
                                </div>
                            </div>
                            <div class="form-group ">
                                <label for="transaction_amount" class="control-label col-lg-3">Transaction Amount (LKR)</label>
                                <div class="col-lg-6">
                                    <input class=" form-control" id="transaction_amount" name="transaction_amount" type="text" placeholder="Transaction Amount (LKR)"/>
                                </div>
                            </div>
                            <div class="form-group ">
                                <label for="branch" class="control-label col-lg-3">Branch</label>
                                <div class="col-lg-6">
                                    <select class="selectpicker" data-live-search="true">
                                        <option value="" hidden>Select branch</option>
                                        <?php
                                        foreach ($branches as $branch) {
                                            $branchCode = $branch['branchCode'];
                                            $branchName = $branch['branchName'];
                                            echo "<option value=''>$branchName</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
<!--                            <div class="form-group ">-->
<!--                                <label for="p_size" class="control-label col-lg-3">Size</label>-->
<!--                                <div class="col-lg-6">-->
<!--                                    <select class="form-control" name="p_size[]" id="p_size" multiple="multiple">-->
<!---->
<!--                                    </select>-->
<!--                                </div>-->
<!--                            </div>-->
<!---->
<!--                            <div class="form-group ">-->
<!--                                <label for="p_color" class="control-label col-lg-3">Color</label>-->
<!--                                <div class="col-lg-6">-->
<!--                                    <select class="form-control" name="p_color[]" id="p_color" multiple="multiple"></select>-->
<!--                                    <span class="help-block">Use comma for multiple colors. (eg: Black,White,Green)</span>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                            <div class="form-group ">-->
<!--                                <label for="p_price" class="control-label col-lg-3">Price</label>-->
<!--                                <div class="col-lg-6">-->
<!--                                    <input class="form-control" id="p_price" name="p_price" type="text" placeholder="Product price (Rs)"/>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                            <div class="form-group ">-->
<!--                                <label for="p_photos" class="control-label col-lg-3">Photos</label>-->
<!--                                <div class="col-lg-6">-->
<!--                                    <div id="dropzone" class="dropzone">-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                            <div class="form-group ">-->
<!--                                <label for="p_qty" class="control-label col-lg-3">Quantity</label>-->
<!--                                <div class="col-lg-6">-->
<!--                                    <input class="form-control " id="p_qty" name="p_qty" type="text" placeholder="Product quantity"/>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                            <div class="form-group ">-->
<!--                                <label for="p_status" class="control-label col-lg-3">Status</label>-->
<!--                                <div class="col-lg-6">-->
<!--                                    <select class="form-control" name="p_status" id="p_status" required>-->
<!--                                        <option value="" hidden>Product status</option>-->
<!--                                        <option>Available</option>-->
<!--                                        <option>Not Available</option>-->
<!--                                        <option>Low Stock</option>-->
<!--                                    </select>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                            <select class="form-control" name="branch" id="branch">-->
<!--                                <option value="" hidden>Select branch</option>-->
<!--                                --><?php
//                                for ($x = 0; $x <= 10; $x++) {
//                                    echo "<option>$x</option>";
//                                }
//                                ?>
<!--                            </select>-->


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
    </div>
    <footer class="pull-left footer">
        <p class="col-md-12">
        <hr class="divider">
        </p>
    </footer>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.3/js/bootstrap-select.min.js"></script>

<script src="vendor/bootstrap-select.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $("branch").searchable();
    });
</script>

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

<script type="text/javascript">
    $(document).ready(function() {


        const toast = swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000
        });

        $("#transferForm").validate({
            rules: {
                account_number: {
                    required: true,
                },
                confirm_account_number: {
                    required: true,
                },
                branch: {
                    required :true
                },
                amount:{
                    required :true,
                },
            },
            messages: {
                account_number: "Please enter your product name",
                confirm_account_number: "Please enter your product description",
                branch: "Please enter your product category",
                amount: "Please enter your product size",

            },
            submitHandler: function formSubmit(form) {
                alert("dvav");
                    $.ajax({
                        url: "ajax/transfer_request.php",
                        data: $(form).serialize(),
                        type: "post",
                        success:function (data) {
                            console.log(data);
                            if(data == 1)
                            {
                                dropzone.processQueue();
                            }else
                            {
                                toast({
                                    type: 'warning',
                                    title: 'Something went wrong. Please try again or contact support!'
                                });
                            }

                        }
                    });
            }
        });


    });
</script>

</body>
</html>
