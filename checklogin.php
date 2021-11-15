<?php
session_start();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/app.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">

    <title>Store</title>
</head>

<body>
    <div id="top-header">
        <div id="wrapper">
            <div id="form-login">
                <div align="right">
                    <a href="index.php"><button> X </button></a>
                </div>
                
                <form action="login.php" method="GET" >

                    <div>
                        <h1 class="form-heading">Form Login</h1>
                    </div>

                    <?php if (!isset($_SESSION["check_login"])) { ?>
                        <div>
                            <div class="form-group">
                                <i class="far fa-user"></i>
                                <input type="text" name="username" class="form-input" placeholder="Username">
                            </div>
                            <div class="form-group">
                                <i class="fas fa-key"></i>
                                <input type="password" name="password" class="form-input" placeholder="Password">
                                <div id="eye">
                                    <i class="far fa-eye"></i>
                                </div>
                            </div>
                            <div>
                                <a href=""><input type="submit" name="btn_submit" value="Login" class="form-submit"></a>
                            </div>
                        </div>
                </form>


                <div>
                    <a href="register.php"><input type="submit" name="btn_register" value="Register" class="form-submit"></a>
                </div>
            <?php
                    } else {
                        unset($_SESSION["check_login"]);
            ?>
                <div>
                    <h1 class="form-heading">Wrong Username or Password</h1>
                </div>
                <div>
                    <a href="checklogin.php"><input type="submit" value=" OK " class="form-submit"></a>
                </div>
            <?php } ?>
            </div>
        </div>
    </div>

</body>
<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="js/app.js"></script>

</html>