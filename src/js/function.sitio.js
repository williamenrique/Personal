var tableSitio;
var tableCuentaT;
document.addEventListener('DOMContentLoaded', function() {
    tableSitio = $('#tableSitio').DataTable({
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
            "url": ' ' + base_url + 'Sitio/getSitios',
            "dataSrc": ''
        },
        "columns": [
            { 'data': 'n' },
            { 'data': 'sitio' },
            { 'data': 'usuario' },
            { 'data': 'pass' },
            { 'data': 'url' },
            { 'data': 'opciones' }
        ],
        "resonsieve": "true",
        "bDestroy": true,
        "iDisplayLength": 10,
        "order": [
            [0, "asc"]
        ]
    });

    // agregar cuentas propias
    if (document.querySelector("#formSitio")) {
        formSitio.onsubmit = function(e) {
            e.preventDefault();
            var request = window.XMLHttpRequest ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
            var ajaxUrl = base_url + 'Sitio/setSitios';
            //creamos un objeto del formulario con los datos haciendo referencia a formData
            var formData = new FormData(formSitio);
            //prepara los datos por ajax preparando el dom
            request.open('POST', ajaxUrl, true);
            //envio de datos del formulario que se almacena enla variable
            request.send(formData);
            //obtenemos los resultados y evaluamos
            request.onreadystatechange = function() {
                if (request.readyState == 4 && request.status == 200) {
                    //obtenemos los datos y convertimos en JSON
                    let objData = JSON.parse(request.responseText);
                    if (objData.status) {
                        notifi(objData.msg, "info");
                        formSitio.reset();
                        $('#modalSitio').modal('hide');
                        let tableSitio = $('#tableSitio').DataTable();
                        //recargamos la tabla 
                        tableSitio.ajax.reload(function() {
                            //cada vez que se haga una accion se recarga la tabla y los botones
                            // fntEditRol();
                            // fntDelRol();
                        });
                    } else {
                        notifi(objData.msg, "error");
                    }
                }
            }
        }
    }
	})
	
	//eliminar un sitio
//inSitio
function fntDelSitio(inSitio) {
	//obtenemos el valor del atributo individual
	var inSitio = inSitio;
	Swal.fire({
		title: 'Estas seguro de eliminar el Sitio?',
		text: "No podra ser revertido el proceso!",
		icon: 'warning',
		showCancelButton: true,
		confirmButtonColor: 'btn btn-success',
		cancelButtonColor: 'btn btn-danger',
		confirmButtonText: 'Si, eliminar!'
	}).then((result) => {
		if (result.isConfirmed) {
			//hacer una validacion para diferentes navegadores y crear el formato de lectura y hacemos la peticion mediante ajax
			let request = window.XMLHttpRequest ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
			let ajaxUrl = base_url + 'Sitio/delSitio/' + inSitio;
			//id del atributo lr que obtuvimos enla variable
			let strData = "inSitio=" + inSitio;
			request.open("POST", ajaxUrl, true);
			//forma en como se enviara
			request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			//enviamos
			request.send(strData);
			// request.send();
			request.onreadystatechange = function () {
				//comprobamos la peticion
				if (request.readyState == 4 && request.status == 200) {
					//convertir en objeto JSON
					let objData = JSON.parse(request.responseText);
					if (objData.status) {
						$(function () {
							var Toast = Swal.mixin({
								toast: true,
								position: 'top-end',
								showConfirmButton: false,
								timer: 3000
							})
							Toast.fire({
								icon: 'success',
								title: objData.msg
							})
						})
						tableSitio.ajax.reload(function () {
							//cada vez que se haga una accion se recarga la tabla y los botones
							// fntRolesUsuarios();
						});
					} else {
						Swal.fire('Atencion!', objData.msg, 'error');
					}
				}
			}
		}
	})
}
function openModal() {
    //inicializar el modal que sea nuevo rol
    //document.querySelector('#idRol').value = ''; //limpiar el value del input hiden del modal
    // document.querySelector('#titleModal').innerHTML = 'Nuevo Rol';
    // document.querySelector('.modal-header').classList.replace('headerUpdate', 'headerRegistrer');
    // document.querySelector('#btnActionForm').classList.replace('btn-info', 'btn-primary');
    // document.querySelector('#btnText').innerHTML = 'Guardar';
    // document.querySelector('#formRol').reset();
    $('#modalSitio').modal("show");
}