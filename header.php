<?php
session_start();
require "config.php";
require "models/db.php";
require "models/product.php";
require "models/manufacture.php";
require "models/protype.php";
$product = new Product;
$manu = new Manufacture;
$protype = new Protype;
$getAllProducts = $product->getAllProducts();
$getNewProducts = $product->getNewProducts();
$getAllManu = $manu->getAllManufactures();
$getAllProtype = $protype->getAllProtype();
if (isset($_GET['type'])){
	$type = $_GET['type'];
}
else{
	$type = 0;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

	<title>Electro Shop</title>

	<!-- Google font -->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet">

	<!-- Bootstrap -->
	<link type="text/css" rel="stylesheet" href="css/bootstrap.min.css" />

	<!-- Slick -->
	<link type="text/css" rel="stylesheet" href="css/slick.css" />
	<link type="text/css" rel="stylesheet" href="css/slick-theme.css" />

	<!-- nouislider -->
	<link type="text/css" rel="stylesheet" href="css/nouislider.min.css" />

	<!-- Font Awesome Icon -->
	<link rel="stylesheet" href="css/font-awesome.min.css">

	<!-- Custom stlylesheet -->
	<link type="text/css" rel="stylesheet" href="css/style.css" />
	<link rel="stylesheet" href="css/style_viewCart.css">

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->

</head>

<body>
	<!-- HEADER -->
	<header>
		<!-- TOP HEADER -->
		<div id="top-header">
			<div class="container">
				<ul class="header-links pull-left">
					<li><a href="#"><i class="fa fa-phone"></i> +021-95-51-84</a></li>
					<li><a href="#"><i class="fa fa-envelope-o"></i> email@email.com</a></li>
					<li><a href="#"><i class="fa fa-map-marker"></i> 1734 Stonecoal Road</a></li>
				</ul>

				<!-- LOGIN -->
					<!-- Nếu chưa login sẽ hiện My account để người dùng đăng nhập -->
					<ul class="header-links pull-right">

						<?php if (!isset($_SESSION["username"])) { ?>
							<li><a href="?login"><i class="fa fa-user-o"> My Account</i></a></li>

							<?php if (isset($_GET["login"])) : ?>
								<form action="login.php" method="get">
									<div>
										<input type="text" name="username" placeholder="Username">
									</div>
									<div>
										<input type="password" name="password" placeholder="Password">
									</div>
									<div>
										<button type="submit" name="btn_submit"><a>Login</a></button>
										<button><a href="register.php">Register</a></button>
									</div>
								</form>
							<?php endif ?>
					</ul>
					<!-- /Nếu chưa login sẽ hiện My account để người dùng đăng nhập -->

					<!-- Đã đăng nhập -->
					<?php } else { ?>
						<ul class="header-links pull-right">
							<li><a><i class="fa fa-user-o"> <?php echo $_SESSION["username"] ?></i></a></li>

							<!-- chức năng kiểm tra và hiển thị số dư tài khoản -->
							<li><a href="#"><i class="fa fa-dollar"></i> USD</a></li>
							<!-- /chức năng kiểm tra và hiển thị số dư tài khoản -->

							<li><a href="logout.php">Log out</a></li>
						</ul>
					<?php } ?>
					<!--/ Đã đăng nhập -->
				<!-- /LOGIN -->
			</div>
		</div>
		<!-- /TOP HEADER -->

		<!-- MAIN HEADER -->
		<div id="header">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<!-- LOGO -->
					<div class="col-md-3">
						<div class="header-logo">
							<a href="index.php" class="logo">
								<img src="./img/logo.png" alt="">
							</a>
						</div>
					</div>
					<!-- /LOGO -->

					<!-- SEARCH BAR -->
					<div class="col-md-6">
						<div class="header-search">
							<form method="get" action="result.php">
								<select class="input-select" name="type">
									<option value="0">All Categories</option>
									<?php foreach($getAllProtype as $value):?>
									<option value=<?php echo $value["type_id"]?> <?php if ($type == $value["type_id"]) echo "selected"?>><?php echo $value["type_name"] ?></option>
									<?php endforeach ?>
								</select>
								<input class="input" placeholder="Search here" name="keyword">
								<button type="submit" class="search-btn">Search</button>

							</form>
						</div>
					</div>
					<!-- /SEARCH BAR -->

					<!-- ACCOUNT -->
					<div class="col-md-3 clearfix">
						<div class="header-ctn">
							<!-- Wishlist -->
							<div>
								<a href="#">
									<i class="fa fa-heart-o"></i>
									<span>Your Wishlist</span>
									<div class="qty">2</div>
								</a>
							</div>
							<!-- /Wishlist -->

							<!-- Cart -->
							<div class="dropdown">
								<a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
									<i class="fa fa-shopping-cart"></i>
									<span>Your Cart</span>
									<div class="qty"><?php
														//neu ton tai bien mang $_SESSION['cart'] thi dung vong lap forech de lay du lieu
														if (isset($_SESSION['cart'])) {
															$tong = 0;
															foreach ($_SESSION['cart'] as $value) {
																$tong += $value['quantity'];
															}
															echo $tong;
														}
														?> </div>
								</a>
								<div class="cart-dropdown">
									<div class="cart-list">
										<?php $total = 0;
										if (isset($_SESSION['cart'])): ?>
											<?php foreach ($_SESSION['cart'] as $key => $qty) : ?>
												<?php foreach ($getAllProducts as $value) : ?>
													<?php if ($key == $value['id']) : ?>
														<div class="product-widget">
															<div class="product-img">
																<img src="./img/<?php echo $value['image'] ?>" alt="">
															</div>
															<div class="product-body">
																<h3 class="product-name"><a href="viewcart.php"><?php echo $value['name'] ?></a></h3>
																<h4 class="product-price"><span class="qty"><?php echo $qty['quantity'] . "x"; ?></span><?php echo number_format($value['price']) ?> VND</h4>
																<?php $total = $total + (int)$value['price'] * (int)$qty['quantity']; ?>
															</div>
														</div>
										<?php endif;
												endforeach;
											endforeach;
										endif; ?>
									</div>
									<div class="cart-summary">
										<small><?php if (isset($tong)) {
													echo $tong;
												} ?> Item(s) selected</small>

										<h5>SUBTOTAL: <?php echo number_format($total); ?> VND</h5>
									</div>
									<div class="cart-btns">
										<a href="viewcart.php">View Cart</a>
										<a href="#">Checkout <i class="fa fa-arrow-circle-right"></i></a>
									</div>
								</div>
							</div>
							<!-- /Cart -->

							<!-- Menu Toogle -->
							<div class="menu-toggle">
								<a href="#">
									<i class="fa fa-bars"></i>
									<span>Menu</span>
								</a>
							</div>
							<!-- /Menu Toogle -->
						</div>
					</div>
					<!-- /ACCOUNT -->
				</div>
				<!-- row -->
			</div>
			<!-- container -->
		</div>
		<!-- /MAIN HEADER -->
	</header>
	<!-- /HEADER -->

	<!-- NAVIGATION -->
	<nav id="navigation">
		<!-- container -->
		<div class="container">
			<!-- responsive-nav -->
			<div id="responsive-nav">
				<!-- NAV -->
				<ul class="main-nav nav navbar-nav">
					<li class="active"><a href="index.php">Home</a></li>
					<?php
					$getAllManu = $manu->getAllManufactures();
					foreach ($getAllManu as $value) :
					?>
						<li><a href="products.php?manu_id=<?php echo $value['manu_id'] ?>"><?php echo $value['manu_name'] ?></a></li>

					<?php endforeach; ?>
				</ul>
				<!-- /NAV -->
			</div>
			<!-- /responsive-nav -->
		</div>
		<!-- /container -->
	</nav>
	<!-- /NAVIGATION -->