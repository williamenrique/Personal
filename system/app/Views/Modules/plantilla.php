<?= header_admin($data)?>

<section>
	<div class="main-content">
	<!-- content -->
		<div class="container-fluid content-top-gap">
			<nav aria-label="breadcrumb">
				<ol class="breadcrumb my-breadcrumb">
					<li class="breadcrumb-item"><a href="<?= base_url()?>">Home</a></li>
					<li class="breadcrumb-item active" aria-current="page">Dashboard</li>
				</ol>
			</nav>
			<div class="welcome-msg pt-3 pb-4">
				<h1>Hi <span class="text-primary">John</span>, Welcome hhhhh</h1>
				<p>Very detailed &amp; featured admin.</p>
			</div>



		</div>
	</div>
</section>

<?= footer_admin($data)?>