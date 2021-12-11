<?php
if (isset($_GET['keyword'])) {
	include "header.php";
	$keyword = $_GET['keyword'];
	$type = $_GET['type'];
	$sort = $_GET['sort'];
	$search = $product->search($type, $keyword);
} else {
	header("location: index.php");
}
?>

<body>
	<!-- SECTION -->
	<div class="section">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
				<!-- ASIDE -->
				<div id="aside" class="col-md-3">
					<!-- aside Widget -->
					<div class="aside">
						<h3 class="aside-title">Categories</h3>
						<div class="checkbox-filter">
							<?php foreach ($getAllProtype as $value) : ?>
								<div class="input-checkbox">
									<input type="checkbox" value="<?php echo $value["type_id"] ?>" id="category-<?php echo $value["type_id"] ?>" <?php if ($type == 0) echo "checked";
																																					elseif ($type == $value["type_id"]) echo "checked" ?>>
									<label for="category-<?php echo $value["type_id"] ?>">
										<span></span>
										<?php echo $value["type_name"] ?>
										<small><?php echo count($typeid = $product->getProductByTypeIDAndName($value["type_id"], $keyword)) ?></small>
									</label>
								</div>
							<?php endforeach; ?>
						</div>
					</div>
					<!-- /aside Widget -->

					<!-- aside Widget -->
					<div class="aside">
						<h3 class="aside-title">Price</h3>
						<div class="price-filter">
							<div id="price-slider"></div>
							<div class="input-number price-min">
								<input id="price-min" type="number">
								<span class="qty-up">+</span>
								<span class="qty-down">-</span>
							</div>
							<span>-</span>
							<div class="input-number price-max">
								<input id="price-max" type="number">
								<span class="qty-up">+</span>
								<span class="qty-down">-</span>
							</div>
						</div>
					</div>
					<!-- /aside Widget -->

					<!-- aside Widget -->
					<div class="aside">
						<div class="section-title">
							<h4 class="title">Top selling</h4>
							<div class="section-nav">
								<div id="slick-nav-5" class="products-slick-nav"></div>
							</div>
						</div>

						<div class="products-widget-slick" data-nav="#slick-nav-5">
							<div>
								<?php
								$get3NewProducts = $product->get3NewProducts(12, 3);
								foreach ($get3NewProducts as $value) : ?>
									<!-- product widget -->
									<div class="product-widget">
										<div class="product-img">
											<img src="./img/<?php echo $value['image'] ?>" alt="">
										</div>
										<div class="product-body">
											<p class="product-category"><?php echo $product->getNameType($value['type_id'])[0]['type_name'] ?></p>
											<h3 class="product-name"><a href="product_detail.php?id=<?php echo $value['id'] ?>&type_id=<?php echo $value['type_id'] ?>"><?php if (strlen($value['name']) > 10) {
																																											echo substr($value['name'], 0, 20) . '...';
																																										} else {
																																											echo $value['name'];
																																										} ?></a></h3>
											<h4 class="product-price"><?php echo number_format($value['price']) ?> VND</h4>
										</div>
									</div>
									<!-- /product widget -->
								<?php endforeach; ?>
							</div>

							<div>
								<?php
								$get3NewProducts = $product->get3NewProducts(15, 3);
								foreach ($get3NewProducts as $value) : ?>
									<!-- product widget -->
									<div class="product-widget">
										<div class="product-img">
											<img src="./img/<?php echo $value['image'] ?>" alt="">
										</div>
										<div class="product-body">
											<p class="product-category"><?php echo $product->getNameType($value['type_id'])[0]['type_name'] ?></p>
											<h3 class="product-name"><a href="product_detail.php?id=<?php echo $value['id'] ?>&type_id=<?php echo $value['type_id'] ?>"><?php if (strlen($value['name']) > 10) {
																																											echo substr($value['name'], 0, 20) . '...';
																																										} else {
																																											echo $value['name'];
																																										} ?></a></h3>
											<h4 class="product-price"><?php echo number_format($value['price']) ?> VND</h4>
										</div>
									</div>
									<!-- /product widget -->
								<?php endforeach; ?>
							</div>
						</div>
					</div>


					<!-- /aside Widget -->
				</div>
				<!-- /ASIDE -->

				<!-- STORE -->
				<div id="store" class="col-md-9">
					<!-- store top filter -->
					<div class="store-filter clearfix">
						<!-- section title -->
						<div class="col-md-12">
							<div class="section-title">
								<ul class="section-tab-nav tab-nav">
									<?php
									$arr = array(
										"default" => "Popular",
										"ascending_name" => "Ascending name",
										"descending_name" => "Descending name",
										"low_price" => "Low price",
										"high_price" => "High price",
									);
									$getURL = $_SERVER['REQUEST_URI'];
									$pos = strpos($getURL, "&sort=");
									$subURL = substr($getURL, 0, $pos);
									foreach ($arr as $x => $x_value) :
									?>
										<li class="<?php if ($_GET['sort'] == $x) echo "active" ?>"><a href="<?php echo $subURL . "&sort=" . $x ?>"><?php echo $x_value ?></a></li>
									<?php endforeach; ?>
								</ul>
							</div>
						</div>
						<!-- /section title -->
						<!-- /store top filter -->

						<!-- store products -->
						<ul class="breadcrumb-tree">
							<li class="active">Products: <?php echo count($search) . " (result)"; ?></li>
						</ul>
						<!-- store products -->

						<!-- store products -->
						<div class="row">
							<?php
							$perPage = 6;
							$page = isset($_GET['page']) ? $_GET['page'] : 1;
							$total = count($search);
							$url = $_SERVER['PHP_SELF'] . "?type=" . $type . "&keyword=" . $keyword . "&sort=" . $sort;
							$get6ProductsSearch = $product->get6ProductsSearch($type, $keyword, $page, $perPage, $sort);
							if ($total == 0) { ?>
								<div class="col-md-12">
									<label>NO RESULTS FOUND</label>
								</div>
								<?php
							} else {
								foreach ($get6ProductsSearch as $value) :
								?>
									<!-- product -->
									<div class="col-md-4 col-xs-6">
										<div class="product">
											<div class="product-img">
												<img src="./img/<?php echo $value['image'] ?>" width="300" height="250" alt="">
												<div class="product-label">
													<span class="new">NEW</span>
												</div>
											</div>
											<div class="product-body">
												<p class="product-category"><?php echo $product->getNameType($value['type_id'])[0]['type_name'] ?></p>
												<h3 class="product-name"><a href="product_detail.php?id=<?php echo $value['id'] ?>&type_id=<?php echo $value['type_id'] ?>"><?php if (strlen($value['name']) > 10) {
																																												echo substr($value['name'], 0, 20) . '...';
																																											} else {
																																												echo $value['name'];
																																											} ?></a></h3>
												<h4 class="product-price"><?php echo number_format($value['price']) ?> VNĐ</h4>
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
													<input type="hidden" class="url" name="url" value="<?php echo $_SERVER['PHP_SELF'] . "?type=" . $type . "&keyword=" . $keyword . "&sort=" . $sort; ?>">
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
									<!-- /product -->
								<?php endforeach ?>
							<?php } ?>
						</div>
						<!-- /store products -->

						<!-- store bottom filter -->
						<div class="store-filter clearfix">
							<ul class="store-pagination">
								<?php (isset($_GET['page'])) ? $currentPage = $_GET['page'] : $currentPage = 1; ?>
								<?php echo $product->paginate($currentPage, $url, $total, $perPage) ?>
							</ul>
						</div>
						<!-- /store bottom filter -->
					</div>
					<!-- /STORE -->
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->

		<?php include "footer.html" ?>