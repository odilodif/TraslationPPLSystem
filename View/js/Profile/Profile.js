/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Other/javascript.js to edit this template
 */

function loadProfiles() {
    let parameters = {
        'Profile': 'Profile',
        'acction': 'getAll'
    };

    $.ajax({
        data: parameters,
        url: './Controller/ProfileController.php',
        type: 'POST',
        dataType: 'JSON',
        BeforeSend: function () {
            $('#respuestaAjax').html('<img id="loader" src="./View/images/giphy.gif"/>');
        },
        susccess: function (result) {
            if (result[0]['success']) {
                var options = '#slect-profile';
                $.each(result, function (item) {
                    options.append($("<option />").val(item.ImageFolderID).text(item.Name));
                });

            }

        },
        error: function (jqXHR, exception) {
            alert('Error: ' + jqXHR.responseText + '!!!');
        }
    });
}

