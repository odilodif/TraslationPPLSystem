/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


function btnExecute() {
    var jsonObj = [];
    $("#tbl_to_execute tbody tr").each(function () {
        var textval0 = $(this).find('td:eq(0) input');
        var textval1 = $(this).find('td:eq(1)').text();
        /*
         var col1 = $(this).find('td:eq(1)').text();
         var col2 = $(this).find('td:eq(2) input').val();        
         **/
        var usr_id_executed = $('#txtIdUser').val();        
        if (textval0.is(':checked')) {           
            jsonObj.push({"trasl_id": textval1, "usr_id_executed": usr_id_executed});           
        }
    });
    traslationSaveExecuted(jsonObj);
    //alert('Datos  actualizados');
    
}
function listToExecute(usr_id) {  
    var dat = {
        "Traslation": 'TraslationListByApprobe',       
        "list_tral_approbed_aut": 'to_execute3',
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

                    $("#tbl_to_execute tbody").append(body);
                });

                $(document).ready(function () {
                    $('.mailbox-messages input[type="checkbox"]').iCheck({
                        checkboxClass: 'icheckbox_flat-blue',
                        radioClass: 'iradio_flat-blue'
                    });
                    $('#tbl_to_execute').DataTable();
                });
            }
        }
        ,
        error: function () {

        }
    })

}
function listExecuted3(user_id) {  
 var dat = {
        "Traslation": 'TraslationListByApprobe',       
        "list_tral_approbed_aut": 'executed3',
        "usr_id":user_id

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

function traslationSaveExecuted(listExecuted) {

    var dat = {
        "Traslation": 'saveTraslationExecuted',
        "listExecuted": listExecuted
    };
    $.ajax({
        data: dat,
        url: './Controller/TraslationController.php',
        type: "POST",
        dataType: 'JSON',
        beforeSend: function () {

        },
        success: function (result) {

            if (result['success']) {
                alert(result['nro'] + '  ' + result['message']);                
               location.reload();
            } else {
                alert(result['nro'] + '  ' + result['message']);
            }
        },
        error: function (jqXHR, exception) {
            alert('ERROR: '+ jqXHR.responseText);
        }

    });
}
