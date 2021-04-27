window.addEventListener('load', function() {
    fntEstado();

}, false)

function fntEstado() {
    if (document.querySelector('#selectState')) {
        let ajaxUrl = base_url + "User/getSelectState";
        //creamos el objeto para os navegadores
        var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
        //abrimos la conexion y enviamos los parametros para la peticion
        request.open("GET", ajaxUrl, true);
        request.send();
        request.onreadystatechange = function() {
            if (request.readyState == 4 && request.status == 200) {
                //option obtenidos del controlador
                document.querySelector('#selectState').innerHTML = request.responseText;
                //seleccionando el primer option
                document.querySelector('#selectState').value = 1;
                // $("#selectState").selectpicker('render');
            }
        }
    }
}
// optener el valor del estado y cargar las ciudades
if (document.querySelector('#selectState')) {

    let select = document.querySelector('#selectState');
    select.addEventListener('change', function() {
        let selectedOption = this.options[select.selectedIndex];
        let ajaxUrl = base_url + "User/getSelectCiudades/" + selectedOption.value;
        //creamos el objeto para os navegadores
        var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
        //abrimos la conexion y enviamos los parametros para la peticion
        request.open("GET", ajaxUrl, true);
        request.send();
        request.onreadystatechange = function() {
            if (request.readyState == 4 && request.status == 200) {
                //option obtenidos del controlador
                document.querySelector('#selectCiudad').innerHTML = request.responseText;
            }
        }
    });
}
// optener el valor de la ciudad y cargar los municipios
// let ciudad = document.querySelector('#selectCiudad');
// ciudad.addEventListener('change', function() {
//     let selectedOption = this.options[ciudad.selectedIndex];
//     let ajaxUrl = base_url + "User/getSelectMunicipio/" + selectedOption.value;
//     //creamos el objeto para os navegadores
//     var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
//     //abrimos la conexion y enviamos los parametros para la peticion
//     request.open("GET", ajaxUrl, true);
//     request.send();
//     request.onreadystatechange = function() {
//         if (request.readyState == 4 && request.status == 200) {
//             //option obtenidos del controlador
//             document.querySelector('#selectMunic').innerHTML = request.responseText;
//         }
//     }
// });

document.addEventListener('DOMContentLoaded', function() {
    // cambiar clave
    if (document.querySelector("#formClave")) {
        formClave.onsubmit = function(e) {
            e.preventDefault();
            var request = window.XMLHttpRequest ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
            var ajaxUrl = base_url + 'User/changePass';
            //creamos un objeto del formulario con los datos haciendo referencia a formData
            var formData = new FormData(formClave);
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
                        formClave.reset();
                        // location.reload();
                    } else {
                        notifi(objData.msg, "error");
                    }
                }
            }
        }
    }
    // crear nick
    if (document.querySelector("#formNick")) {
        let = formNick = document.querySelector('#formNick');
        formNick.onsubmit = function(e) {
            e.preventDefault();
            let nick = document.querySelector('#txt_nick').value;
            var request = window.XMLHttpRequest ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
            var ajaxUrl = base_url + 'User/createNick';
            //creamos un objeto del formulario con los datos haciendo referencia a formData
            var formData = new FormData(formNick);
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
                        formNick.reset();
                        location.reload();
                    } else {
                        notifi(objData.msg, "error");
                    }
                }
            }
        }
    }
    // actualizar datos del perfil
    if (document.querySelector('#formProfile')) {
        let formProfile = document.querySelector('#formProfile');
        formProfile.onsubmit = function(e) {
            e.preventDefault();
            var request = window.XMLHttpRequest ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
            var ajaxUrl = base_url + 'User/updateProfile';
            //creamos un objeto del formulario con los datos haciendo referencia a formData
            var formData = new FormData(formProfile);
            //prepara los datos por ajax preparando el dom
            request.open('POST', ajaxUrl, true);
            //envio de datos del formulario que se almacena enla variable
            request.send(formData);
            //obtenemos los resultados y evaluamos
            request.onreadystatechange = function() {
                // comprovamos la peticion
                if (request.readyState == 4 && request.status == 200) {
                    //obtenemos los datos y convertimos en JSON
                    let objData = JSON.parse(request.responseText);
                    if (objData.status) {
                        notifi(objData.msg, "info");
                        location.reload();
                    } else {
                        notifi(objData.msg, "error");
                    }
                }
            }
        }
    }
    // imagen avatar
    if (document.querySelector('#imgFile')) {
        let foto = document.querySelector("#imgFile");
        foto.onchange = function(e) {
            let uploadFoto = document.querySelector('#imgFile').value;
            let fileimg = document.querySelector("#imgFile").files;
            let nav = window.URL || window.webkitURL;
            if (uploadFoto != '') {
                let type = fileimg[0].type;
                let name = fileimg[0].name;
                let size = fileimg[0].size;

                if (type != 'image/jpeg' && type != 'image/jpg' && type != 'image/png') {
                    notifi('Formato no soportado', 'error');
                    // if (document.querySelector('#img')) {
                    //     document.querySelector('#img').remove();
                    // }
                    document.querySelector('.delPhoto').classList.add("notBlock");
                    foto.value = "";
                    return false;
                } else if (size < 2000000) {
                    if (document.querySelector('#img')) {
                        document.querySelector('#img').remove();
                    }
                    document.querySelector('.delPhoto').classList.remove("notBlock");
                    let objeto_url = nav.createObjectURL(this.files[0]);
                    document.querySelector('.prevPhoto div').innerHTML = "<img  src=" + objeto_url + " class = 'rounded-circle img-responsive mt-2' id='img'  width = '128' height = '128' / > ";
                } else {
                    notifi('Archivo muy grande', 'error');
                }
            } else {
                notifi("No selecciono foto", 'error');
                // if (document.querySelector('#img')) {
                //     document.querySelector('#img').remove();
                // }
            }
        }
    }
    // borrar foto
    if (document.querySelector(".delPhoto")) {
        let delPhoto = document.querySelector(".delPhoto");
        delPhoto.onclick = function(e) {
            removePhoto();
            document.querySelector('.prevPhoto div').innerHTML = "<img  src=" + avatar + " class = 'rounded-circle img-responsive mt-2' id='img'  width = '128' height = '128' / > ";
        }
    }
    // envio de avatar del usuario
    if (document.querySelector('#formAvatar')) {
        let formAvatar = document.querySelector('#formAvatar');
        formAvatar.onsubmit = function(e) {
            e.preventDefault();
            var request = window.XMLHttpRequest ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
            var ajaxUrl = base_url + 'User/updateAvatar';
            //creamos un objeto del formulario con los datos haciendo referencia a formData
            var formData = new FormData(formAvatar);
            //prepara los datos por ajax preparando el dom
            request.open('POST', ajaxUrl, true);
            //envio de datos del formulario que se almacena enla variable
            request.send(formData);
            //obtenemos los resultados y evaluamos
            request.onreadystatechange = function() {
                // comprovamos la peticion
                if (request.readyState == 4 && request.status == 200) {
                    //obtenemos los datos y convertimos en JSON
                    let objData = JSON.parse(request.responseText);
                    if (objData.status) {
                        notifi(objData.msg, "info");
                        document.querySelector('.delPhoto').classList.add("notBlock");
                        // location.reload();
                    } else {
                        notifi(objData.msg, "error");
                    }
                }
            }
        }
    }
    // envio de respuestas
    if (document.querySelector('#formQuestion')) {
        let formQuestion = document.querySelector('#formQuestion');
        formQuestion.onsubmit = function(e) {
            e.preventDefault();
            let request = window.XMLHttpRequest ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
            // creamos la ruta de envio
            let ajaxUrl = base_url + 'User/setQuestion';
            // alert(ajaxUrl);
            //creamos un objeto del formulario con los datos haciendo referencia a formData
            let formData = new FormData(formQuestion);
            // prepara los datos para ajax enviarlos
            request.open('POST', ajaxUrl, true);
            request.send(formData);
            //obtenemos los resultados y evaluamos
            request.onreadystatechange = function() {
                // comprovamos la peticion
                if (request.readyState == 4 && request.status == 200) {
                    // obtenemos los datos y convertimos en json
                    let objData = JSON.parse(request.responseText);
                    if (objData.status) {
                        notifi(objData.msg, 'info');
                    } else {
                        notifi(objData.msg, 'error');
                    }
                }
            }
        }
    }
}, false)

function removePhoto() {
    document.querySelector('#imgFile').value = "";
    document.querySelector('.delPhoto').classList.add("notBlock");
    document.querySelector('#img').remove();
}

function evalImg() {
    return true;
}