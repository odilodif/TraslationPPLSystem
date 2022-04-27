/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function validateUser() {

    if ($('#nick').val() != '' && $('#password').val() != '')
    {
        login($('#nick').val().toLowerCase(), $('#password').val());
    } else
    {
        alert('Debe ingresar el usuario y la contraseña para ingresar al sistema.');
    }

}

function login(nick, pass) {

    var datos = {
        "User": 'login',
        "nick": nick,
        "password": pass

    };
    $.ajax({
        data: datos,
        url: "./Controller/UserController.php",
        type: "POST",
        dataType: 'json',
        beforeSend: function () {
            $('#respuestaAjax').html('<img id="loader" src="./View/images/giphy.gif"/>');
        },
        success: function (result) {
            $('#respuestaAjax').html('');
            if (result[0]['success']) {
                // alert();
                if (result[0]['messages']!=null) {
                    alert(result[0]['messages'])
                    
                }

                window.location = './index.php';
                //$('#menu_items').append("<li>hello</li>");
            } else {

                alert(result[0]['message']);

            }
        },
        error: function (xhr, status, error) {
            alert(xhr.responseText);
        }

    });
}
