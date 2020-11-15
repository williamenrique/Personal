<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Acceso - Login</title>
	<link rel="stylesheet" href="<?= PLUGINS?>sweetalert/sweetalert2.css">
	<link rel="stylesheet" href="<?= CSS_VENDORS?>style-liberty.css">
</head>

<body>
	<section>
		<!-- content -->
		<div class="">
			<!-- login form -->
			<section class="login-form py-md-5 py-3">
				<div class="card card_border p-md-4">
					<div class="card-body">
						<!-- form -->
						<form id="formLogin">
							<div class="login__header text-center mb-lg-5 mb-4">
								<h3 class="login__title mb-2"> Login</h3>
								<p>Bienvenido de vuelta, Ingrese sus credenciales</p>
							</div>
							<div class="form-group">
								<label for="textUser" class="input__label">Username</label>
								<input type="text" class="form-control login_text_field_bg input-style" id="textUser" name="textUser"
									aria-describedby="emailHelp" placeholder="" required="" autofocus="">
							</div>
							<div class="form-group">
								<label for="textPass" class="input__label">Password</label>
								<input type="password" class="form-control login_text_field_bg input-style" id="textPass"
									name="textPass" placeholder="" required="">
							</div>
							<div class="d-flex align-items-center flex-wrap justify-content-between">
								<button type="submit" class="btn btn-primary btn-style mt-4">Acceder</button>
								<p class="signup mt-4">No tienes una cuenta? <a href="<?= base_url()?>acceso/register"
										class="signuplink">Registrarse</a></p>
							</div>
						</form>
					</div>
				</div>
			</section>

		</div>
		<!-- //content -->
	</section>
	<script>
	const base_url = "<?= base_url()?>";
	</script>
	<script src="<?= PLUGINS?>sweetalert/sweetalert2@10.js"></script>
	<script src="<?= JS?>function.login.js"></script>
	<script src="<?= JS?>function.main.js"></script>
</body>

</html>