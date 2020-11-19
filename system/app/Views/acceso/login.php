<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Acceso - Login</title>
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
							<h4>Bienvenido de vuelta!</h4>
							<h6 class="font-weight-light">Happy to see you again!</h6>
							<form class="pt-3" id="formLogin">
								<div class="form-group">
									<label for="textUser">Username</label>
									<div class="input-group">
										<div class="input-group-prepend bg-transparent">
											<span class="input-group-text bg-transparent border-right-0">
												<i class="mdi mdi-account-outline text-primary"></i>
											</span>
										</div>
										<input type="text" class="form-control form-control-lg border-left-0" id="textUser" name="textUser"
											placeholder="Username">
									</div>
								</div>
								<div class="form-group">
									<label for="textPass">Password</label>
									<div class="input-group">
										<div class="input-group-prepend bg-transparent">
											<span class="input-group-text bg-transparent border-right-0">
												<i class="mdi mdi-lock-outline text-primary"></i>
											</span>
										</div>
										<input type="password" class="form-control form-control-lg border-left-0" id="textPass"
											name="textPass" placeholder="Password">
									</div>
								</div>
								<div class="my-2 d-flex justify-content-between align-items-center">
									<div class="form-check">
										<label class="form-check-label text-muted">
											<input type="checkbox" class="form-check-input">
											Keep me signed in
											<i class="input-helper"></i><i class="input-helper"></i></label>
									</div>
									<a href="#" class="auth-link text-danger">Olvidaste password?</a>
								</div>
								<div class="my-3">
									<button type="submit"
										class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">LOGIN</button>
								</div>
								<div class="mb-2 d-flex">
									<button type="button" class="btn btn-facebook auth-form-btn flex-grow mr-1">
										<i class="mdi mdi-facebook mr-2"></i>Facebook
									</button>
									<button type="button" class="btn btn-google auth-form-btn flex-grow ml-1">
										<i class="mdi mdi-google mr-2"></i>Google
									</button>
								</div>
								<div class="text-center mt-4 font-weight-light">
									Todavia no tienes una cuenta? <a href="<?= base_url()?>acceso/register"
										class="text-primary">Registrate</a>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- content-wrapper ends -->
	</div>
	<!-- page-body-wrapper ends -->
	</div>
	<!-- container-scroller -->

	<script>
	const base_url = "<?= base_url()?>";
	</script>
	<script src="<?= PLUGINS?>sweetalert/sweetalert2@10.js"></script>
	<script src="<?= JS?>function.login.js"></script>
	<script src="<?= JS?>function.main.js"></script>
</body>

</html>