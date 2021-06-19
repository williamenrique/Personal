<?= headAcceso($data)?>
<div id="auth">
	<div class="row h-100">
		<div class="col-12">
			<div id="auth-left">
				<h1 class="auth-title">Registrarse</h1>
				<p class="auth-subtitle mb-5">Ingrese sus datos para registrarse en nuestro sitio web.</p>
				<form id="formRegistre">
					<div class="form-group position-relative has-icon-left mb-4">
						<input type="text" class="form-control form-control-xl" id="registerCi" name="registerCi"
							placeholder="Identificacion">
						<div class="form-control-icon">
							<i class="bi bi-key"></i>
						</div>
					</div>
					<div class="form-group position-relative has-icon-left mb-4">
						<input type="text" class="form-control form-control-xl" id="registerName" name="registerName"
							placeholder="Nombre">
						<div class="form-control-icon">
							<i class="bi bi-person"></i>
						</div>
					</div>
					<div class="form-group position-relative has-icon-left mb-4">
						<input type="text" class="form-control form-control-xl" id="registerEmail" name="registerEmail"
							placeholder="Email">
						<div class="form-control-icon">
							<i class="bi bi-envelope"></i>
						</div>
					</div>
					<div class="form-group position-relative has-icon-left mb-4">
						<input type="password" class="form-control form-control-xl" id="registerPassword" name="registerPassword"
							placeholder="Password">
						<div class="form-control-icon">
							<i class="bi bi-shield-lock"></i>
						</div>
					</div>
					<div class="form-group position-relative has-icon-left mb-4">
						<input type="password" class="form-control form-control-xl" id="repetPass" name="repetPass"
							placeholder="Confirm Password">
						<div class="form-control-icon">
							<i class="bi bi-shield-lock"></i>
						</div>
					</div>
					<div class="box-button">
						<button class="btn btn-primary btn-block btn-lg shadow-lg mt-5">Registrarse</button>
					</div>
				</form>
				<div class="text-center mt-5 text-lg fs-4">
					<p class='text-gray-600'>Ya tienes una cuenta? <a href="<?= base_url()?>acceso/login"
							class="font-bold">Ingresa aqui</a>.</p>
				</div>
			</div>
		</div>
	</div>
</div>
<?= footerAcceso($data)?>