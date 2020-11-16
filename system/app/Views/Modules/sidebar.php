<!-- sidebar menu start -->
<div class="sidebar-menu sticky-sidebar-menu">

	<!-- logo start -->
	<div class="logo">
		<!-- <h3><a href="index.html">Collective</a></h3> -->
	</div>

	<!-- if logo is image enable this -->
	<!-- image logo --
    <div class="logo">
      <a href="index.html">
        <img src="image-path" alt="Your logo" title="Your logo" class="img-fluid" style="height:35px;" />
      </a>
    </div>
    <!-- //image logo -->

	<div class="logo-icon text-center">
		<a href="index.html" title="logo"><img src="<?= IMG?>logo.png" alt="logo-icon"> </a>
	</div>
	<!-- //logo end -->

	<div class="sidebar-menu-inner">

		<!-- sidebar nav start -->
		<div class="sidebar-menu-inner">

			<!-- sidebar nav start -->
			<ul class="nav nav-pills nav-stacked custom-nav">
				<li class=""><a href="<?= base_url()?>"><i class="fa fa-tachometer"></i><span> Dashboard</span></a>
				</li>
				<li class=""><a href="<?= base_url()?>cuenta"><i class="fa fa-list"></i><span> Cuentas</span></a>
				</li>

			</ul>
			<!-- //sidebar nav end -->
			<!-- toggle button start -->
			<a class="toggle-btn">
				<i class="fa fa-angle-double-left menu-collapsed__left"><span>Collapse Sidebar</span></i>
				<i class="fa fa-angle-double-right menu-collapsed__right"></i>
			</a>
			<!-- //toggle button end -->
		</div>
		<!-- //sidebar nav end -->
		<!-- toggle button start -->
		<a class="toggle-btn">
			<i class="fa fa-angle-double-left menu-collapsed__left"><span>Collapse Sidebar</span></i>
			<i class="fa fa-angle-double-right menu-collapsed__right"></i>
		</a>
		<!-- //toggle button end -->
	</div>
</div>
<!-- //sidebar menu end -->