<?php
/**
 * Created by PhpStorm.
 * User: dharmy-ko
 * Date: 7/30/2018
 * Time: 1:59 AM
 */
session_start();
require_once ("connection.php");
require_once("account.php");
require_once("user.php");

$obj = new User();

if (isset($_POST['submit'])) {
    $accnum = $obj->accountnumber($_POST['accnum']);
    $tramoney = $_POST['traMoney'];

    $query = "SELECT * FROM user WHERE accountnumber = $accnum";

    $result = mysqli_query($connection, $query);

    if ($result) {
        $row = mysqli_fetch_assoc($result);

        $oldbal = $row['balance'];
        $custid = $row['user_id'];

        $newbal = $oldbal + $tramoney;

        $traquery = "UPDATE user SET balance = $newbal WHERE user_id = $custid LIMIT 1";


        $traresult = mysqli_query($connection, $traquery);

        if ($result) {
            echo '<script>alert("Transfer successful")</script>';

            header("location:userpage.php?id=$custid");
        } else {
            echo '<script>alert("Transfer Unsuccessful")</script>';
        }
    } else {
        echo '<script>alert("Transfer Unsuccessful")</script>';

    }
}