<?php include "header.php"; ?>

<!-- BREADCRUMB -->
<div id="breadcrumb" class="section">
	<!-- container -->
	<div class="container">
		<!-- row -->
		<div class="row">
			<div class="col-md-12">
				<h3 class="breadcrumb-header">Change password</h3>
				<ul class="breadcrumb-tree">
					<li><a href="index.php">Home</a></li>
					<li class="active">Update</li>
				</ul>
			</div>
		</div>
		<!-- /row -->
	</div>
	<!-- /container -->
</div>
<!-- /BREADCRUMB -->

<!-- SECTION -->
<div class="section">
	<!-- container -->
	<div class="container">
		<!-- row -->
		<div class="row">
			<div id="change-pass"></div>
			<div class="col-md-7">
				<!-- Billing Details -->
							<div class="billing-details">
								<div class="section-title">
									<h3 class="title">complete your change password!</h3>
								</div>
								<?php if (isset($_SESSION['username'])) : ?>
								<form action="" method="post" id="cpw">
								<input type="hidden" name="username" value="<?php echo $_SESSION['username'] ?>">
									<div class="form-group">
										<label for="inputpassword">Old Password</label>
										<input type="password" name="old_pass" class="form-control" placeholder="Enter Old Password"  required>
										<hr>
									</div>
									<div class="form-group">
									<label for="inputpassword">New Password</label>
										<input type="password" name="new_pass" class="form-control" placeholder="Enter New Password"  required>
										<hr>
									</div>
									<div class="form-group">
									<label for="inputpassword">Confirm New Password</label>
										<input type="password" name="confirm_pass" class="form-control" placeholder="Enter Confirm New Password"  required>
										<hr>
									</div>
									<div class="form-group">
										<input type="submit" name="submit" value="Change password" class="primary-btn order-submit btn-block">
									</div>
								</form>
								<?php else :	
				echo '<h2> None-account </h2> <hr> <h3> <a href= "register.php" > You can create account here !!! </a> </h3>';
			endif; ?>
							</div>
				<!-- /Billing Details -->
			</div>
			<div class="col-md-5">
				<div class="text-center">
						<img src="./img/setting.png" width="400" height="350" alt="">
				</div>
			</div>
		</div>
		<!-- /row -->
	</div>
	<!-- /container -->
</div>
<!-- /SECTION -->

<?php include "footer.php"; ?>