

function searchPPLIdentificatorProntuario() {
    if ($('#txtIdentificatorPPL').val() == '') {
        alert('El cuadro de dialogo no debe ser vacio');
    } else {
          $('#respuestaAjax').html('<img id="loader" src="./View/images/giphy.gif"/>');
        let txtIdentificatorProntuario = $('#txtIdentificatorPPL').val();
        let op_searchingPPL = $('#op_searchingPPL').val();
        let dat = {
            'TransferSentencedPerson': 'Search',
            'txtIdentificatorProntuario': txtIdentificatorProntuario,
            'op_searchingPPL': op_searchingPPL

        }

        $.ajax({
            data: dat,
            url: "./Controller/TransferSentencedPersonController.php",
            type: 'POST',
            dataType: 'JSON',
            beforeSend: function () {
              


            },
            success: function (result) {
                $('#respuestaAjax').html('');


            },
            error: function (jqXHR, exception) {
                 $('#respuestaAjax').html('');
                alert('Error !!!: ' + jqXHR.responseText + '!!!');
            }

        })

    }



}


function downloadTransfSentencedPDF() {
    let  dat = {'TransferSentencedPerson': 'Download'}

    $.ajax({
        data: dat,
        url: './Controller/TransferSentencedPersonController.php',
        type: 'POST',
        dataType: 'JSON',

        beforeSend: function () {
            $('#respuestaAjax').html('<img id="loader" src="./View/images/giphy.gif"/>');
            f
        },
        success: function () {
            $('#respuestaAjax').html('');

            alert();
        },
        error: function (jqXHR, exception) {
            alert('Error: ' + jqXHR.responseText + '!!!');
        }

    })
}