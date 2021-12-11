<?php
    session_start();
    unset($_SESSION["username"]);
    unset($_SESSION["name"]);
    //checkregister
    header("location: login.php");
?>
