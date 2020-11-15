<?= header_admin($data)?>

<section>
	<div class="main-content">
		<!-- content -->
		<div class="container-fluid content-top-gap">

			<div class="welcome-msg pt-3 pb-4">
				<h1>Hi <span class="text-primary"><?= $_SESSION['userData']['nombre']?></span>, Bienvenido</h1>
				<p>Very detailed &amp; featured admin.</p>
			</div>

			<!-- statistics data -->
			<div class="statistics">
				<div class="row">
					<div class="col-xl-6 pr-xl-2">
						<div class="row">
							<div class="col-sm-6 pr-sm-2 statistics-grid">
								<div class="card card_border border-primary-top p-4">
									<i class="lnr lnr-users"> </i>
									<h3 class="text-primary number">29.75 M</h3>
									<p class="stat-text">Total Users</p>
								</div>
							</div>
							<div class="col-sm-6 pl-sm-2 statistics-grid">
								<div class="card card_border border-primary-top p-4">
									<i class="lnr lnr-eye"> </i>
									<h3 class="text-secondary number">51.25 K</h3>
									<p class="stat-text">Daily Visitors</p>
								</div>
							</div>
						</div>
					</div>
					<div class="col-xl-6 pl-xl-2">
						<div class="row">
							<div class="col-sm-6 pr-sm-2 statistics-grid">
								<div class="card card_border border-primary-top p-4">
									<i class="lnr lnr-cloud-download"> </i>
									<h3 class="text-success number">166.89 M</h3>
									<p class="stat-text">Downloads</p>
								</div>
							</div>
							<div class="col-sm-6 pl-sm-2 statistics-grid">
								<div class="card card_border border-primary-top p-4">
									<i class="lnr lnr-cart"> </i>
									<h3 class="text-danger number">1,250k</h3>
									<p class="stat-text">Purchased</p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- //statistics data -->
		</div>
	</div>
</section>

<?= footer_admin($data)?>