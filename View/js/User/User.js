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
                    body += "<td><a href='./?page=SettingsUserViews&idSgp=" + data.usr_id_sgp + "'>" + data.usr_id_sgp + "</a></td>";
                    body += "<td>" + data.name_complete + "</td>";
                    body += "<td>" + data.usr_nick + "</td>";
                    body += "<td>" + data.prfle_description + "</td>";
                    body += "<td>" + data.trasl_type_descripcion + "</td>";
                    body += "<td>" + data.crs + "</td>";
                    body += "<td>" + data.area_desription + "</td>";
                    body += "<td>" + data.usr_email + "</td>";
                    body += "<td>" + data.usr_state + "</td>";

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
                var fomulary = $('#fmrUser')
                fomulary.find("#name_complete").val(result['name_complete']);
                fomulary.find("#txt_profile").val(result['prfle_description']);
                fomulary.find("#crs_name").val(result['crs_name']);
                fomulary.find("#user_nick").val(result['usr_nick']);
            }
        }
        ,
        error: function (jqXHR, exception) {
            alert('Error: ' + jqXHR.responseText + '!!!');
        }
    })

}

const updateProfileByIdUsrSgp = (idUsrSgp) => {
    
        let idProfile = $('#slect-profile').val();
        let data = {
            'User': 'User',
            'idUsrSgp': idUsrSgp,
            'idProfile': idProfile,
            'action': 'updateProfileByidUsrSgp'
        }

        $.ajax({
            data: data,
            url: './Controller/UserController.php',
            type: 'POST',
            dataType: 'JSON',
            BeforeSend: () => {
                $('#respuestaAjax').html('<img id="loader" src="./View/images/giphy.gif"/>');
            },
            success: (result) => {
                if (result['success']) {
                    alert(result['message']);
                } else {
                    alert(result['message']);
                }
            },
            error: (jqXHR, exception) => {
                alert('Error: ' + jqXHR.responseText + '!!!');
            }

        })
    
 

}