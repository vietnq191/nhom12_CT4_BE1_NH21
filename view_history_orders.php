<?php include "header.php"; ?>
<!-- BREADCRUMB -->
<div id="breadcrumb" class="section">
	<!-- container -->
	<div class="container">
		<!-- row -->
		<div class="row">
			<div class="col-md-12">
				<h3 class="breadcrumb-header">History Orders</h3>
				<ul class="breadcrumb-tree">
					<li><a href="index.php">Home</a></li>
					<li class="active">History Order</li>
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
				<table class="table-striped">
				<?php if (isset($_SESSION['username'])) : $getAllOrders = $orders->getAllOrdersByUserName($_SESSION['username']);?>
					<tr>
						<th>Number</th>
						<th>User Name</th>
						<th>Phone</th>
						<th>Order Date</th>
						<th>Payment mode</th>
						<th>Amount paid</th>
						<th>Action</th>
					</tr>
					<?php 
					
					$stt = 1;
					foreach ($getAllOrders as $values) :
					?>
						<tr>
							<td><?php echo $stt++ ?></td>			
							<td>
							<?php echo $values['username'] ?>
							</td>
							<td>
								<?php echo $values['phone'] ?>
							</td>
							<td>
								<?php echo $values['order_date'] ?>
							</td>
							<td>
								<?php echo $values['payment_mode'] ?>
							</td>
							<td>$<?php echo number_format($values['amount_paid']) ?></td>
							<td><a href="view_orders_detail.php?order_id=<?php echo $values['order_id'] ?>"><button class="btn btn-success mx-2">Details</button></a></td>
						</tr>
					<?php endforeach; else :
						echo '<h2> None-account </h2> <hr> <h3> <a href= "register.php" > You can create account here !!! </a> </h3>';
					endif; ?>
				</table>

			</div>
		</div>
	</div>
</div>
<!-- /Cart item detail -->

<?php include "footer.php"; ?>