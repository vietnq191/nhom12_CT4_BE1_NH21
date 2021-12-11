<?php
require "config.php";
require "models/db.php";
require "models/user.php";
include "login.php";

$user = new User;

if (isset($_POST["btn_submit"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $checkLogin = $user->checkLogin($username,$password);
    
    if($checkLogin){
        $_SESSION["username"] = $username;
        header("location: index.php");
    }
    else {
        echo "<script> alert('Login failed'); window.location='login.php'</script>";
    }
}