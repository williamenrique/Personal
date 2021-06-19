<?php head($data);?>

<main class="content">
	<div class="container-fluid p-0">

		<div class="row">
			<div class="col-md-3 col-xl-3">

				<div class="card">
					<div class="card-header">
						<h5 class="card-title mb-0">Configuracion de perfil</h5>
					</div>
					<div class="list-group list-group-flush" role="tablist">
						<a class="list-group-item list-group-item-action active" data-bs-toggle="list" href="#account" role="tab">
							Datos
						</a>
						<a class="list-group-item list-group-item-action" data-bs-toggle="list" href="#password" role="tab">
							Password
						</a>
						<?php 
						if($_SESSION['userData']['user'] == "" && empty($_SESSION['userData']['user'])):
							?>
						<a class="list-group-item list-group-item-action" data-bs-toggle="list" href="#createUser" role="tab">
							Crear usuario
						</a>
						<?php
						endif;
						?>
						<a class="list-group-item list-group-item-action" data-bs-toggle="list" href="#questions" role="tab">
							Preguntas de seguridad
						</a>
						<a class="list-group-item list-group-item-action" data-bs-toggle="list" href="#deleteCount" role="tab">
							Eliminar cuenta
						</a>
					</div>
				</div>
			</div>

			<div class="col-md-9 col-xl-9">
				<div class="tab-content">
					<div class="tab-pane fade show active" id="account" role="tabpanel">

						<div class="card">
							<div class="card-header">
							</div>
							<div class="card-body">
								<form id="formAvatar" name="formAvatar">
									<input type="hidden" name="textCi" id="textCi" value="<?= $_SESSION['userData']['ci']?>">
									<input type="hidden" name="textId" id="textId" value="<?= $_SESSION['userData']['user_id']?>">
									<input type="hidden" name="textEmail" id="textEmail" value="<?= $_SESSION['userData']['email']?>">
									<div class="row">
										<div class="col-md-4 photo">
											<div class="text-center">
												<div class="prevPhoto">
													<span class="delPhoto notBlock">x</span>
													<div>
														<label for="imgFile"></label>
														<img alt="<?= $_SESSION['userData']['nombre']?>" src="<?= $_SESSION['userData']['img']?>"
															class="rounded-circle img-responsive mt-2" id="img" width="128" height="128" />
													</div>
													<div class="mt-2">
														<label class="btn btn-primary" for="imgFile">Upload</label>
														<input type="file" name="imgFile" id="imgFile" class="imgFile d-none">
													</div>
													<small>For best results, use an image at least 128px by 128px in .jpg format</small>
												</div>
											</div>
										</div>
										<div class="col-md-8">
											hola

										</div>
									</div>

									<button type="submit" class="btn btn-primary mt-4">Guardar Imagen </button>
								</form>
							</div>
						</div>

						<div class="card">
							<div class="card-header d-flex justify-content-between">
								<h5 class="card-title mb-0">Informacion Privada</h5>
								<h5 class="card-title mb-0 fw-bolder"><?= $_SESSION['userData']['codigo']?></h5>
							</div>
							<div class="card-body">
								<form id="formProfile">
									<input type="hidden" name="textCi" id="textCi" value="<?= $_SESSION['userData']['ci']?>">
									<input type="hidden" name="textId" id="textId" value="<?= $_SESSION['userData']['user_id']?>">
									<input type="hidden" name="textEmail" id="textEmail" value="<?= $_SESSION['userData']['email']?>">
									<div class="row">
										<div class="mb-3 col-md-6">
											<label class="form-label" for="txt_nombre">Nombres</label>
											<input type="text" class="form-control" id="txt_nombre" name="txt_nombre" placeholder="First name"
												value="<?= $_SESSION['userData']['nombre']?>">
										</div>
										<div class="mb-3 col-md-6">
											<label class="form-label" for="txt_apellido">Apellidos</label>
											<input type="text" class="form-control" id="txt_apellido" name="txt_apellido"
												placeholder="Apellidos" value="<?= $_SESSION['userData']['apellido']?>">
										</div>
									</div>
									<div class="row">
										<div class="mb-3 col-md-6">
											<label class="form-label" for="txt_tlf">Telefono</label>
											<input type="text" class="form-control" id="txt_tlf" name="txt_tlf" placeholder="Celular o fijo"
												value="<?= $_SESSION['userData']['telefono']?>">
										</div>
										<div class="mb-3 col-md-6">
											<label class="form-label" for="txt_codPost">Codigo Postal</label>
											<input type="text" class="form-control" id="txt_codPost" name="txt_codPost"
												placeholder="Codigo Postal" value="<?= $_SESSION['userData']['codPostal']?>">
										</div>
									</div>
									<div class="mb-3">
										<label class="form-label" for="txt_direccion">Direccion</label>
										<input type="text" class="form-control" id="txt_direccion" name="txt_direccion"
											placeholder="1234 Main St" value="<?= $_SESSION['userData']['direccion']?>">
									</div>
									<div class="row">
										<div class="mb-3 col-md-4">
											<label class="form-label" for="selectState">Estado</label>
											<select id="selectState" name="selectState" data-live-search="true" class="form-control"
												data-style="btn-outline-primary" data-size="5">

											</select>
										</div>
										<div class="mb-3 col-md-4">
											<label class="form-label" for="selectCiudad">Ciudad</label>
											<select id="selectCiudad" name="selectCiudad" class="form-control" data-live-search="true"
												class="form-control" data-style="btn-outline-primary" data-size="5">
												<option value="0">Seleccione</option>
											</select>
										</div>
									</div>
									<button type="submit" class="btn btn-primary">Guardar cambios</button>
								</form>

							</div>
						</div>

					</div>
					<div class="tab-pane fade" id="password" role="tabpanel">
						<div class="card">
							<div class="card-body">
								<h5 class="card-title">Cambio de clave</h5>

								<form id="formClave">
									<input type="hidden" name="textCi" id="textCi" value="<?= $_SESSION['userData']['ci']?>">
									<input type="hidden" name="textId" id="textId" value="<?= $_SESSION['userData']['user_id']?>">
									<input type="hidden" name="textEmail" id="textEmail" value="<?= $_SESSION['userData']['email']?>">
									<div class="row">
										<div class="mb-3 col-md-6">
											<label class="form-label" for="txt_pass">Introduzca nueva clave</label>
											<input type="password" class="form-control" id="txt_pass" name="txt_pass">
											<small><a href="#">Olvidaste tu clave?</a></small>
										</div>
										<div class="mb-3 col-md-6">
											<label class="form-label" for="txt_passRepet">Repita la calve</label>
											<input type="password" class="form-control" id="txt_passRepet" name="txt_passRepet">
										</div>
									</div>
									<!-- <div class="mb-3">
										<label class="form-label" for="inputPasswordNew2">Verify password</label>
										<input type="password" class="form-control" id="inputPasswordNew2">
									</div> -->
									<button type="submit" class="btn btn-primary">Cambiar clave</button>
								</form>

							</div>
						</div>
					</div>
					<div class="tab-pane fade" id="createUser" role="tabpanel">
						<div class="card">
							<div class="card-body">
								<h5 class="card-title">Crear Usuario</h5>

								<form id="formNick">
									<input type="hidden" name="textCi" id="textCi" value="<?= $_SESSION['userData']['ci']?>">
									<input type="hidden" name="textId" id="textId" value="<?= $_SESSION['userData']['user_id']?>">
									<input type="hidden" name="textEmail" id="textEmail" value="<?= $_SESSION['userData']['email']?>">
									<div class="row">
										<div class="mb-3 col-md-4">
											<label class="form-label" for="txt_nick">Introduzca usuario</label>
											<input type="text" class="form-control" id="txt_nick" name="txt_nick">
										</div>
									</div>
									<button type="submit" class="btn btn-primary">Crear</button>
								</form>

							</div>
						</div>
					</div>
					<div class="tab-pane fade" id="questions" role="tabpanel">
						<div class="card">
							<div class="card-body">
								<h5 class="card-title">Preguntas de seguridad</h5>

								<form id="formQuestion">
									<input type="hidden" name="textCi" id="textCi" value="<?= $_SESSION['userData']['ci']?>">
									<input type="hidden" name="textId" id="textId" value="<?= $_SESSION['userData']['user_id']?>">
									<input type="hidden" name="textEmail" id="textEmail" value="<?= $_SESSION['userData']['email']?>">

									<div class="row">
										<div class="mb-3 col-md-6">
											<label class="form-label" for="txtP1">Pregunta #1</label>
											<input type="text" class="form-control" id="txtP1" name="txtP1"
												value="<?= strtoupper($_SESSION['userData']['p1'])?>">

										</div>
										<div class="mb-3 col-md-6">
											<label class="form-label" for="txtR1">Respuesta #1</label>
											<input type="text" class="form-control" id="txtR1" name="txtR1"
												value="<?= strtoupper($_SESSION['userData']['r1'])?>">
										</div>
									</div>
									<div class="row">
										<div class="mb-3 col-md-6">
											<label class="form-label" for="txtP2">Pregunta #2</label>
											<input type="text" class="form-control" id="txtP2" name="txtP2"
												value="<?= strtoupper($_SESSION['userData']['p2'])?>">

										</div>
										<div class="mb-3 col-md-6">
											<label class="form-label" for="txtR2">Respuesta #2</label>
											<input type="text" class="form-control" id="txtR2" name="txtR2"
												value="<?= strtoupper($_SESSION['userData']['r2'])?>">
										</div>
									</div>
									<div class="row">
										<div class="mb-3 col-md-6">
											<label class="form-label" for="txtP3">Pregunta #3</label>
											<input type="text" class="form-control" id="txtP3" name="txtP3"
												value="<?= strtoupper($_SESSION['userData']['p3'])?>">

										</div>
										<div class="mb-3 col-md-6">
											<label class="form-label" for="txtR3">Respuesta #3</label>
											<input type="text" class="form-control" id="txtR3" name="txtR3"
												value="<?= strtoupper($_SESSION['userData']['r3'])?>">
										</div>
									</div>
									<button type="submit" class="btn btn-primary">Crear o cambiar </button>
								</form>

							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</main>

<?php footer($data) ?>