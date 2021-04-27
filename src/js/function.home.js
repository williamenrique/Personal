document.addEventListener('DOMContentLoaded', function() {
    let calendario = document.querySelector('#calendario');
    let calendar = new FullCalendar.Calendar(calendario, {
        locale: 'es',
        businessHours: true,
        editable: true,
        selectable: true,
        headerToolbar: {
            left: 'prev,next today',
            center: 'title',
            right: 'dayGridMonth,timeGridWeek,timeGridDay,listMonth'
        },
        events: base_url + 'Home/getCalendar',
        eventClick: function(info) {
            // document.querySelector('#descrip').innerHTML = info.event.extendedProps.description;
            // document.querySelector('#end').innerHTML = info.event.startStr;
            let fechaI = info.event.startStr.split("T");
            let fechaE = info.event.endStr.split("T");
            document.querySelector('#txtStart').value = fechaI[0];
            document.querySelector('#txtEnd').value = fechaE[0];
            openModal('modalCalendar');
        },
        dateClick: function(info) {
            // notifiCalendar('Date: ' + info.dateStr, 'info');
            // openModal('modalCalendar');
            // document.querySelector('#start').innerHTML = info.event.end;
            // document.querySelector('#descrip').val(fecha[0]);
            // document.querySelector('#titleModal').innerHTML = "Ingrese los datos para el vevento o recordatorio";
            // openModal('modalCalendar');

        }

    });
    calendar.render();

    if (document.querySelector("#formCalendar")) {
        formCalendar.onsubmit = function(e) {
            e.preventDefault();
            var request = window.XMLHttpRequest ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
            var ajaxUrl = base_url + 'Home/setCalendar';
            //creamos un objeto del formulario con los datos haciendo referencia a formData
            var formData = new FormData(formCalendar);
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
                        formCalendar.reset();
                        calendar.refetchEvents();
                        $('#modalCalendar').modal("toggle");
                    } else {
                        notifi(objData.msg, "error");
                    }
                }
            }
        }
    }
}, false)