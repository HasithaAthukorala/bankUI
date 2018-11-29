<?php
/**
 * Created by PhpStorm.
 * User: hasitha
 * Date: 11/24/18
 * Time: 11:08 PM
 */

if(!isset($_SESSION['role'])) {
    $role = 'user';
}else{
    $role = $_SESSION['role'];
}

?>
<div class="col-md-2 sidebar">
    <div class="row">
        <!-- uncomment code for absolute positioning tweek see top comment in css -->
        <div class="absolute-wrapper"> </div>
        <!-- Menu -->
        <div class="side-menu">
            <nav class="navbar navbar-default" role="navigation">
                <!-- Main Menu -->
                <div class="side-menu-container">
                    <ul class="nav navbar-nav">
                        <?php
                        if($role == 'user'){
                            echo "<li class=\"active\"><a href=\"dashboard.php\"><span class=\"glyphicon glyphicon-dashboard\"></span> Dashboard</a></li>
                        <li><a href=\"tranfer.php\"><span class=\"glyphicon glyphicon-transfer\"></span> Transactions</a></li>
                        <li><a href=\"ATMtranfer.php\"><span class=\"glyphicon glyphicon-credit-card\"></span> ATM Transactions</a></li>
                        <li><a href=\"loanApplication.php\"><span class=\"glyphicon glyphicon-list-alt\"></span> Loans </a></li>
                        <li><a href=\"logout.php\"><span class=\"glyphicon glyphicon-log-out\"></span> Log out</a></li>";
                        }else{
                            echo "<li class=\"active\"><a href=\"emp_dashboard.php\"><span class=\"glyphicon glyphicon-dashboard\"></span> Dashboard</a></li>
                        <li><a href=\"emp_loan.php\"><span class=\"glyphicon glyphicon-list-alt\"></span> Loans </a></li>
                        <li><a href=\"logout.php\"><span class=\"glyphicon glyphicon-log-out\"></span> Log out</a></li>";
                        }
                        ?>


                    </ul>
                </div><!-- /.navbar-collapse -->
            </nav>

        </div>
    </div>
</div>
