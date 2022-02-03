function listTraslationByApprobePltanCtrl1(usr_id) {
    //alert(trasl_type_id);
    var dat = {
        "Traslation": 'TraslationListByApprobe',
        "usr_id": usr_id,
        "list_tral_approbed_aut": 'to_approve'

    };

    $.ajax({
        data: dat,
        url: './Controller/TraslationController.php',
        type: 'POST',
        dataType: 'JSON',
        beforeSend: function () {

            $('#respuestaAjax').html('<img id="loader" src="./View/images/giphy.gif"/>');

        }
        ,
        success: function (result) {
            $('#respuestaAjax').html('');

            if (result[0]['success']) {

                //$("#tblAprobed").empty();;
                $.each(result, function (i, data) {
                    //alert(data.trasl_id+ data.names_dircrs );
                    var body = "<tr>";
                    body += "<td><input type=\"checkbox\"></td>";
                    body += "<td>" + data.trasl_id + "</td>";
                    body += "<td>" + data.trasl_date_request + "</td>";
                    body += "<td>" + data.names_dircrs + "</td>";
                    body += "<td>" + data.crs_source + "</td>";
                    body += "<td>" + data.crs_destination + "</td>";
                    body += "<td>" + data.trasl_type_descripcion + "</td>";
                    body += "<td>" + data.tras_date_analyst_send + "</td>";
                    body += "<td>" + data.names_analyst + "</td>";
                    body += "<td>" + data.status_proces + "</td>";
                    body += "<td>" + "<button type='button' class='btn btn-info btn-xs'  onclick='javascript:reviewTraslation(" + data.trasl_id + "   );'> Revisión </button></td>";
                    body += "<td>" + "<button type='button' class='btn btn-warning btn-xs'  onclick='javascript:refusedAprobed(" + data.trasl_id + "   );'> Rechazar </button></td>";
                    body += "</tr>";

                    $("#tblAprobed_to_approved tbody").append(body);
                });

                $(document).ready(function () {
                    $('.mailbox-messages input[type="checkbox"]').iCheck({
                        checkboxClass: 'icheckbox_flat-blue',
                        radioClass: 'iradio_flat-blue'
                    });
                    $('#tblAprobed_to_approved').DataTable();
                });
            }
        }
        ,
        error: function (jqXHR, exception) {
            alert('ERROR: ' + jqXHR.responseText);
            $('#respuestaAjax').html('');
        }
    })

}

function refusedAprobed(trasl_id) {

    var dat = {
        "Traslation": 'refusedAprobed',
        "idTraslation": trasl_id
    };
    $.ajax({
        data: dat,
        url: './Controller/TraslationController.php',
        type: "POST",
        dataType: 'JSON',
        beforeSend: function () {
            $('#respuestaAjax').html('<img id="loader" src="./View/images/giphy.gif"/>');
        },
        success: function (result) {
            $('#respuestaAjax').html('');
            if (result['success']) {
                alert(result['message']);                
                location.reload();
            } else {
                alert('Hubo un error al aporbar  los Traslados');
            }
        },
        error: function (jqXHR, exception) {
            alert('ERROR: ' + jqXHR.responseText);
        }

    });

}

function listTraslationApprobedPltanCtrl1(usr_id) {
    //alert(trasl_type_id);
    var dat = {
        "Traslation": 'TraslationListByApprobe',
        "usr_id": usr_id,
        "list_tral_approbed_aut": 'approved'

    };

    $.ajax({
        data: dat,
        url: './Controller/TraslationController.php',
        type: 'POST',
        dataType: 'JSON',
        beforeSend: function () {

            $('#respuestaAjax').html('<img id="loader" src="./View/images/giphy.gif"/>');

        }
        ,
        success: function (result) {
            $('#respuestaAjax').html('');
            //$("#tblAprobed").empty();

            if (result[0]['success']) {

                $.each(result, function (i, data) {
                    var body = "<tr>";
                    body += "<td>" + data.trasl_id + "</td>";
                    body += "<td>" + data.trasl_date_request + "</td>";
                    body += "<td>" + data.names_dircrs + "</td>";
                    body += "<td>" + data.crs_source + "</td>";
                    body += "<td>" + data.crs_destination + "</td>";
                    body += "<td>" + data.trasl_type_descripcion + "</td>";
                    body += "<td>" + data.tras_date_analyst_send + "</td>";
                    body += "<td>" + data.names_analyst + "</td>"; 
                    body += "<td>" + data.trasl_approved_by + "</td>"; 
                    body += "<td>" + data.status_proces + "</td>";
                    body += "<td>" + "<button type='button' class='btn btn-info btn-xs'  onclick='javascript:reviewTraslation(" + data.trasl_id + ");'> Revisión </button></td>";
                    body += "</tr>";

                    $("#tblAprobed tbody").append(body);
                });

                $(document).ready(function () {

                    $('#tblAprobed').DataTable();
                });
            }
        }
        ,
        error: function (jqXHR, exception) {
            alert('ERROR: ' + jqXHR.responseText);
        }
    })

}

function listTraslationExecutedPltanCtrl1(usr_id) {
    //alert(trasl_type_id);
    var dat = {
        "Traslation": 'TraslationListByApprobe', //profile_id
        "usr_id": usr_id,
        "list_tral_approbed_aut": 'executed'

    };

    $.ajax({
        data: dat,
        url: './Controller/TraslationController.php',
        type: 'POST',
        dataType: 'JSON',
        beforeSend: function () {

            $('#respuestaAjax').html('<img id="loader" src="./View/images/giphy.gif"/>');

        }
        ,
        success: function (result) {
            $('#respuestaAjax').html('');
            //$("#tblAprobed").empty();

            if (result[0]['success']) {

                $.each(result, function (i, data) {
                    var body = "<tr>";
                    body += "<td>" + data.trasl_id + "</td>";
                    body += "<td>" + data.trasl_date_request + "</td>";
                    body += "<td>" + data.names_dircrs + "</td>";
                    body += "<td>" + data.crs_source + "</td>";
                    body += "<td>" + data.crs_destination + "</td>";
                    body += "<td>" + data.trasl_type_descripcion + "</td>";
                    body += "<td>" + data.tras_date_analyst_send + "</td>";
                    body += "<td>" + data.names_analyst + "</td>";
                    body += "<td>" + data.trasl_approved_by + "</td>";
                    body += "<td>" + data.trasl_authorized_by + "</td>";
                    body += "<td>" + data.trasl_executed_by + "</td>";
                    body += "<td>" + data.status_proces + "</td>";
                    body += "<td>" + "<button type='button' class='btn btn-info btn-xs'  onclick='javascript:reviewTraslation(" + data.trasl_id + ");'> Revisión </button></td>";
                    body += "</tr>";

                    $("#tblAprobedExecuted tbody").append(body);
                });

                $(document).ready(function () {

                    $('#tblAprobedExecuted').DataTable();
                });
            }
        }
        ,
        error: function (jqXHR, exception) {
            alert('ERROR: ' + jqXHR.responseText);
        }
    })

}


function listTraslationAuthorizedPltanCtrl1(usr_id) {
    //alert(trasl_type_id);
    var dat = {
        "Traslation": 'TraslationListByApprobe', //profile_id
        "usr_id": usr_id,
        "list_tral_approbed_aut": 'authorized'

    };

    $.ajax({
        data: dat,
        url: './Controller/TraslationController.php',
        type: 'POST',
        dataType: 'JSON',
        beforeSend: function () {

            $('#respuestaAjax').html('<img id="loader" src="./View/images/giphy.gif"/>');

        }
        ,
        success: function (result) {
            $('#respuestaAjax').html('');
            //$("#tblAprobed").empty();

            if (result[0]['success']) {

                $.each(result, function (i, data) {
                    var body = "<tr>";
                    body += "<td>" + data.trasl_id + "</td>";
                    body += "<td>" + data.trasl_date_request + "</td>";
                    body += "<td>" + data.names_dircrs + "</td>";
                    body += "<td>" + data.crs_source + "</td>";
                    body += "<td>" + data.crs_destination + "</td>";
                    body += "<td>" + data.trasl_type_descripcion + "</td>";
                    body += "<td>" + data.tras_date_analyst_send + "</td>";
                    body += "<td>" + data.names_analyst + "</td>";
                    body += "<td>" + data.trasl_approved_by + "</td>";
                    body += "<td>" + data.trasl_authorized_by + "</td>";
                    body += "<td>" + data.status_proces + "</td>";
                    body += "<td>" + "<button type='button' class='btn btn-info btn-xs'  onclick='javascript:reviewTraslation(" + data.trasl_id + ");'> Revisión </button></td>";
                    body += "</tr>";

                    $("#tblAuthorized tbody").append(body);
                });

                $(document).ready(function () {

                    $('#tblAuthorized').DataTable();
                });
            }
        }
        ,
        error: function (jqXHR, exception) {
            alert('ERROR: ' + jqXHR.responseText);
        }
    })

}


function reviewTraslation(trasl_id) {
    //alert(trasl_id+" "+usr_id);
    var formulario = $('#fmrEditTraslationAnalyst');
    var dat = {
        "Traslation": 'reviewTraslation',
        "idTraslation": trasl_id

    };
    $.ajax({
        data: dat,
        url: './Controller/TraslationController.php',
        type: "POST",
        dataType: 'JSON',
        beforeSend: function () {

        },
        success: function (result) {
            if (result[0]['success']) {
                formulario.find("#idTraslation").val(result[0]['trasl_id']);
                formulario.find("#CplSource").val(result[0]['crs_source']);
                formulario.find("#CplDestination").val(result[0]['crs_destination']);
                formulario.find("#DirectorName").val(result[0]['usr_name_complete']);
                formulario.find("#obsevationAbalyst").val(result[0]['trasl_observations']);
                formulario.find("#txtCommentaryDirCrs").val(result[0]['trasl_descripcion']);
                formulario.find("#commentarytDirPltaCtrl").val(result[0]['trasl_commentary_dir_pltactral']);
                formulario.find("#pdf_download_dir").attr("href", result[0]['trasl_path']);

                $("#tblpplAnalyst tbody").empty();
                $.each(result, function (i, data) {
                    //alert( data.prison_per_lastname);
                    var body = "<tr>";
                    body += "<td>" + data.prison_per_identification + "</td>";
                    body += "<td>" + data.prison_per_name + "</td>";
                    body += "<td>" + data.prison_per_lastname + "</td>";
                    body += "<td>" + data.prison_per_observations + "</td>";

                    body += "<td>" + "<button type='button' class='btn btn-success'  onclick='javascript:reviewLoadPfPPL(" + data.prison_per_id + ");'> Ver Certificados </button></td>";


                    body += "</tr>";
                    $("#tblpplAnalyst tbody").append(body);
                });

                $('#traslationAnalystNearFmly').modal('show');


            } else {
                alert('Hubo un error al Editar  el Traslado');
            }
        },
        error: function (jqXHR, exception) {
            alert('ERROR: ' + jqXHR.responseText);
        }

    });

}

function reviewLoadPfPPL(id_ppl) {

    var formulario = $('#fmrloadPdfPPL');
    var dat = {
        "PrisionPerson": 'callPPLListFiles',
        "id_ppl": id_ppl
    };
    $.ajax({
        data: dat,
        url: './Controller/PrisonPersonController.php',
        type: "POST",
        dataType: 'JSON',
        beforeSend: function () {
            

        },
        success: function (result) {
            if (result[0]['success']) {
                formulario.find("#prison_per_id").val(id_ppl);
                formulario.find("#ppl_name_lastname").val(result[0]['prison_per_name'] + ' ' + result[0]['prison_per_lastname']);
                $.each(result, function (i, data) {
                    var body = "<tr>";
                    body += "<td>" + data.file_description_name + "</td>";
                    body += "<td><a id=\"pdf_download_ppl\" href=\"" + data.file_path + "\" download=\"adjuntoss.pdf\"><i class=\"fa fa-download\"></i>Descargar PDF</a></td>";
                    body += "</tr>";
                    $("#listCertificatesPPLS tbody").append(body); 
                });

                $('#modal_ppl_load_pdf').modal('show');

            } else {
                alert(result[0]['message']);
            }
        },
        error: function (jqXHR, error, errorThrown) {
            alert(jqXHR.responseText);
        }

    });






}

function btnApprobed() {
    var jsonObj = [];
    $("#tblAprobed_to_approved tbody tr").each(function () {
        var textval0 = $(this).find('td:eq(0) input');
        var textval1 = $(this).find('td:eq(1)').text();
        /*
         *  var col1 = $(this).find('td:eq(1)').text();
         var col2 = $(this).find('td:eq(2) input').val();
         * 
         * 
         * 
         **/
        var usr_id_approbed = $('#txtIdUser').val();
        var dirParent = $('#id_DirectionParent').text();
        if (textval0.is(':checked')) {
            //alert(textval1);
            jsonObj.push({"trasl_id": textval1, "usr_id_approbed": usr_id_approbed, "dirParent": dirParent});

        }


    });
    traslationSaveApprobed(jsonObj);
    //alert('Datos  actualizados');

}


function traslationSaveApprobed(listApproved) {

    var dat = {
        "Traslation": 'saveTraslationApprobed',
        "listApproved": listApproved

    };
    $.ajax({
        data: dat,
        url: './Controller/TraslationController.php',
        type: "POST",
        dataType: 'JSON',
        beforeSend: function () {

        },
        success: function (result) {

            if (result['success']) {
                alert(result['nro'] + '  ' + result['message']);
                location.reload();
            } else {
                alert(result['nro'] + '  ' + result['message']);
            }
        },
        error: function (jqXHR, exception) {
            alert('ERROR: ' + jqXHR.responseText);
        }

    });
}

function saveCommentary() {
    var idTraslation = $('#idTraslation').val();
    var commnetary = $('#commentarytDirPltaCtrl').val();
    var dat = {
        "Traslation": 'saveCommentary',
        "idTraslation": idTraslation,
        "commnetary": commnetary


    };
    $.ajax({
        data: dat,
        url: './Controller/TraslationController.php',
        type: "POST",
        dataType: 'JSON',
        beforeSend: function () {
            $('#respuestaAjax').html('<img id="loader" src="./View/images/giphy.gif"/>');
        },
        success: function (result) {
            $('#respuestaAjax').html('');
            if (result['success']) {
                alert('Datos guardados Satisfactoriamente');
                $('#traslationAnalystNearFmly').modal('hide');
                location.reload();
            } else {
                alert('Hubo un error al aporbar  los Traslados');
            }
        },
        error: function (jqXHR, exception) {
            alert('ERROR: ' + jqXHR.responseText);
        }

    });
}

function loadDirectionParent(usr_id) {

    var dat = {
        "DirectionArea": 'loadDirectionParent',
        "usr_id": usr_id
    };
    $.ajax({
        data: dat,
        url: './Controller/DirectionAreaController.php',
        type: "POST",
        dataType: 'JSON',
        beforeSend: function () {
            $('#respuestaAjax').html('<img id="loader" src="./View/images/giphy.gif"/>');
        },
        success: function (result) {
            $('#respuestaAjax').html('');
            if (result['success']) {
                jQuery('#id_DirectionParent').text(result['area_parent']);
                jQuery('#directionParentDesc').text(result['area_desription']);

            } else {
                alert('No hay Dirección Padre');
            }
        },
        error: function (jqXHR, exception) {
            alert('ERROR: ' + jqXHR.responseText);
        }

    });
}