<?php 
head($data);
getModal('modalCuentas',$data);
?>
<div class="page-heading">
	<div class="page-title">
		<div class="row">
			<div class="col-12 col-md-6 order-md-1 order-last">
				<h3>Cuentas Propias</h3>
				<p class="text-subtitle text-muted">Informacion de las cuentas en lista</p>
			</div>
			<div class="col-12 col-md-6 order-md-2 order-first">
				<nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
						<li class="breadcrumb-item active" aria-current="page"><?= $data['page_name']?></li>
					</ol>
				</nav>
			</div>
		</div>
	</div>

	<section class="section">
		<div class="card">
			<div class="card-header">
				<h3>
					<button type="button" class="btn btn-primary btn-sm mr-3" onclick="openModal('modalCuentaP')">
						<i class="fas fa-plus"></i>
						Agregar
					</button>
				</h3>
			</div>

			<div class="card-body">
				<table class="table stripe hover nowrap table-sm" id="tableCuentaP">
					<thead>
						<tr>
							<th scope="col">ID</th>
							<th scope="col">Banco</th>
							<th scope="col">Usuario</th>
							<th scope="col">Password</th>
							<th scope="col">Acciones</th>
						</tr>
					</thead>
					<tbody>
					</tbody>
				</table>
			</div>
		</div>
	</section>
</div>

<?php footer($data) ?>
<script>
// $(document).ready(function() {
// 	$('#tableCuentaP').DataTable();
// });
</script>