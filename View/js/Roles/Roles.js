/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function loadListRoles() {
    var dat = {
        "Roles": 'ListRoles'
    };

    $.ajax({
        data: dat,
        url: './Controller/RolController.php',
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
                    body += "<td><input type='radio' name='rol' value='"+ data.rol_id+"'></td>";
                    body += "<td>" + data.rol_description + "</td>";
                    body += "<tdtype='checkbox' name='' value=''hidden=''>" + data.rol_id + "</td>";
                    body += "</tr>";
                    $("#tbl_roles tbody").append(body);
                });
            }
        }
        ,
        error: function (jqXHR, exception) {
            alert('ERROR: ' + jqXHR.responseText);
        }
    })
}
