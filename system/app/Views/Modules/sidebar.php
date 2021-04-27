<div id="sidebar" class="active">
	<div class="sidebar-wrapper active">
		<div class="sidebar-header">
			<div class="d-flex justify-content-between">
				<div class="logo">
					<a href="index.html">Workinfo</a>
				</div>
				<div class="toggler">
					<a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
				</div>
			</div>
		</div>
		<div class="sidebar-menu">
			<ul class="menu">
				<li class="sidebar-title">Menu</li>

				<li class="sidebar-item home">
					<a href="<?= base_url()?>" class='sidebar-link'>
						<i class="bi bi-grid-fill"></i>
						<span>Dashboard</span>
					</a>
				</li>

				<li class="sidebar-item  has-sub menu-cuenta">
					<a href="#" class='sidebar-link'>
						<i class="bi bi-collection-fill"></i>
						<span>Cuentas</span>
					</a>
					<ul class="submenu sub-menu-cuenta">
						<li class="submenu-item propia">
							<a href="<?= base_url()?>cuenta/propia">Propias</a>
						</li>
						<li class="submenu-item tercero">
							<a href="<?= base_url()?>cuenta/tercero">Terceros</a>
						</li>
					</ul>
				</li>
				<li class="sidebar-item sitios">
					<a href="<?= base_url()?>sitio/web" class='sidebar-link'>
						<i class="bi bi-grid-fill"></i>
						<span>Sitios web</span>
					</a>
				</li>
			</ul>
		</div>
		<button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
	</div>
</div>