<!-- NEWSLETTER -->
<div id="newsletter" class="section">
	<!-- container -->
	<div class="container">
		<!-- row -->
		<div class="row">
			<div class="col-md-12">
				<div class="newsletter">
					<p>Sign Up for the <strong>NEWSLETTER</strong></p>
					<div id="sEmail"></div>
					<form action="action.php" method="POST">
						<input id="inputEmailSend" name="email" class="input" type="email" placeholder="Enter Your Email" required pattern="[a-zA-Z0-9._-]+@[a-z]+\.[a-z]{2,4}">
						<button name="submit-newsletter" class="newsletter-btn loading"><i class="fa fa-envelope"></i> Subscribe</button>
					</form>
				</div>
			</div>
		</div>
		<!-- /row -->
	</div>
	<!-- /container -->
</div>
<!-- /NEWSLETTER -->

<!-- FOOTER -->
<footer id="footer">
	<!-- top footer -->
	<div class="section">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
				<div class="col-md-3 col-xs-6">
					<div class="footer">
						<h3 class="footer-title">About Us</h3>
						<p>Electron is an e-commerce platform in Southeast Asia and Taiwan. Our vision making the world a better place by connecting the community of buyers and sellers.</p>
						<ul class="footer-links">
							<li><a href="https://www.google.com/maps/place/1734 Stonecoal Road, Kermit, Tây Virginia, Hoa Kỳ" target="_blank"><i class="fa fa-map-marker"></i>1734 Stonecoal Road</a></li>
							<li><a href="#"><i class="fa fa-phone"></i>+021-95-51-84</a></li>
							<li><a href="#"><i class="fa fa-envelope-o"></i>email@email.com</a></li>
						</ul>
					</div>
				</div>

				<div class="col-md-3 col-xs-6">
					<div class="footer">
						<h3 class="footer-title">Manufactures</h3>
						<ul class="footer-links">
							<?php
							$manufacture = new Manufacture();
							$getAllManufactures = $manufacture->getAllManufactures();
							foreach ($getAllManufactures as $value) :
							?>
								<li><a href="products.php?manu_id=<?php echo $value['manu_id'] ?>"><?php echo $value['manu_name'] ?></a></li>
							<?php endforeach; ?>
						</ul>
					</div>
				</div>

				<div class="clearfix visible-xs"></div>

				<div class="col-md-3 col-xs-6">
					<div class="footer">
						<h3 class="footer-title">Information</h3>
						<ul class="footer-links">
							<li><a href="aboutUs.php">About Us</a></li>
							<li><a href="register.php">Register</a></li>
						</ul>
					</div>
				</div>

				<div class="col-md-3 col-xs-6">
					<div class="footer">
						<h3 class="footer-title">Service</h3>
						<ul class="footer-links">
							<li><a href="viewaccount.php">My Account</a></li>
							<li><a href="viewcart.php">View Cart</a></li>
							<li><a href="checkout.php">Check out</a></li>
							<li><a href="view_history_orders.php">History Order</a></li>
						</ul>
					</div>
				</div>
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<!-- /top footer -->

	<!-- bottom footer -->
	<div id="bottom-footer" class="section">
		<div class="container">
			<!-- row -->
			<div class="row">
				<div class="col-md-12 text-center">
					<ul class="footer-payments">
						<li><a href="#"><i class="fa fa-cc-visa"></i></a></li>
						<li><a href="#"><i class="fa fa-credit-card"></i></a></li>
						<li><a href="#"><i class="fa fa-cc-paypal"></i></a></li>
						<li><a href="#"><i class="fa fa-cc-mastercard"></i></a></li>
						<li><a href="#"><i class="fa fa-cc-discover"></i></a></li>
						<li><a href="#"><i class="fa fa-cc-amex"></i></a></li>
					</ul>
					<span class="copyright">
						<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
						Copyright &copy;<script>
							document.write(new Date().getFullYear());
						</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
						<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
					</span>
				</div>
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<!-- /bottom footer -->
</footer>
<!-- /FOOTER -->

<!-- jQuery Plugins -->
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/slick.min.js"></script>
<script src="js/nouislider.min.js"></script>
<script src="js/jquery.zoom.min.js"></script>
<script src="js/main.js"></script>
<script src="js/countdown.js"></script>
<script type="text/javascript">
	$(document).ready(function() {

		//add to cart
		$(".addItemBtn").click(function(e) {
			e.defaultPrevented();

			var pid = $(".pid").val();
			var pname = $(".pname").val();
			var pprice = $(".pprice").val();
			var pimg = $(".pimg").val();
			var pcode = $(".pcode").val();
			var url = $(".url").val();
			$.ajax({
				type: 'GET',
				url: 'action.php',
				data: {
					pid: pid,
					pname: pname,
					pprice: pprice,
					pimg: pimg,
					pcode: pcode
				},
				success: function(response) {
					$("#messenger").html(response);
				}
			});
		});

		//loading
		$(".loading").click(function() {
			$valid = document.getElementById("inputEmailSend");
			if ($valid.checkValidity()) {
				$('.load').css("width", "100%");
				$('body').removeClass('preloading');
				$('.load').delay(2500).fadeOut('fast');
				location.reload(true);
			}
		});

		//change quantity
		$(".itemQty").on('change', function() {
			var $el = $(this).closest('tr');

			var pid = $el.find(".pid").val();
			var pprice = $el.find(".pprice").val();
			var qty = $el.find(".itemQty").val();
			location.reload(true);
			$.ajax({
				url: 'action.php',
				method: 'post',
				cache: false,
				data: {
					qty: qty,
					pid: pid,
					pprice: pprice
				},
				success: function(response) {
					console.log(response);
				}
			});
		});

		//order
		$("#placeOrder").submit(function(e) {
			e.preventDefault();

			//hieu ung loading
			$('.load').css("width", "100%");
			$('body').removeClass('preloading');
			$('.load').delay(2500).fadeOut('fast');
			$.ajax({
				url: "action.php",
				method: 'post',
				data: $('form').serialize() + "&action=order",
				success: function(response) {
					$("#order").html(response);
				}
			});
		});

		//setting profile
		$("#setProfile").submit(function(e) {
			e.preventDefault();
			$.ajax({
				url: "action.php",
				method: 'post',
				data: $('form').serialize() + "&actionSetting=setting",
				success: function(response) {
					$("#setting").html(response);
				}
			});
		});

		//change password
		$("#cpw").submit(function(e) {
			e.preventDefault();
			$.ajax({
				url: "action.php",
				method: 'post',
				data: $('form').serialize() + "&actionChangepass=change_pass",
				success: function(response) {
					$("#change-pass").html(response);
				}
			});
		});

		load_cart_item_number();
		//load count item
		function load_cart_item_number() {
			$.ajax({
				url: 'action.php',
				method: 'get',
				data: {
					cartItem: "cart_item"
				},
				success: function(response) {
					$("#cart-item").html(response);
				}
			})
		}
	});

	const password = document.querySelector('.password');
	const rePassword = document.querySelector('.repassword');

	password.onblur = () => {
		rePassword.setAttribute('pattern', password.value);
	}
	const formRegister = document.querySelector('.form-register');
	formRegister.onsubmit = (e) => {
		if (formRegister.checkValidity() === false) {
			//Ngăn ko cho form được gửi đi
			e.preventDefault();
			e.stopPropagation()
		}
		formRegister.classList.add('was-validated');
	};
</script>
</body>

</html>