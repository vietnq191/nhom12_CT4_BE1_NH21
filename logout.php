<?php
    session_start();
    unset($_SESSION["username"]);
    
    //check register
    unset($_SESSION["user"]);
    unset($_SESSION["pass"]);
    unset($_SESSION["check"]);
    //checkregister

    header("location:index.php");
?>
