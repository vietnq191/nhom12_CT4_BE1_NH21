<?php
//Hàm login sau khi mạng xã hội trả dữ liệu về
function loginFromSocialCallBack($socialUser)
{
    header("Content-type: text/html; charset=utf-8");
    $conn = new mysqli("localhost", "root", "", "project_thuongmaidientu");
    mysqli_set_charset($conn, 'UTF8');
    if ($conn->connect_error) {
        die("Connection Failed!" . $conn->connect_error);
    }
    //Random 5 ký tự
    $pass = explode("@gmail.com", $socialUser['email']);
    $pass = $pass[0];

    $result = mysqli_query($conn, "Select * from `user` WHERE `email` ='" . $socialUser['email'] . "'");
    if ($result->num_rows == 0) {
        $pass = md5($pass);
        $result = mysqli_query($conn, "INSERT INTO `user` (`name`,`email`, `username`, `password`) VALUES ('" . $socialUser['name'] . "', '" . $socialUser['email'] . "', '" . $socialUser['email'] . "', '" . $pass . "');");
        if (!$result) {
            echo mysqli_error($conn);
            exit;
        }
        $result = mysqli_query($conn, "Select * WHERE `email` ='" . $socialUser['email'] . "'");
    }
    $result = mysqli_query($conn, "Select * from `user` WHERE `email` ='" . $socialUser['email'] . "'");
    if ($result->num_rows > 0) {
        $user = mysqli_fetch_assoc($result);
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        $_SESSION['username'] = $user['username'];
        header('Location: ./index.php');
    }
}
