/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
function saveSettingsUser(idUsrSgp) {
    if ($('#slect-profile').val() != 0) {
        saveSettingsUserMenu(idUsrSgp);
        
    } else {
        disableEdition();
        alert('Por favor escoger una opción de Perfil');

    }
}



const  saveSettingsUserMenu = () => {
    //console.log(idUsrSgp)
    var jsonObj = [];
    $('#menus_objetos tbody tr').each(function () {
        var col0 = $(this).find('td:eq(0) input');
        /*var profilsv_id=$(this).find('td:eq(2) input');
         var textval1 = $(this).find('td:eq(1)').text();*/
        if (col0.is(':checked')) {
            jsonObj.push({"idMenu": col0.val(), "checked": "t"});
        } else
        {
            jsonObj.push({"idMenu": col0.val(), "checked": "f"});
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
        beforeSend: () => {
            $('#respuestaAjax').html('<img id="loader" src="./View/images/giphy.gif"/>');
        }
        ,
        success: (result) => {
            $('#respuestaAjax').html('');
            if (result['success']) {
                loadListMenu(idUsrSgp);
                disableEdition();
                updateProfileByIdUsrSgp(idUsrSgp);
            } else
                alert(result['message']);
        }
        ,
        error: (jqXHR, exception) => {
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

    /*$('#tbl_roles tbody tr').each(function () {
     var col0 = $(this).find('td:eq(0) input');
     col0.prop("disabled", false);
     });*/
}


function disableEdition() {
    $('#menus_objetos tbody tr').each(function () {
        var col0 = $(this).find('td:eq(0) input');
        col0.prop("disabled", true);

    });

    $('#tbl_traslation_type tbody tr').each(function () {
        var col0 = $(this).find('td:eq(0) input');
        col0.prop("disabled", true);
    });

    $('#tbl_roles tbody tr').each(function () {
        var col0 = $(this).find('td:eq(0) input');
        col0.prop("disabled", true);
    });
}

function saveSettingsTraslados(idUsrSgp) {
    var jsonObjTrasl = [];
    $('#tbl_traslation_type tbody tr').each(function () {
        var colch = $(this).find('td:eq(0) input');
        if (colch.is(':checked')) {
            jsonObjTrasl.push({"idTras": colch.val(), "checked": "t"});
        } else {
            jsonObjTrasl.push({"idTras": colch.val(), "checked": "f"});
        }
    })

    var dataTrasl = {
        "TraslTypeSaved": 'TraslTypeSttingsUser',
        "listSettingsTraslType": jsonObjTrasl,
        "idUsrSgp": idUsrSgp
    };

    $.ajax({
        data: dataTrasl,
        url: './Controller/TraslationTypeController.php',
        type: 'POST',
        dataType: 'JSON',
        beforeSend: function () {
            $('#respuestaAjax').html('<img id="loader" src="./View/images/giphy.gif"/>');
        },
        success: function (result) {
            if (result['success']) {
                loadListMenu(idUsrSgp);
                disableEdition();
                alert(result['message']);
            } else
                alert(result['message']);
        },
        error: function (jqXHR, exception) {
            alert('Error: ' + jqXHR.responseText + '!!!');
        }
    });
}
