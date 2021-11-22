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
									<input type="checkbox" id="category-<?php echo $value["type_id"] ?>" <?php if ($type == 0) echo "checked";
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
						<h3 class="aside-title">Top selling</h3>
						<div class="product-widget">
							<div class="product-img">
								<img src="./img/product01.png" alt="">
							</div>
							<div class="product-body">
								<p class="product-category">Category</p>
								<h3 class="product-name"><a href="#">product name goes here</a></h3>
								<h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>
							</div>
						</div>

						<div class="product-widget">
							<div class="product-img">
								<img src="./img/product02.png" alt="">
							</div>
							<div class="product-body">
								<p class="product-category">Category</p>
								<h3 class="product-name"><a href="#">product name goes here</a></h3>
								<h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>
							</div>
						</div>

						<div class="product-widget">
							<div class="product-img">
								<img src="./img/product03.png" alt="">
							</div>
							<div class="product-body">
								<p class="product-category">Category</p>
								<h3 class="product-name"><a href="#">product name goes here</a></h3>
								<h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>
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
									<li class="active"><a data-toggle="tab" href="#tab2">Popular</a></li>
									<li><a data-toggle="tab" href="#tab2">Ascending name</a></li>
									<li><a data-toggle="tab" href="#tab2">Descending name</a></li>
									<li><a data-toggle="tab" href="#tab2">Low price</a></li>
									<li><a data-toggle="tab" href="#tab2">High price</a></li>
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
													<span class="sale">-30%</span>
													<span class="new">NEW</span>
												</div>
											</div>
											<div class="product-body">
												<p class="product-category">Category</p>
												<h3 class="product-name"><a href="product_detail.php?id=<?php echo $value['id'] ?>&type_id=<?php echo $value['type_id'] ?>"><?php echo substr($value['name'], 0, 20) ?>...</a></h3>
												<h4 class="product-price"><?php echo number_format($value['price']) ?> VNĐ</h4>
												<div class="product-rating">
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
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

		<?php include "footer.php" ?>