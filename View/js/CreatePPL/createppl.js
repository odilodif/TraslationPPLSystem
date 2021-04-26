function validFielsEmpty() {
    if ($('#doc_type_id').val() != 0 && $('#txtIdentification').val() != '' && $('#txtName').val() != '' && $('#txtLastname').val() != '') {
        var selected = $('#doc_type_id').val();
        var identification = $('#txtIdentification').val();
        var name = $('#txtName').val();
        var lastname = $('#txtLastname').val();
        switch (selected) {
            case '1':
                validIdentification(identification, name, lastname);
                console.log('cedula');
                break;
            case '2':
                console.log('pasaporte');
                break;
            case '3':
                console.log('otro');
                break;

            default:
                console.log('default' + selected + '.');
        }
    }
    else
    {
        alert('Asegúrese que todos los campos estń llenos');
    }
}

function validIdentification(identification, name, lastname) {
    var cad = identification;

    var total = 0;
    var longitud = cad.length;
    var longcheck = longitud - 1;

    if (longitud === 10) {

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
            // document.getElementById("salida").innerHTML = ("Cedula Válida");
            // alert('Cedula válida');
            createPPL(identification, name, lastname);
        } else {
            //document.getElementById("salida").innerHTML = ("Cedula Inválida");
            alert('Cedula Inválida');
        }
    }
    else {
        alert('No tiene la longuitud de cédula');
    }
}

function createPPL(ced, name, lastname) {

    var datos = {
        "PrisionPerson": 'savePPL',
        "ced": ced,
        "name": name,
        "lastname": lastname

    };
    $.ajax({
        data: datos,
        url: "./Controller/PrisonPersonController.php",
        type: "POST",
        dataType: 'json',
        beforeSend: function () {

        },
        success: function (result) {

            if (result['success']) {
                alert(result['message']);
                location.reload();

            } else {

                alert(result['message']);

            }
        },
        error: function (result) {
            alert('Error al Conectarse a la base de Datos');
        }
    });
}