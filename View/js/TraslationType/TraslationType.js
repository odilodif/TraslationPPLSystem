/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function loadTraslationType() {
    var dat = {
        "TraslationType": 'listTraslationType'
    };

    $.ajax({
        data: dat,
        url: './Controller/TraslationTypeController.php',
        type: 'POST',
        dataType: 'JSON',
        beforeSend: function () {
            //  alert('before');
        }
        ,
        success: function (data) {
            if (data[0]['success']) {
                $.each(data, function (i, data) {
                    var body = "<tr>";
                    body += "<td><input type='checkbox' name='' value='"+data.trasl_type_id+"'></td>";
                    body += "<td>" + data.trasl_type_descripcion + "</td>";
                    body += "<tdtype='checkbox' name='' >" + data.trasl_type_id + "</td>";
                    body += "</tr>";
                    $("#tbl_traslation_type tbody").append(body);
                });
            }
        }
        ,
        error: function (jqXHR, exception) {
            alert('ERROR: ' + jqXHR.responseText);
        }
    })
}

