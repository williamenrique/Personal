function notifi(data, icon) {
    $(function() {
        var Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000
        })
        Toast.fire({
            icon: icon,
            title: data
        })
    })
}

function notifiCalendar(data, icon) {
    $(function() {
        var Toast = Swal.mixin({
            toast: true,
            position: 'top-center',
            showConfirmButton: true,
            // timer: 3000,
        })
        Toast.fire({
            icon: icon,
            title: data
        })
    })
}

function openModal(modal) {
    //inicializar el modal que sea nuevo rol
    //document.querySelector('#idRol').value = ''; //limpiar el value del input hiden del modal
    // document.querySelector('#titleModal').innerHTML = 'Nuevo Rol';
    // document.querySelector('.modal-header').classList.replace('headerUpdate', 'headerRegistrer');
    // document.querySelector('#btnActionForm').classList.replace('btn-info', 'btn-primary');
    // document.querySelector('#btnText').innerHTML = 'Guardar';
    // document.querySelector('#formRol').reset();
    // document.querySelector('.btnSet').style.display = 'block';
    // document.querySelector('.btnDelete').style.display = 'none';
    // document.querySelector('.btnUpdate').style.display = 'none';
    $('#' + modal).modal("show");
}
if (document.querySelector('#formEmail')) {
    var formEmail = document.querySelector('#formEmail');
    //agregar el evento al boton del formulario
    formEmail.onsubmit = function(e) {
        e.preventDefault();

        let request = window.XMLHttpRequest ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
        let ajaxUrl = base_url + 'Home/sendEmail';
        //creamos un objeto del formulario con los datos haciendo referencia a formData
        let formData = new FormData(formEmail);
        //prepara los datos por ajax preparando el dom
        request.open('POST', ajaxUrl, true);
        //envio de datos del formulario que se almacena enla variable
        request.send(formData);
        //obtenemos los resultados
        request.onreadystatechange = function() {
            if (request.readyState == 4 && request.status == 200) {
                //obtenemos los datos y convertimos en JSON
                let objData = JSON.parse(request.responseText);
                if (objData.status) {
                    // let mensaje = document.querySelector(".sent-message");
                    // mensaje.style.display = 'block';
                    notifi(objData.msg, 'success');
                    // formEmail.reset();
                    // $(".sent-message").fadeIn(3000).delay(2000).fadeOut(2000);
                } else {
                    notifi(objData.msg, 'error');
                    // formEmail.reset();
                }
            }
        }
    }
}