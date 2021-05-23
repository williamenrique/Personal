<?= headAcceso($data)?>
<div id="auth">
	<div class="row h-100">
		<div class=" col-12">
			<div id="auth-left">
				<h1 class="auth-title">Iniciar sesion</h1>
				<p class="auth-subtitle mb-3">Inicie sesión con sus datos que ingresó durante el registro.</p>
				<form id="formLogin">
					<div class="form-group position-relative has-icon-left mb-4">
						<input type="text" class="form-control form-control-xl" placeholder="Email o usuario" id="textUser"
							name="textUser" autofocus>
						<div class="form-control-icon">
							<i class="fas fa-user-shield"></i>
						</div>
					</div>
					<div class="form-group position-relative has-icon-left mb-4">
						<input type="password" class="form-control form-control-xl" placeholder="Password" id="textPass"
							name="textPass">
						<div class="form-control-icon">
							<i class="fas fa-key"></i>
						</div>
					</div>
					<div class="box-button">
						<button class="btn btn-primary btn-block shadow-lg " type="submit">Login</button>
					</div>
				</form>
				<div class="text-center mt-5 text-lg fs-4">
					<p class="text-gray-600">Todavia no tienes una cuenta? <a href="<?= base_url()?>acceso/register"
							class="font-bold">Crear cuenta</a>.</p>
					<p><a class="font-bold" href="<?= base_url()?>acceso/recuperar">Olvidaste el password?</a>.</p>
				</div>
			</div>
		</div>
	</div>
</div>
<?= footerAcceso($data)?>