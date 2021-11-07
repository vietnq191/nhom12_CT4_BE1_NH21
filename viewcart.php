<?php include "header.php"; ?>
<!-- BREADCRUMB -->
<div id="breadcrumb" class="section">
	<!-- container -->
	<div class="container">
		<!-- row -->
		<div class="row">
			<div class="col-md-12">
				<h3 class="breadcrumb-header">My cart</h3>
				<ul class="breadcrumb-tree">
					<li><a href="#">Home</a></li>
					<li class="active">Blank</li>
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

	<div class="container-fluid ">
		<div class="row px5">
			
			<?php foreach ($_SESSION['cart'] as $key => $qty) : ?>
				<?php foreach ($getAllProducts as $value) : ?>
					<?php if ($key == $value['id']) : ?>

						<div class="col-md-7">
							<div class="shopping-cart">
								<hr>
								<div class="border rounded">
									<div class="row bg-white">
										<div class="col-md-3 pl-0">
											<img src="./img/<?php echo $value['image'] ?>" alt="" class="img-thumbnail">
										</div>
										<div class="col-md-9">
											<h4 class="pt-2"><?php echo $value['name'] ?></h4>
											<small class="text-secondary">
												<p>
												<h5>Description:</h5> <?php echo $value['description'] ?></p>
											</small>
											<h5 class="pt-2">Price: <?php echo $value['price'] ?> VND</h5>
											<h5 class="pt-2">Quantity: <?php echo $qty['quantity'] ?></h5>
											<a href="del.php?id=<?php echo $key ?>"><button class="btn btn-danger mx-2">Remove</button></a>
										
										</div>

									</div>
								</div>
							</div>
						</div>
			<?php endif;
				endforeach;
			endforeach ?>
			<div class="col-md-5 offset-md-1 border rounded mt-5 bg-white h-25">
				<div class="pt-4">
					<hr>
					<div class="row">
						<div class="col-md-12">
							<?php
							if (isset($_SESSION['cart'])) {
								$count = count($_SESSION['cart']);
								echo "<h6> Price ($count items) </h6> <hr>";
							} else {
								echo "<h6> Price (0 items) </h6> <hr>";
							}
							echo "<h6>Amount payable: </h6>" .  $total . " VND";
							?>
						</div>

					</div>
				</div>
			</div>
		</div>

	</div>


	<!-- /container -->
</div>
<!-- /SECTION -->

<?php include "footer.html"; ?>