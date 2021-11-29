<!-- HEADER -->
<?php include "header.php" ?>
<!-- /HEADER -->
<div class="container">
    <!-- row -->
    <div class="row">
        <div class="col-md-5 col-xs-6">
            <div id="wrapper">
                <form action="checkregister.php" method="GET">
                    <div>
                        <h1 class="form-heading">Form Register</h1>
                    </div>
                    <div class="form-group">
                        <input type="text" name="fullName" class="form-input" placeholder="Full Name" required>
                    </div>
                    <div class="form-group">
                        <input type="text" name="username" class="form-input" placeholder="Username" required>
                    </div>
                    <div class="form-group">
                        <input type="password" name="password" class="form-input" placeholder="Password" required>
                    </div>
                    <div class="form-group">
                        <input type="password" name="re-password" class="form-input" placeholder="Re-Password" required>
                    </div>
                    <div class="form-group">
                        <input type="email" name="email" class="form-input" placeholder="Email" required>
                    </div>
                    <div class="form-group">
                        <input type="text" name="phone" class="form-input" placeholder="Phone" pattern="[0][0-9]{9}" required>
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
            <img src="img/register.jpg" width="100%" alt="">
        </div>

    </div>
    <!-- /row -->
</div>
<!-- /FOOTER -->
<?php include "footer.html" ?>
<!-- /FOOTER -->