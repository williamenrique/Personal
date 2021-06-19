<header class='mb-3'>
	<nav class="navbar navbar-expand navbar-light ">
		<div class="container-fluid">
			<a href="#" class="burger-btn d-block">
				<i class="bi bi-justify fs-3"></i>
			</a>

			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
				aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav ms-auto mb-2 mb-lg-0">
					<li class="nav-item dropdown me-1">
						<a class="nav-link active dropdown-toggle" href="#" data-bs-toggle="dropdown" aria-expanded="false">
							<i class="far fa-envelope fs-4 text-gray-600"></i>
						</a>
						<ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton">
							<li>
								<h6 class="dropdown-header">Mail</h6>
							</li>
							<li><a class="dropdown-item" href="#">No new mail</a></li>
						</ul>
					</li>
					<li class="nav-item dropdown me-3">
						<a class="nav-link active dropdown-toggle" href="#" data-bs-toggle="dropdown" aria-expanded="false">
							<i class="far fa-bell fs-4 text-gray-600"></i>
						</a>
						<ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton">
							<li>
								<h6 class="dropdown-header">Notifications</h6>
							</li>
							<li><a class="dropdown-item">No notification available</a></li>
						</ul>
					</li>
				</ul>
				<div class="dropdown">
					<a href="#" data-bs-toggle="dropdown" aria-expanded="false">
						<div class="user-menu d-flex">
							<div class="user-img d-flex align-items-center">
								<div class="avatar avatar-md">
									<img src="<?= $_SESSION['userData']['img']?>"
										alt="<?= $_SESSION['userData']['nombre'].' '.$_SESSION['userData']['apellido']?>">
								</div>
							</div>
						</div>
					</a>
					<ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton">
						<li>
							<h6 class="dropdown-header">Hola,
								<?= $_SESSION['userData']['nombre'].' '.$_SESSION['userData']['apellido']?></h6>
						</li>
						<li><a class="dropdown-item" href="<?= base_url()?>user/profile">
								<i class="fas fa-user-edit me-2 text-gray-600"></i>
								Perfil</a></li>
						<li><a class="dropdown-item" href="<?= base_url()?>user/setting">
								<i class="fas fa-cog me-2 text-gray-600"></i>Configuracion</a></li>
						<hr class="dropdown-divider">
						</li>
						<li><a class="dropdown-item" href="<?= base_url()?>logout">
								<i class="fas fa-sign-out-alt me-2 text-gray-600"></i>Salir</a>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</nav>
</header>