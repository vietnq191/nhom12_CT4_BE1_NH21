<?php
if (isset($_GET['id'])) {
	include "header.php";
}
?>

<!-- BREADCRUMB -->
<div id="breadcrumb" class="section">
	<!-- container -->
	<div class="container">
		<!-- row -->
		<?php if (isset($_GET['id'])) :
			foreach ($getAllProducts as $value) :
				foreach ($getAllProtype as $item) :
					if ($_GET['id'] == $value['id'] && $value['type_id'] == $item['type_id']) :
		?>
						<div class="row">
							<div class="col-md-12">
								<ul class="breadcrumb-tree">
									<li><a href="index.php">Home</a></li>
									<li><?php echo $item['type_name'] ?></li>
									<li class="active"><?php echo $value['name'] ?></li>
								</ul>
							</div>
						</div>
		<?php endif;
				endforeach;
			endforeach;
		endif; ?>
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
			<?php if (isset($_GET['id'])) :  ?>
				<?php foreach ($getAllProducts as $value) : ?>
					<?php if ($_GET['id'] == $value['id']) : ?>
						<!-- Product main img -->
						<div class="col-md-5 col-md-push-2">
							<div id="product-main-img">
								<div class="product-preview">
									<img src="./img/<?php echo $value['image1'] ?>" alt="">
								</div>

								<div class="product-preview">
									<img src="./img/<?php echo $value['image2'] ?>" alt="">
								</div>

								<div class="product-preview">
									<img src="./img/<?php echo $value['image3'] ?>" alt="">
								</div>

								<div class="product-preview">
									<img src="./img/<?php echo $value['image4'] ?>" alt="">
								</div>
							</div>
						</div>
						<!-- /Product main img -->

						<!-- Product thumb imgs -->
						<div class="col-md-2  col-md-pull-5">
							<div id="product-imgs">
								<div class="product-preview">
									<img src="./img/<?php echo $value['image1'] ?>" alt="">
								</div>

								<div class="product-preview">
									<img src="./img/<?php echo $value['image2'] ?>" alt="">
								</div>

								<div class="product-preview">
									<img src="./img/<?php echo $value['image3'] ?>" alt="">
								</div>

								<div class="product-preview">
									<img src="./img/<?php echo $value['image4'] ?>" alt="">
								</div>
							</div>
						</div>
						<!-- /Product thumb imgs -->

						<!-- Product details -->
						<div class="col-md-5">
							<div class="product-details">
								<h2 class="product-name"><?php echo $value['name'] ?></h2>
								<div>
									<div class="product-rating">
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star-o"></i>
									</div>
								</div>
								<div>
									<h3 class="product-price">$<?php echo number_format($value['price']) ?></h3>
									<span class="product-available">In Stock</span>
								</div>
								<p><?php if(strlen($value['description'])>200){ echo substr($value['description'], 0, 350).'...'; }else{ echo $value['description']; }?></p>

								<div class="add-to-cart">
									<form class="form-submit" action="action.php" method="">
										<input type="hidden" class="url" name="url" value="<?php echo $_SERVER['SCRIPT_NAME'] . "?id=" . $value['id'] . "&type_id=" . $value['type_id'] ?>">
										<input type="hidden" class="pid" name="pid" value="<?php echo $value['id'] ?>">
										<input type="hidden" class="pname" name="pname" value="<?php echo $value['name'] ?>">
										<input type="hidden" class="pprice" name="pprice" value="<?php echo $value['price'] ?>">
										<input type="hidden" class="pimg" name="pimg" value="<?php echo $value['image1'] ?>">
										<input type="hidden" class="pcode" name="pcode" value="<?php echo $value['product_code'] ?>">
										<button class="add-to-cart-btn addItemBtn" type="submit" name="submit"><i class="fa fa-shopping-cart"></i>add to cart</button>
									</form>
								</div>

								<ul class="product-links">
									<li>Category:</li>
									<li><a href="products_typeid.php?type_id=<?php echo $value['type_id']?>"><?php echo $product->getNameType($value['type_id'])[0]['type_name'] ?></a></li>
								</ul>
							</div>
						</div>
						<!-- /Product details -->

						<!-- Product tab -->
						<div class="col-md-12">
							<div id="product-tab">
								<!-- product tab nav -->
								<ul class="tab-nav">
									<li class="active"><a data-toggle="tab" href="#tab1">Description</a></li>
									<li><a data-toggle="tab" href="#tab2">Details</a></li>
								</ul>
								<!-- /product tab nav -->

								<!-- product tab content -->
								<div class="tab-content">
									<!-- tab1  -->
									<div id="tab1" class="tab-pane fade in active">
										<div class="row">
											<div class="col-md-12">
												<p><?php echo $value['description'] ?></p>
											</div>
										</div>
									</div>
									<!-- /tab1  -->

									<!-- tab2  -->
									<div id="tab2" class="tab-pane fade in">
										<div class="row">
											<div class="col-md-12">
												<p> <b>Dimensions:</b> <?php echo $value['dimensions'] ?></p>
												<p> <b>Display size:</b> <?php echo $value['display_size'] ?></p>
											</div>
										</div>
									</div>
									<!-- /tab2  -->
								</div>
								<!-- /product tab content  -->
							</div>
						</div>

						<!-- /product tab -->

		</div>
<?php endif;
				endforeach;
			else :
				header("location: index.php");
			endif; ?>
<!-- /row -->
	</div>
	<!-- /container -->
</div>
<!-- /SECTION -->

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
			<?php if (isset($_GET['type_id'])) :
				$type_id = $_GET['type_id'];
				$id = $_GET['id'];
				$getProductByTypeId = $product->getProductByTypeId($type_id);
				$perPage = 8;
				// Lấy số trang trên thanh địa chỉ
				$page = isset($_GET['page']) ? $_GET['page'] : 1;
				// Tính tổng số dòng
				$total = count($getProductByTypeId);
				// lấy đường dẫn đến file hiện hành
				$url = $_SERVER['PHP_SELF'];
				$get8ProductByID = $product->get8ProductByID($type_id, $page, $perPage);
				foreach ($get8ProductByID as $value) :
			?>
					<!-- product -->
					<div class="col-md-3 col-xs-6">
						<div class="product">
							<div class="product-img">
								<img src="./img/<?php echo $value['image1'] ?>" height="250" width="300" alt="">
								<div class="product-label">
								</div>
							</div>
							<div class="product-body">
								<p class="product-category"><?php echo $product->getNameType($value['type_id'])[0]['type_name'] ?></p>
								<h3 class="product-name"><a href="product_detail.php?id=<?php echo $value['id'] ?>&type_id=<?php echo $value['type_id'] ?>"><?php if (strlen($value['name']) > 10) {
																																								echo substr($value['name'], 0, 20) . '...';
																																							} else {
																																								echo $value['name'];
																																							} ?></a></h3>
								<h4 class="product-price">$<?php echo number_format($value['price']) ?></h4>
								<div class="product-rating">
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
								</div>
							</div>
							<div class="add-to-cart">
								<form class="form-submit" action="action.php" method="">
									<input type="hidden" class="url" name="url" value="<?php echo $_SERVER['SCRIPT_NAME'] . "?id=" . $value['id'] . "&type_id=" . $value['type_id'] ?>">
									<input type="hidden" class="pid" name="pid" value="<?php echo $value['id'] ?>">
									<input type="hidden" class="pname" name="pname" value="<?php echo $value['name'] ?>">
									<input type="hidden" class="pprice" name="pprice" value="<?php echo $value['price'] ?>">
									<input type="hidden" class="pimg" name="pimg" value="<?php echo $value['image1'] ?>">
									<input type="hidden" class="pcode" name="pcode" value="<?php echo $value['product_code'] ?>">
									<button class="add-to-cart-btn addItemBtn" type="submit" name="submit"><i class="fa fa-shopping-cart"></i>add to cart</button>
								</form>
							</div>
						</div>
					</div>
					<!-- /product -->

			<?php endforeach;
			endif; ?>

		</div>
		<!-- /row -->
		<!-- store bottom filter -->
		<div class="store-filter clearfix">
			<ul class="store-pagination">
				<?php (isset($_GET['page'])) ? $currentPage = $_GET['page'] : $currentPage = 1; ?>
				<?php echo $product->paginateForProtypeID($id, $type_id, $currentPage, $url, $total, $perPage) ?>
			</ul>
		</div>
		<!-- /store bottom filter -->

	</div>
	<!-- /container -->
</div>
<!-- /Section -->

<?php include "footer.php"; ?>