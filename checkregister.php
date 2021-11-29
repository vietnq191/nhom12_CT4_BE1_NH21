<?php
require "config.php";
require "models/db.php";
require "models/user.php";
$user = new User();
$check = 0;
if (isset($_GET["btn_submit"])) {
    $fullname = $_GET['fullName'];
    $username = $_GET["username"];
    $password = $_GET["password"];
    $repassword = $_GET["re-password"];
    $email = $_GET['email'];
    $phone = $_GET['phone'];

    $getUser = $user->checkUseralready();
    foreach ($getUser as $value) {
        if ($value["username"] == $username) {
            $check = 1;
            break;
        }
    }

    if($check == 0){
        $user->register($fullname,$username,$password,$email,$phone);
        header("location: checklogin.php");
    }
    else {
        header("location: register.php");
    }
}
else {
    header("location: register.php");
}

