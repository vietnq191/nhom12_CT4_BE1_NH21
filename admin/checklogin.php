<?php
session_start();
require "config.php";
require "models/db.php";
require "models/login.php";
include "login.php";

$login = new Login;

if (isset($_POST["btn_submit_admin"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];
    $checkLogin = $login->checkLogin($username, $password);
    
    if ($checkLogin){
        $_SESSION["AdminUsername"] = $username;
        $temp = $login->getName($username);
        $_SESSION["AdminName"] = $temp[0]["admin_name"];
        echo "<script>window.location='index.php'</script>";
    }
    else {
        echo "<script> alert('Login failed'); window.location='login.php'</script>";
    }
}











