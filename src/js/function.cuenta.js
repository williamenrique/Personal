var tableCuentaP;
var tableCuentaT;
document.addEventListener('DOMContentLoaded', function() {
        tableCuentaP = $('#tableCuentaP').DataTable({
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
                "url": ' ' + base_url + 'Cuenta/getCuentas/1',
                "dataSrc": ''
            },
            "columns": [
                { 'data': 'n' },
                { 'data': 'banco' },
                { 'data': 'usuario' },
                { 'data': 'pass' },
                { 'data': 'opciones' }
            ],
            "resonsieve": "true",
            "bDestroy": true,
            "iDisplayLength": 10,
            "order": [
                [0, "asc"]
            ]
        });
        // tabla de terceros
        tableCuentaT = $('#tableCuentaT').DataTable({
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
                "url": ' ' + base_url + 'Cuenta/getCuentas/2',
                "dataSrc": ''
            },
            "columns": [
                { 'data': 'n' },
                { 'data': 'nombre' },
                { 'data': 'banco' },
                { 'data': 'usuario' },
                { 'data': 'pass' },
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
        if (document.querySelector("#formCuenta")) {
            formCuenta.onsubmit = function(e) {
                e.preventDefault();
                var request = window.XMLHttpRequest ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
                var ajaxUrl = base_url + 'Cuenta/setCuenta';
                //creamos un objeto del formulario con los datos haciendo referencia a formData
                var formData = new FormData(formCuenta);
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
                            formCuenta.reset();
                            $('#modalCuentaP').modal('hide');
                            let tableCuentaP = $('#tableCuentaP').DataTable();
                            //recargamos la tabla 
                            tableCuentaP.ajax.reload(function() {
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
        // agregar cuenta terceros
        if (document.querySelector("#formCuentaT")) {
            formCuentaT.onsubmit = function(e) {
                e.preventDefault();
                var request = window.XMLHttpRequest ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
                var ajaxUrl = base_url + 'Cuenta/setCuenta';
                //creamos un objeto del formulario con los datos haciendo referencia a formData
                var formData = new FormData(formCuentaT);
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
                            formCuentaT.reset();
                            $('#modalCuentaT').modal('hide');
                            let tableCuentaT = $('#tableCuentaT').DataTable();
                            //recargamos la tabla 
                            tableCuentaT.ajax.reload(function() {
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
    // llamar al modal
function openModal(modal) {
    //inicializar el modal que sea nuevo rol
    //document.querySelector('#idRol').value = ''; //limpiar el value del input hiden del modal
    // document.querySelector('#titleModal').innerHTML = 'Nuevo Rol';
    // document.querySelector('.modal-header').classList.replace('headerUpdate', 'headerRegistrer');
    // document.querySelector('#btnActionForm').classList.replace('btn-info', 'btn-primary');
    // document.querySelector('#btnText').innerHTML = 'Guardar';
    // document.querySelector('#formRol').reset();
    $('#' + modal).modal("show");
}