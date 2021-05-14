function dateSystem() {
    var today = new Date();
    //var day=(parseInt(today.getDate()) < 10) ? '0'+parseInt(today.getDate() : parseInt(today.getDate();
    var day = (parseInt(today.getDate()) < 10) ? ('0' + today.getDate()) : today.getDate();
    var month = (parseInt(today.getMonth() + 1) < 10) ? '0' + (today.getMonth() + 1) : (today.getMonth() + 1);
    var year = today.getFullYear();
    var trasl_date_request = year + '-' + month + '-' + day;
    return trasl_date_request;
}



function statusBar(result) {
    $('#bar-status li').each(function (i) {
        var index = $(this).index();
        var text = $(this).text();
        var value = $(this).attr("value");

        $(this).css("border", "#3c8dbc");
        $(this).css("background-color", "#3c8dbc");
        $(this).css("border-radius", "7px");
        if (text == result[0]['trasl_state_process']) {
            $(this).css("border", "#00a65a");
            $(this).css("background-color", "#00a65a");
            $(this).css("border-radius", "7px");// border-radius:7px;
        }
        // alert('Index is: ' + index + ' and text is ' + text + ' and Value ' + value);
    });
}

function validSettingsProfilUser() {


}


function validateID() {
    var cad = document.getElementsByClassName('description').value.trim();
    var total = 0;
    var longitud = cad.length;
    var longcheck = longitud - 1;

    if (cad !== "" && longitud === 10) {
        for (i = 0; i < longcheck; i++) {
            if (i % 2 === 0) {
                var aux = cad.charAt(i) * 2;
                if (aux > 9)
                    aux -= 9;
                total += aux;
            } else {
                total += parseInt(cad.charAt(i)); // parseInt o concatenará en lugar de sumar
            }
        }

        total = total % 10 ? 10 - total % 10 : 0;

        if (cad.charAt(longitud - 1) == total) {
            document.getElementById("resultID").innerHTML = ("Cedula Válida");
        } else {
            document.getElementById("resultID").innerHTML = ("Cedula Inválida");
        }
    }
}