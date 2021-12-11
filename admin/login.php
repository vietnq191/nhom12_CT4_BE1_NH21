<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<!DOCTYPE html>
<html>

<head>
	<title>Admin Login</title>
	<!--Made with love by Mutiullah Samim -->

	<!--Bootsrap 4 CDN-->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

	<!--Fontawesome CDN-->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

	<!--Custom styles-->
	<link rel="stylesheet" type="text/css" href="../css/styles_login.css">
</head>

<body>
	<div class="container">
		<div class="d-flex justify-content-center h-100">
			<div class="card" style="height: 320px!important;">
				<div class="card-header">
					<h3>Admin Login</h3>
				</div>
				<div class="card-body">
					<form action="checklogin.php" method="POST" novalidate>
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
							<input type="password" name="password" class="form-control" placeholder="password" required pattern="\w{5,}">
							<div id="eye" class="input-group-text">
								<i class="far fa-eye"></i>
							</div>
							<div class="invalid-feedback">Mật khẩu phải có ít nhất 5 ký tự</div>
						</div>
						<div class="form-group">
							<input type="submit" name="btn_submit_admin" value="Login" class="btn float-right login_btn">
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</body>
<script src="../js/login.js"></script>
<script>
        const form = document.querySelector('form');
        form.onsubmit = (e) => {
          if (form.checkValidity() === false) {
        	//Ngăn ko cho form được gửi đi
               e.preventDefault();
               e.stopPropagation()
           }
           form.classList.add('was-validated');
         };
    </script>
</html>