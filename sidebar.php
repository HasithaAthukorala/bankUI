<?php
/**
 * Created by PhpStorm.
 * User: hasitha
 * Date: 11/24/18
 * Time: 11:08 PM
 */
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
                        <li class="active"><a href="dashboard.php"><span class="glyphicon glyphicon-dashboard"></span> Dashboard</a></li>

                        <li class="panel panel-default" id="dropdown_transactions">
                            <a data-toggle="collapse" href="#dropdown_transactions-lvl1">
                                <span class="glyphicon glyphicon-user"></span> Transactions <span class="caret"></span>
                            </a>

                            <!-- Dropdown level 1 -->
                            <div id="dropdown_transactions-lvl1" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <ul class="nav navbar-nav">
                                        <li><a href="tranfer.php">Transfer</a></li>
                                        <li><a href="#">ATM Transfer</a></li>
                                    </ul>
                                </div>
                            </div>
                        </li>


                        <li><a href="#"><span class="glyphicon glyphicon-plane"></span> Transactions </a></li>
                        <li><a href="#"><span class="glyphicon glyphicon-cloud"></span> Link</a></li>

                        <!-- Dropdown-->
                        <li class="panel panel-default" id="dropdown">
                            <a data-toggle="collapse" href="#dropdown-lvl1">
                                <span class="glyphicon glyphicon-user"></span> Sub Level <span class="caret"></span>
                            </a>

                            <!-- Dropdown level 1 -->
                            <div id="dropdown-lvl1" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <ul class="nav navbar-nav">
                                        <li><a href="#">Link</a></li>
                                        <li><a href="#">Link</a></li>
                                        <li><a href="#">Link</a></li>

                                        <!-- Dropdown level 2 -->
                                        <li class="panel panel-default" id="dropdown">
                                            <a data-toggle="collapse" href="#dropdown-lvl2">
                                                <span class="glyphicon glyphicon-off"></span> Sub Level <span class="caret"></span>
                                            </a>
                                            <div id="dropdown-lvl2" class="panel-collapse collapse">
                                                <div class="panel-body">
                                                    <ul class="nav navbar-nav">
                                                        <li><a href="#">Link</a></li>
                                                        <li><a href="#">Link</a></li>
                                                        <li><a href="#">Link</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </li>

                        <li><a href="#"><span class="glyphicon glyphicon-signal"></span> Link</a></li>

                    </ul>
                </div><!-- /.navbar-collapse -->
            </nav>

        </div>
    </div>
</div>
