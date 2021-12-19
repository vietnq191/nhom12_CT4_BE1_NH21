<?php include "header.php"; ?>

<!-- BREADCRUMB -->
<div id="breadcrumb" class="section">
	<!-- container -->
	<div class="container">
		<!-- row -->
		<div class="row">
			<div class="col-md-12">
				<h3 class="breadcrumb-header">Setting profile</h3>
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
			<div class="col-md-7" id="setting">
				<!-- Billing Details -->
				<?php
				if (isset($_SESSION['username'])) :
					$getid = $user->getId($_SESSION['username']);
					foreach ($getid as $row) :
						$getUserid = $user->getUsersData($row['user_id']);
						foreach ($getUserid as $value) : ?>
							<div class="billing-details">
								<div class="section-title">
									<h3 class="title">complete your update!</h3>
								</div>
								<form action="" method="post" id="setProfile">
									<input type="hidden" name="user_id" value="<?php echo $value['user_id'] ?>">
									<input type="hidden" name="username" value="<?php echo $value['username'] ?>">
									<input type="hidden" name="password" value="<?php echo $value['password'] ?>">
									<div class="form-group">
									<label for="inputdata">Full Name</label>
										<input type="text" name="name" class="form-control" placeholder="Enter Name" value="<?php echo $value['name'] ?>" required>
									</div>
									<div class="form-group">
									<label for="inputdata">E-mail</label>
										<input type="email" name="emailUpdate" class="form-control" placeholder="Enter Email" value="<?php echo $value['email'] ?>" required>
									</div>
									<div class="form-group">
									<label for="inputdata">Your Phone Number</label>
										<input type="tel" name="phone" class="form-control" placeholder="Enter Phone" value="<?php echo $value['phone'] ?>" required>
									</div>
									<div class="form-group">
										<input type="submit" name="submit" value="Update Now" class="primary-btn order-submit btn-block">
									</div>
								</form>
							</div>
				<?php endforeach;
					endforeach;
				else :
					echo '<h2> None-account </h2> <hr> <h3> <a href= "register.php" > You can create account here !!! </a> </h3>';
				endif; ?>
				<!-- /Billing Details -->
			</div>
			<div class="col-md-5">
				<div class="text-center">
						<img src="./img/setting.png" width="350" height="300" alt="">
				</div>
			</div>
		</div>
		<!-- /row -->
	</div>
	<!-- /container -->
</div>
<!-- /SECTION -->

<?php include "footer.php"; ?>