<!-- HEADER -->
<?php include "header.php" ?>
<!-- /HEADER -->

<!-- REGISTER -->

<?php if (isset($_SESSION["user"])){ ?>
    <div>
        <a href=""><?php echo $_SESSION["user"] ?></a>
    </div>
    <div> 
        <a href=""><?php echo $_SESSION["pass"] ?></a>
    </div>
    <div>
        <a href=""><?php echo $_SESSION["repass"] ?></a>
    </div>
    <div>
        <a href=""><?php echo $_SESSION["check"] ?></a>
    </div>
    <div>
        <a href="logout.php">Log out</a>
    </div>
<?php }else{ ?>
    <form action="checkregister.php" method="post">
    <div>
        <input class="input" type="text" name="username" placeholder="Username">
    </div>
    <div>
        <input class="input" type="password" name="password" placeholder="Password">
    </div>
    <div>
        <input class="input" type="password" name="re_password" placeholder="Nhập lại Password">
    </div>
    <button type="submit" name="btn_submit"><a>Register</a></button>
</form>
<?php } ?>
<!-- /REGISTER -->

<!-- FOOTER -->
<?php include "footer.php" ?>
<!-- /FOOTER -->
