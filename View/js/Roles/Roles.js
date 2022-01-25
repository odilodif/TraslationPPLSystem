/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function loadListRoles(idSGP) {
    var dat = {
        "Roles": 'ListRoles',
        "idSGP": idSGP
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
        success:  data => {
            if (data[0]['success']) {
                $.each(data, function (i, data) {
                   var body = "<tr>";
                    body += "<td><input type='radio' name='rol' value='" + data.rol_id + "' disabled ></td>";
                    body += "<td>" + data.rol_description + "</td>"; 
                    body += data.create == 't' ? "<td><input id='menu_check' type='checkbox' name='' value='' checked disabled  ></td>" : "<td><input id='menu_check' type='checkbox' name='' value='' disabled  ></td>";
                    body += data.read == 't' ? "<td><input id='menu_check' type='checkbox' name='' value='' checked disabled  ></td>" : "<td><input id='menu_check' type='checkbox' name='' value='' disabled  ></td>";
                    body += data.update == 't' ? "<td><input id='menu_check' type='checkbox' name='' value='' checked disabled  ></td>" : "<td><input id='menu_check' type='checkbox' name='' value='' disabled  ></td>";
                    body += data.delete == 't' ? "<td><input id='menu_check' type='checkbox' name='' value='' checked disabled  ></td>" : "<td><input id='menu_check' type='checkbox' name='' value='' disabled  ></td>";
                    body += "</tr>";
                    $("#tbl_roles tbody").append(body);
                    console.log(i);
                });
            }
        }
        ,
        error: (jqXHR, exception) =>{
            alert('ERROR: ' + jqXHR.responseText);
        }
    })
}


