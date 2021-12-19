<?php
    session_start();
    unset($_SESSION["username"]);
    unset($_SESSION['access_token']);
    
    //check register
    unset($_SESSION["user"]);
    unset($_SESSION["pass"]);
    unset($_SESSION["check"]);
    //checkregister
    header("location:action.php?clear=all&logout=index");
?>
