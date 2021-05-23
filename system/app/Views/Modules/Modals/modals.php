<div class="modal fade" id="calendarView" tabindex="-1" aria-labelledby="calendarViewLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="card text-white bg-primary mb-3" style="max-width: 18rem;">

			<div class="card-body text-white">
				<h5 class="card-title " id="title"></h5>
				<p class="card-text" id="descrip"></p>
				<div class="d-flex">
					<span id="start"></span><span id="end"></span>
				</div>

			</div>
		</div>
	</div>
</div>

<!-- crear evento en calendario -->
<div class="modal fade" id="modalCalendar" tabindex="-1" role="dialog" aria-labelledby="modalCalendarTitle"
	aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable" role="document">
		<div class="modal-content">
			<div class="modal-header">

				<h5 class="modal-title" id="titleModal">Crear nuevo Evento</h5>
				<button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
					<i data-feather="x"></i>
				</button>
			</div>
			<div class="modal-body">
				<form id="formCalendar">
					<div class="form-group position-relative mb-4">
						<input type="hidden" id="txtId" name="txtId">
						<input type="hidden" id="txtOpcion" name="txtOpcion" value="1">
						<input type="hidden" id="txtIdUser" name="txtIdUser" value="<?= $_SESSION['userData']['user_id']?>">
					</div>
					<label for="">Titulo Del evento</label>
					<div class="form-group position-relative mb-4">
						<input type="text" class="form-control form-control-xl" id="txtTitulo" name="txtTitulo">
					</div>
					<label for="">Descripcion de evento</label>
					<div class="form-group position-relative mb-4">
						<input type="text" class="form-control form-control-xl" id="txtDescripcion" name="txtDescripcion">
					</div>
					<div class="row">
						<div class="col-md-6">
							<label for="">Inicio</label>
							<div class="form-group position-relative mb-4">
								<input type="date" class="form-control form-control-xl" id="txtStart" name="txtStart"
									value="<?= date('Y-m-d')?>">
								<input type="time" class="form-control form-control-xl" id="txtStartTime" name="txtStartTime"
									value="<?= date('G:h:i')?>">
							</div>
						</div>
						<div class="col-md-6">
							<label for="">Fin</label>
							<div class="form-group position-relative mb-4">
								<input type="date" class="form-control form-control-xl" id="txtEnd" name="txtEnd">
								<input type="time" class="form-control form-control-xl" id="txtEndTime" name="txtEndTime">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<label for="">Color de letra</label>
							<div class="form-group position-relative mb-4">
								<input type="color" class="form-control form-control-xl form-control-color" id="txtColor"
									name="txtColor" value="#FFFFFF">
							</div>
						</div>
						<div class="col-md-6">
							<label for="">Color de fondo</label>
							<div class="form-group position-relative mb-4">
								<input type="color" class="form-control form-control-xl form-control-color" id="txtColorFont"
									name="txtColorFont" value="#435EBE">
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-primary ml-1 btnSet" onclick="btnAccion('set')">
							<i class="bx bx-check d-block d-sm-none"></i>
							<span class="d-none d-sm-block">Crear</span>
						</button>
						<button type="button" class="btn btn-info ml-1 btnUpdate" onclick="btnAccion('update')">
							<i class="bx bx-check d-block d-sm-none"></i>
							<span class="d-none d-sm-block">Actualizar</span>
						</button>
						<button type="button" class="btn btn-danger ml-1 btnDelete" onclick="btnAccion('delete')">
							<i class="bx bx-check d-block d-sm-none"></i>
							<span class="d-none d-sm-block">Eliminar</span>
						</button>
						<button type="button" class="btn btn-secondary " data-bs-dismiss="modal">
							<i class="bx bx-x d-block d-sm-none"></i>
							<span class="d-none d-sm-block">Cerrar</span>
						</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>