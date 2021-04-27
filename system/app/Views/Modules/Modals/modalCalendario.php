<div class="modal fade" id="modalCalendar" tabindex="-1" role="dialog" aria-labelledby="modalCalendarTitle"
	aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="titleModal"></h5>
				<button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
					<i data-feather="x"></i>
				</button>
			</div>
			<div class="modal-body">
				<form id="formCalendar">
					<input type="hidden" id="txtIdUser" name="txtIdUser" value="<?= $_SESSION['userData']['user_id']?>">
					<div class="form-group position-relative mb-4">
						<input type="text" class="form-control form-control-xl" id="txtTitulo" name="txtTitulo"
							placeholder="URL de la pagina web">
					</div>
					<div class="row">
						<div class="col">
							<label for="txtDescripcion">Descripcion del evento o recordatorio</label>
							<div class="form-group position-relative mb-4">
								<textarea class="form-control" id="txtDescripcion" name="txtDescripcion" rows="3"></textarea>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<label for="txtStartEvent">Inicio</label>
							<div class="form-group position-relative mb-6">
								<input type="date" class="form-control form-control-xl" id="txtStartEvent" name="txtStartEvent">
							</div>
						</div>
						<div class="col-md-6">
							<label for="txtEndEvent">Fin</label>
							<div class="form-group position-relative mb-6">
								<input type="date" class="form-control form-control-xl" id="txtEndEvent" name="txtEndEvent">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<label for="txtTexColor">Seleccione color de letra</label>
							<div class="form-group position-relative mb-6">
								<input type="color" class="form-control form-control-xl" id="txtTexColor" name="txtTexColor"
									value="#FFFFFF">
							</div>
						</div>
						<div class="col-md-6">
							<label for="txtColorFont">Seleccione color de fondo</label>
							<input type="text" class="form-control form-control-xl form-control-color" id="txtColorFont"
								name="txtColorFont" value="#22A6F2">
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