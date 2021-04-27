<div class="modal fade" id="modalCuentaP" tabindex="-1" role="dialog" aria-labelledby="modalCuentaTitle"
	aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="modalCuentaTitle">Datos del Banco</h5>
				<button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
					<i data-feather="x"></i>
				</button>
			</div>
			<div class="modal-body">
				<form id="formCuenta">
					<input type="hidden" name="txtTipoC" id="txtTipoC" value="1">
					<input type="hidden" id="txtNombre" name="txtNombre" value="<?= $_SESSION['userData']['nombre']?>">
					<div class="row">
						<div class="col-sm-7">
							<div class="form-group position-relative mb-4">
								<select class="form-select" id="txtBanco" name="txtBanco" aria-label="Floating label select example">
									<option selected>Seleccione un Banco</option>
									<option value="Banco Canarias de Venezuela">Banco Canarias de Venezuela</option>
									<option value="Banco Central de Venezuela">Banco Central de Venezuela</option>
									<option value="Banco Confederado">Banco Confederado</option>
									<option value="Banco de Venezuela Grupo Santander">Banco de Venezuela Grupo Santander</option>
									<option value="Banco del Caribe">Banco del Caribe</option>
									<option value="Banco Exterior">Banco Exterior</option>
									<option value="Banco Federal">Banco Federal</option>
									<option value="Banco Guayana">Banco Guayana</option>
									<option value="Banco Industrial de Venezuela">Banco Industrial de Venezuela</option>
									<option value="Banco Mercantil">Banco Mercantil</option>
									<option value="Banco Occidental de Descuento">Banco Occidental de Descuento</option>
									<option value="Banco Plaza">Banco Plaza</option>
									<option value="Banco Provincial">Banco Provincial</option>
									<option value="Banco Sofitasa">Banco Sofitasa</option>
									<option value="Banco Venezolano de Crédito">Banco Venezolano de Crédito</option>
									<option value="Banesc On-Line">Banesc On-Line</option>
									<option value="Banfoandes">Banfoandes</option>
									<option value="Banorte">Banorte</option>
									<option value="Banplus">Banplus</option>
									<option value="Casa Propia">Casa Propia</option>
									<option value="Central Banco Universal">Central Banco Universal</option>
									<option value="Corpbanca">Corpbanca</option>
									<option value="Delsur Banco Universal">Delsur Banco Universal</option>
									<option value="Fondo Común">Fondo Común</option>
								</select>
							</div>
						</div>
						<div class="col-sm-5">
							<div class="form-group position-relative mb-4">
								<select class="form-select" id="txtTipo" name="txtTipo" aria-label="Floating label select example">
									<option selected>Tipo de cuenta</option>
									<option value="Corriente">Corriente</option>
									<option value="Ahorro">Ahorro</option>
								</select>
							</div>
						</div>
					</div>

					<div class="form-group position-relative mb-4">
						<input type="text" class="form-control form-control-xl" id="txtNcuenta" name="txtNcuenta"
							placeholder="Numero de cuenta">
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group position-relative mb-6">
								<input type="text" class="form-control form-control-xl" id="txtNtarjeta" name="txtNtarjeta"
									placeholder="Numero de tarjeta">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group position-relative mb-6">
								<input type="text" class="form-control form-control-xl" id="txtCcv" name="txtCcv" placeholder="CCV">
							</div>
						</div>
					</div>
					<div class="form-group position-relative mb-4">
						<input type="text" class="form-control form-control-xl" id="txtUsuario" name="txtUsuario"
							placeholder="Usuario">
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group position-relative mb-6">
								<input type="password" class="form-control form-control-xl" id="txtPass" name="txtPass"
									placeholder="Password">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group position-relative mb-6">
								<input type="text" class="form-control form-control-xl" id="txtClaveEspecial" name="txtClaveEspecial"
									placeholder="Clave Especial">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group position-relative mb-6">
								<label for="">Pregunta #1</label>
								<input type="text" class="form-control form-control-xl" id="txtP1" name="txtP1" placeholder="">
							</div>
						</div>
						<div class="col-md-6">
							<label for="">Respuesta #1</label>
							<div class="form-group position-relative mb-6">
								<input type="text" class="form-control form-control-xl" id="txtR1" name="txtR1" placeholder="">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group position-relative mb-6">
								<label for="">Pregunta #2</label>
								<input type="text" class="form-control form-control-xl" id="txtP2" name="txtP2" placeholder="">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group position-relative mb-6">
								<label for="">Respuesta #2</label>
								<input type="text" class="form-control form-control-xl" id="txtR2" name="txtR2" placeholder="">
							</div>
						</div>
						<div class="col-md-6">
							<label for="">Pregunta #3</label>
							<div class="form-group position-relative mb-6">
								<input type="text" class="form-control form-control-xl" id="txtP3" name="txtP3" placeholder="">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group position-relative mb-6">
								<label for="">Respuesta #3</label>
								<input type="text" class="form-control form-control-xl" id="txtR3" name="txtR3" placeholder="">
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<button type="submit" class="btn btn-primary ml-1">
							<i class="bx bx-check d-block d-sm-none"></i>
							<span class="d-none d-sm-block">Agregar</span>
						</button>
						<button type="button" class="btn btn-danger " data-bs-dismiss="modal">
							<i class="bx bx-x d-block d-sm-none"></i>
							<span class="d-none d-sm-block">Cerrar</span>
						</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>


<div class="modal fade" id="modalCuentaT" tabindex="-1" role="dialog" aria-labelledby="modalCuentaTitle"
	aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="modalCuentaTitle">Datos del Banco</h5>
				<button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
					<i data-feather="x"></i>
				</button>
			</div>
			<div class="modal-body">
				<form id="formCuentaT">
					<input type="hidden" name="txtTipoC" id="txtTipoC" value="2">
					<div class="row">
						<div class="col-sm-7">
							<div class="form-group position-relative mb-4">
								<select class="form-select" id="txtBanco" name="txtBanco" aria-label="Floating label select example">
									<option selected>Seleccione un Banco</option>
									<option value="Banco Canarias de Venezuela">Banco Canarias de Venezuela</option>
									<option value="Banco Central de Venezuela">Banco Central de Venezuela</option>
									<option value="Banco Confederado">Banco Confederado</option>
									<option value="Banco de Venezuela Grupo Santander">Banco de Venezuela Grupo Santander</option>
									<option value="Banco del Caribe">Banco del Caribe</option>
									<option value="Banco Exterior">Banco Exterior</option>
									<option value="Banco Federal">Banco Federal</option>
									<option value="Banco Guayana">Banco Guayana</option>
									<option value="Banco Industrial de Venezuela">Banco Industrial de Venezuela</option>
									<option value="Banco Mercantil">Banco Mercantil</option>
									<option value="Banco Occidental de Descuento">Banco Occidental de Descuento</option>
									<option value="Banco Plaza">Banco Plaza</option>
									<option value="Banco Provincial">Banco Provincial</option>
									<option value="Banco Sofitasa">Banco Sofitasa</option>
									<option value="Banco Venezolano de Crédito">Banco Venezolano de Crédito</option>
									<option value="Banesc On-Line">Banesc On-Line</option>
									<option value="Banfoandes">Banfoandes</option>
									<option value="Banorte">Banorte</option>
									<option value="Banplus">Banplus</option>
									<option value="Casa Propia">Casa Propia</option>
									<option value="Central Banco Universal">Central Banco Universal</option>
									<option value="Corpbanca">Corpbanca</option>
									<option value="Delsur Banco Universal">Delsur Banco Universal</option>
									<option value="Fondo Común">Fondo Común</option>
								</select>
							</div>
						</div>
						<div class="col-sm-5">
							<div class="form-group position-relative mb-4">
								<select class="form-select" id="txtTipo" name="txtTipo" aria-label="Floating label select example">
									<option selected>Tipo de cuenta</option>
									<option value="Corriente">Corriente</option>
									<option value="Ahorro">Ahorro</option>
								</select>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-4">
							<div class="form-group position-relative mb-4">
								<input type="text" class="form-control form-control-xl" id="txtNombre" name="txtNombre"
									placeholder="Nomb Tercero">
							</div>
						</div>
						<div class="col-md-8">
							<div class="form-group position-relative mb-4">
								<input type="text" class="form-control form-control-xl" id="txtNcuenta" name="txtNcuenta"
									placeholder="Numero de cuenta">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group position-relative mb-6">
								<input type="text" class="form-control form-control-xl" id="txtNtarjeta" name="txtNtarjeta"
									placeholder="Numero de tarjeta">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group position-relative mb-6">
								<input type="text" class="form-control form-control-xl" id="txtCcv" name="txtCcv" placeholder="CCV">
							</div>
						</div>
					</div>
					<div class="form-group position-relative mb-4">
						<input type="text" class="form-control form-control-xl" id="txtUsuario" name="txtUsuario"
							placeholder="Usuario">
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group position-relative mb-6">
								<input type="password" class="form-control form-control-xl" id="txtPass" name="txtPass"
									placeholder="Password">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group position-relative mb-6">
								<input type="text" class="form-control form-control-xl" id="txtClaveEspecial" name="txtClaveEspecial"
									placeholder="Clave Especial">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group position-relative mb-6">
								<label for="">Pregunta #1</label>
								<input type="text" class="form-control form-control-xl" id="txtP1" name="txtP1" placeholder="">
							</div>
						</div>
						<div class="col-md-6">
							<label for="">Respuesta #1</label>
							<div class="form-group position-relative mb-6">
								<input type="text" class="form-control form-control-xl" id="txtR1" name="txtR1" placeholder="">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group position-relative mb-6">
								<label for="">Pregunta #2</label>
								<input type="text" class="form-control form-control-xl" id="txtP2" name="txtP2" placeholder="">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group position-relative mb-6">
								<label for="">Respuesta #2</label>
								<input type="text" class="form-control form-control-xl" id="txtR2" name="txtR2" placeholder="">
							</div>
						</div>
						<div class="col-md-6">
							<label for="">Pregunta #3</label>
							<div class="form-group position-relative mb-6">
								<input type="text" class="form-control form-control-xl" id="txtP3" name="txtP3" placeholder="">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group position-relative mb-6">
								<label for="">Respuesta #3</label>
								<input type="text" class="form-control form-control-xl" id="txtR3" name="txtR3" placeholder="">
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<button type="submit" class="btn btn-primary ml-1">
							<i class="bx bx-check d-block d-sm-none"></i>
							<span class="d-none d-sm-block">Agregar</span>
						</button>
						<button type="button" class="btn btn-danger " data-bs-dismiss="modal">
							<i class="bx bx-x d-block d-sm-none"></i>
							<span class="d-none d-sm-block">Cerrar</span>
						</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>