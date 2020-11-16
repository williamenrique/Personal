<?= header_admin($data)?>

<section>
	<div class="main-content">
		<!-- content -->
		<div class="container-fluid content-top-gap">
			<nav aria-label="breadcrumb">
				<ol class="breadcrumb my-breadcrumb">
					<li class="breadcrumb-item"><a href="<?= base_url()?>">Home</a></li>
					<li class="breadcrumb-item active" aria-current="page">Cuenta</li>
				</ol>
			</nav>

			<!-- data tables -->
			<div class="">
				<div class="row">
					<div class="col-lg-12 mb-4">
						<div class="card card_border p-4">
							<table id="tableCuentas" class="data-table table stripe hover nowrap" style="width:100%">
								<thead>
									<tr>
										<th scope="col">ID</th>
										<th scope="col">Nick</th>
										<th scope="col">Nombres</th>
										<th scope="col">Apellidos</th>
										<th scope="col">Email</th>
										<th scope="col">Telefono</th>
										<th scope="col">Rol</th>
										<th scope="col">Status</th>
										<th scope="col">Acciones</th>
									</tr>
								</thead>
								<tbody>

								</tbody>
							</table>
						</div>
					</div>
				</div>

			</div>
			<!-- //data tables -->
		</div>
	</div>
</section>

<?= footer_admin($data)?>