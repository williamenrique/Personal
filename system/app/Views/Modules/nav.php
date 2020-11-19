		<nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
			<div class="text-center navbar-brand-wrapper d-flex align-items-top justify-content-center">
				<a class="navbar-brand brand-logo" href="<?= base_url()?>"><img src="<?= IMG?>logo.svg" alt="logo"></a>
				<a class="navbar-brand brand-logo-mini" href="<?= base_url()?>"><img src="<?= IMG?>logo-mini.svg" alt="logo"></a>
			</div>
			<div class="navbar-menu-wrapper d-flex align-items-center">
				<button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
					<i class="fas fa-bars"></i>
				</button>
				<ul class="navbar-nav">
					<li class="nav-item dropdown d-none d-lg-flex">
						<a class="nav-link dropdown-toggle nav-btn" id="actionDropdown"
							href="https://www.bootstrapdash.com/demo/libertyui/template/demo/vertical-default-dark/pages/samples/blank-page.html#"
							data-toggle="dropdown">
							<span class="btn">+ Create new</span>
						</a>
						<div class="dropdown-menu navbar-dropdown dropdown-left" aria-labelledby="actionDropdown">
							<a class="dropdown-item"
								href="https://www.bootstrapdash.com/demo/libertyui/template/demo/vertical-default-dark/pages/samples/blank-page.html#">
								<i class="icon-user text-primary"></i>
								User Account
							</a>
							<div class="dropdown-divider"></div>
							<a class="dropdown-item"
								href="https://www.bootstrapdash.com/demo/libertyui/template/demo/vertical-default-dark/pages/samples/blank-page.html#">
								<i class="icon-user-following text-warning"></i>
								Admin User
							</a>
							<div class="dropdown-divider"></div>
							<a class="dropdown-item"
								href="https://www.bootstrapdash.com/demo/libertyui/template/demo/vertical-default-dark/pages/samples/blank-page.html#">
								<i class="icon-docs text-success"></i>
								Sales report
							</a>
						</div>
					</li>
				</ul>
				<ul class="navbar-nav navbar-nav-right">
					<!-- <li class="nav-item dropdown d-none d-lg-flex">
						<a class="nav-link dropdown-toggle" id="languageDropdown"
							href="https://www.bootstrapdash.com/demo/libertyui/template/demo/vertical-default-dark/pages/samples/blank-page.html#"
							data-toggle="dropdown">
							<i class="flag-icon flag-icon-gb"></i>
							English
						</a>
						<div class="dropdown-menu navbar-dropdown" aria-labelledby="languageDropdown">
							<a class="dropdown-item font-weight-medium"
								href="https://www.bootstrapdash.com/demo/libertyui/template/demo/vertical-default-dark/pages/samples/blank-page.html#">
								<i class="flag-icon flag-icon-fr"></i>
								French
							</a>
							<div class="dropdown-divider"></div>
							<a class="dropdown-item font-weight-medium"
								href="https://www.bootstrapdash.com/demo/libertyui/template/demo/vertical-default-dark/pages/samples/blank-page.html#">
								<i class="flag-icon flag-icon-es"></i>
								Espanol
							</a>
							<div class="dropdown-divider"></div>
							<a class="dropdown-item font-weight-medium"
								href="https://www.bootstrapdash.com/demo/libertyui/template/demo/vertical-default-dark/pages/samples/blank-page.html#">
								<i class="flag-icon flag-icon-lt"></i>
								Latin
							</a>
							<div class="dropdown-divider"></div>
							<a class="dropdown-item font-weight-medium"
								href="https://www.bootstrapdash.com/demo/libertyui/template/demo/vertical-default-dark/pages/samples/blank-page.html#">
								<i class="flag-icon flag-icon-ae"></i>
								Arabic
							</a>
						</div>
					</li> -->

					<li class="nav-item dropdown">
						<a class="nav-link count-indicator dropdown-toggle" id="messageDropdown" href="#" data-toggle="dropdown"
							aria-expanded="false">
							<i class="far fa-envelope mx-0"></i>
							<span class="count"></span>
						</a>
						<div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="messageDropdown">
							<div class="dropdown-item">
								<p class="mb-0 font-weight-normal float-left">You have 7 unread mails
								</p>
								<span class="badge badge-info badge-pill float-right">View all</span>
							</div>
							<div class="dropdown-divider"></div>
							<a class="dropdown-item preview-item">
								<div class="preview-thumbnail">
									<img src="./baln_page_files/face4.jpg" alt="image" class="profile-pic">
								</div>
								<div class="preview-item-content flex-grow">
									<h6 class="preview-subject ellipsis font-weight-medium">David Grey
										<span class="float-right font-weight-light small-text">1 Minutes ago</span>
									</h6>
									<p class="font-weight-light small-text">
										The meeting is cancelled
									</p>
								</div>
							</a>
							<div class="dropdown-divider"></div>
							<a class="dropdown-item preview-item">
								<div class="preview-thumbnail">
									<img src="./baln_page_files/face2.jpg" alt="image" class="profile-pic">
								</div>
								<div class="preview-item-content flex-grow">
									<h6 class="preview-subject ellipsis font-weight-medium">Tim Cook
										<span class="float-right font-weight-light small-text">15 Minutes ago</span>
									</h6>
									<p class="font-weight-light small-text">
										New product launch
									</p>
								</div>
							</a>
							<div class="dropdown-divider"></div>
							<a class="dropdown-item preview-item">
								<div class="preview-thumbnail">
									<img src="./baln_page_files/face3.jpg" alt="image" class="profile-pic">
								</div>
								<div class="preview-item-content flex-grow">
									<h6 class="preview-subject ellipsis font-weight-medium"> Johnson
										<span class="float-right font-weight-light small-text">18 Minutes ago</span>
									</h6>
									<p class="font-weight-light small-text">
										Upcoming board meeting
									</p>
								</div>
							</a>
						</div>
					</li>
					<li class="nav-item dropdown">
						<a class="nav-link count-indicator dropdown-toggle" id="notificationDropdown" href="#" data-toggle="dropdown">
							<i class="fas fa-tools mx-0"></i>
							<span class="count"></span>
						</a>
						<div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list"
							aria-labelledby="notificationDropdown">
							<a class="dropdown-item">
								<p class="mb-0 font-weight-normal float-left">Menu del usuario</p>
								<span class="badge badge-pill badge-warning float-right">View all</span>
							</a>
							<div class="dropdown-divider"></div>
							<a class="dropdown-item preview-item" href="<?= base_url()?>usuario/perfil">
								<div class="preview-thumbnail">
									<div class="preview-icon bg-success">
										<i class="fas fa-user-cog mx-0"></i>
									</div>
								</div>
								<div class="preview-item-content">
									<h6 class="preview-subject font-weight-medium">perfil
									</h6>

								</div>
							</a>
							<div class=" dropdown-divider">
							</div>
							<a class="dropdown-item preview-item">
								<div class="preview-thumbnail">
									<div class="preview-icon bg-warning">
										<i class="icon-cursor-move mx-0"></i>
									</div>
								</div>
								<div class="preview-item-content">
									<h6 class="preview-subject font-weight-medium">Settings</h6>
									<p class="font-weight-light small-text">
										Private message
									</p>
								</div>
							</a>
							<div class="dropdown-divider"></div>
							<a class="dropdown-item preview-item" href="<?= base_url()?>logout">
								<div class="preview-thumbnail">
									<div class="preview-icon bg-info">
										<i class="fas fa-power-off mx-0"></i>
									</div>
								</div>
								<div class="preview-item-content">
									<h6 class="preview-subject font-weight-medium">Cerrar session</h6>
								</div>
							</a>
						</div>
					</li>
					<!-- <li class="nav-item nav-settings d-none d-lg-block">
						<a class="nav-link" href="<?= base_url()?>">
							<i class="fas fa-th-large"></i>
						</a>
					</li> -->
					<!-- <li class="nav-item d-none d-lg-block">
						<a class="nav-link" href="<?= base_url()?>logout">
							<i class="fas fa-power-off mx-0"></i>
						</a>
					</li> -->
				</ul>
				<button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button"
					data-toggle="offcanvas">
					<span class="fas fa-bars icon-menu"></span>
				</button>
			</div>
		</nav>