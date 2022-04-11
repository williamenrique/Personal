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
    //eliminar un sitio

})

function fntDelSitio(inSitio) {
    var request = window.XMLHttpRequest ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    var ajaxUrl = base_url + 'Sitio/delSitio' + '?idSitio=' + inSitio;
    //creamos un objeto del formulario con los datos haciendo referencia a formData
    // var formData = new FormData(formCuenta);
    //prepara los datos por ajax preparando el dom
    request.open('POST', ajaxUrl, true);
    //envio de datos del formulario que se almacena enla variable
    request.send();
    //obtenemos los resultados y evaluamos
    request.onreadystatechange = function() {
        if (request.readyState == 4 && request.status == 200) {
            //obtenemos los datos y convertimos en JSON
            let objData = JSON.parse(request.responseText);
            if (objData.status) {
                notifi(objData.msg, "info");
                // formCuenta.reset();
                // $('#modalCuentaP').modal('hide');
                // let tableCuentaP = $('#tableCuentaP').DataTable();
                //recargamos la tabla 
                // tableCuentaP.ajax.reload(function() {
                //     //cada vez que se haga una accion se recarga la tabla y los botones
                //     // fntEditRol();
                //     // fntDelRol();
                // });
            } else {
                notifi(objData.msg, "error");
            }
        }
    }
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