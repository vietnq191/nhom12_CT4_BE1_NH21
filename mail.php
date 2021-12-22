<?php 
    require "PHPMailer/src/PHPMailer.php";
    require "PHPMailer/src/Exception.php";
    require "PHPMailer/src/POP3.php";
    require "PHPMailer/src/SMTP.php";
    require "PHPMailer/src/OAuth.php";

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    $mail = new PHPMailer(true);
?>