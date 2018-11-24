<?php
/**
 * Created by PhpStorm.
 * User: hasitha
 * Date: 11/23/18
 * Time: 7:34 PM
 */
//session_start();
//include_once 'server/class/customer.php';
//if(!isset($_SESSION['customer_id']))
//{
//    header('Location:login.php');
//    exit();
//}else{
//    $customer_id = $_SESSION['customer_id'];
//    $customer = new Customer();
//    $customer_det = $customer->fetchCustomer($customer_id);
//}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login V1</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="css/util.css">
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <!--===============================================================================================-->
</head>
<body>

<div class="limiter">
    <div class="container-login100">
        <div class="wrap-login100">
            <div class="login100-pic js-tilt" data-tilt>
                <img src="images/img-01.png" alt="IMG">
            </div>

            <form class="login100-form validate-form" id="loginForm">
					<span class="login100-form-title">
                    Member Login
                    </span>

                <div class="wrap-input100 validate-input" data-validate="Username is required">
                    <input class="input100" type="text" name="username" placeholder="Username" id="username">
                    <span class="focus-input100"></span>
                    <span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
                </div>

                <div class="wrap-input100 validate-input" data-validate="Password is required">
                    <input class="input100" type="password" name="password" placeholder="Password" id="password">
                    <span class="focus-input100"></span>
                    <span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
                </div>

                <div class="container-login100-form-btn">
                    <button class="login100-form-btn" type="submit">
                        Login
                    </button>
                </div>

                <div class="text-center p-t-12">
						<span class="txt1">
                            Forgot
						</span>
                    <a class="txt2" href="#">
                        Username / Password?
                    </a>
                </div>

                <div class="text-center p-t-136">
                    <a class="txt2" href="#">
                        Create your Account
                        <i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>


<!--===============================================================================================-->
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
<!--===============================================================================================-->
<!--<script src="js/main.js"></script>-->

<script type="text/javascript">

    $(document).ready(function() {


        const toast = swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000
        });


        $.validator.setDefaults({
            submitHandler: function() {

                $.ajax({
                    url: "ajax/customer_login.php",
                    data:$("#loginForm").serialize(),
                    type:"post",
                    success:function (data) {
                        if(data == 0)
                        {
                            toast({
                                type: 'error',
                                title: 'Incorrect Login Details!'
                            })

                        }else {
                            let timerInterval;
                            swal({
                                title: 'Successfully Logged In!',
                                html: 'You will be redirected in <strong></strong> seconds.',
                                timer: 4000,
                                onOpen: () => {
                                    swal.showLoading()
                                    timerInterval = setInterval(() => {
                                        swal.getContent().querySelector('strong')
                                            .textContent = Math.round(swal.getTimerLeft()/1000)
                                    }, 1000)
                                },
                                onClose: () => {
                                    clearInterval(timerInterval)
                                }
                            }).then(function () {
                                window.location = "dashboard.php";
                            });

                        }


                    }
                })
            }
        });

        // validate the comment form when it is submitted
        $("#loginForm").validate({
            rules: {
                username: {
                    required: true,
                },
                password: {
                    required: true,
                }
            },
            messages: {

                username: {
                    required: "Please enter a username",
                },
                password: {
                    required: "Please provide a password",
                }
            }
        });


    });

</script>

</body>
</html>