<?php
/**
 * Created by PhpStorm.
 * User: dharmy-ko
 * Date: 7/27/2018
 * Time: 6:13 PM
 */
session_start();
require_once ("connection.php");
require_once("account.php");
require_once("user.php");


$error = false;
$error_message = "";

$obj = new User();

    if (isset($_POST['submit'])) {

        if (!is_string($_POST['first_name'])) {
            $error = true;
            $error_message = "Incorrect name";
        }

        if (!$error) {
            $fname = $obj->firstname($_POST['first_name']);
            $mname = $obj->middlename($_POST['middle_name']);
            $lname = $obj->lastname($_POST['last_name']);
            $email = $obj->email($_POST['email']);
            $pnum = $obj->phonenumber($_POST['phone_num']);
            $pass = password_hash(mysqli_real_escape_string($connection, $obj->password($_POST['password'])), PASSWORD_DEFAULT);
            $bal = $obj->balance($_POST['account_balance']);
            $accntype = $_POST['account_type'];
            if ($accntype = "Savings") {
                $obj->accounttype($accntype);
                $random = rand(400000,500000);
                $accn = $obj->accountnumber($random);
            }
            if ($accntype = "Current"){
                $obj->accounttype($accntype);
                $random = rand(400000,500000);
                $accn = $obj->accountnumber($random);
            }

            $query  = "INSERT INTO user (firstname, middlename, lastname, email, phonenumber, password, accountnumber, balance, accounttype) ";
            $query .= "VALUES ('$fname', '$mname', '$lname', '$email', '$pnum', '$pass', '$accn', $bal, '$accntype')";


            $result = mysqli_query($connection, $query);

            $newid = mysqli_insert_id($connection);


            if ($newid > 0) {

                $newquery  = "INSERT INTO account (account_type, accountnumber, balance, cust_id) ";
                $newquery .= "VALUES ('$accntype','$accn', $bal, $newid)";
                echo $newquery;
                $newresult = mysqli_query($connection, $newquery);

                $_SESSION['custid'] = $newid;
                $_SESSION['fname'] = $fname;
                $_SESSION['mname'] = $mname;
                $_SESSION['lname'] = $lname;

                $_SESSION['email'] = $email;
                $_SESSION['accountnumber'] = $accn;

                $_SESSION['account_type'] = $accntype;
                header("location:userpage.php?id=$newid");
            } else {
                die("Database query failed. " . mysqli_error($connection));
            }
        }
    }



