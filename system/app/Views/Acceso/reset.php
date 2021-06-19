<?php headAcceso($data)?>
<div id="auth">
	<div class="row h-100">
		<div class="col-12">
			<div id="auth-left" class="pt-5">
				<?php
				if(isset($_GET['reset_password_token'])){
					$intCi = $_GET['ci'];
					$intId = $_GET['id'];
					$strToken = $_GET['reset_password_token']; 
					$strEmail = decryption($_GET['email']);
					$opcion = '2';
					$arrUser = getUser($strEmail,$strToken,$intCi);
				}
			if(isset($_GET['reset_password_token'])){
				if($arrUser['token'] == $_GET['reset_password_token']){
		?>
				<h1 class="auth-title">Resetear clave de acceso</h1>
				<p class="auth-subtitle mb-5">Debe llenar los siguientes campos para reestablecer la clave.</p>
				<form id="formChangePass">
					<input type="hidden" name="txtToken" id="txtToken" value="<?= $arrUser['token']?>">
					<input type="hidden" name="txtEmail" id="txtEmail" value="<?= $arrUser['email']?>">
					<input type="hidden" name="txtCi" id="txtCi" value="<?= $arrUser['ci']?>">
					<div class="form-group position-relative has-icon-left mb-4">
						<!-- <span>Codigo Asignado</span> -->
						<input type="text" class="form-control form-control-xl" name="txtCod" id="txtCod"
							placeholder="Codigo asignado">
						<div class="form-control-icon">
							<i class="bi bi-key"></i>
						</div>
					</div>
					<div class="form-group position-relative has-icon-left mb-4">
						<input type="password" class="form-control form-control-xl" name="txtPass" id="txtPass"
							placeholder="Password">
						<div class="form-control-icon">
							<i class="bi bi-shield-lock"></i>
						</div>
					</div>
					<div class="form-group position-relative has-icon-left mb-4">
						<input type="password" class="form-control form-control-xl" id="txtPassConfirm" name="txtPassConfirm"
							placeholder="Confirm Password">
						<div class="form-control-icon">
							<i class="bi bi-shield-lock"></i>
						</div>
					</div>
					<div class="box-button">
						<button class="btn btn-primary btn-block btn-lg shadow-lg mt-5">Reestablecer</button>
					</div>
				</form>
				<?php
				}else{
		?>
				<h1 class="auth-title">Clave expirada o invalida</h1>
				<p class="auth-subtitle mb-5">Por favor vaya al inicio de sesion, o contacte al administrador.</p>
				<div class="text-center mt-5 text-lg fs-4">
					<p><a class="font-bold" href="<?= base_url()?>acceso/login">Volver al inicio</a>.</p>
				</div>
				<?php
				}
		}else{
		?>
				<h1 class="auth-title">No tiene acceso a esta cuenta</h1>
				<p class="auth-subtitle mb-5">Por favor vaya al inicio de sesion, o contacte al administrador.</p>
				<div class="text-center mt-5 text-lg fs-4">
					<p><a class="font-bold" href="<?= base_url()?>acceso/login">Volver al inicio</a>.</p>
				</div>
				<?php
		}
		?>
			</div>
		</div>
	</div>
</div>

<?php footerAcceso($data) ?>