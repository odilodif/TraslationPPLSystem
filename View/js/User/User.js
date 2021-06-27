/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function listUsers() {
    var dat = {
        "User": 'listUsers'
    };

    $.ajax({
        data: dat,
        url: "./Controller/UserController.php",
        type: 'POST',
        dataType: 'JSON',
        beforeSend: function () {
            $('#respuestaAjax').html('<img id="loader" src="./View/images/giphy.gif"/>');
        }
        ,
        success: function (result) {
            $('#respuestaAjax').html('');

            if (result[0]['success']) {
                $.each(result, function (i, data) {
                    var body = "<tr>";
                    body += "<td><a href='./?page=SettingsUserWiews&idSgp=" + data.usr_id_sgp + "'>" + data.usr_id_sgp + "</a></td>";
                    body += "<td>" + data.name_complete + "</td>";
                    body += "<td>" + data.usr_nick + "</td>";
                    body += "<td>" + data.trasl_type_descripcion + "</td>";
                    body += "<td>" + data.crs + "</td>";
                    body += "<td>" + data.area_desription + "</td>";
                    body += "<td>" + data.usr_email + "</td>";
                    body += "<td>" + data.usr_state + "</td>";
                    body += "<td>" + "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href='javascript:viewTraslationDirectorCrs(" + data.usr_id_sgp + ");' class='fa fa-eye'></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href='javascript:deleteTraslationDialog(" + data.usr_id_sgp + "\");' class = 'glyphicon glyphicon-remove-circle' > </a></td>";
                    body += "</tr>";
                    $("#tblUserList tbody").append(body);
                });

                $(document).ready(function () {
                    $('#tblUserList').DataTable();

                });

            }
        }
        ,
        error: function (jqXHR, exception) {
            alert('Error: ' + jqXHR.responseText + '!!!');
        }
    })

}

function loadUserForm(id_Sgp) {
    var dat = {
        "User": 'loadUserForm',
        "id_Sgp": id_Sgp
    };

    $.ajax({
        data: dat,
        url: "./Controller/UserController.php",
        type: 'POST',
        dataType: 'JSON',
        beforeSend: function () {
            $('#respuestaAjax').html('<img id="loader" src="./View/images/giphy.gif"/>');
        }
        ,
        success: function (result) {
            $('#respuestaAjax').html('');
            if (result['success']) {                
                var fomulary = $('#frmUsuer')
                fomulary.find("#name_complete").val(result['name_complete']);
                fomulary.find("#txt_profile").val(result['prfle_description']);
            }
        }
        ,
        error: function (jqXHR, exception) {
            alert('Error: ' + jqXHR.responseText + '!!!');
        }
    })

}