<?php
$conn = new mysqli("localhost", "root", "", "project_thuongmaidientu");
if ($conn->connect_error) {
	die("Connection Failed!" . $conn->connect_error);
}

$grand_total = 0;
$allItems = '';
$items = array();

$sql = "SELECT CONCAT(product_name, '(',qty,')') AS ItemQty, total_price FROM cart";
$stmt = $conn->prepare($sql);
$stmt->execute();
$result = $stmt->get_result();
while ($row = $result->fetch_assoc()) {
	$grand_total += $row['total_price'];
	$items[] = $row['ItemQty'];
}
$allItems = implode(", ", $items);
?>


<?php include "header.php"; ?>

<!-- BREADCRUMB -->
<div id="breadcrumb" class="section">
	<!-- container -->
	<div class="container">
		<!-- row -->
		<div class="row">
			<div class="col-md-12">
				<h3 class="breadcrumb-header">Checkout</h3>
				<ul class="breadcrumb-tree">
					<li><a href="index.php">Home</a></li>
					<li class="active">Checkout</li>
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

			<div class="col-md-7" id="order">
				<!-- Billing Details -->
				<?php if(isset($_SESSION['username'])): ?>
				<div class="billing-details">
					<div class="section-title">
						<h3 class="title">complete your order!</h3>
					</div>
					<form action="" method="post" id="placeOrder">
						<input type="hidden" name="products" value="<?php echo $allItems; ?>">
						<input type="hidden" name="grand_total" value="<?php echo $grand_total; ?>">
						<div class="form-group">
							<input type="text" name="name" class="form-control" placeholder="Enter Name" required>
						</div>
						<div class="form-group">
							<input type="email" name="email" class="form-control" placeholder="Enter Email" required>
						</div>
						<div class="form-group">
							<input type="tel" name="phone" class="form-control" placeholder="Enter Phone" required>
						</div>
						<div class="form-group">
							<textarea name="address" class="form-control" rows="3" cols="10" placeholder="Enter Delivery Address Here..." require></textarea>
						</div>
						<h6 class="text-center lead">Select Payment Mode</h6>
						<div class="form-group">
							<select name="pmode" class="form-control" require>
								<option value="" selected disabled>-Select Payment Mode-</option>
								<option value="cod">Cash On Delivery</option>
								<option value="netbanking">Net Banking</option>
								<option value="cards">Debit/Credit Card</option>
							</select>
						</div>
						<div class="form-group">
							<input type="submit" name="submit" value="Place Order" class="primary-btn order-submit btn-block">
						</div>
					</form>
				</div>
				<?php else: echo '<h2> None-account </h2> <hr> <h3> <a href= "register.php" > You can create account here !!! </a> </h3>';
				endif; ?>
				<!-- /Billing Details -->
			</div>

			<!-- Order Details -->
			<div class="col-md-5 order-details">
				<div class="section-title text-center">
					<h3 class="title">Your Order</h3>
				</div>
				<div class="order-summary">
					<div class="order-col">
						<div><strong>PRODUCT</strong></div>
						<div><strong>TOTAL</strong></div>
					</div>
					<?php $getAllCart = $cart->getAllCart();
					foreach ($getAllCart as $value) :
					?>
						<div class="order-products">
							<div class="order-col">
								<div><?php echo $value['qty'] . 'x ' . $value['product_name']; ?></div>
								<div><?php echo number_format($value['product_price']) ?> VND</div>
							</div>
						</div>
					<?php endforeach; ?>
					<div class="order-col">
						<div>Shiping</div>
						<div><strong>FREE</strong></div>
					</div>
					<div class="order-col">
						<div><strong>TOTAL</strong></div>
						<div><strong class="order-total"><?php echo number_format($grand_total) ?> VND</strong></div>
					</div>
				</div>
			</div>
			<!-- /Order Details -->
		</div>
		<!-- /row -->
	</div>
	<!-- /container -->
</div>
<!-- /SECTION -->

<?php include "footer.html"; ?>