<?php
/**
 * Created by PhpStorm.
 * User: dharmy-ko
 * Date: 7/27/2018
 * Time: 6:13 PM
 */
require_once ("connection.php");
require_once("account.php");
require_once("user.php");


$error = false;
$error_message = "";

$obj = new User();

if (isset($_POST['submit'])) {

    $fname = $obj->firstname($_POST['first_name']);
    $mname = $obj->middlename($_POST['middle_name']);
    $lname = $obj->lastname($_POST['last_name']);
    $email = $obj->email($_POST['email']);
    $pnum = $obj->phonenumber($_POST['phone_num']);
    $pass = $obj->password($_POST['password']);
    $accn = $obj->accountnumber();
    $bal = $obj->balance($_POST['account_balance']);
    $accntype = $_POST['account_type'];
    if ($accntype = "Savings") {
        $obj->accounttype($accntype);
    } else {
        $obj->accounttype($accntype);
    }

    $query = "INSERT INTO user (firstname, middlename, lastname, email, phonenumber, password, accoutnumber, balance, accounttype) ";
    $query .= "VALUES ('$fname', '$mname', '$lname', '$email', $pnum, '$pass', $accn, $bal, $accntype)";

    $result = mysqli_query($connection, $query);

    if ($result) {
        header("location:userpage.php");
    } else {
        echo "error";
    }


}

?>

<!DOCTYPE html>
<html>
<head>
    <title>KOYA BANK</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container col-sm-8 col-sm-offset-2">
    <div class="row col-sm-6 col-sm-offset-2">
        <div class="title-content">
            <div class="">
                <h2>Welcom to Our Bank...</h2>
                <h4>Where we make dreams bigger and achievable</h4>
                <div class="button">
                    <a class="btn btn-info" role="button" data-toggle="modal" data-target="#signup">Join</a>
                </div>
                <div class="button">
                    <a class="btn btn-success" role="button" data-toggle="modal" data-target="#login">Login</a>
                </div>
            </div>
        </div>
    </div>
</div>



                <form class="col-md-12" method="post" action="test.php">
                    <label for="fname">First Name:</label>
                    <input type="text" class="form-control" name="first_name">
                    <br/>

                    <label for="oname">Middle Name:</label>
                    <input type="text" class="form-control" name="middle_name">
                    <br/>


                    <label for="sname"> Last Name:</label>
                    <input type="text" class="form-control" name="last_name">
                    <br/>

                    <label for="email"> Email:</label>
                    <input type="email" class="form-control" name="email">
                    <br/>

                    <label for="pnum">Phone number:</label>
                    <input type="text" class="form-control" name="phone_num">
                    <br/>

                    <label for="password">Password:</label>
                    <input type="password" class="form-control" name="password">
                    <br/>

                    <label for="amount">Amount:</label>
                    <input type="number" class="form-control" name="account_balance">
                    <br/>

                    <label for="acct_type">Account type:</label>

                    <label class="radio-inline">
                        <input type="radio" name="account_type" value="savings">Savings
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="account_type" value="Current">Current
                    </label>

                    <input type="submit" name="submit" class="btn btn-success btn-md" value="Join">

                </form>
            </div>


</body>
</html>
