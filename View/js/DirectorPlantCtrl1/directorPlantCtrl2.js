/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


function loadDirection(usr_id) {

    var dat = {
        "DirectionArea": 'loadDirection',
        "usr_id": usr_id
    };
    $.ajax({
        data: dat,
        url: './Controller/DirectionAreaController.php',
        type: "POST",
        dataType: 'JSON',
        beforeSend: function () {
            $('#respuestaAjax').html('<img id="loader" src="./View/images/giphy.gif"/>');
        },
        success: function (result) {
            $('#respuestaAjax').html('');
            if (result['success']) {
                jQuery('#id_DirectionParent').text(result['area_parent']);
                jQuery('#directionParentDesc').text(result['area_desription']);
                listToAuthorize(result['area_parent'], usr_id);

            } else {
                alert('No hay Dirección Padre');
            }
        },
        error: function (result) {
            alert('ERROR AL CONECTAR LA BASE DE DATOS"');
        }

    });
}

function listToAuthorize(direction, usr_id) {
    var dat = {
        "Traslation": 'TraslationListByApprobe',
        "list_tral_approbed_aut": 'to_authorize',
        "direction": direction,
        "usr_id": usr_id
    };

    $.ajax({
        data: dat,
        url: './Controller/TraslationController.php',
        type: 'POST',
        dataType: 'JSON',
        beforeSend: function () {

            $('#respuestaAjax').html('<img id="loader" src="./View/images/giphy.gif"/>');

        }
        ,
        success: function (result) {
            $('#respuestaAjax').html('');

            if (result[0]['success']) {

                //$("#tblAprobed").empty();;
                $.each(result, function (i, data) {
                    //alert(data.trasl_id+ data.names_dircrs );
                    var body = "<tr>";
                    body += "<td><input type=\"checkbox\"></td>";
                    body += "<td>" + data.trasl_id + "</td>";
                    body += "<td>" + data.trasl_date_request + "</td>";
                    body += "<td>" + data.names_dircrs + "</td>";
                    body += "<td>" + data.crs_source + "</td>";
                    body += "<td>" + data.crs_destination + "</td>";
                    body += "<td>" + data.trasl_type_descripcion + "</td>";
                    body += "<td>" + data.tras_date_analyst_send + "</td>";
                    body += "<td>" + data.names_analyst + "</td>";
                    body += "<td>" + data.status_proces + "</td>";
                    body += "<td>" + "<button type='button' class='btn btn-info btn-xs'  onclick='javascript:reviewTraslation(" + data.trasl_id + "   );'> Revisión </button></td>";

                    body += "</tr>";

                    $("#tbl_to_authorize tbody").append(body);
                });

                $(document).ready(function () {
                    $('.mailbox-messages input[type="checkbox"]').iCheck({
                        checkboxClass: 'icheckbox_flat-blue',
                        radioClass: 'iradio_flat-blue'
                    });
                    $('#tbl_to_authorize').DataTable();
                });
            }
            
        }
        ,
        error: function () {
            $('#respuestaAjax').html('');
        }
    })

}
function btnAhtorize() {
    var jsonObj = [];
    $("#tbl_to_authorize tbody tr").each(function () {
        var textval0 = $(this).find('td:eq(0) input');
        var textval1 = $(this).find('td:eq(1)').text();
        /*
         *  var col1 = $(this).find('td:eq(1)').text();
         var col2 = $(this).find('td:eq(2) input').val();
         * 
         * 
         * 
         **/
        var usr_id_authorized = $('#txtIdUser').val();

        if (textval0.is(':checked')) {
            //alert(textval1);
            jsonObj.push({"trasl_id": textval1, "usr_id_authorized": usr_id_authorized});

        }

    });
    traslationSaveAuthorized(jsonObj);
    //alert('Datos  actualizados');

}
function traslationSaveAuthorized(listAuthorized) {

    var dat = {
        "Traslation": 'saveTraslationAuthorized',
        "listAuthorized": listAuthorized

    };
    $.ajax({
        data: dat,
        url: './Controller/TraslationController.php',
        type: "POST",
        dataType: 'JSON',
        beforeSend: function () {

        },
        success: function (result) {

            
                alert(result['nro'] + '  ' + result['message']);
                
                location.reload();

            
        },
        error: function (result) {
            alert('ERROR AL CONECTAR LA BASE DE DATOS"');
        }

    });
}
function listAuthorized(user_id) {
    var dat = {
        "Traslation": 'TraslationListByApprobe',
        "list_tral_approbed_aut": 'authorized2',
        "usr_id": user_id

    };

    $.ajax({
        data: dat,
        url: './Controller/TraslationController.php',
        type: 'POST',
        dataType: 'JSON',
        beforeSend: function () {

            $('#respuestaAjax').html('<img id="loader" src="./View/images/giphy.gif"/>');
            $('#tblAuthorized tbody').empty();
        }
        ,
        success: function (result) {
            $('#respuestaAjax').html('');

            if (result[0]['success']) {

                //$("#tblAprobed").empty();;
                $.each(result, function (i, data) {
                    //alert(data.trasl_id+ data.names_dircrs );
                    var body = "<tr>";

                    body += "<td>" + data.trasl_id + "</td>";
                    body += "<td>" + data.trasl_date_request + "</td>";
                    body += "<td>" + data.names_dircrs + "</td>";
                    body += "<td>" + data.crs_source + "</td>";
                    body += "<td>" + data.crs_destination + "</td>";
                    body += "<td>" + data.trasl_type_descripcion + "</td>";
                    body += "<td>" + data.tras_date_analyst_send + "</td>";
                    body += "<td>" + data.names_analyst + "</td>";
                    body += "<td>" + data.trasl_approved_by + "</td>";
                    body += "<td>" + data.trasl_authorized_by + "</td>";
                    body += "<td>" + data.status_proces + "</td>";
                    body += "<td>" + "<button type='button' class='btn btn-info btn-xs'  onclick='javascript:reviewTraslation(" + data.trasl_id + "   );'> Revisión </button></td>";

                    body += "</tr>";

                    $("#tblAuthorized tbody").append(body);
                });

                $(document).ready(function () {
                    $('.mailbox-messages input[type="checkbox"]').iCheck({
                        checkboxClass: 'icheckbox_flat-blue',
                        radioClass: 'iradio_flat-blue'
                    });
                    $('#tblAuthorized').DataTable();
                });
            }
        }
        ,
        error: function () {

        }
    })

}
function listExecuted(user_id) {
    var dat = {
        "Traslation": 'TraslationListByApprobe',
        "list_tral_approbed_aut": 'executed2',
        "usr_id": user_id

    };

    $.ajax({
        data: dat,
        url: './Controller/TraslationController.php',
        type: 'POST',
        dataType: 'JSON',
        beforeSend: function () {

            $('#respuestaAjax').html('<img id="loader" src="./View/images/giphy.gif"/>');
            $('#tblAprobedExecuted tbody').empty();

        }
        ,
        success: function (result) {
            $('#respuestaAjax').html('');

            if (result[0]['success']) {

                //$("#tblAprobed").empty();;
                $.each(result, function (i, data) {
                    //alert(data.trasl_id+ data.names_dircrs );
                    var body = "<tr>";

                    body += "<td>" + data.trasl_id + "</td>";
                    body += "<td>" + data.trasl_date_request + "</td>";
                    body += "<td>" + data.names_dircrs + "</td>";
                    body += "<td>" + data.crs_source + "</td>";
                    body += "<td>" + data.crs_destination + "</td>";
                    body += "<td>" + data.trasl_type_descripcion + "</td>";
                    body += "<td>" + data.tras_date_analyst_send + "</td>";
                    body += "<td>" + data.names_analyst + "</td>";
                    body += "<td>" + data.trasl_approved_by + "</td>";
                    body += "<td>" + data.trasl_authorized_by + "</td>";
                    body += "<td>" + data.trasl_executed_by + "</td>";
                    body += "<td>" + data.status_proces + "</td>";
                    body += "<td>" + "<button type='button' class='btn btn-info btn-xs'  onclick='javascript:reviewTraslation(" + data.trasl_id + "   );'> Revisión </button></td>";

                    body += "</tr>";

                    $("#tblAprobedExecuted tbody").append(body);
                });

                $(document).ready(function () {
                    $('.mailbox-messages input[type="checkbox"]').iCheck({
                        checkboxClass: 'icheckbox_flat-blue',
                        radioClass: 'iradio_flat-blue'
                    });
                    $('#tblAprobedExecuted').DataTable();
                });
            }
        }
        ,
        error: function () {

        }
    })

}