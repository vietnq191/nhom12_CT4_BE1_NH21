<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<!DOCTYPE html>
<html>

<head>
	<title>Login Page</title>
	<!--Made with love by Mutiullah Samim -->

	<!--Bootsrap 4 CDN-->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

	<!--Fontawesome CDN-->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

	<!--Custom styles-->
	<link rel="stylesheet" type="text/css" href="css/styles_login.css">

	<style>
		.loading {
			position: absolute;
			z-index: 1;
			width: 100%;
			height: 100%;
			display: none;
			align-items: center;
			justify-content: center;
			background: rgba(0, 0, 0, 0.479);
		}

		.message__error {
			font-size: 1.5rem;
			color: rgb(248, 61, 61);
			margin: -1rem 1rem;
		}
	</style>

</head>

<body>
	<div class="loading" id="loading">
		<img src="./img/loader.gif" alt="loading" width="100px">
	</div>
	<div class="container">
		<div class="d-flex justify-content-center h-100">
			<div class="card">
				<div class="card-header">
					<div class="row pt-2">
						<div class="col">
							<h3>Sign In</h3>
						</div>
						<div class="col">
							<a style="text-decoration:none" href="index.php">
								<h3 class="text-right">X</h3>
							</a>
						</div>
					</div>

					<div class="d-flex justify-content-end social_icon">
						<span><i class="fab fa-facebook-square"></i></span>
						<span><i class="fab fa-google-plus-square"></i></span>
					</div>
				</div>
				<div class="card-body">
					<form action="check_login.php" method="POST" novalidate>
						<div class="input-group form-group">
							<div class="input-group-prepend">
								<span class="input-group-text"><i class="fas fa-user"></i></span>
							</div>
							<input type="text" name="username" class="form-control" placeholder="username" required>
							<div class="invalid-feedback">Tài khoản không được để trống</div>
						</div>
						<div class="input-group form-group">
							<div class="input-group-prepend">
								<span class="input-group-text"><i class="fas fa-key"></i></span>
							</div>
							<input type="password" id="password" name="password" class="form-control" placeholder="password" required pattern="\w{5,}">
							<div id="eye" class="input-group-text">
								<i class="far fa-eye" id="togglePassword"></i>
							</div>
							<div class="invalid-feedback">Mật khẩu phải có ít nhất 5 ký tự</div>
						</div>
						<div class="form-group">
							<input type="submit" name="btn_submit" value="Login" class="btn float-right login_btn">
						</div>
					</form>
				</div>
				<div class="card-footer">
					<div class="d-flex justify-content-center links">
						Don't have an account?<a href="register.php">Sign Up</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
<script>
	const form = document.querySelector('form');
	const iconLoading = document.getElementById("loading");
	const inputPassword = document.getElementById("password");
	const showLoading = () => {
		iconLoading.style.display = "flex";
	};
	const hideLoading = () => {
		iconLoading.style.display = "none";
	};

	const onToggleTypePassword = () => {
		togglePassword.classList.toggle("fa-eye-slash");

		if (inputPassword.type === "password") {
			inputPassword.type = "text";
		} else {
			inputPassword.type = "password";
		}
	};

	togglePassword.addEventListener("click", onToggleTypePassword);

	form.onsubmit = (e) => {
		if (form.checkValidity() === false) {
			//Ngăn ko cho form được gửi đi
			e.preventDefault();
			e.stopPropagation()
			form.classList.add('was-validated');
		} else {
			showLoading();
			setTimeout(() => {
				hideLoading();
			}, 1000);
		}
	};
</script>

</html>