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
					<?php if (isset($_SESSION['username'])) : $getAllOrders = $orders->getAllOrdersByUserName($_SESSION['username']); ?>
						<tr>
							<th>Order ID</th>
							<th>Name</th>
							<th>Phone</th>
							<th>Email</th>
							<th>Order Date</th>
							<th>Payment mode</th>
							<th>Amount paid</th>
							<th>Action</th>
						</tr>
						<?php
						// hiển thị 5 đơn hàng trên 1 trang
						$perPage = 5;
						// Lấy số trang trên thanh địa chỉ
						$page = isset($_GET['page']) ? $_GET['page'] : 1;
						// Tính tổng số dòng
						$total = count($getAllOrders);
						// lấy đường dẫn đến file hiện hành
						$url = $_SERVER['PHP_SELF'];
						$getOdersByUsername = $orders->getOrdersByUserName($_SESSION['username'], $page, $perPage);
						foreach ($getOdersByUsername as $value) :
						?>
							<tr>
								<td>
									<?php echo $value['order_id'] ?>
								</td>
								<td>
									<?php echo $value['fullname'] ?>
								</td>
								<td>
									<?php echo $value['phone'] ?>
								</td>
								<td>
									<?php echo $value['email'] ?>
								</td>
								<td>
									<?php echo $value['order_date'] ?>
								</td>
								<td>
									<?php echo $value['payment_mode'] ?>
								</td>
								<td>$<?php echo number_format($value['amount_paid']) ?></td>
								<td><a href="view_orders_detail.php?order_id=<?php echo $value['order_id'] ?>"><button class="btn btn-success mx-2">Details</button></a></td>
							</tr>
						<?php endforeach; else :
						echo '<h2> None-account </h2> <hr> <h3> <a href= "register.php" > You can create account here !!! </a> </h3>';
					endif; ?>
				</table>

				<?php if(isset($_SESSION['username'])):  ?>
				<!-- store bottom filter -->
				<div class="store-filter clearfix">
					<ul class="store-pagination">
						<?php (isset($_GET['page'])) ? $currentPage = $_GET['page'] : $currentPage = 1; ?>
						<?php echo $orders->paginate($currentPage, $url, $total, $perPage) ?>
					</ul>
				</div>
				<?php endif ?>
				<!-- /store bottom filter -->
			</div>
		</div>
	</div>
</div>
<!-- /Cart item detail -->

<?php include "footer.php"; ?>