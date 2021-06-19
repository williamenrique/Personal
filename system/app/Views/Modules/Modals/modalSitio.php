<div class="modal fade" id="modalSitio" tabindex="-1" role="dialog" aria-labelledby="modalSitioTitle"
	aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="modalSitioTitle">Datos del Sitio</h5>
				<button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
					<i data-feather="x"></i>
				</button>
			</div>
			<div class="modal-body">
				<form id="formSitio">
					<input type="hidden" name="txtTipoC" id="txtTipoC" value="1">
					<input type="hidden" id="txtNombre" name="txtNombre" value="<?= $_SESSION['userData']['nombre']?>">

					<div class="row">
						<div class="col-md-6">
							<div class="form-group position-relative mb-4">
								<input type="text" class="form-control form-control-xl" id="txtUrl" name="txtUrl"
									placeholder="URL de la pagina web">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group position-relative mb-4">
								<input type="text" class="form-control form-control-xl" id="txtSitio" name="txtSitio"
									placeholder="Nombre de la pagina">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group position-relative mb-6">
								<input type="text" class="form-control form-control-xl" id="txtUsuario" name="txtUsuario"
									placeholder="Nombre usuario">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group position-relative mb-6">
								<input type="password" class="form-control form-control-xl" id="txtPass" name="txtPass"
									placeholder="Password">
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