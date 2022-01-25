/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Other/javascript.js to edit this template
 */

function loadProfilesAlls() {
    let parameters = {
        'Profile': 'Profile',
        'acction': 'getAll'
    };

    $.ajax({
        data: parameters,
        url: './Controller/ProfileController.php',
        type: 'POST',
        dataType: 'JSON',
        beforeSend: function () {
            $('#respuestaAjax').html('<img id="loader" src="./View/images/giphy.gif"/>');
        },
        success: function (result) {
            $.each(result, (i, profile) => {
                $('#slect-profile').append($('<option>', {
                    value: profile.prfle_id,
                    text: profile.prfle_description
                }));

            });

        },
        error: function (jqXHR, exception) {
            alert('Error: ' + jqXHR.responseText + '!!!');
        }
    });
}