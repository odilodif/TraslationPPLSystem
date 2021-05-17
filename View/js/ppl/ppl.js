function listPPL() {
    // alert('listadoDetCliente');
    var crs_id = $('#crs_id').val()
    var datos = {
        'PrisionPerson': 'listPPL',
        'crs_id': crs_id
    };
    $.ajax({
        data: datos,
        url: './Controller/PrisonPersonController.php',
        type: 'POST',
        dataType: 'JSON',
        beforeSend: function () {
            $('#tblPPLList tbody').empty();
            $("#tblHistoryMove tbody").empty();
            $('#waiting').modal('show');
        }
        ,
        success: function (data) {
            $('#waiting').modal('hide');
            if (data[0]['success']) {
                $('#tblPPLList tbody').empty();
                $.each(data, function (i, data) {
                    var body = "<tr>";
                    body += "<td><input type=\"checkbox\"></td>";
                    body += "<td>" + data.prontuario + "</td>";
                    body += "<td>" + data.prison_per_identification + "</td>";
                    body += "<td>" + data.prison_per_name + "</td>";
                    body += "<td>" + data.prison_per_lastname + "</td>";
                    body += "<td>" + data.state + "</td>";
                    body += "<td>" + data.crs_name + "</td>";
                    body += "<td>" + data.sex + "</td>";
                    body += "</tr>";
                    $("#tblPPLList tbody").append(body);
                })

                $('#tblPPLList').DataTable({
                    dom: 'Bfrtip',
                    buttons: [
                        'copy', 'csv', 'excel', 'pdf', 'print'
                    ],
                    "bDestroy": true
                });
            } else {
                alert('ERROR AL CARGAR LA TABLA');

            }
        }
    });
}

function editPPLForm(ppl_id) {
    var formulario = $('#pplEditModal');
    var dat = {
        "PrisionPerson": 'editLoadForm',
        'ppl_id': ppl_id
    };
    $.ajax({
        data: dat,
        url: './Controller/PrisonPersonController.php',
        type: 'POST',
        dataType: 'JSON',
        beforeSend: function () {
            //alert('before');
        }
        ,
        success: function (result) {

            if (result['success']) {
                formulario.find("#idPPLEdit").val(result['prison_per_id']);
                formulario.find("#txt_name").val(result['prison_per_name']);
                formulario.find("#txt_lastname").val(result['prison_per_lastname']);


                $('#pplEditModal').modal('show');

            } else {
                alert(result['message']);
            }
        },
        error: function (result) {
            alert('ERROR AL CONECTAR LA BASE DE DATOS"');
        }

    });





}



function savePPLEdit(ppl_id, name, lastname) {
    var dat = {
        'PrisionPerson': 'editPPL',
        'ppl_id': ppl_id,
        'name': name,
        'lastname': lastname
    };

    $.ajax({
        data: dat,
        url: './Controller/PrisonPersonController.php',
        type: 'POST',
        dataType: 'JSON',
        beforeSend: function () {
            //alert('before');
        }
        ,
        success: function (result) {
            if (result['success']) {
                alert(result['message']);
                location.reload();
            } else
            {
                alert(result['message']);
            }
        },
        error: function (result) {
            alert('Error al Conectarse a la base de Datos');
        }

    });

}

function deletePPL(id_ppl, name, lastname)
{
    var r = confirm("Está Seguro que desea eliminar  a  " + name + ' ' + lastname);
    if (r == true) {
        deletePrisonPerson(id_ppl);

    }
}

function deletePrisonPerson(id_ppl) {
    var dat = {
        "PrisionPerson": 'deletePrinsonPerson',
        "id_ppl": id_ppl
    };

    $.ajax({
        data: dat,
        url: './Controller/PrisonPersonController.php',
        type: 'POST',
        dataType: 'JSON',
        beforeSend: function () {
            //  alert('before');
        }
        ,
        success: function (result) {
            if (result['success']) {
                alert(result['message']);
                location.reload();
            } else
            {
                alert(result['message']);
            }
        }
        ,
        error: function () {

        }
    })
}