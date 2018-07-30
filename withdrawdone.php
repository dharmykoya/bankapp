<?php
/**
 * Created by PhpStorm.
 * User: dharmy-ko
 * Date: 7/28/2018
 * Time: 12:13 PM
 */

session_start();
require_once ("connection.php");
require_once("account.php");
require_once("user.php");

$obj = new User();



if (isset($_POST['submit'])) {
    $userid = $_SESSION['custid'];
    $obj->getbalance($userid);
    $newbal = $obj->withdrawMoney($_POST['witMoney']);


    if ($newbal) {
        $query = "UPDATE user ";
        $query .= "SET balance = $newbal ";
        $query .= "WHERE user_id = $userid ";
        $query .= "LIMIT 1";

        $result = mysqli_query($connection, $query) ;

        if ($result) {
            echo '<script>alert("Withdraw successful")</script>';
            header("location:userpage.php?id=$userid");
        }
    }
} else {
    die("Database query failed. " . mysqli_error($connection));
}
//or die("Database query failed. " . mysqli_error($connection))