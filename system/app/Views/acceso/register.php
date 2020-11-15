<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Acceso - Registro</title>
	<link rel="stylesheet" href="<?= PLUGINS?>sweetalert/sweetalert2.css">
	<link rel="stylesheet" href="<?= CSS_VENDORS?>style-liberty.css">
</head>

<body>
	<section class="register-form py-md-5 py-3">
		<div class="card card_border p-md-4">
			<div class="card-body">
				<!-- form -->
				<form id="formRegistre">
					<div class="register__header text-center mb-lg-5 mb-4">
						<h3 class="register__title mb-2"> Registrese</h3>
						<p>Cree una cuenta, y continue </p>
					</div>
					<div class="form-row">
						<div class="form-group col-6">
							<label for="registerCi" class="input__label">Identificacion</label>
							<input type="text" class="form-control login_text_field_bg input-style" id="registerCi" name="registerCi"
								aria-describedby="emailHelp" placeholder="" required="" autofocus="">
						</div>
						<div class="form-group col-6">
							<label for="registerName" class="input__label">Nombre</label>
							<input type="text" class="form-control login_text_field_bg input-style" id="registerName"
								name="registerName" aria-describedby="emailHelp" placeholder="" required="" autofocus="">
						</div>
					</div>
					<div class="form-group">
						<label for="registerEmail" class="input__label">Email</label>
						<input type="email" class="form-control login_text_field_bg input-style" id="registerEmail"
							name="registerEmail" aria-describedby="emailHelp" placeholder="" required="">
					</div>
					<div class="form-row">
						<div class="form-group col-6">
							<label for="registerPassword" class="input__label">Clave</label>
							<input type="password" class="form-control login_text_field_bg input-style" id="registerPassword"
								name="registerPassword" placeholder="" required="">
						</div>
						<div class="form-group col-6">
							<label for="repetPass" class="input__label">Confirme Clave</label>
							<input type="password" class="form-control login_text_field_bg input-style" id="repetPass"
								name="repetPass" placeholder="" required="">
						</div>
					</div>
					<div class="form-check check-remember check-me-out">
						<input type="checkbox" class="form-check-input checkbox" id="exampleCheck1">
						<label class="form-check-label checkmark" for="exampleCheck1">I agree to the
							<a href=#">Terms of service</a> and <a href="#">Privacy policy</a> </label>
					</div>
					<div class="d-flex align-items-center flex-wrap justify-content-between">
						<button type="submit" class="btn btn-primary btn-style mt-4">Crear cuenta</button>
						<p class="signup mt-4">Ya tiene una cuenta? <a href="<?= base_url()?>acceso/login" class="signuplink">Login
							</a>
						</p>
					</div>
				</form>
			</div>
		</div>
	</section>
	<script>
	const base_url = "<?= base_url()?>";
	</script>
	<script src="<?= PLUGINS?>jquery/jquery-3.3.1.min.js"></script>
	<script src="<?= PLUGINS?>sweetalert/sweetalert2@10.js"></script>
	<script src="<?= JS?>function.login.js"></script>
	<script src="<?= JS?>function.main.js"></script>
</body>

</html>