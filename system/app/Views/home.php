<?php 
head($data);
getModal('modals',$data);
?>

			<div class="page-heading">
				<h3>Area de actividades</h3>
			</div>
			<div class="page-content">
				<div class="row">
					<?php
	if($_SESSION['userData']['token'] != 0):
	?>
					<div class="col-6 col-lg-3 col-md-6">
						<div class="card">
							<div class="card-body px-3 py-4-5">
								<div class="row">
									<div class="col-md-4">
										<div class="stats-icon purple">
											<i class="iconly-boldTicket"></i>
										</div>
									</div>
									<div class="col-md-8">
										<h6 class="text-muted font-semibold">Token</h6>
										<h6 class="font-extrabold mb-0">Hay un token generado</h6>
									</div>
									<span class="text-muted">Si no fue usted elimine aqui</span>
								</div>
							</div>
						</div>
					</div>
					<?php
		endif;
		if($_SESSION['userData']['p1'] == "" && $_SESSION['userData']['p2'] == "" && $_SESSION['userData']['p3'] == "" && $_SESSION['userData']['r1'] == "" && $_SESSION['userData']['r2'] == "" && $_SESSION['userData']['r3'] == "" ):
		?>
					<div class="col-6 col-lg-3 col-md-6">
						<div class="card">
							<div class="card-body px-3 py-4-5">
								<div class="row">
									<div class="col-md-4">
										<div class="stats-icon blue">
											<i class="iconly-boldProfile"></i>
										</div>
									</div>
									<div class="col-md-8">
										<h6 class="text-muted font-semibold">Preguntas</h6>
										<h6 class="font-extrabold mb-0">Debe llenar las preguntas</h6>
										<a href="<?= base_url()?>user/setting">ir</a>
									</div>
								</div>
							</div>
						</div>
					</div>
					<?php
		endif;
		?>

					<div class="col-6 col-lg-3 col-md-6 ">
						<div class="card">
							<div class="card-body px-3 py-4-5">
								<div class="row">
									<div class="col-md-4">
										<div class="stats-icon red">
											<p class="font-extrabold mb-0 cantEvent" style="color:#fff"></p>
										</div>
									</div>
									<div class="col-md-8">
										<h6 class="text-muted font-semibold h6" data="este es un data">Eventos proximos</h6>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="row">

					<div class="col-sm-12 col-md-9 col-lg-8">
						<div id='calendario'></div>
					</div>
					<div class="col-sm-12 col-md-3 col-lg-4">
						<button type="button" class="btn btn-primary btn-sm mr-3 mt-1" onclick="openModal('modalCalendar')">
							<i class="fas fa-plus"></i>
							Agregar evento
						</button>
						<div class="list-group  mt-4">
							<a href="#" class="list-group-item list-group-item-action active text-center" aria-current="true">
								<p class="mb-1 ">Lista de eventos</p>
							</a>
							<ul id="list" class="listEvent list-group"></ul>
							<div class="navegacion">
								<?= navPaginar();?>
							</div>
						</div>
					</div>
				</div>
			</div>
			<?php footer($data) ?>