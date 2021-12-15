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
									<img src="./img/<?php echo $value['image'] ?>" alt="">
								</div>

								<div class="product-preview">
									<img src="./img/<?php echo $value['image1'] ?>" alt="">
								</div>

								<div class="product-preview">
									<img src="./img/<?php echo $value['image2'] ?>" alt="">
								</div>

								<div class="product-preview">
									<img src="./img/<?php echo $value['image3'] ?>" alt="">
								</div>
							</div>
						</div>
						<!-- /Product main img -->

						<!-- Product thumb imgs -->
						<div class="col-md-2  col-md-pull-5">
							<div id="product-imgs">
								<div class="product-preview">
									<img src="./img/<?php echo $value['image'] ?>" alt="">
								</div>

								<div class="product-preview">
									<img src="./img/<?php echo $value['image1'] ?>" alt="">
								</div>

								<div class="product-preview">
									<img src="./img/<?php echo $value['image2'] ?>" alt="">
								</div>

								<div class="product-preview">
									<img src="./img/<?php echo $value['image3'] ?>" alt="">
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
									<a class="review-link" href="#">10 Review(s) | Add your review</a>
								</div>
								<div>
									<h3 class="product-price"><?php echo number_format($value['price']) ?> VND</h3>
									<span class="product-available">In Stock</span>
								</div>
								<p><?php echo $value['description'] ?>

								<div class="add-to-cart">
									<form class="form-submit" action="action.php" method="">
										<input type="hidden" class="url" name="url" value="<?php echo $_SERVER['SCRIPT_NAME'] . "?id=" . $value['id'] . "&type_id=" . $value['type_id'] ?>">
										<input type="hidden" class="pid" name="pid" value="<?php echo $value['id'] ?>">
										<input type="hidden" class="pname" name="pname" value="<?php echo $value['name'] ?>">
										<input type="hidden" class="pprice" name="pprice" value="<?php echo $value['price'] ?>">
										<input type="hidden" class="pimg" name="pimg" value="<?php echo $value['image'] ?>">
										<input type="hidden" class="pcode" name="pcode" value="<?php echo $value['product_code'] ?>">
										<button class="add-to-cart-btn addItemBtn" type="submit" name="submit"><i class="fa fa-shopping-cart"></i>add to cart</button>
									</form>
								</div>

								<ul class="product-btns">
									<li><a href="#"><i class="fa fa-heart-o"></i> add to wishlist</a></li>
									<li><a href="#"><i class="fa fa-exchange"></i> add to compare</a></li>
								</ul>

								<ul class="product-links">
									<li>Category:</li>
									<li><a href="#"><?php echo $product->getNameType($value['type_id'])[0]['type_name'] ?></a></li>
								</ul>

								<ul class="product-links">
									<li>Share:</li>
									<li><a href="#"><i class="fa fa-facebook"></i></a></li>
									<li><a href="#"><i class="fa fa-twitter"></i></a></li>
									<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
									<li><a href="#"><i class="fa fa-envelope"></i></a></li>
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
									<li><a data-toggle="tab" href="#tab3">Reviews (3)</a></li>
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

									<!-- tab3  -->
									<div id="tab3" class="tab-pane fade in">
										<div class="row">
											<!-- Rating -->
											<div class="col-md-3">
												<div id="rating">
													<div class="rating-avg">
														<span>4.5</span>
														<div class="rating-stars">
															<i class="fa fa-star"></i>
															<i class="fa fa-star"></i>
															<i class="fa fa-star"></i>
															<i class="fa fa-star"></i>
															<i class="fa fa-star-o"></i>
														</div>
													</div>
													<ul class="rating">
														<li>
															<div class="rating-stars">
																<i class="fa fa-star"></i>
																<i class="fa fa-star"></i>
																<i class="fa fa-star"></i>
																<i class="fa fa-star"></i>
																<i class="fa fa-star"></i>
															</div>
															<div class="rating-progress">
																<div style="width: 80%;"></div>
															</div>
															<span class="sum">3</span>
														</li>
														<li>
															<div class="rating-stars">
																<i class="fa fa-star"></i>
																<i class="fa fa-star"></i>
																<i class="fa fa-star"></i>
																<i class="fa fa-star"></i>
																<i class="fa fa-star-o"></i>
															</div>
															<div class="rating-progress">
																<div style="width: 60%;"></div>
															</div>
															<span class="sum">2</span>
														</li>
														<li>
															<div class="rating-stars">
																<i class="fa fa-star"></i>
																<i class="fa fa-star"></i>
																<i class="fa fa-star"></i>
																<i class="fa fa-star-o"></i>
																<i class="fa fa-star-o"></i>
															</div>
															<div class="rating-progress">
																<div></div>
															</div>
															<span class="sum">0</span>
														</li>
														<li>
															<div class="rating-stars">
																<i class="fa fa-star"></i>
																<i class="fa fa-star"></i>
																<i class="fa fa-star-o"></i>
																<i class="fa fa-star-o"></i>
																<i class="fa fa-star-o"></i>
															</div>
															<div class="rating-progress">
																<div></div>
															</div>
															<span class="sum">0</span>
														</li>
														<li>
															<div class="rating-stars">
																<i class="fa fa-star"></i>
																<i class="fa fa-star-o"></i>
																<i class="fa fa-star-o"></i>
																<i class="fa fa-star-o"></i>
																<i class="fa fa-star-o"></i>
															</div>
															<div class="rating-progress">
																<div></div>
															</div>
															<span class="sum">0</span>
														</li>
													</ul>
												</div>
											</div>
											<!-- /Rating -->

											<!-- Reviews -->
											<div class="col-md-6">
												<div id="reviews">
													<ul class="reviews">
														<li>
															<div class="review-heading">
																<h5 class="name">John</h5>
																<p class="date">27 DEC 2018, 8:0 PM</p>
																<div class="review-rating">
																	<i class="fa fa-star"></i>
																	<i class="fa fa-star"></i>
																	<i class="fa fa-star"></i>
																	<i class="fa fa-star"></i>
																	<i class="fa fa-star-o empty"></i>
																</div>
															</div>
															<div class="review-body">
																<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua</p>
															</div>
														</li>
														<li>
															<div class="review-heading">
																<h5 class="name">John</h5>
																<p class="date">27 DEC 2018, 8:0 PM</p>
																<div class="review-rating">
																	<i class="fa fa-star"></i>
																	<i class="fa fa-star"></i>
																	<i class="fa fa-star"></i>
																	<i class="fa fa-star"></i>
																	<i class="fa fa-star-o empty"></i>
																</div>
															</div>
															<div class="review-body">
																<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua</p>
															</div>
														</li>
														<li>
															<div class="review-heading">
																<h5 class="name">John</h5>
																<p class="date">27 DEC 2018, 8:0 PM</p>
																<div class="review-rating">
																	<i class="fa fa-star"></i>
																	<i class="fa fa-star"></i>
																	<i class="fa fa-star"></i>
																	<i class="fa fa-star"></i>
																	<i class="fa fa-star-o empty"></i>
																</div>
															</div>
															<div class="review-body">
																<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua</p>
															</div>
														</li>
													</ul>
													<ul class="reviews-pagination">
														<li class="active">1</li>
														<li><a href="#">2</a></li>
														<li><a href="#">3</a></li>
														<li><a href="#">4</a></li>
														<li><a href="#"><i class="fa fa-angle-right"></i></a></li>
													</ul>
												</div>
											</div>
											<!-- /Reviews -->

											<!-- Review Form -->
											<div class="col-md-3">
												<div id="review-form">
													<form class="review-form">
														<input class="input" type="text" placeholder="Your Name">
														<input class="input" type="email" placeholder="Your Email">
														<textarea class="input" placeholder="Your Review"></textarea>
														<div class="input-rating">
															<span>Your Rating: </span>
															<div class="stars">
																<input id="star5" name="rating" value="5" type="radio"><label for="star5"></label>
																<input id="star4" name="rating" value="4" type="radio"><label for="star4"></label>
																<input id="star3" name="rating" value="3" type="radio"><label for="star3"></label>
																<input id="star2" name="rating" value="2" type="radio"><label for="star2"></label>
																<input id="star1" name="rating" value="1" type="radio"><label for="star1"></label>
															</div>
														</div>
														<button class="primary-btn">Submit</button>
													</form>
												</div>
											</div>
											<!-- /Review Form -->
										</div>
									</div>
									<!-- /tab3  -->
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
								<img src="./img/<?php echo $value['image'] ?>" height="250" width="300" alt="">
								<div class="product-label">
								</div>
							</div>
							<div class="product-body">
<<<<<<< Updated upstream
								<p class="product-category"><?php echo $product->getNameType($value['type_id'])[0]['type_name']?></p>
								<h3 class="product-name"><a href="product_detail.php?id=<?php echo $value['id'] ?>&type_id=<?php echo $value['type_id'] ?>"><?php echo substr($value['name'], 0, 20) ?>...</a></h3>
=======
								<p class="product-category"><?php echo $product->getNameType($value['type_id'])[0]['type_name'] ?></p>
								<h3 class="product-name"><a href="product_detail.php?id=<?php echo $value['id'] ?>&type_id=<?php echo $value['type_id'] ?>"><?php if (strlen($value['name']) > 10) {
																																								echo substr($value['name'], 0, 20) . '...';
																																							} else {
																																								echo $value['name'];
																																							} ?></a></h3>
>>>>>>> Stashed changes
								<h4 class="product-price"><?php echo number_format($value['price']) ?>VND</h4>
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
									<input type="hidden" class="pimg" name="pimg" value="<?php echo $value['image'] ?>">
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

<?php include "footer.html"; ?>