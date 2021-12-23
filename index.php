<?php include "header.php";
?>
<!-- SECTION -->
<div class="section">
	<!-- container -->
	<div class="container">
		<!-- row -->
		<div class="row">
			<div class="messenger"></div>
			<!-- shop -->
			<div class="col-md-4 col-xs-6">
				<div class="shop">
					<div class="shop-img">
						<img src="./img/shop01.png" alt="">
					</div>
					<div class="shop-body">
						<h3>Laptop<br>Collection</h3>
						<a href="products_typeid.php?type_id=1" class="cta-btn">Shop now <i class="fa fa-arrow-circle-right"></i></a>
					</div>
				</div>
			</div>
			<!-- /shop -->

			<!-- shop -->
			<div class="col-md-4 col-xs-6">
				<div class="shop">
					<div class="shop-img">
						<img src="./img/shop03.png" alt="">
					</div>
					<div class="shop-body">
						<h3>Headphone<br>Collection</h3>
						<a href="products_typeid.php?type_id=4" class="cta-btn">Shop now <i class="fa fa-arrow-circle-right"></i></a>
					</div>
				</div>
			</div>
			<!-- /shop -->

			<!-- shop -->
			<div class="col-md-4 col-xs-6">
				<div class="shop">
					<div class="shop-img">
						<img src="./img/shop02.png" alt="">
					</div>
					<div class="shop-body">
						<h3>Cameras<br>Collection</h3>
						<a href="products_typeid.php?type_id=3" class="cta-btn">Shop now <i class="fa fa-arrow-circle-right"></i></a>
					</div>
				</div>
			</div>
			<!-- /shop -->
		</div>
		<!-- /row -->
	</div>
	<!-- /container -->
</div>
<!-- /SECTION -->

<!-- SECTION -->
<div class="section">
	<!-- container -->
	<div class="container">
		<!-- row -->
		<div class="row">
			<!-- section title -->
			<div class="col-md-12">
				<div class="section-title">
					<h3 class="title">New Products</h3>
				</div>
			</div>
			<!-- /section title -->

			<!-- Products tab & slick -->
			<div class="col-md-12">
				<div id="messenger"></div>
				<div class="row">
					<div class="products-tabs">
						<!-- tab -->
						<div id="tab1" class="tab-pane active">
							<div class="products-slick" data-nav="#slick-nav-1">
								<?php foreach ($getNewProducts as $value) : ?>
									<!-- product -->
									<div class="product">
										<div class="product-img">
											<img src="./img/<?php echo $value['image1'] ?>" width="250" height="200" alt="">
											<div class="product-label">
												<span class="new">NEW</span>
											</div>
											<div class="product-body">
												<p class="product-category"><?php echo $product->getNameType($value['type_id'])[0]['type_name'] ?></p>
												<h3 class="product-name"><a href="product_detail.php?id=<?php echo $value['id'] ?>&type_id=<?php echo $value['type_id'] ?>"><?php echo substr($value['name'], 0, 20) ?>...</a></h3>
												<h4 class="product-price">$<?php echo number_format($value['price']) ?></h4>
												<div class="product-rating">
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
												</div>
											</div>
										</div>

										<div class="add-to-cart">
											<form class="form-submit" action="action.php" method="">
												<input type="hidden" class="url" name="url" value="<?php echo $_SERVER['SCRIPT_NAME'] ?>">
												<input type="hidden" class="pid" name="pid" value="<?php echo $value['id'] ?>">
												<input type="hidden" class="pname" name="pname" value="<?php echo $value['name'] ?>">
												<input type="hidden" class="pprice" name="pprice" value="<?php echo $value['price'] ?>">
												<input type="hidden" class="pimg" name="pimg" value="<?php echo $value['image1'] ?>">
												<input type="hidden" class="pcode" name="pcode" value="<?php echo $value['product_code'] ?>">
												<button class="add-to-cart-btn addItemBtn" type="submit" name="submit"><i class="fa fa-shopping-cart"></i>add to cart</button>
											</form>
										</div>
									</div>
									<!-- /product -->
								<?php endforeach ?>
							</div>
							<div id="slick-nav-1" class="products-slick-nav"></div>
						</div>
						<!-- /tab -->
					</div>
				</div>
			</div>
			<!-- Products tab & slick -->
		</div>
		<!-- /row -->
	</div>
	<!-- /container -->
</div>
<!-- /SECTION -->

<!-- HOT DEAL SECTION -->
<div id="hot-deal" class="section">
	<!-- container -->
	<div class="container">
		<!-- row -->
		<div class="row">
			<div class="col-md-12">
				<div class="hot-deal">
					<ul class="hot-deal-countdown" countdown="" data-date="January 19 2022 10:10:10">
						<li>
							<div>
								<h3 data-days="">02</h3>
								<span>Days</span>
							</div>
						</li>
						<li>
							<div>
								<h3 data-hours="">10</h3>
								<span>Hours</span>
							</div>
						</li>
						<li>
							<div>
								<h3 data-minutes="">34</h3>
								<span>Mins</span>
							</div>
						</li>
						<li>
							<div>
								<h3 data-seconds="">60</h3>
								<span>Secs</span>
							</div>
						</li>
					</ul>
					<h2 class="text-uppercase">hot deal this week</h2>
					<p>New Collection Up to 50% OFF</p>
					<a class="primary-btn cta-btn" href="index.php">Shop now</a>
				</div>
			</div>
		</div>
		<!-- /row -->
	</div>
	<!-- /container -->
</div>
<!-- /HOT DEAL SECTION -->

<!-- SECTION -->
<div class="section">
	<!-- container -->
	<div class="container">
		<!-- row -->
		<div class="row">

			<!-- section title -->
			<div class="col-md-12">
				<div class="section-title">
					<h3 class="title">Feature products</h3>
				</div>
			</div>
			<!-- /section title -->

			<!-- Products tab & slick -->
			<div class="col-md-12">
				<div class="row">
					<div class="products-tabs">
						<!-- tab -->
						<div id="tab2" class="tab-pane fade in active">
							<div class="products-slick" data-nav="#slick-nav-2">
								<!-- product -->
								<?php $getTopSellingProducts = $product->getTopSellingProducts();
								foreach ($getTopSellingProducts as $value) :
								?>
									<div class="product">
										<div class="product-img">
											<img src="./img/<?php echo $value['image1'] ?>" width="250" height="200" alt="">
											<div class="product-label">
												<span class="new">NEW</span>
											</div>
										</div>
										<div class="product-body">
											<p class="product-category"><?php echo $product->getNameType($value['type_id'])[0]['type_name'] ?></p>
											<h3 class="product-name"><a href="product_detail.php?id=<?php echo $value['id'] ?>&type_id=<?php echo $value['type_id'] ?>"><?php echo substr($value['name'], 0, 20) ?>...</a></h3>
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
												<input type="hidden" class="url" name="url" value="<?php echo $_SERVER['SCRIPT_NAME'] ?>">
												<input type="hidden" class="pid" name="pid" value="<?php echo $value['id'] ?>">
												<input type="hidden" class="pname" name="pname" value="<?php echo $value['name'] ?>">
												<input type="hidden" class="pprice" name="pprice" value="<?php echo $value['price'] ?>">
												<input type="hidden" class="pimg" name="pimg" value="<?php echo $value['image1'] ?>">
												<input type="hidden" class="pcode" name="pcode" value="<?php echo $value['product_code'] ?>">
												<button class="add-to-cart-btn addItemBtn" type="submit" name="submit"><i class="fa fa-shopping-cart"></i>add to cart</button>
											</form>
										</div>
									</div>
								<?php endforeach; ?>
								<!-- /product -->
							</div>
							<div id="slick-nav-2" class="products-slick-nav"></div>
						</div>
						<!-- /tab -->
					</div>
				</div>
			</div>
			<!-- /Products tab & slick -->
		</div>
		<!-- /row -->
	</div>
	<!-- /container -->
</div>
<!-- /SECTION -->

<!-- SECTION -->
<div class="section">
	<!-- container -->
	<div class="container">
		<!-- row -->
		<div class="row">
			<div class="col-md-4 col-xs-6">
				<div class="section-title">
					<h4 class="title">Feature products</h4>
					<div class="section-nav">
						<div id="slick-nav-3" class="products-slick-nav"></div>
					</div>
				</div>

				<div class="products-widget-slick" data-nav="#slick-nav-3">
					<div>
						<?php
						$get3ProductsFeature = $product->get3ProductsFeature(0, 3);
						foreach ($get3ProductsFeature as $value) : ?>
							<!-- product widget -->
							<div class="product-widget">
								<div class="product-img">
									<img src="./img/<?php echo $value['image1'] ?>" alt="">
								</div>
								<div class="product-body">
									<p class="product-category"><?php echo $product->getNameType($value['type_id'])[0]['type_name'] ?></p>
									<h3 class="product-name"><a href="product_detail.php?id=<?php echo $value['id'] ?>&type_id=<?php echo $value['type_id'] ?>"><?php if (strlen($value['name']) > 10) {
																																									echo substr($value['name'], 0, 20) . '...';
																																								} else {
																																									echo $value['name'];
																																								} ?></a></h3>
									<h4 class="product-price">$<?php echo number_format($value['price']) ?></h4>
								</div>
							</div>
							<!-- /product widget -->
						<?php endforeach; ?>
					</div>

					<div>
						<?php
						$get3ProductsFeature = $product->get3ProductsFeature(3, 3);
						foreach ($get3ProductsFeature as $value) : ?>
							<!-- product widget -->
							<div class="product-widget">
								<div class="product-img">
									<img src="./img/<?php echo $value['image1'] ?>" alt="">
								</div>
								<div class="product-body">
									<p class="product-category"><?php echo $product->getNameType($value['type_id'])[0]['type_name'] ?></p>
									<h3 class="product-name"><a href="product_detail.php?id=<?php echo $value['id'] ?>&type_id=<?php echo $value['type_id'] ?>"><?php if (strlen($value['name']) > 10) {
																																									echo substr($value['name'], 0, 20) . '...';
																																								} else {
																																									echo $value['name'];
																																								} ?></a></h3>
									<h4 class="product-price">$<?php echo number_format($value['price']) ?></h4>
								</div>
							</div>
							<!-- /product widget -->
						<?php endforeach; ?>
					</div>
				</div>
			</div>

			<div class="col-md-4 col-xs-6">
				<div class="section-title">
					<h4 class="title">High Price</h4>
					<div class="section-nav">
						<div id="slick-nav-4" class="products-slick-nav"></div>
					</div>
				</div>

				<div class="products-widget-slick" data-nav="#slick-nav-4">
					<div>
						<?php
						$get3ProductsHighPrice = $product->get3ProductsHighPrice(0, 3);
						foreach ($get3ProductsHighPrice as $value) : ?>
							<!-- product widget -->
							<div class="product-widget">
								<div class="product-img">
									<img src="./img/<?php echo $value['image1'] ?>" alt="">
								</div>
								<div class="product-body">
									<p class="product-category"><?php echo $product->getNameType($value['type_id'])[0]['type_name'] ?></p>
									<h3 class="product-name"><a href="product_detail.php?id=<?php echo $value['id'] ?>&type_id=<?php echo $value['type_id'] ?>"><?php if (strlen($value['name']) > 10) {
																																									echo substr($value['name'], 0, 20) . '...';
																																								} else {
																																									echo $value['name'];
																																								} ?></a></h3>
									<h4 class="product-price">$<?php echo number_format($value['price']) ?></h4>
								</div>
							</div>
							<!-- /product widget -->
						<?php endforeach; ?>
					</div>

					<div>
						<?php
						$get3ProductsHighPrice = $product->get3ProductsHighPrice(3, 3);
						foreach ($get3ProductsHighPrice as $value) : ?>
							<!-- product widget -->
							<div class="product-widget">
								<div class="product-img">
									<img src="./img/<?php echo $value['image1'] ?>" alt="">
								</div>
								<div class="product-body">
									<p class="product-category"><?php echo $product->getNameType($value['type_id'])[0]['type_name'] ?></p>
									<h3 class="product-name"><a href="product_detail.php?id=<?php echo $value['id'] ?>&type_id=<?php echo $value['type_id'] ?>"><?php if (strlen($value['name']) > 10) {
																																									echo substr($value['name'], 0, 20) . '...';
																																								} else {
																																									echo $value['name'];
																																								} ?></a></h3>
									<h4 class="product-price">$<?php echo number_format($value['price']) ?></h4>
								</div>
							</div>
							<!-- /product widget -->
						<?php endforeach; ?>
					</div>
				</div>
			</div>

			<div class="clearfix visible-sm visible-xs"></div>

			<div class="col-md-4 col-xs-6">
				<div class="section-title">
					<h4 class="title">Low Price</h4>
					<div class="section-nav">
						<div id="slick-nav-5" class="products-slick-nav"></div>
					</div>
				</div>

				<div class="products-widget-slick" data-nav="#slick-nav-5">
					<div>
						<?php
						$get3ProductsLowPrice = $product->get3ProductsLowPrice(0, 3);
						foreach ($get3ProductsLowPrice as $value) : ?>
							<!-- product widget -->
							<div class="product-widget">
								<div class="product-img">
									<img src="./img/<?php echo $value['image1'] ?>" alt="">
								</div>
								<div class="product-body">
									<p class="product-category"><?php echo $product->getNameType($value['type_id'])[0]['type_name'] ?></p>
									<h3 class="product-name"><a href="product_detail.php?id=<?php echo $value['id'] ?>&type_id=<?php echo $value['type_id'] ?>"><?php if (strlen($value['name']) > 10) {
																																									echo substr($value['name'], 0, 20) . '...';
																																								} else {
																																									echo $value['name'];
																																								} ?></a></h3>
									<h4 class="product-price">$<?php echo number_format($value['price']) ?></h4>
								</div>
							</div>
							<!-- /product widget -->
						<?php endforeach; ?>
					</div>

					<div>
						<?php
						$get3ProductsLowPrice = $product->get3ProductsLowPrice(3, 3);
						foreach ($get3ProductsLowPrice as $value) : ?>
							<!-- product widget -->
							<div class="product-widget">
								<div class="product-img">
									<img src="./img/<?php echo $value['image1'] ?>" alt="">
								</div>
								<div class="product-body">
									<p class="product-category"><?php echo $product->getNameType($value['type_id'])[0]['type_name'] ?></p>
									<h3 class="product-name"><a href="product_detail.php?id=<?php echo $value['id'] ?>&type_id=<?php echo $value['type_id'] ?>"><?php if (strlen($value['name']) > 10) {
																																									echo substr($value['name'], 0, 20) . '...';
																																								} else {
																																									echo $value['name'];
																																								} ?></a></h3>
									<h4 class="product-price">$<?php echo number_format($value['price']) ?></h4>
								</div>
							</div>
							<!-- /product widget -->
						<?php endforeach; ?>
					</div>
				</div>
			</div>

		</div>
		<!-- /row -->
	</div>
	<!-- /container -->
</div>
<!-- /SECTION -->

<?php include "footer.php"; ?>