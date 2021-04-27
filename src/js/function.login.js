// cargamos el dom para previos eventos
document.addEventListener('DOMContentLoaded', function() {
    //validamos si existe el formulario
    if (document.querySelector('#formLogin')) {
        let = formlogin = document.querySelector('#formLogin');
        //le agregamos el evento submit
        formlogin.onsubmit = function(e) {
            e.preventDefault();
            let strTxtUser = document.querySelector('#textUser').value;
            let strTxtPass = document.querySelector('#textPass').value;
            if (strTxtUser == '' || strTxtPass == '') {
                Swal.fire('Por favor', 'Escriba su usuario y password', 'error', );
                return false;
            } else {
                //enviar datos al controlador
                var request = window.XMLHttpRequest ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
                var ajaxUrl = base_url + 'Acceso/loginUser';
                //creamos un objeto del formulario con los datos haciendo referencia a formData
                var formData = new FormData(formlogin);
                //prepara los datos por ajax preparando el dom
                request.open('POST', ajaxUrl, true);
                //envio de datos del formulario que se almacena enla variable
                request.send(formData);
                let button = document.querySelector('.box-button');
                button.innerHTML = '';
                button.innerHTML = '<button type="submit" class="btn btn-primary btn-block shadow-lg" disabled><span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span></button>';
                request.onreadystatechange = function() {
                    //validamos la respuesta del DOM
                    if (request.readyState != 4) return; //no hacemos nada
                    if (request.status == 200) {
                        //convertir en json lo obtenido
                        var objData = JSON.parse(request.responseText);
                        //verfificamos si es verdadero la respuesta en json del controlador
                        if (objData.status) {
                            window.location = base_url + 'home';
                        } else {
                            notifi(objData.msg, 'error');
                            document.querySelector('#textPass').value = "";
                            button.innerHTML = '';
                            button.innerHTML = '<button type="submit" class="btn btn-primary btn-block shadow-lg">Login</button>';
                        }
                    } else {
                        notifi('error, en el proceso', 'error');
												button.innerHTML = '';
                        button.innerHTML = '<button type="submit" class="btn btn-primary btn-block shadow-lg">Login</button>';
                    }
                    return false;
                }
            }
        }
    }
    // registrar usuario
    if (document.querySelector('#formRegistre')) {
        var formRegistre = document.querySelector('#formRegistre');
        //agregar el evento al boton del formulario
        formRegistre.onsubmit = function(e) {
            e.preventDefault();
            //obenemos todos los valores del formulario  txtIdentificacion
            var strTxtRegisterName = document.querySelector('#registerName').value;
            var strIdentificacion = document.querySelector('#registerCi').value;
            var strTxtRegisterEmail = document.querySelector('#registerEmail').value;
            var strTxtRegisterEmail = document.querySelector('#registerEmail').value;

            var strTxtPassRegist = document.querySelector('#registerPassword').value;
            var strTxtPassRepet = document.querySelector('#repetPass').value;
            //validamos campos no vacios
            if (strIdentificacion == '' || strTxtRegisterName == '' || strTxtRegisterEmail == '' | strTxtPassRegist == '' | strTxtPassRepet == '') {
                Swal.fire('Todos los campos deben ser llenados!', 'Oops...', 'error');
                return false;
            }

            if (strTxtPassRegist != '' || strTxtPassRepet != '') {
                if (strTxtPassRegist.length < 1) {
                    notifi("Password debe contener minimo 5 caracteres", "info");
                    return false;
                }
            }
            let request = window.XMLHttpRequest ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
            let ajaxUrl = base_url + 'Acceso/createUser';
            //creamos un objeto del formulario con los datos haciendo referencia a formData
            let formData = new FormData(formRegistre);
            //prepara los datos por ajax preparando el dom
            request.open('POST', ajaxUrl, true);
            //envio de datos del formulario que se almacena enla variable
            request.send(formData);
            let button = document.querySelector('.box-button');
            button.innerHTML = '';
            button.innerHTML = '<button type="submit" class="btn btn-primary btn-block shadow-lg" disabled><span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span></button>';
            //obtenemos los resultados
            request.onreadystatechange = function() {
                if (request.readyState == 4 && request.status == 200) {
                    //obtenemos los datos y convertimos en JSON
                    let objData = JSON.parse(request.responseText);
                    if (objData.status) {
                        notifi(objData.msg, "info");
                        formRegistre.reset();
                        window.location = base_url + 'acceso/login';
                    } else {
                        notifi(objData.msg, "error");
                        button.innerHTML = '';
                        button.innerHTML = '<button type="submit" class="btn btn-primary btn-block shadow-lg">Registrarse</button>';
                    }
                }
            }
        }
    }
    // desbloquear cuenta
    if (document.querySelector("#formDisblock")) {
        let formDisblock = document.querySelector("#formDisblock");
        formDisblock.onsubmit = function(e) {
            e.preventDefault();
            let request = window.XMLHttpRequest ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
            let ajaxUrl = base_url + 'Acceso/disblock';
            //creamos un objeto del formulario con los datos haciendo referencia a formData
            let formData = new FormData(formDisblock);
            //prepara los datos por ajax preparando el dom
            request.open('POST', ajaxUrl, true);
            //envio de datos del formulario que se almacena enla variable
            request.send(formData);
            let button = document.querySelector('.box-button');
            button.innerHTML = '';
            button.innerHTML = '<button type="submit" class="btn btn-primary btn-block btn-lg shadow-lg" disabled><span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span></button>';
            //obtenemos los resultados
            request.onreadystatechange = function() {
                if (request.readyState == 4 && request.status == 200) {
                    //obtenemos los datos y convertimos en JSON
                    let objData = JSON.parse(request.responseText);
                    if (objData.status) {
                        notifi(objData.msg, "info");
                        formDisblock.reset();
                        button.innerHTML = '';
                        button.innerHTML = '<button type="submit" class="btn btn-primary btn-block btn-lg shadow-lg ">Desbloquear</button>';
                    } else {
                        notifi(objData.msg, "error");
                        button.innerHTML = '';
                        button.innerHTML = '<button type="submit" class="btn btn-primary btn-block btn-lg shadow-lg ">Desbloquear</button>';
                    }
                }
            }
        }
    }
    // enviar email para resetear clave si la olvido
    if (document.querySelector("#formReset")) {
        let formReset = document.querySelector("#formReset");
        formReset.onsubmit = function(e) {
            e.preventDefault();
            let request = window.XMLHttpRequest ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
            let ajaxUrl = base_url + 'Acceso/resetPass';
            //creamos un objeto del formulario con los datos haciendo referencia a formData
            let formData = new FormData(formReset);
            //prepara los datos por ajax preparando el dom
            request.open('POST', ajaxUrl, true);
            //envio de datos del formulario que se almacena enla variable
            request.send(formData);
            let button = document.querySelector('.box-button');
            button.innerHTML = '';
            button.innerHTML = '<button type="submit" class="btn btn-primary btn-block btn-lg shadow-lg" disabled><span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span></button>';
            //obtenemos los resultados
            request.onreadystatechange = function() {
                if (request.readyState == 4 && request.status == 200) {
                    //obtenemos los datos y convertimos en JSON
                    let objData = JSON.parse(request.responseText);
                    if (objData.status) {
                        notifi(objData.msg, "info");
                        formReset.reset();
                        button.innerHTML = '';
                        button.innerHTML = '<button type="submit" class="btn btn-primary btn-block btn-lg shadow-lg">Enviar</button>';
                    } else {
                        notifi(objData.msg, "error");
                        button.innerHTML = '';
                        button.innerHTML = '<button type="submit" class="btn btn-primary btn-block btn-lg shadow-lg">Enviar</button>';
                    }
                }
            }
        }
    }
    // enviar la nueva clave para reseteo
    if (document.querySelector("#formChangePass")) {
        let formChangePass = document.querySelector("#formChangePass");
        formChangePass.onsubmit = function(e) {
            e.preventDefault();
            let request = window.XMLHttpRequest ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
            let ajaxUrl = base_url + 'Acceso/changePass';
            //creamos un objeto del formulario con los datos haciendo referencia a formData
            let formData = new FormData(formChangePass);
            //prepara los datos por ajax preparando el dom
            request.open('POST', ajaxUrl, true);
            //envio de datos del formulario que se almacena enla variable
            request.send(formData);
            let button = document.querySelector('.box-button');
            button.innerHTML = '';
            button.innerHTML = '<button type="submit" class="btn btn-primary btn-block btn-lg shadow-lg" disabled><span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span></button>';
            //obtenemos los resultados
            request.onreadystatechange = function() {
                if (request.readyState == 4 && request.status == 200) {
                    //obtenemos los datos y convertimos en JSON
                    let objData = JSON.parse(request.responseText);
                    if (objData.status) {
                        notifi(objData.msg, "info");
                        formChangePass.reset();
                        button.innerHTML = '';
                        button.innerHTML = '<button type="submit" class="btn btn-primary btn-block btn-lg shadow-lg" >Reestablecer</button>';
                    } else {
                        notifi(objData.msg, "error");
                        button.innerHTML = '';
                        button.innerHTML = '<button type="submit" class="btn btn-primary btn-block btn-lg shadow-lg" >Reestablecer</button>';
                    }
                }
            }
        }
    }
}, false)