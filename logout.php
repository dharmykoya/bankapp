<?php
/**
 * Created by PhpStorm.
 * User: dharmy-ko
 * Date: 7/28/2018
 * Time: 3:32 PM
 */
session_start();
//if(isset($_SESSION['name'])) {
//    session_unset();
//    session_destroy();
//    header("location:index.php");
//    exit();
//} else {
//    if(!isset($_SESSION['name'])) {
//        header("location:index.php");
//    }
//}



if (isset($_COOKIE[session_name()])) {
    setcookie(session_name(), '', time()-42000, '/');
    header("location:index.php");
}
    session_destroy();
    header("location:index.php");

