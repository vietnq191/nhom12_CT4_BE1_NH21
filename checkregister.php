<?php
session_start();
require("models/product.php");

$conn = mysqli_connect("localhost","root","","backend") or die("không thể kết nối tới mySQL !");


$User = new Product;
$check = "error !";
    if(isset($_POST["btn_submit"])){
            $username = $_POST["username"];
            $password = $_POST["password"];
            $repassword = $_POST["re_password"];

            //loại bỏ các kí tự và tag người dùng cố tình thêm vào
            //để tấn công database
            $username = strip_tags($username);
            $username = addslashes($username);
            $password = strip_tags($password); 
            $password = addslashes($password);
            $repassword = strip_tags($repassword); 
            $repassword = addslashes($repassword);

            $_SESSION["user"] = $username;
            $_SESSION["pass"] = $password;
            $_SESSION["repass"] = $repassword;
            
            $getUser = $User->checkUseralready($username);
            foreach($getUser as $value){
                if($value["username"] == $username){
                    $check = "Username đã tồn tại !";
                }
            }

            // elseif($_POST["password"] != $_POST["re_password"]){
            //      $check = "Password không khớp nhau !";   
            // }else{
            //     $check = "Password trùng nhau !";
            // }

            // if($check = 0){
            //     $sql1 = "INSERT INTO `user`(`username`,`password`) VALUES(`$username`,`$password`)";
            //     $query = mysqli_query($conn,$sql1);
            //     echo "Đã tạo tài khoản thành công ";
            //     // sleep(15);
            //     // header("location: index.php");
            // }
            // echo $check;
        // header("location: register.php");
        $_SESSION["check"] = $check;
    }
    header("location: register.php");
