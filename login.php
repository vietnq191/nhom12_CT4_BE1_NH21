<?php
require "config.php";
require "models/db.php";
require "models/product.php";

include "checklogin.php";

$product = new Product;

if (isset($_GET["btn_submit"])) {
    $username = $_GET["username"];
    $password = $_GET["password"];

    //loại bỏ các kí tự và tag người dùng cố tình thêm vào
    //để tấn công database
    $username = strip_tags($username);
    $username = addslashes($username);
    $password = strip_tags($password); 
    $password = addslashes($password);

    $login = $product->login($username, $password);
    
    foreach($login as $value){
        if($value["username"] == $username || $value["password"] == $password){
            $_SESSION["username"] = $username;
            if(isset($_SESSION["check_login"])){
                unset($_SESSION["check_login"]);
            }
            header("location: index.php");
            break;
        }
        else{
            $_SESSION["check_login"] = false;
            header("location: checklogin.php");
        }
    }
    
}





