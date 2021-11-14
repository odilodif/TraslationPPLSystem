/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
function saveSettingsUser(idUsrSgp) {
    //console.log(idUsrSgp)
    var jsonObj = [];
    $('#menus_objetos tbody tr').each(function () {
        var col0 = $(this).find('td:eq(0) input');
        /*var profilsv_id=$(this).find('td:eq(2) input');
        var textval1 = $(this).find('td:eq(1)').text();*/
        if (col0.is(':checked')) {             
            jsonObj.push({"idMenu": col0.val(),"checked":"t"});
        }
        else
        {
            jsonObj.push({"idMenu": col0.val(),"checked":"f"});
        }
    });
     var dat = {
        "Menu": 'SettingsMenuUser',
        "listSettingsMenu": jsonObj,
        "idUsrSgp": idUsrSgp
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
            if (result['success']) {
                loadListMenu(idUsrSgp);
                alert(result['message']);                
            }
            else
                alert(result['message']);
        }
        ,
        error: function (jqXHR, exception) {
            alert('Error: ' + jqXHR.responseText + '!!!');
        }
    })
  
}

function enableEdition() {
    $('#menus_objetos tbody tr').each(function () {
        var col0 = $(this).find('td:eq(0) input');
        col0.prop("disabled", false);

    });

    $('#tbl_traslation_type tbody tr').each(function () {
        var col0 = $(this).find('td:eq(0) input');
        col0.prop("disabled", false);
    });

    $('#tbl_roles tbody tr').each(function () {
        var col0 = $(this).find('td:eq(0) input');
        col0.prop("disabled", false);
    });
}
