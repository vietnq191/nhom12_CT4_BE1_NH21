<?php include "header.php"; ?>

<!-- BREADCRUMB -->
<div id="breadcrumb" class="section">
	<!-- container -->
	<div class="container">
		<!-- row -->
		<div class="row">
			<div class="col-md-12">
				<ul class="breadcrumb-tree">
					<li><a href="#">Home</a></li>
					<li><a href="#">All Categories</a></li>
					<li><a href="#">Accessories</a></li>
					<li><a href="#">Headphones</a></li>
					<li class="active">Product name goes here</li>
				</ul>
			</div>
		</div>
		<!-- /row -->
	</div>
	<!-- /container -->
</div>
<!-- /BREADCRUMB -->

<!-- Section -->
<div class="section">
	<!-- container -->
	<div class="container">
		<!-- row -->
		<div class="row">

			<div class="col-md-12">
				<div class="section-title text-center">
					<h3 class="title">Related Products</h3>
				</div>
			</div>

			<!-- product -->
			<?php if (isset($_GET['manu_id'])) :
				$manu_id = $_GET['manu_id'];
				$getProductByManu = $product->getProductByManu($manu_id);
				// hiển thị 3 sản phẩm trên 1 trang
				$perPage = 3;
				// Lấy số trang trên thanh địa chỉ
				$page = isset($_GET['page']) ? $_GET['page'] : 1;
				// Tính tổng số dòng
				$total = count($getProductByManu);
				// lấy đường dẫn đến file hiện hành
				$url = $_SERVER['PHP_SELF'];
				$get3ProductByManu = $product->get3ProductByManu($manu_id, $page, $perPage);
				foreach ($get3ProductByManu as $value) :

			?>
					<div class="col-md-3 col-xs-6">
						<div class="product">
							<div class="product-img">
								<img src="./img/<?php echo $value['image'] ?>" alt="">
								<div class="product-label">
									<span class="sale">-30%</span>
								</div>
							</div>
							<div class="product-body">
								<p class="product-category">Category</p>
								<h3 class="product-name"><a href="product_detail.php?id=<?php echo $value['id'] ?>&type_id=<?php echo $value['type_id'] ?>"><?php echo substr($value['name'],0,20) ?>...</a></h3>
								<h4 class="product-price"><?php echo number_format($value['price']) ?> VND</h4>
								<div class="product-rating">
								</div>
								<div class="product-btns">
									<button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">add to wishlist</span></button>
									<button class="add-to-compare"><i class="fa fa-exchange"></i><span class="tooltipp">add to compare</span></button>
									<button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">quick view</span></button>
								</div>
							</div>
							<div class="add-to-cart">
								<button class="add-to-cart-btn"><a href="addcart.php?id=<?php echo $value['id'] ?>"><i class="fa fa-shopping-cart">add to cart</i> </a> </button>
							</div>
						</div>
					</div>

			<?php endforeach;
			endif; ?>
			<!-- /product -->
			
		</div>
		<!-- /row -->

	</div>
	<!-- /container -->
</div>
<!-- /Section -->

<?php include "footer.html"; ?>