$(document).ready(function(e) {
    $("#form").on('submit', (function(e) {
        e.preventDefault();
        $.ajax({
            url: "./dominio/CategoryController2.php",
            type: "POST",
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            beforeSend: function()
            {


            },
            success: function(resul)
            {
                var obj = JSON.parse(resul);
                //alert(obj.exito);
                if (obj.exito)
                {

                    $('#imgCategory').attr("src", "." + obj.path);

                    // view uploaded file.
                    $("#preview").html(obj.message).fadeIn();
                    $("#form")[0].reset();
                    $('#LBL_SMS_exito').text('CATEGORIA CREADA EXITOSAMENTE');
                    setTimeout(function() {
                        $("#LBL_SMS_exito").fadeIn(10).fadeOut(20000);
                    }, 10);
                } else
                {
                    //alert('ERROR AL GUARDAR CATEGORIA');
                    $('#LBL_SMS_error').html('ERROR AL GUARDAR CATEGORIA');
                    setTimeout(function() {
                        $("#LBL_SMS_error").fadeIn(10).fadeOut(20000);
                    }, 10);


                    $("#err").html("Error al Guardar Categoría !").fadeIn();
                }
            },
            error: function(e)
            {
                //alert('ERROR AL GUARDAR CATEGORIA');
                $('#LBL_SMS_error').html('ERROR AL SOLICITAR INGRESO DE DATOS');
                setTimeout(function() {
                    $("#LBL_SMS_error").fadeIn(10).fadeOut(20000);
                }, 10);
            }
        });
    }));
});


function listPrisonPerson() {
    //alert('listadoDetCliente');
    var datos = {
        'PrisonPerson': 'listPrisonPerson'
    };
    $.ajax({
        data: datos,
        url: './Controller/PrisonPersonController.php',
        type: 'POST',
        dataType: 'JSON',
        beforeSend: function() {
            //alert('before');
        }
        ,
        success: function(data) {
            //alert();
            if (data[0]['success']) {

                $.each(data, function(i, data) {
                    var body = "<tr>";
                    body += "<td>" + data.prison_person_id + "</td>";
                    body += "<td>" + data.prison_person_identicator + "</td>";
                    body += "<td>" + data.prison_person_name + "</td>";
                    body += "<td>" + data.prison_person_lastname + "</td>";
                    body += "<td>" + "<a href='javascript:editCategories(" + data.prison_person_id + ");' class='glyphicon glyphicon-edit'></a>" + "</td>";
                    body += "<td>" + "<a href='javascript:deleteCategoryDialog(" + data.prison_person_id + ", \"" + data.prison_person_name + "\" );' class = 'glyphicon glyphicon-remove-circle' > </a>" + "</td>";
                    body += "</tr>";
                    $("#tblListPrisonPerson tbody").append(body);
                });


            } else {
                alert('ERROR AL CARGAR LA TABLA');
                $('#LBL_SMS_error').html('ERROR AL ELIMINAR EL PRODUTO');
                setTimeout(function() {
                    $('#LBL_SMS_error').fadeIn().fadeOut(2000);
                }, 10);
            }
        }
    });
}
