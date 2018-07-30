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



    if (isset($_POST['login'])) {

        $accnum = $obj->accountnumber($_POST['accnum']);
        $pass = mysqli_real_escape_string($connection, $_POST['password']);

        $query = "SELECT * from user WHERE accountnumber = $accnum LIMIT 1";
        $loginresult = mysqli_query($connection, $query);

        if ($loginresult) {
            $row = mysqli_fetch_assoc($loginresult);
            $dbpass = $row['password'];
            $newid = $_SESSION['custid'] = $row['user_id'];
            $_SESSION['fname'] = $row['firstname'];
            $_SESSION['mname'] = $row['middlename'];
            $_SESSION['lname'] = $row['lastname'];
            $_SESSION['email'] = $row['email'];
            $_SESSION['accountnumber'] = $row['accountnumber'];
            $_SESSION['account_type'] = $row['accounttype'];

            if ($check = password_verify($pass, $dbpass)) {

                header("location:userpage.php?id=$newid");
            }
            if (!$check) {

                header("location:index.php");
            }
            echo '<script>alert("Account number/Password Missmatch")</script>';
        } else {
            echo '<script>alert("Wrong user details")</script>';
            header("location:index.php");

        }

    }

