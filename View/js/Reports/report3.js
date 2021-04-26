function loadTraslationDetailsList(crs_id) {

    var dat = {
        "TraslationDetails": 'TraslationDetailsList',
        "crs_id": crs_id
    };

    $.ajax({
        data: dat,
        url: './Controller/TraslationDetailsController.php',
        type: 'POST',
        dataType: 'JSON',
        beforeSend: function () {

            $('#respuestaAjax').html('<img id="loader" src="./View/images/giphy.gif"/>');

        }
        ,
        success: function (result) {
            $('#respuestaAjax').html('');

            if (result[0]['success']) {
                /*
                 trasl_id	trasl_date_request	status	trasl_descripcion	
                 prison_per_identification	prison_per_name
                 prison_per_lastname	sex	
                 prontuario	status_sgp	trasl_type_descripcion	
                 crs_origen	crs_destino 
                 * 
                 */
                $.each(result, function (i, data) {
                    var body = "<tr>";
                    body += "<td><a href='#'>" + data.trasl_id + "</a></td>";
                    body += "<td>" + data.trasl_date_request + "</td>";
                    body += "<td>" + data.status + "</td>";
                    body += "<td>" + data.trasl_descripcion + "</td>";
                    body += "<td>" + data.prison_per_identification + "</td>";
                    body += "<td>" + data.prison_per_name + "</td>";
                    body += "<td>" + data.prison_per_lastname + "</td>";
                    body += "<td>" + data.sex + "</td>";
                    body += "<td>" + data.prontuario + "</td>";
                    body += "<td>" + data.status_sgp + "</td>";
                    body += "<td>" + data.trasl_type_descripcion + "</td>";
                    body += "<td>" + data.crs_origen + "</td>";
                    body += "<td>" + data.crs_destino + "</td>";
                    body += "<td>" + data.name_analyst + "</td>";
                    body += "<td>" + data.lastname_analyst + "</td>";
                    body += "</tr>";
                    
                    $("#tblTraslationDetailsList tbody").append(body);
                    $('#txt_total').val(data.total);
                });


            }
        }
        ,
        error: function () {

        }


    })



}

function clearFliedsBySearchTraslDetails() {
    $('#tblTraslationDetailsList tbody').empty();
    $('#tblTraslationDetailsList').hide();
    $(":text").val( '');
    $('#tblTraslationDetailsList2').show();

}

function seachTrasDetailsList(crs_id,fields_search) {
    /*trasl_id	trasl_date_request	
     * status	trasl_descripcion	
     * prison_per_identification	prison_per_name	
     * prison_per_lastname	sex	prontuario	
     * status_sgp	trasl_type_descripcion	
     * crs_andigen	crs_destino	
     * name_analyst	lastname_analyst
     * 
     * @type type
     */
    /*var trasl_id = $('#trasl_id').val() == '' ? 0 : $('#trasl_id').val();
    var trasl_date_request = $('#trasl_date_request').val();
    var status = $('#status').val();
    var trasl_descripcion = $('#trasl_descripcion').val();
    var prison_per_identification = $('#prison_per_identification').val();
    var prison_per_name = $('#prison_per_name').val();
    var prison_per_lastname = $('#prison_per_lastname').val();
    var sex = $('#sex').val();
    var prontuario = $('#prontuario').val();
    var status_sgp = $('#status_sgp').val();
    var trasl_type_descripcion = $('#trasl_type_descripcion').val();
    var crs_andigen = $('#crs_andigen').val();
    var crs_destino = $('#crs_destino').val();
    var name_analyst = $('#name_analyst').val();
    var lastname_analyst = $('#lastname_analyst').val();*/
    
    var dat = {
        "TraslationDetails":'seachTrasDetailsList',
        "crs_id":crs_id,
        "fields_search":fields_search

    };

    $.ajax({
        data: dat,
        url: './Controller/TraslationDetailsController.php',
        type: 'POST',
        dataType: 'JSON',
        beforeSend: function () {

            $('#respuestaAjax').html('<img id="loader" src="./View/images/giphy.gif"/>');

        }
        ,
        success: function (result) {
            $('#respuestaAjax').html('');

            if (result[0]['success']) {
                /*
                 trasl_id	trasl_date_request	status	trasl_descripcion	
                 prison_per_identification	prison_per_name
                 prison_per_lastname	sex	
                 prontuario	status_sgp	trasl_type_descripcion	
                 crs_origen	crs_destino 
                 * 
                 */
                                
                $('#tblTraslationDetailsList2').hide();
                $('#tblTraslationDetailsList tbody').empty();
                $.each(result, function (i, data) {
                    var body = "<tr>";
                    body += "<td><a href='#'>" + data.trasl_id + "</a></td>";
                    body += "<td>" + data.trasl_date_request + "</td>";
                    body += "<td>" + data.status + "</td>";
                    body += "<td>" + data.trasl_descripcion + "</td>";
                    body += "<td>" + data.prison_per_identification + "</td>";
                    body += "<td>" + data.prison_per_name + "</td>";
                    body += "<td>" + data.prison_per_lastname + "</td>";
                    body += "<td>" + data.sex + "</td>";
                    body += "<td>" + data.prontuario + "</td>";
                    body += "<td>" + data.status_sgp + "</td>";
                    body += "<td>" + data.trasl_type_descripcion + "</td>";
                    body += "<td>" + data.crs_origen + "</td>";
                    body += "<td>" + data.crs_destino + "</td>";
                    body += "<td>" + data.name_analyst + "</td>";
                    body += "<td>" + data.lastname_analyst + "</td>";
                    body += "</tr>";
                    $("#tblTraslationDetailsList tbody").append(body);
                     $("#txt_total").val(data.total);
                });

                $('#tblTraslationDetailsList').show();
            }
        }
        ,
        error: function () {

        }


    })



}


