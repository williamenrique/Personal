document.addEventListener('DOMContentLoaded', function() {

    $('.6h').click(function() {
        var page = $(this).attr('data');
        console.log(page);
    })


    getEventos = () => {
        let request = window.XMLHttpRequest ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
        let ajaxUrl = base_url + 'Home/getCalendar';
        //prepara los datos por ajax preparando el dom
        request.open('POST', ajaxUrl, true);
        //hacemos el envio al servidor
        request.send();
        //obtenemos los resultados y evaluamos
        request.onreadystatechange = () => {
            if (request.readyState == 4 && request.status == 200) {
                let objData = JSON.parse(request.responseText);
                // var jsonResp = JSON.decode(request.responseText);
                //document.querySelector('.cantEvent').innerHTML = objData.length;

            }
        }
    }
    getEventos();
})