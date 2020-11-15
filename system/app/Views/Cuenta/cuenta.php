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
			<div class="data-tables">
				<div class="row">
					<div class="col-lg-12 mb-4">
						<div class="card card_border p-4">
							<h3 class="card__title position-absolute">All Employees Info</h3>
							<div class="table-responsive">
								<table id="cuenta">
									<thead>
										<tr>ID</tr>
									</thead>
								</table>
							</div>
						</div>
					</div>
				</div>

			</div>
			<!-- //data tables -->
		</div>
	</div>
</section>

<?= footer_admin($data)?>