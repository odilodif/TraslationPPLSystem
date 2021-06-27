/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function loadListMenu(idUsrSgp) {
    var dat = {
        "Menu": 'ListMenu',
        "idUsrSgp":idUsrSgp
    };

    $.ajax({
        data: dat,
        url: "./Controller/MenuController.php",
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
                    if(data.check)
                        body += "<td><input type='checkbox' name='' value='"+data.menu_description_id+"' checked disabled ></td>";
                     else
                         body += "<td><input type='checkbox' name='' value='"+data.menu_description_id+"' disabled ></td>";
                    body += "<td>" + data.menu_description_description + "</td>";
                    body += "<tdtype='checkbox' name='' value=''hidden=''>" + data.menu_description_id + "</td>";
                    body += "</tr>";
                    $("#menus_objetos tbody").append(body);
                });            }
        }
        ,
        error: function (jqXHR, exception) {
            alert('Error: ' + jqXHR.responseText + '!!!');
        }
    })

}
