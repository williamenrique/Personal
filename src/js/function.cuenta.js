let tableCuenta;
document.addEventListener('DOMContentLoaded', function () {
	tableCuenta = $('#tableCuenta').DataTable({
			"language": {
			"sProcessing": "Procesando...",
			"sLengthMenu": "Mostrar _MENU_ registros",
			"sZeroRecords": "No se encontraron resultados",
			"sEmptyTable": "Ningún dato disponible",
			"sInfo": "Total de _TOTAL_ Registros",
			"sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
			"sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
			"sInfoPostFix": "",
			"sSearch": "Buscar:",
			"sUrl": "",
			"sInfoThousands": ",",
			"sLoadingRecords": "Cargando...",
			"oPaginate": {
				"sFirst": "Primero",
				"sLast": "Último",
				"sNext": "Siguiente",
				"sPrevious": "Anterior"
			},
			"oAria": {
				"sSortAscending": ": Activar para ordenar la columna de manera ascendente",
				"sSortDescending": ": Activar para ordenar la columna de manera descendente"
			},
			"buttons": {
				"copy": "Copiar",
				"colvis": "Visibilidad"
			}
		},
		"responsive": {
			"name": "medium",
			"width": "1188"
		},
		"ajax": {
			"url": ' ' + base_url + 'Cuenta/getCuenta',
			"dataSrc": ''
		},
		"columns": [
			{ 'data': 'id_cuenta' },
			{ 'data': 'banco' },
			{ 'data': 'tipo_cta' },
			{ 'data': 'numero_cta' },
			{ 'data': 'usuario' },
			{ 'data': 'pass' },
			{ 'data': 'clave_tlf' },
			{ 'data': 'clave_especial' },
			{ 'data': 'fecha_mod' }
		],
		"resonsieve": "true",
		"bDestroy": true,
		"iDisplayLength": 10,
		"order": [[0, "asc"]]
	});

	$('#tableCuenta').DataTable();
},false)