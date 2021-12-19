<?php include "header.php"; ?>
<!-- BREADCRUMB -->
<div id="breadcrumb" class="section">
	<!-- container -->
	<div class="container">
		<!-- row -->
		<div class="row">
			<div class="col-md-12">
				<h3 class="breadcrumb-header">My Account</h3>
				<ul class="breadcrumb-tree">
					<li><a href="index.php">Home</a></li>
					<li class="active">Profile</li>
				</ul>
			</div>
		</div>
		<!-- /row -->
	</div>
	<!-- /container -->
</div>
<!-- /BREADCRUMB -->

<!-- View Profile -->
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<?php
			if (isset($_SESSION['username'])) :
				$getid = $user->getId($_SESSION['username']);
				foreach ($getid as $row) :
					$getUserid = $user->getUsersData($row['user_id']);
					foreach ($getUserid as $value) :?>
						<div class="profile-page">
							<table class="table-profile table-striped table">
								<tr>
									<td>
										<h3> Full name:</h3>
									</td>
									<td>
										<h4 class="text-left"> <?php echo $value['name'] ?></h4>
									</td>
								</tr>
								<tr>
									<td>
										<h3>E-mail: </h3>
									</td>
									<td>
										<h4 class="text-left"> <?php echo $value['email'] ?></h4>
									</td>
								</tr>
								<tr>
									<td>
										<h3>User Name: </h3>
									</td>
									<td>
										<h4 class="text-left"> <?php echo $value['username'] ?></h4>
									</td>
								</tr>
								<tr>
									<td>
										<h3>Phone: </h3>
									</td>
									<td>
										<h4 class="text-left"> <?php echo $value['phone'] ?></h4>
									</td>
								</tr>
							</table>
						</div>
			<?php endforeach;
				endforeach;
			else :	
				echo '<h2> None-account </h2> <hr> <h3> <a href= "register.php" > You can create account here !!! </a> </h3>';
			endif; ?>
		</div>

	</div>
	<div class="row">
		<div class="col">
		<div class="total-price">
				<table>
					<tr>
						<td><a href="update.php" class="btn btn-success <?php if(isset($_SESSION['username'])){echo "none";}else{echo "disabled";} ?>"><i class="fa fa-cog" aria-hidden="true"></i> Setting profile </a></td>
						<td><a href="changepass.php" class="btn  btn-warning <?php if(isset($_SESSION['username'])){echo "none";}else{echo "disabled";} ?>"><i class="fa fa-repeat" aria-hidden="true"></i> Change password </a></td>
					</tr>
				</table>
			</div>
		</div>
	</div>
</div>
<!-- /View Profile -->


<?php include "footer.php"; ?>