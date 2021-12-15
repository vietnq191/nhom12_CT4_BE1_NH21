<?php
    session_start();
    unset($_SESSION["AdminUsername"]);
    unset($_SESSION["AdminName"]);
    //checkregister
    header("location: login.php");
?>
