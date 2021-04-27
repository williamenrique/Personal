<?php headAcceso($data)?>
<div id="auth">
	<div class="row h-100">
		<div class="col-12">
			<div id="auth-left">
				<h1 class="auth-title pt-2">Olvidaste el password</h1>
				<p class="auth-subtitle mb-5">Ingrese su correo electrónico y le enviaremos el enlace para restablecer la
					contraseña..</p>
				<form id="formReset">
					<div class="form-group position-relative has-icon-left mb-3">
						<input type="email" class="form-control form-control-xl" name="txtEmail" id="txtEmail"
							placeholder="Introduzca su correo o usuario">
						<div class="form-control-icon">
							<i class="bi bi-envelope"></i>
						</div>
					</div>
					<div class="box-button">
						<button class="btn btn-primary btn-block btn-lg shadow-lg mt-5">Enviar</button>
					</div>
				</form>
				<div class="text-center mt-3 text-lg fs-4">
					<p class='text-gray-600'>Recuerda tu cuenta? <a href="<?= base_url()?>acceso/login" class="font-bold">Iniciar
							session</a>.
					</p>
				</div>
			</div>
		</div>
	</div>
</div>
<?php footerAcceso($data) ?>