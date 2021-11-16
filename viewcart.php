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
			<div class="cart-page">
				<table>
					<tr>
						<th>Product</th>
						<th>Quantity</th>
						<th>Subtotal</th>
					</tr>
					<?php if(isset($_SESSION['cart'])):
					foreach ($_SESSION['cart'] as $key => $qty) : 
					?>
						<?php foreach ($getAllProducts as $value) : ?>
							<?php if ($key == $value['id']) : ?>
								<tr>
									<td>
										<div class="cart-info">
											<img src="./img/<?php echo $value['image'] ?>" alt="">
											<div>
												<p><?php echo $value['name'] ?></p>
												<small>Price: <?php echo number_format($value['price']) ?>VND</small>
												<br>
												<br>
												<a href="del.php?id=<?php echo $key ?>"><button class="btn btn-danger mx-2">Remove</button></a>
											</div>
										</div>
									</td>
									<td><input type="number" value="<?php echo $qty['quantity'] ?>"></td>
									<td><?php echo number_format($value['price']) ?> VND</td>
								</tr>
					<?php endif;
						endforeach;
					endforeach ;endif?>
				</table>



			</div>
			<div class="total-price">
				<table>
					<?php 
					$formatTotal = number_format($total);
					if (isset($_SESSION['cart'])) {
						$count = count($_SESSION['cart']);
						echo "<tr><td>Price ($count items)</td><td></td></tr>";
					} else {
						echo "<tr><td>Price (0 items)</td><td></td></tr>";
					}

					echo "<tr><td>Amount payable:</td><td> $formatTotal VND </td></tr>";
					?>
				</table>
			</div>

		</div>
	</div>

	<!-- /Cart item detail -->

	<?php include "footer.html"; ?>