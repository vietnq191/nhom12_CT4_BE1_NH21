<?php include "header.php"; ?>
<!-- BREADCRUMB -->
<div id="breadcrumb" class="section">
	<!-- container -->
	<div class="container">
		<!-- row -->
		<div class="row">
			<div class="col-md-12">
				<h3 class="breadcrumb-header">Orders History</h3>
				<ul class="breadcrumb-tree">
					<li><a href="index.php">Home</a></li>
					<li><a href="view_history_orders.php">Orders History</a></li>
					<li class="active">View Orders Detail</li>
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
	<?php if (isset($_GET['order_id'])) : ?>
		<div class="row">
			<h4>
				ID Order: <?php echo $_GET['order_id'] ?>
			</h4>
		</div>
	<?php endif; ?>
	<div class="row">
		<div class="col-md-12 col-xs-6">
			<div class="cart-page" style="margin: 20px!important;">
				<table class="table-striped">
					<?php
					if (isset($_GET['order_id'])) : $getOrderDetails = $orders->getOrderDetails($_GET['order_id']);
					?>
						<tr>
							<th style="width: 10%" class="text-center">Number</th>
							<th class="text-center">Image</th>
							<th class="text-center">Product Name</th>
							<th class="text-center">Price</th>
							<th class="text-center">Quantity</th>
						</tr>


						<?php
						$stt = 1;
						$grand_total = 0;

						foreach ($getOrderDetails as $values) :
							$grand_total += $values['price'] * $values['quantity'];
						?>
							<tr>
								<td class="text-center"><?php echo $stt++ ?></td>
								<td class="text-center">
									<img src="./img/<?php echo $values['image1'] ?>" alt="">
								</td>
								<td class="text-center">
									<?php echo $values['name'] ?>
								</td>
								<td class="text-center">
									<?php echo "$" . number_format($values['price']) ?>
								</td>
								<td class="text-left">
									<?php echo $values['quantity'] ?>
								</td>

							</tr>
					<?php endforeach;
					else :
						echo '<h2> None-account </h2> <hr> <h3> <a href= "register.php" > You can create account here !!! </a> </h3>';
					endif; ?>
				</table>
				<?php if (isset($_GET['order_id'])) : ?>
					<div class="total-price">
						<table>
							<tr>
								<td></td>
							</tr>
							<tr>
								<td>Total:</td>
								<td> $<?php echo number_format($grand_total); ?></td>
							</tr>
						</table>
					</div>

				<?php endif; ?>
			</div>
		</div>
	</div>
</div>
<!-- /Cart item detail -->

<?php include "footer.php"; ?>