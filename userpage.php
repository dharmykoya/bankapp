<?php
/**
 * Created by PhpStorm.
 * User: dharmy-ko
 * Date: 7/27/2018
 * Time: 7:37 PM
 */
session_start();
require_once ("connection.php");
require_once("account.php");
require_once("user.php");



    $logged_in = isset($_SESSION['custid']);



    if (!$logged_in) {
        header("location:index.php");
    }


$obj = new User();
$obj->firstname($_SESSION['fname']);
$obj->middlename($_SESSION['mname']);
$obj->lastname($_SESSION['lname']);
$obj->email($_SESSION['email']);




?>



<!DOCTYPE html>
<html>
<head>
    <title>KOYA BANK</title>
    <link rel="stylesheet" type="text/css" href="user_style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
    <div class="row">
        <nav class="navbar navbar-default navbar-fixed-top">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">Logo</a>
                </div>
                <div class="collapse navbar-collapse" id="myNavbar">
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="#about">ABOUT</a></li>
                        <li><a href="#services">SERVICES</a></li>
                        <li><a href="#portfolio">PORTFOLIO</a></li>
                        <li><a href="#pricing">PRICING</a></li>
                        <li><a href="#contact">CONTACT</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
    <div class="row col-md-2">
        <ul class="nav nav-pills nav-stacked">
            <li class="active"><a href="#">Home</a></li>
            <li><a role="button" href="logout.php">Logout</a></li>
            <li><a role="button" data-toggle="modal" data-target="#deposit">Deposit</a></li>
            <li><a role="button" data-toggle="modal" data-target="#withdraw">Withdraw</a></li>
            <li><a role="button" data-toggle="modal" data-target="#transfer">Transfer</a></li>
            <li><a role="button" href="#">Profile</a></li>
        </ul>
    </div>
    <div class="row">
        <div class="welcome col-md-offset-4">
            <h3>Welcome <?php echo $obj->getFullName(); ?></h3>
        </div>
        <div class="panel panel-default col-md-4 col-md-offset-2">
            <div class="panel-heading">Account Details</div>
            <div class="panel-body">
                <div class="col-md-offset-3">
                    <input type="text" class="btn btn-primary" value="Account Number: <?php echo $obj->accountnumber($_SESSION['accountnumber']); ?>">
                    <br>

                    <input type="button" class="btn btn-primary" value="Balance:
                    <?php
                        echo $obj->getbalance($_SESSION['custid']);
                     ?>">
                    <br>

                    <input type="button" class="btn btn-primary" value="Account type: <?php echo $obj->accounttype($_SESSION['account_type']); ?>">
                </div>
            </div>
        </div>
    </div>
    <div class="row col-md-6 col-md-offset-2">
        <div id="deposit" class="modal fade" role="dialog">
            <div class="modal-dialog modal-sm">
                <div class="modal-content" style="margin-top: 100px;">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Deposit Form</h4>
                    </div>
                    <div class="modal-body">
                        <form class="col-md-12" action="depositdone.php" method="post">
                            <div class="row">
                                <label>Amount:</label>
                                <input type="number" class="form-control" name="depMoney" placeholder="Amount to deposit">
                            </div>
                            <br>
                            <br>
                            <div class="row">
                                <input type="submit" name="deposit" class="btn btn-success btn-md" value="PAY">
                            </div>
                        </form>
                    </div>
                    <br>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row col-md-6 col-md-offset-2">
        <div id="withdraw" class="modal fade" role="dialog">
            <div class="modal-dialog modal-sm">
                <div class="modal-content" style="margin-top: 100px;">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Withdraw Form</h4>
                    </div>
                    <div class="modal-body">
                        <form class="col-md-12" action="withdrawdone.php" method="post">
                            <div class="row">
                                <label>Amount:</label>
                                <input type="number" class="form-control" name="witMoney" placeholder="Amount to withdraw">
                            </div>
                            <br>
                            <br>
                            <div class="row">
                                <input type="submit" name="submit" class="btn btn-success btn-md" value="WITHDRAW">
                            </div>
                        </form>
                    </div>
                    <br>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row col-md-6 col-md-offset-2">
        <div id="transfer" class="modal fade" role="dialog">
            <div class="modal-dialog modal-sm">
                <div class="modal-content" style="margin-top: 100px;">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Deposit Form</h4>
                    </div>
                    <div class="modal-body">
                        <form class="col-md-12" action="transferdone.php" method="post">
                            <div class="row">
                                <label>Account Name:</label>
                                <input type="text" class="form-control" name="depMoney" placeholder="Account Name">
                            </div>
                            <br>
                            <div class="row">
                                <label>Account Number:</label>
                                <input type="number" class="form-control" name="accnum" placeholder="Account number">
                            </div>
                            <br>
                            <div class="row">
                                <label>Amount:</label>
                                <input type="number" class="form-control" name="traMoney" placeholder="Amount to deposit">
                            </div>
                            <br>
                            <div class="row">
                                <input type="submit" name="submit" class="btn btn-success btn-md" value="TRANSFER">
                            </div>
                        </form>
                    </div>
                    <br>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>
