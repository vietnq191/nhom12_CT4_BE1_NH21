<?php
//Hàm login sau khi mạng xã hội trả dữ liệu về
function loginFromSocialCallBack($socialUser)
{
    $conn = new mysqli("localhost", "root", "", "project_thuongmaidientu");
    if ($conn->connect_error) {
        die("Connection Failed!" . $conn->connect_error);
    }

    //$socialUser['name'] . "', '" . $socialUser['email']
    //Random 5 ký tự
    $randomletter = substr(str_shuffle("abcdefghijklmnopqrstuvwxyz"), 0, 5);

    $result = mysqli_query($conn, "Select * WHERE `email` = '" . $socialUser['email'] . "'");
    if ($result->num_rows == 0) {
        $result =$conn->prepare("INSERT INTO `user`(`name`,`email`, `username`, `password, `phone`) VALUES (?,?,?,?,?)");
        $result->bind_param("ssss", "viet", $socialUser['email'],"viet","viet");
        $result->execute();

        if (!$result) {
            echo mysqli_error($conn);
            exit;
        }
        $result = mysqli_query($conn, "Select `id`,`username`,`email`,`name` from `user` WHERE `email` ='" . $socialUser['email'] . "'");
    }
    if ($result->num_rows > 0) {
        $user = mysqli_fetch_assoc($result);
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        $_SESSION['username'] = $user;
        header('Location: index.php');
    }
}
