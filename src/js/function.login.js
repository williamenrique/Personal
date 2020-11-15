document.addEventListener('DOMContentLoaded', function () {
	//validamos si existe el formulario
	if (document.querySelector('#formLogin')) {
		let = formlogin = document.querySelector('#formLogin');
		//le agregamos el evento submit
		formlogin.onsubmit = function (e) {
			e.preventDefault();
			let strTxtUser = document.querySelector('#textUser').value;
			let strTxtPass = document.querySelector('#textPass').value;
			if (strTxtUser == '' || strTxtPass == '') {
				Swal.fire('Por favor', 'Escriba su usuario y password', 'error',);
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
				request.onreadystatechange = function () {
					//validamos la respuesta del DOM
					if (request.readyState != 4) return;//no hacemos nada
					if (request.status == 200) {
						//convertir en json lo obtenido
						var objData = JSON.parse(request.responseText);
						//verfificamos si es verdadero la respuesta en json del controlador
						if (objData.status) {
							window.location = base_url + 'home';
						} else {
							Swal.fire('Atencion', objData.msg, 'error',);
							document.querySelector('#textPass').value = "";
						}
					} else {
						Swal.fire('Atencion', 'Error en el proceso', 'error',);
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
		formRegistre.onsubmit = function (e) {
			e.preventDefault();
			//obenemos todos los valores del formulario  txtIdentificacion
			var strTxtRegisterName= document.querySelector('#registerName').value;
			var strIdentificacion= document.querySelector('#registerCi').value;
			var strTxtRegisterEmail = document.querySelector('#registerEmail').value;
			var strTxtRegisterEmail = document.querySelector('#registerEmail').value;

			var strTxtPassRegist = document.querySelector('#registerPassword').value;
			var strTxtPassRepet = document.querySelector('#repetPass').value;
			//validamos campos no vacios
			if (strIdentificacion == '' || strTxtRegisterName== '' || strTxtRegisterEmail == '') {
				Swal.fire('Todos los campos deben ser llenados!', 'Oops...', 'error');
				return false;
			}

			if (strTxtPassRegist != '' || strTxtPassRepet != '') {
				if (strTxtPassRegist.length < 1) {
					notifi("Password debe contener minimo 5 caracteres","info");
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
			//obtenemos los resultados
			request.onreadystatechange = function () {
				if (request.readyState == 4 && request.status == 200) {
					//obtenemos los datos y convertimos en JSON
					let objData = JSON.parse(request.responseText);
					if (objData.status) {
						notifi( objData.msg,"info");
						formRegistre.reset();
						window.location = base_url + 'acceso/login';
					} else {
						notifi( objData.msg,"error");
					}
				}
			}
		}
	}
}, false);