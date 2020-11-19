<?= header_admin($data)?>

<div class="main-content">
	<!-- content -->
	<div class="container-fluid content-top-gap">

		<nav aria-label="breadcrumb">
			<ol class="breadcrumb my-breadcrumb">
				<li class="breadcrumb-item"><a href="index.html">Home</a></li>
				<li class="breadcrumb-item active" aria-current="page">Cuentas</li>
			</ol>
		</nav>
		<div class="welcome-msg pt-3 pb-4">
			<h1>Cuentas <span class="text-primary">Propias</span></h1>
			<p>Lista completa de cuentas con sus respectivos datos</p>
		</div>

		<div class="data-table">
			<div class="row">
				<div class="col-lg-12 chart-grid mb-4">
					<div class="card card_border p-4">
						<div class="card-header chart-grid__header pl-0 pt-0">
						</div>
						<section>
							<table id="tableCuenta" class="table table-striped" style="width:100%">
								<thead>
									<tr>
										<th>Name</th>
										<th>Position</th>
										<th>Office</th>
										<th>Age</th>
										<th>Start date</th>
										<th>Salary</th>
									</tr>
								</thead>
								<tbody></tbody>
							</table>
						</section>
					</div>

					<div class="welcome-msg pt-3 pb-4">
						<h1>Cuentas <span class="text-primary">Terceros</span></h1>
						<p>Lista completa de cuentas con sus respectivos datos</p>
					</div>
					<div class="card card_border p-4">
						<div class="card-header chart-grid__header pl-0 pt-0">
						</div>
						<section>
							<table id="tableCuentaTercero" class="table table-striped" style="width:100%">
								<thead>
									<tr>
										<th>Name</th>
										<th>Position</th>
										<th>Office</th>
										<th>Age</th>
										<th>Start date</th>
										<th>Salary</th>
									</tr>
								</thead>
								<tbody></tbody>
							</table>
						</section>
					</div>
				</div>
			</div>
		</div>


	</div>
</div>
<?= footer_admin($data)?>