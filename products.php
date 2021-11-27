<?php include "header.php"; ?>
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
				// hiển thị 8 sản phẩm trên 1 trang
				$perPage = 8;
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
								<img src="./img/<?php echo $value['image'] ?>" width="250" height="200" alt="">
								<div class="product-label">
									<span class="sale">-30%</span>
								</div>
							</div>
							<div class="product-body">
								<p class="product-category">Category</p>
								<h3 class="product-name"><a href="product_detail.php?id=<?php echo $value['id'] ?>&type_id=<?php echo $value['type_id'] ?>"><?php echo substr($value['name'], 0, 20) ?>...</a></h3>
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
								<form class="form-submit" action="action.php" method="">
									<input type="hidden" class="url" name="url" value="<?php echo $_SERVER['SCRIPT_NAME']."?manu_id=".$value['manu_id'] ?>">
									<input type="hidden" class="pid" name="pid" value="<?php echo $value['id'] ?>">
									<input type="hidden" class="pname" name="pname" value="<?php echo $value['name'] ?>">
									<input type="hidden" class="pprice" name="pprice" value="<?php echo $value['price'] ?>">
									<input type="hidden" class="pimg" name="pimg" value="<?php echo $value['image'] ?>">
									<input type="hidden" class="pcode" name="pcode" value="<?php echo $value['product_code'] ?>">
									<button class="add-to-cart-btn addItemBtn" type="submit" name="submit"><i class="fa fa-shopping-cart"></i>add to cart</button>
								</form>
							</div>
						</div>
					</div>

			<?php endforeach;
			endif; ?>
			<!-- /product -->

		</div>
		<!-- /row -->
		<!-- store bottom filter -->
		<div class="store-filter clearfix">
			<ul class="store-pagination">
				<?php (isset($_GET['page'])) ? $currentPage = $_GET['page'] : $currentPage = 1; ?>
				<?php echo $product->paginateForManufactures($manu_id, $currentPage, $url, $total, $perPage) ?>
			</ul>
		</div>
		<!-- /store bottom filter -->
	</div>
	<!-- /container -->
</div>
<!-- /Section -->

<?php include "footer.html"; ?>