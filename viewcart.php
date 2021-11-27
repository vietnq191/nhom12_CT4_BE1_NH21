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
					<li><a href="index.php">Home</a></li>
					<li class="active">viewcart</li>
				</ul>
			</div>
		</div>
		<!-- /row -->
	</div>
	<!-- /container -->
</div>
<!-- /BREADCRUMB -->

<!-- Cart item detail -->
<div class="container">
	<div class="row">
		<div class="col-md-12 col-xs-6">
			<div style="display: <?php if (isset($_SESSION['showAlert'])) {
										echo $_SESSION['showAlert'];
									} else {
										echo 'none';
									}
									unset($_SESSION['showAlert']); ?>;" class="alert alert-success alert-dismissible mt-3">
				<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				<strong><?php if (isset($_SESSION['message'])) {
							echo $_SESSION['message'];
						}
						unset($_SESSION['showAlert']); ?></strong>
			</div>
			<div class="cart-page">
				<table class="table-striped">
					<tr>
						<th>ID</th>
						<th>Image</th>
						<th>Product Name</th>
						<th>Price</th>
						<th>Quantity</th>
						<th>Total Price</th>
						<th>
							<a href="action.php?clear=all" class="badge badge-danger p-4" onclick="return confirm('Are you sure want to clear your cart?');"> Clear Cart</a>
						</th>
					</tr>
					<?php $getAllCart = $cart->getAllCart();
					$grand_total = 0;
					foreach ($getAllCart as $values) :
					?>
						<tr>

							<td><?php echo $values['id'] ?></td>
							<input type="hidden" class="pid" value="<?php echo $values['id'] ?>">
							<td>
								<div class="cart-info">
									<img src="./img/<?php echo $values['product_img'] ?>" alt="">

								</div>
							</td>
							<td>
								<?php echo $values['product_name'] ?>
							</td>
							<td>
								<div>
									<small><?php echo number_format($values['product_price']) ?> VND</small>

								</div>
							</td>
							<input type="hidden" class="pprice" value="<?php echo $values['product_price'] ?>">
							<td><input type="number" min='1' class="form-control itemQty" value="<?php echo $values['qty'] ?>" style="width: 60px;"></td>
							<td><?php echo number_format($values['total_price']) ?> VND</td>
							<td><a href="action.php?remove=<?php echo $values['id'] ?>" onclick="return confirm('Are you sure want to remove this item?');"><button class="btn btn-danger mx-2">Remove</button></a></td>
						</tr>
						<?php $grand_total += $values['total_price']; ?>
					<?php endforeach; ?>
				</table>

			</div>
			<div class="total-price">
				<table>
					<tr>
						<td></td>
					</tr>
					<tr>
						<td>Amount payable:</td>
						<td> <?php echo number_format($grand_total); ?> VND </td>
					</tr>

					<tr>
						<td><a href="index.php" class="btn btn-success" ><i class="fa fa-shopping-cart"></i> Continue Shopping </a></td>
						<td><a class="btn btn-danger mx-2"  
						<?php
						//nếu có username thì checkout ngược lại register 
						if($grand_total>1){
							if(isset($_SESSION['username'])){
								echo 'href="checkout.php"';
							}else{
								echo 'href="login.php"';
							}
						}else{
							echo "disabled";
						}
						?>
						>Check out</a></td>
					</tr>
				</table>
			</div>

		</div>
	</div>

	<!-- /Cart item detail -->

	<?php include "footer.html"; ?>