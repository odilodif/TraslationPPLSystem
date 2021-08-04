/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function get60Prcentage() {
    var dat = {
        "ElapsedPorcentage": 'GetPorcentages'
    };
    $.ajax({
        data: dat,
        url: './Controller/ElapsedPorcentageController.php',
        type: "POST",
        dataType: 'JSON',
        beforeSend: function () {
            $('#respuestaAjax').html('<img id="loader" src="./View/images/giphy.gif"/>');
        },
        success: function (result) {
            if (result[0]['success']) {
                $('#respuestaAjax').html('');
                $.each(result, function (i, data) {
                    //alert(data.trasl_id+ data.names_dircrs );
                    var body = "<tr>";
                    body += "<td>" + data.porcent_cumplido + "</td>";
                    body += "<td>" + data.dias_a_la_fecha + "</td>";
                    body += "<td>" + data.total_dias_judiciales_impuestos + "</td>";
                    body += "<td>" + data.prontuario + "</td>";
                    body += "<td>" + data.name_ppl + "</td>";
                    body += "<td>" + data.last_name_ppl + "</td>";
                    body += "<td>" + data.numero_detencion + "</td>";
                    body += "<td>" + data.nombre_crs + "</td>";
                    body += "<td>" + data.fecha_in + "</td>";
                    body += "</tr>";

                    $("#tbl60Porcent tbody").append(body);
                });

                $(document).ready(function () {
                   
                    $('#tbl60Porcent').DataTable({
                        dom: 'Bfrtip',
                        buttons: [
                            'copy', 'csv', 'excel', 'pdf', 'print'
                        ],
                        "bDestroy": true
                    });
                });
            } else {
                alert('Error: ' + result[0]['message']);
            }
        },
        error: function (xhr, status, error) {
            alert("Error..!" + xhr.responseText);
        }

    });
}


function get70Prcentage() {
    var dat = {
        "ElapsedPorcentage": 'GetPorcentages70'
    };
    $.ajax({
        data: dat,
        url: './Controller/ElapsedPorcentageController.php',
        type: "POST",
        dataType: 'JSON',
        beforeSend: function () {
            $('#respuestaAjax').html('<img id="loader" src="./View/images/giphy.gif"/>');
        },
        success: function (result) {
            if (result[0]['success']) {
                $('#respuestaAjax').html('');
                $.each(result, function (i, data) {
                    //alert(data.trasl_id+ data.names_dircrs );
                    var body = "<tr>";
                    body += "<td>" + data.porcent_cumplido + "</td>";
                    body += "<td>" + data.dias_a_la_fecha + "</td>";
                    body += "<td>" + data.total_dias_judiciales_impuestos + "</td>";
                    body += "<td>" + data.prontuario + "</td>";
                    body += "<td>" + data.name_ppl + "</td>";
                    body += "<td>" + data.last_name_ppl + "</td>";
                    body += "<td>" + data.numero_detencion + "</td>";
                    body += "<td>" + data.nombre_crs + "</td>";
                    body += "<td>" + data.fecha_in + "</td>";
                    body += "</tr>";

                    $("#tbl70Porcent tbody").append(body);
                });

                $(document).ready(function () {
                   
                    $('#tbl70Porcent').DataTable();
                });
            } else {
                alert('Error: ' + result[0]['message']);
            }
        },
        error: function (xhr, status, error) {
            alert("Error..!" + xhr.responseText);
        }

    });
}