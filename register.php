<!-- HEADER -->
<?php include "header.php" ?>
<!-- /HEADER -->
<br><br>
<div class="container">
    <!-- row -->
    <div class="row">
        <div class="col-md-5 col-xs-6">
            <div id="wrapper">
                <form class="form-register" action="checkregister.php" method="GET" novalidate>
                    <div>
                        <h1 class="form-heading">Form Register</h1>
                    </div>
                    <div class="form-group">
                        <input type="text" name="fullName" class="form-input form-control" placeholder="Full Name" required pattern="[a-zA-Z0-9]{3,}(\s?\w+)*">
                    </div>
                    <div class="form-group">
                        <input type="text" name="username" class="form-input form-control" placeholder="Username" required>
                    </div>
                    <div class="form-group">
                        <input type="password" name="password" class="form-input form-control password" placeholder="Password" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}">
                    </div>
                    <div class="form-group">
                        <input type="password" name="re-password" class="form-input form-control repassword" placeholder="Re-Password" required>
                    </div>
                    <div class="form-group">
                        <input type="email" name="email" class="form-input form-control" placeholder="Email" required pattern="[a-zA-Z0-9._-]+@[a-z]+\.[a-z]{2,4}">
                    </div>
                    <div class="form-group">
                        <input type="text" name="phone" class="form-input form-control" placeholder="Phone" required pattern="[0-9]{10,11}">
                        <br>
                        <small>Format: 0123456789</small><br>
                    </div>
                    <div>
                        <a href=""><input type="submit" name="btn_submit" value="Comfirm" class="form-submit"></a>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-md-7 col-xs-6">
            <img src="img/register.jpg" class="img-rounded" width="100%" alt="">
        </div>
        
    </div>
    <!-- /row -->
</div>

<!-- /FOOTER -->
<?php include "footer.html" ?>
<!-- /FOOTER -->