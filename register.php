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
</head>

<body>
	<div class="container">
		<div class="d-flex justify-content-center h-100">
			<div class="card" style="height: 680!important;">
				<div class="card-header">
					<div class="row pt-2">
						<div class="col">
							<h3>Register</h3>
						</div>
						<div class="col">
							<a style="text-decoration:none" href="index.php">
								<h3 class="text-right">X</h3>
							</a>
						</div>
					</div>
				</div>
				<div class="card-body">
					<form action="checkregister.php" method="GET" novalidate>
						<div class="input-group form-group">
							<div class="input-group-prepend">
								<span class="input-group-text"><i class="fas fa-user"></i></span>
							</div>
							<input type="text" name="fullname" class="form-control" placeholder="Full name" required pattern="([aAàÀảẢãÃáÁạẠăĂằẰẳẲẵẴắẮặẶâÂầẦẩẨẫẪấẤậẬbBcCdDđĐeEèÈẻẺẽẼéÉẹẸêÊềỀểỂễỄếẾệỆ
fFgGhHiIìÌỉỈĩĨíÍịỊjJkKlLmMnNoOòÒỏỎõÕóÓọỌôÔồỒổỔỗỖốỐộỘơƠờỜởỞỡỠớỚợỢpPqQrRsStTu
UùÙủỦũŨúÚụỤưƯừỪửỬữỮứỨựỰvVwWxXyYỳỲỷỶỹỸýÝỵỴzZ0123456789]){3,}(\s?\w+)*">
							<div class="invalid-feedback">Invalid name</div>
						</div>
						<div class="input-group form-group">
							<div class="input-group-prepend">
								<span class="input-group-text"><i class="fas fa-user"></i></span>
							</div>
							<input type="text" name="username" class="form-control" placeholder="Username" required pattern="^[a-zA-Z0-9]+$">
							<div class="invalid-feedback">The account cannot be empty and no special characters</div>
						</div>
						<div class="input-group form-group">
							<div class="input-group-prepend">
								<span class="input-group-text"><i class="fas fa-key"></i></span>
							</div>
							<input type="password" id="password" name="password" class="form-control password" placeholder="Password" required pattern="\w{5,}">
							<div id="eye" class="input-group-text">
								<i class="far fa-eye" id="togglePassword"></i>
							</div>
							<div class="invalid-feedback">Password must be at least 5 characters and no special characters</div>
						</div>
						<div class="input-group form-group">
							<div class="input-group-prepend">
								<span class="input-group-text"><i class="fas fa-key"></i></span>
							</div>
							<input type="password" id="repassword" name="repassword" class="form-control repassword" placeholder="Re-password" required>
							<div id="eye" class="input-group-text">
								<i class="far fa-eye" id="toggleRePassword"></i>
							</div>
							<div class="invalid-feedback">Re-password does not match the password</div>
						</div>
						<div class="input-group form-group">
							<div class="input-group-prepend">
								<span class="input-group-text"><i class="fas fa-envelope"></i></i></span>
							</div>
							<input type="text" name="email" class="form-control" placeholder="Email" required pattern="[a-zA-Z0-9._-]+@[a-z]+\.[a-z]{2,4}">
							<div class="invalid-feedback">Invalid email</div>
						</div>
						<div class="input-group form-group">
							<div class="input-group-prepend">
								<span class="input-group-text"><i class="fas fa-phone"></i></span>
							</div>
							<input type="text" name="phone" class="form-control" placeholder="Phone" required pattern="[0-9]{10,11}">
							<div class="invalid-feedback">Phone number from 10 to 11</div>
						</div>
						<div class="form-group">
							<input type="submit" name="btn_submit" value="Register" class="btn float-right login_btn">
						</div>
					</form>
				</div>
				<div class="card-footer">
					<div class="d-flex justify-content-center links">
						Already have an account?<a href="login.php">Sign In</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
<script src="js/login.js"></script>
<script>
	const password = document.querySelector('.password');
	const rePassword = document.querySelector('.repassword');
	const inputPassword = document.getElementById("password");
	const inputRePassword = document.getElementById("repassword");

	password.onblur = () => {
		rePassword.setAttribute('pattern', password.value);
	}

	const onToggleTypePassword = () => {
		togglePassword.classList.toggle("fa-eye-slash");

		if (inputPassword.type === "password") {
			inputPassword.type = "text";
		} else {
			inputPassword.type = "password";
		}
	};

	const onToggleTypeRePassword = () => {
		toggleRePassword.classList.toggle("fa-eye-slash");

		if (inputRePassword.type == "password") {
			inputRePassword.type = "text";
		} else {
			inputRePassword.type = "password";
		}
	};

	togglePassword.addEventListener("click", onToggleTypePassword);
	toggleRePassword.addEventListener("click", onToggleTypeRePassword);

	const form = document.querySelector('form');
	form.onsubmit = (e) => {
		if (form.checkValidity() === false) {
			//Ngăn ko cho form được gửi đi
			e.preventDefault();
			e.stopPropagation()
			form.classList.add('was-validated');
		}
	};
</script>

</html>