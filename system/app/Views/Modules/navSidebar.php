<nav class="sidebar sidebar-offcanvas" id="sidebar">
	<ul class="nav">
		<li class="nav-item nav-profile">
			<div class="nav-link">
				<div class="profile-image">
					<img src="<?= IMG?>default.png" alt="image">
					<span class="online-status online"></span>
					<!--change class online to offline or busy as needed-->
				</div>
				<div class="profile-name">
					<p class="name"><?= $_SESSION['userData']['nombre']?></p>
					<p class="designation">Administrador</p>
				</div>
			</div>
		</li>

		<li class="nav-item">
			<a class="nav-link" href="<?= base_url()?>">
				<i class="fas fa-tachometer-alt mr-2 menu-icon"></i>
				<span class="menu-title">Dashboard</span>
			</a>
		</li>
		<li class="nav-item">
			<a class="nav-link" href="<?= base_url()?>cuenta">
				<i class="fas fa-clipboard-list mr-2 menu-icon"></i>
				<span class="menu-title">Cuentas</span>
			</a>
		</li>


		<li class="mt-4 nav-item nav-progress">
			<h6 class="nav-progress-heading mt-4 font-weight-normal">
				Today's Sales
				<span class="nav-progress-sub-heading">
					50 sold
				</span>
			</h6>
			<div class="progress progress-sm">
				<div class="progress-bar bg-info" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0"
					aria-valuemax="100"></div>
			</div>
			<h6 class="nav-progress-heading mt-4 font-weight-normal">
				Customer target
				<span class="nav-progress-sub-heading">
					500
				</span>
			</h6>
			<div class="progress progress-sm">
				<div class="progress-bar bg-danger" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0"
					aria-valuemax="100"></div>
			</div>
		</li>
	</ul>
</nav>