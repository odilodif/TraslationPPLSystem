/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


function loadReport1() {
    var dat = {
        "Traslation": 'Report1'
    };

    $.ajax({
        data: dat,
        url: './Controller/TraslationController.php',
        type: 'POST',
        dataType: 'JSON',
        beforeSend: function () {

            $('#respuestaAjax').html('<span style="color: red;"> Espere por favor. </span></spam><img id="loader" src="./View/images/giphy.gif"/>');

        }
        ,
        success: function (result) {
            $('#respuestaAjax').html('');
            if (result[0]['success']) {

                $.each(result, function (i, data) {
                    const  trasl_date_request = data.trasl_date_request ? data.trasl_date_request : ' '; 
                    const  trasl_date_approved = data.trasl_date_approved ? data.trasl_date_approved : ' '; 
                    const  trasl_date_confirm = data.trasl_date_confirm ? data.trasl_date_confirm : ' '; 
                    const  crs_destination = data.crs_destination ? data.crs_destination : ' ';
                    
                    /*const  name_director = data.names_dircrs ? data.names_dircrs : 'Sin Nombre del Director ';
                    const  name_analyst = data.names_analyst ? data.names_analyst : ' ';                   
                    const  name_approved = data.names_approved ? data.names_approved : ' ';*/
                    
                    var body = "<tr>";
                    body += "<td>" + data.trasl_id + "</td>";
                    body += "<td>" + trasl_date_request + "</td>";
                    body += "<td>" + trasl_date_approved + "</td>";
                    body += "<td>" + trasl_date_confirm + "</td>";
                    body += "<td>" + data.trasl_type_descripcion + "</td>";
                    body += "<td>" + data.crs_source + "</td>";
                    body += "<td>" + crs_destination + "</td>";
                    body += "<td>" + data.status_proces + "</td>";
                    body += "<td>" + (data.names_dircrs ? data.names_dircrs : 'Sin Nombre del Director ') + "</td>";
                    body += "<td>" + (data.names_analyst ? data.names_analyst : ' ') + "</td>";
                    body += "<td>" + (data.names_approved ? data.names_approved : ' ') + "</td>";
                    body += "</tr>";
                    $("#Report1 tbody").append(body);
                });
                $(document).ready(function () {
                    $('#Report1').DataTable({
                        dom: 'Bfrtip',
                        buttons: [
                            'copy', 'csv', 'excel', 'pdf', 'print'
                        ],
                        "bDestroy": true
                    });
                });
            }
        }
        ,
        error: function () {

        }
    })
}