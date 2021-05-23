let calendario = document.querySelector('#calendario');
let btnSet = document.querySelector('.btnSet');
let btnDelete = document.querySelector('.btnDelete');
let btnUpdate = document.querySelector('.btnUpdate');
let NuevoEvento;
document.addEventListener('DOMContentLoaded', function() {
    let calendar = new FullCalendar.Calendar(calendario, {
        // timeZone: 'UTC',
        locale: 'es',
        height: 'auto',
        // businessHours: true,
        editable: true,
        selectable: true,
        headerToolbar: {
            left: 'prev,next today',
            center: 'title',
            right: 'dayGridMonth,timeGridWeek,timeGridDay,listMonth'
        },
        events: base_url + 'Home/getCalendar',
        eventClick: function(info) {
            document.querySelector('#titleModal').innerHTML = info.event.title;
            document.querySelector('#txtTitulo').value = info.event.title;
            let fechaI = info.event.startStr.split("T");
            let fechaE = info.event.endStr.split("T");
            document.querySelector('#txtStart').value = fechaI[0];
            document.querySelector('#txtStartTime').value = fechaE[1];
            document.querySelector('#txtEnd').value = fechaE[0];
            document.querySelector('#txtEndTime').value = fechaE[1];
            document.querySelector('#txtDescripcion').value = info.event.extendedProps.description;
            document.querySelector('#txtId').value = info.event.id;
            document.querySelector('#txtOpcion').value = 2;
            openModal('modalCalendar');
            document.querySelector('.btnSet').style.display = 'none';
            document.querySelector('.btnDelete').style.display = 'block';
            document.querySelector('.btnUpdate').style.display = 'block';
        },
        dateClick: function(info) {
            document.querySelector('#titleModal').innerHTML = "Cree un nuevo recordatorio en este dia";
            document.querySelector('#txtStart').value = info.dateStr;
            console.log(info.dateStr);
            openModal('modalCalendar');
        },
        eventDrop: function(info) {
            document.querySelector('#titleModal').innerHTML = info.event.title;
            document.querySelector('#txtTitulo').value = info.event.title;
            let fechaI = info.event.startStr.split("T");
            let fechaE = info.event.endStr.split("T");
            document.querySelector('#txtStart').value = fechaI[0];
            document.querySelector('#txtStartTime').value = fechaE[1];
            document.querySelector('#txtEnd').value = fechaE[0];
            document.querySelector('#txtEndTime').value = fechaE[1];
            document.querySelector('#txtDescripcion').value = info.event.extendedProps.description;
            document.querySelector('#txtId').value = info.event.id;
            document.querySelector('#txtOpcion').value = 'update';
            enviarInfo();
        }
    });

    enviarInfo = () => {
        var request = window.XMLHttpRequest ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
        var ajaxUrl = base_url + 'Home/setCalendar';
        //creamos un objeto del formulario con los datos haciendo referencia a formData
        var formData = new FormData(formCalendar);
        //prepara los datos por ajax preparando el dom
        request.open('POST', ajaxUrl, true);
        //envio de datos del formulario que se almacena enla variable
        request.send(formData);
        //obtenemos los resultados y evaluamos
        request.onreadystatechange = () => {
            if (request.readyState == 4 && request.status == 200) {
                //obtenemos los datos y convertimos en JSON
                let objData = JSON.parse(request.responseText);
                if (objData.status) {
                    notifi(objData.msg, "info");
                    formCalendar.reset();
                    calendar.refetchEvents();
                    getEvents();
					getEventos();
                    $('#modalCalendar').modal("hide");
                } else {
                    notifi(objData.msg, "error");
                }
            }
        }
    }
    btnAccion = (opcion) => {
        document.querySelector('#txtOpcion').value = opcion;
        enviarInfo(opcion, NuevoEvento);
        getEventos();
    }
    btnUpdate = (id) => {
        let request = window.XMLHttpRequest ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
        let ajaxUrl = base_url + 'Home/getEvent/' + id;
        //prepara los datos por ajax preparando el dom
        request.open('POST', ajaxUrl, true);
        request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        //hacemos el envio al servidor
        request.send();
        //obtenemos los resultados y evaluamos
        request.onreadystatechange = () => {
            if (request.readyState == 4 && request.status == 200) {
                let objData = JSON.parse(request.responseText);
                if (objData.status) {
                    //asignamos los valores obtenidos del controlador  al modal
                    document.querySelector('#titleModal').value = objData.data.title;
                    document.querySelector('#txtDescripcion').value = objData.data.description;
                    document.querySelector('#txtTitulo').value = objData.data.title;
                    let fechaI = objData.data.start.split(" ");
                    let fechaE = objData.data.end.split(" ");
                    document.querySelector('#txtStart').value = fechaI[0];
                    document.querySelector('#txtStartTime').value = fechaE[1];
                    document.querySelector('#txtEnd').value = fechaE[0];
                    document.querySelector('#txtEndTime').value = fechaE[1];
                    document.querySelector('#txtId').value = objData.data.id;
                    document.querySelector('#txtOpcion').value = 'update';
                    openModal('modalCalendar');
                    document.querySelector('.btnSet').style.display = 'none';
                    document.querySelector('.btnDelete').style.display = 'block';
                    document.querySelector('.btnUpdate').style.display = 'block';
                } else {
                    notifi(objData.msg, 'error');
                }
            }
        }
    }
    getEvents = () => {
        let request = window.XMLHttpRequest ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
        let ajaxUrl = base_url + 'Home/getEvents';
        //prepara los datos por ajax preparando el dom
        request.open('GET', ajaxUrl, true);
        //hacemos el envio al servidor
        request.send();
        //obtenemos los resultados y evaluamos
        request.onreadystatechange = () => {
            if (request.readyState == 4 && request.status == 200) {
                document.querySelector('.listEvent').innerHTML = request.responseText;
            }
        }
    }
    getEvents();
    calendar.render();
	var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
	var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
		return new bootstrap.Tooltip(tooltipTriggerEl);
	});
})

$('.pagination li a').on('click', function() {
    var page = $(this).attr('data');
    document.querySelector('.listEvent').innerHTML = "";
    // var dataString = 'page=' + page;
    // console.log(dataString);
    let request = window.XMLHttpRequest ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    let ajaxUrl = base_url + 'Home/getEventsPage/' + page;
    //prepara los datos por ajax preparando el dom
    request.open('POST', ajaxUrl, true);
    request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    //hacemos el envio al servidor
    request.send();
    //obtenemos los resultados y evaluamos
    request.onreadystatechange = () => {
        if (request.readyState == 4 && request.status == 200) {
            // $('.listEvent').fadeIn(6000);
            document.querySelector('.listEvent').innerHTML = request.responseText;
            $('.pagination li').removeClass('active');
            $('.pagination li a[data="' + page + '"]').parent().addClass('active');
        }
    }
    return false;
});
