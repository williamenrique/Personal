<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Acceso - registro</title>
	<link rel="stylesheet" href="<?= PLUGINS?>sweetalert/sweetalert2.css">
	<link rel="stylesheet" href="<?= PLUGINS?>style.css">
	<link rel="shortcut icon" href="<?= IMG?>logo-mini.svg">
</head>

<body>

	<div class="container-scroller">
		<div class="container-fluid page-body-wrapper full-page-wrapper">
			<div class="content-wrapper d-flex align-items-center auth">
				<div class="row w-100">

					<div class="col-lg-4 mx-auto">
						<div class="auth-form-transparent text-left p-3">
							<div class="brand-logo">
								<img src="<?= IMG?>logo-inverse.svg" alt="logo">
							</div>
							<h4>Nuevo aqui?</h4>
							<h6 class="font-weight-light"> ¡Únete a nosotros hoy! Solo toma unos pocos pasos</h6>
							<form class="pt-3" id="formRegistre">
								<div class="form-group">
									<label>Identificacion</label>
									<div class="input-group">
										<div class="input-group-prepend bg-transparent">
											<span class="input-group-text bg-transparent border-right-0">
												<i class="mdi mdi-account-outline text-primary"></i>
											</span>
										</div>
										<input type="text" class="form-control form-control-lg border-left-0" placeholder="Identificacion"
											id="registerCi" name="registerCi">
									</div>
								</div>
								<div class="form-group">
									<label>Nombre</label>
									<div class="input-group">
										<div class="input-group-prepend bg-transparent">
											<span class="input-group-text bg-transparent border-right-0">
												<i class="mdi mdi-email-outline text-primary"></i>
											</span>
										</div>
										<input type="text" class="form-control form-control-lg border-left-0" placeholder="Nombres">
									</div>
								</div>

								<div class="form-group">
									<label>Email</label>
									<div class="input-group">
										<div class="input-group-prepend bg-transparent">
											<span class="input-group-text bg-transparent border-right-0">
												<i class="mdi mdi-email-outline text-primary"></i>
											</span>
										</div>
										<input type="email" class="form-control form-control-lg border-left-0"
											placeholder="Correo electronico" id="registerEmail" name="registerEmail">
									</div>
								</div>

								<div class="form-group">
									<label>Password</label>
									<div class="input-group">
										<div class="input-group-prepend bg-transparent">
											<span class="input-group-text bg-transparent border-right-0">
												<i class="mdi mdi-lock-outline text-primary"></i>
											</span>
										</div>
										<input type="password" class="form-control form-control-lg border-left-0" id="registerPassword"
											name="registerPassword" placeholder="Ingrese Password">
									</div>
								</div>
								<div class="form-group">
									<label>Confirme</label>
									<div class="input-group">
										<div class="input-group-prepend bg-transparent">
											<span class="input-group-text bg-transparent border-right-0">
												<i class="mdi mdi-lock-outline text-primary"></i>
											</span>
										</div>
										<input type="password" class="form-control form-control-lg border-left-0" id="repetPass"
											name="repetPass" placeholder="Confirme Password">
									</div>
								</div>
								<div class="mb-4">
									<div class="form-check">
										<label class="form-check-label text-muted">
											<input type="checkbox" class="form-check-input">
											I agree to all Terms &amp; Conditions
											<i class="input-helper"></i><i class="input-helper"></i></label>
									</div>
								</div>
								<div class="mt-3">
									<button type="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">SIGN
										UP</button>
								</div>
								<div class="text-center mt-4 font-weight-light">
									Ya posees una cuenta? <a href="<?= base_url()?>acceso/login" class="text-primary">Login</a>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
			<!-- content-wrapper ends -->
		</div>
		<!-- page-body-wrapper ends -->
	</div>
	<script>
	const base_url = "<?= base_url()?>";
	</script>
	<script src="<?= PLUGINS?>sweetalert/sweetalert2@10.js"></script>
	<script src="<?= JS?>function.login.js"></script>
	<script src="<?= JS?>function.main.js"></script>
</body>

</html>