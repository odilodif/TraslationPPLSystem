
function loadComboboxTraslationType() {
    var dat = {
        "TraslationType": 'listTraslationType'
    };

    $.ajax({
        data: dat,
        url: './Controller/TraslationTypeController.php',
        type: 'POST',
        dataType: 'JSON',
        beforeSend: function () {
            //  alert('before');
        }
        ,
        success: function (result) {

            if (result[0]['success']) {
                var $dropdown = $("#trasl_type_id");
                $.each(result, function (i, data) {
                    $dropdown.append($("<option />").val(data['trasl_type_id']).text(data['trasl_type_descripcion']));
                });

                var $dropdowntype_edit = $("#trasl_type_id-edit");
                $.each(result, function (i, data) {
                    $dropdowntype_edit.append($("<option />").val(data['trasl_type_id']).text(data['trasl_type_descripcion']));
                });
            }
        }
        ,
        error: function () {

        }
    })

}
function loadComboboxCrs() {
    var usr_id_sgp = $('#usr_id_sgp').val();
    var dat = {
        "CenterCrs": 'listCenterCrs',
        'usr_id_sgp': usr_id_sgp
    };

    $.ajax({
        data: dat,
        url: './Controller/CenterCrsController.php',
        type: 'POST',
        dataType: 'JSON',
        beforeSend: function () {
            //  alert('before');
        }
        ,
        success: function (result) {

            if (result[0]['success']) {

                var $dropdown = $("#crs_id_destination");
                var $dropdownEdit = $("#crs_id_destinationEdit");

                $.each(result, function (i, data) {

                    $dropdown.append($("<option />").val(data['crs_id']).text(data['crs_description']));
                    $dropdownEdit.append($("<option />").val(data['crs_id']).text(data['crs_description']));
                });

                var $dropdowncrs_edit = $("#crs_id_destination-edit");

                $.each(result, function (i, data) {

                    $dropdowncrs_edit.append($("<option />").val(data['crs_id']).text(data['crs_description']));
                });
            }
        }
        ,
        error: function () {

        }
    })

}
/*Load Combobox Crs Centers Sgp*/
function loadCrsSgp() {

    var dat = {
        "CrsSgp": 'listCrs'
    };

    $.ajax({
        data: dat,
        url: './Controller/CrsSgpController.php',
        type: 'POST',
        dataType: 'JSON',
        beforeSend: function () {
            //  alert('before');
        }
        ,
        success: function (result) {

            if (result[0]['success']) {

                var $dropdown = $("#cbxcrs");

                $.each(result, function (i, data) {

                    $dropdown.append($("<option />").val(data['id']).text(data['name_centro']));
                });
            }
        }
        ,
        error: function () {

        }
    })

}
/*end function load combobox Crs Centers Sgp*/
function loadTraslationList(crs_id) {

    var dat = {
        "Traslation": 'TraslationList',
        "crs_id": crs_id
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
                $.each(result, function (i, data) {
                    var body = "<tr>";
                    body += "<td><a href='#'>" + data.trasl_id + "</a></td>";
                    body += "<td>" + data.trasl_date_request + "</td>";
                    body += "<td>" + data.trasl_type_descripcion + "</td>";
                    body += "<td>" + data.crs_description + "</td>";
                    body += "<td>" + data.status_proces + "</td>";
                    body += "<td>" + "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href='javascript:viewTraslationDirectorCrs(" + data.trasl_id + "," + data.crs_id + ");' class='fa fa-eye'></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href='javascript:deleteTraslationDialog(" + data.trasl_id + ",\"" + data.status_proces + "\");' class = 'glyphicon glyphicon-remove-circle' > </a></td>";
                    body += "</tr>";
                    $("#tblTraslationList tbody").append(body);
                });

                $(document).ready(function () {
                    $('#tblTraslationList').DataTable();

                });

            }
        }
        ,
        error: function () {

        }


    })



}
function editTraslationDirectorCrs(idTraslation, status_proccess) {
    if (status_proccess == 'Inicio') {
        var formulario = $('#TraslationEdit');
        var dat = {
            "Traslation": 'editTraslationDirectorCrs',
            "idTraslation": idTraslation,
            "btnmove": 'current'
        };
        $.ajax({
            data: dat,
            url: './Controller/TraslationController.php',
            type: "POST",
            dataType: 'JSON',
            beforeSend: function () {

            },
            success: function (result) {
                /********
                 * trasl_id
                 * crs_source
                 * crs_destination
                 * trasl_date_request
                 * usr_name
                 * usr_lasname
                 * trasl_observations
                 * trasl_path
                 * prison_per_id
                 * prison_per_identification
                 * prison_per_name
                 * prison_per_lastname
                 * prison_per_observations
                 *
                 *
                 */
                if (result[0]['success']) {
                    formulario.find("#idTraslationEdit").val(result[0]['trasl_id']);
                    formulario.find("#txt_date_request_traslation-edit").val(result[0]['trasl_date_request']);
                    formulario.find("#trasl_descripcion_edit").val(result[0]['trasl_observations']);
                    $("#tblpplEdit tbody").empty();
                    if (!(result[0]['prison_per_identification'] == '')) {
                        $.each(result, function (i, data) {
                            var body = "<tr>";
                            body += "<td>" + data.prison_per_identification + "</td>";
                            body += "<td>" + data.prison_per_name + "</td>";
                            body += "<td>" + data.prison_per_lastname + "</td>";
                            body += "</tr>";
                            $("#tblpplEdit tbody").append(body);
                        });
                    }


                    $('#TraslationEdit').modal('show');

                } else {
                    alert('Hubo un error al Editar  el Traslado');
                }
            },
            error: function (result) {
                alert('ERROR AL CONECTAR LA BASE DE DATOS"');
            }

        });

    } else
    {

        alert('El Traslado solo se puede Editar si esta en estado de Inicio');
    }


}
function viewTraslationDirectorCrs(idTraslation, crs_id) {
    var formulario = $('#fmrViewTraslation');
    var dat = {
        "Traslation": 'editTraslationDirectorCrs',
        "idTraslation": idTraslation,
        "id_crs": crs_id,
        "btnmove": 'current'
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
                formulario.find("#idTraslationView").val(result[0]['trasl_id']);
                formulario.find("#trasl_type_iew").val(result[0]['trasl_type_descripcion']);
                formulario.find("#txt_date_request_view").val(result[0]['trasl_date_request']);
                formulario.find("#crs_id_destinationView").val(result[0]['crs_destination']);
                formulario.find("#trasl_descripcion_view").val(result[0]['trasl_observations']);
                $("#tblpplView tbody").empty();
                ;
                $.each(result, function (i, data) {
                    var body = "<tr>";
                    body += "<td>" + data.prison_per_identification + "</td>";
                    body += "<td>" + data.prison_per_name + "</td>";
                    body += "<td>" + data.prison_per_lastname + "</td>";
                    body += "</tr>";
                    $("#tblpplView tbody").append(body);
                });


                $('#TraslationView').modal('show');

            } else {
                alert('Hubo un error al Editar  el Traslado');
            }
        },
        error: function (result) {
            alert('ERROR AL CONECTAR LA BASE DE DATOS"');
        }

    });





}
function createAdnSendTraslation(user_id, crs_source_id, trasl_date_request) {
    //alert(  crs_source_id);
    var profile_id = $('#txtPrfle_id').val()
    var dat = {
        "Traslation": 'createTraslation',
        "user_id": user_id,
        "crs_source_id": crs_source_id,
        "trasl_date_request": trasl_date_request,
        "profile": profile_id
    };

    $.ajax({
        data: dat,
        url: './Controller/TraslationController.php',
        type: 'POST',
        dataType: 'JSON',
        beforeSend: function () {
            // alert('before');
        }
        ,
        success: function (result) {
            //alert(result['success']);
            if (result['success']) {
                lastRecord();
            }
        }
        ,
        error: function (jqXHR, exception) {
            alert('Error: ' + jqXHR.responseText);
        }
    })
}
function lastRecord() {
    var dat = {
        "Traslation": 'lastTraslation'
    };

    $.ajax({
        data: dat,
        url: './Controller/TraslationController.php',
        type: 'POST',
        dataType: 'JSON',
        beforeSend: function () {
            //  alert('before');
        }
        ,
        success: function (result) {

            if (result['success']) {
                //alert(result['trasl_id']);
                $("#idTraslation").val(result['trasl_id']);
                $("#tblppl tbody").empty();
                var crs_id = $('#crs_id').val();
                loadRecordTraslation('LastRecord', '', '', crs_id, '', type);

            }
        }
        ,
        error: function () {

        }
    })
}
function ifExistsPPL(trasl_details, id_traslation) {
    var dat = {
        "PrisionPerson": 'IF_Exist_PPL',
        "trasl_details": trasl_details

    };

    $.ajax({
        data: dat,
        url: './Controller/PrisonPersonController.php',
        type: 'POST',
        dataType: 'JSON',
        beforeSend: function () {
            $('#respuestaAjax').html('<img id="loader" src="./View/images/giphy.gif"/>');
        }
        ,
        success: function (result) {
            if (result['success']) {
                $('#respuestaAjax').html('');
                //var count = Object.keys(ppls).length;
                createTraslationDetails(trasl_details, id_traslation)


            }
        }
        ,
        error: function () {

        }
    })

}
function createTraslationDetails(trasl_details, id_traslation,obj_sent_mail) {
    var dat = {
        "TraslationDetails": 'createTraslationDetails',
        "trasl_details": trasl_details
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
            if (result['success']) {
                $('#respuestaAjax').html('');
                //var count = Object.keys(ppls).length;
                
                alert('' + result['nro'] + ': PPLs guardados en el Sistema de Traslados con Número: ' + id_traslation+'\n' + (obj_sent_mail.sendmail ? ' Y comunicado vía correo electrónico a '+obj_sent_mail.email : 'Problema al enviarel correo') );
                location.reload();


            }
        }
        ,
        error: function () {

        }
    })

}
function clearFields() {
    $('#tblppl tbody').empty();
    $('#trasl_type_id').val('0');
    $('#crs_id_destination').val('0');
    $('#trasl_descripcion').val('');
}
function validTablePPL(objtable) {
    var preparateinsertppl = false;
    objtable.each(function () {
        /*var textval0 = $(this).find("td").eq(0).find(":text").val();*/
        var textval0=$(this).find('td:eq(0)').text();
        if ((textval0 != undefined && textval0 != '')) {

            preparateinsertppl = true;

        }
    });

    if (!preparateinsertppl) {
        alert('Asegurese de que no exista campos vacios en la tabla de PPLs');
    }
    return preparateinsertppl;

}
function  deleteTraslationDialog(itTraslation, status_process) {
    if (status_process == 'Inicio') {
        var r = confirm("Está Seguro que desea eliminar  Traslado " + itTraslation);
        if (r == true) {
            deleteTraslation(itTraslation);

        } else {

        }
    } else
    {
        alert('El Traslado debe estar en Estado Inicio Para Eliminarlo');
    }


}
function deleteTraslation(itTraslation) {
    //alert(itTraslation);
    var dat = {
        "Traslation": 'deteteTraslation',
        "itTraslation": itTraslation
    };

    $.ajax({
        data: dat,
        url: './Controller/TraslationController.php',
        type: 'POST',
        dataType: 'JSON',
        beforeSend: function () {
            //  alert('before');
        }
        ,
        success: function (result) {
            if (result['success']) {
                alert(result['message']);
                location.reload();
            } else
            {
                alert(result['message']);
            }
        }
        ,
        error: function () {

        }
    })
}
function valid() {
    if (jQuery('#trasl_type_id').val() != 0 && jQuery('#trasl_descripcion').val() != '' && jQuery('#file_pdf').val() != '' && jQuery('#txt_date_request_traslation').val() != '')
    {

        return true;
    } else
    {

        alert('Todos lo campos son requeridos');
        return false;
    }
}

function loadRecordTraslation(bntMove, idTRaslation, status_proccess, id_crs, type) {

    var txtPrfle_id = $('#txtPrfle_id').val();
    //alert(txtPrfle_id);
    if (bntMove == 'LastRecord') {

        var formulario = $('#fmrCreateTraslation');
        var bar = $('#bar-status li');
        var dat = {
            "Traslation": 'editTraslationDirectorCrs',
            "idTraslation": idTRaslation,
            "id_crs": id_crs,
            "btnmove": bntMove
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

                    //alert(result[0]['success'])
                    statusBar(result);
                    $("#tblppl tbody").empty();
                    if (!(result[0]['prison_per_identification'] == ' ')) {
                        $.each(result, function (i, data) {

                            var body = "<tr>";
                            body += "<td>" + data.prison_per_identification + "</td>";
                            body += "<td>" + data.prison_per_name + "</td>";
                            body += "<td>" + data.prison_per_lastname + "</td>";
                            body += "<td>" + data.sex + "</td>";
                            body += "<td>" + data.prontuario + "</td>";                           
                            body += "<td>" + data.status_sgp + "</td>";
                            body += "</tr>";
                            $("#tblppl tbody").append(body);
                        });
                    }
                    enableDisableFields(result, formulario, txtPrfle_id);


                } else {
                    alert('Hubo un error al cargar  Traslado');
                }
            },
            error: function (result) {
                alert('ERROR AL CONECTAR LA BASE DE DATOS"');
            }

        });
    } else {

        var formulario = $('#fmrCreateTraslation');

        var dat = {
            "Traslation": 'editTraslationDirectorCrs',
            "idTraslation": idTRaslation,
            "id_crs": id_crs,
            "btnmove": bntMove
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
                    //alert(result[0]['prison_per_identification']);
                    //statusBar(result);
                    $("#tblppl tbody").empty();
                    if (!(result[0]['prison_per_identification'] == '')) {
                        $.each(result, function (i, data) {

                            var body = "<tr>";
                            body += "<td>" + data.prison_per_identification + "</td>";
                            body += "<td>" + data.prison_per_name + "</td>";
                            body += "<td>" + data.prison_per_lastname + "</td>";
                            body += "<td>" + data.sex + "</td>";
                            body += "<td>" + data.prontuario + "</td>";
                            body += "<td>" + data.id_sgp + "</td>";
                            body += "<td>" + data.status_sgp + "</td>";
                            body += "</tr>";
                            $("#tblppl tbody").append(body);
                        });
                    }
                    // enableDisableFields(result, formulario, txtPrfle_id, type);

                } else {
                    alert('Hubo un error al cargar  Traslado');
                }
            },
            error: function (result) {
                alert('ERROR AL CONECTAR LA BASE DE DATOS"');
            }

        });



    }


}

function loadRecordTraslationEdit(bntMove, idTRaslation, status_proccess, id_crs, type) {
    //alert(type)
    var txtPrfle_id = $('#txtPrfle_id').val();
    var formulario = $('#fmrEditTraslation');
    var dat = {
        "Traslation": 'editTraslationDirectorCrs',
        "idTraslation": idTRaslation,
        "id_crs": id_crs,
        "btnmove": bntMove
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
                //alert(result[0]['name_complete']);

                statusBar(result);
                $("#tblppl tbody").empty();
                if (!(result[0]['prison_per_identification'] == '')) {
                    $.each(result, function (i, data) {
                        var body = "<tr>";
                        body += "<td>" + data.prison_per_identification + "</td>";
                        body += "<td>" + data.prison_per_name + "</td>";
                        body += "<td>" + data.prison_per_lastname + "</td>";
                        body += "<td>" + data.sex + "</td>";
                        body += "<td>" + data.prontuario + "</td>";
                        body += "<td>" + data.id_sgp + "</td>";
                        body += "<td>" + data.status_sgp + "</td>";
                        body += "</tr>";
                        $("#tblppl tbody").append(body);
                    });
                }
                enableDisableFields(result, formulario, txtPrfle_id, type);

            } else {
                alert('Hubo un error al cargar  Traslado');
            }
        },
        error: function (result) {
            alert('ERROR AL CONECTAR LA BASE DE DATOS"');
        }

    });






}



function enableDisableFields(result, formulario, prfl, type) {

    /*Whether view director CRS*/
    if (result[0]['trasl_state_process'] != 'Inicio' && prfl == 3) {
        $("#btnAddIcon").show();
        $("#btnNewTraslation").show();

        $("#btnSent").show();
        $("#addRow").show();
        $('#bar-status').show();
        $('#btnSearch').show();
        $('#btnSearch2').hide();
        formulario.find("#btnSent").attr("disabled", true);
        $("#addRow").attr("disabled", true);//hidden=""
        formulario.find("#idTraslation").val(result[0]['trasl_id']);
        formulario.find("#idTraslation").attr("readonly", true);
        formulario.find("#txt_date_request_traslation").val(result[0]['trasl_date_request']);
        formulario.find("#txt_date_request_traslation").attr("readonly", true);
        formulario.find("#trasl_descripcion").val(result[0]['trasl_observations']);
        formulario.find("#trasl_descripcion").attr("readonly", true);
        formulario.find("#txt_trasl_type").val(result[0]['trasl_type_descripcion']);
        formulario.find("#txt_trasl_type").show();
        formulario.find("#txt_crs_id_destination").val(result[0]['crs_destination']);
        formulario.find("#txt_crs_id_destination").show();
        formulario.find("#crs_id_destination").hide();
        formulario.find("#trasl_type_id").hide();//
        formulario.find("#file_pdf").hide();
        formulario.find("#pdf_download_dir").attr("href", result[0]['trasl_path']);
        formulario.find("#pdf_download_dir").show();




    }
    if (result[0]['trasl_state_process'] == 'Inicio' && prfl == 3) {

        $("#btnAddIcon").show();
        $("#btnNewTraslation").show();

        $("#btnSent").show();
        $("#addRow").show();
        $('#bar-status').show();
        $('#btnSearch').show();
        $('#btnSearch2').hide();
        formulario.find("#btnSent").attr("disabled", false);
        $("#addRow").attr("disabled", false);//hidden=""
        $('#btnSearch').show;
        $('#btnSearch2').hide();
        formulario.find("#idTraslation").val(result[0]['trasl_id']);
        formulario.find("#idTraslation").attr("readonly", true);
        formulario.find("#txt_date_request_traslation").val(result[0]['trasl_date_request']);
        formulario.find("#txt_date_request_traslation").attr("readonly", false);
        formulario.find("#trasl_descripcion").val(result[0]['trasl_observations']);
        formulario.find("#trasl_descripcion").attr("readonly", false);
        formulario.find("#txt_trasl_type").hide();
        formulario.find("#txt_crs_id_destination").hide();
        formulario.find("#crs_id_destination").show();
        formulario.find("#trasl_type_id").show();//
        formulario.find("#file_pdf").show();
        formulario.find("#pdf_download_dir").attr("href", result[0]['trasl_path']);
        formulario.find("#pdf_download_dir").hide();
        formulario.find("#audit_usr").text('->' + result[0]['name_complete']);
        console.log(result[0]['name_complete']);
    }
    /*Whether view analyst profile*/
    if (result[0]['trasl_state_process'] != 'Inicio' && prfl == 2) {
        $("#btnAddIcon").hide;
        $("#btnNewTraslation").hide();
        $("#addRow").hide();
        $('#bar-status').show();
        $("#addRow").attr("disabled", true);//hidden=""
        $("#navegation-bar").hide();
        formulario.find("#idTraslation").val(result[0]['trasl_id']);
        formulario.find("#idTraslation").attr("readonly", true);
        formulario.find("#txt_date_request_traslEdit").val(result[0]['trasl_date_request']);
        formulario.find("#txt_date_request_traslEdit").attr("readonly", true);
        formulario.find("#trasl_descripcionEdit").val(result[0]['trasl_observations']);

        formulario.find("#txt_trasl_typeEdit").val(result[0]['trasl_type_descripcion']);

        if (type == 2 || type == 3) {
            if (result[0]['crs_destination'] != ' ') {
                //alert(result[0]['crs_destination']);
                formulario.find("#txt_crs_id_destinationEdit").val(result[0]['crs_destination']);
                formulario.find("#txt_crs_id_destinationEdit").show();//ComoBox
                formulario.find("#crs_id_destinationEdit").hide();
            } else {
                formulario.find("#crs_id_destinationEdit").show();
                formulario.find("#txt_crs_id_destinationEdit").hide();//ComoBox
            }


        } else
        {

            formulario.find("#txt_crs_id_destination").val(result[0]['crs_destination']);
            formulario.find("#txt_crs_id_destination").show();
        }
        formulario.find("#file_pdf").hide();
        formulario.find("#pdf_download_dir").attr("href", result[0]['trasl_path']);
        formulario.find("#pdf_download_dir").show();
    }
}


function clearFields() {
    $("#tblppl tbody").empty();
    $("#btnAddIcon").hide();
    $("#btnNewTraslation").hide();
    var formulario = $('#fmrCreateTraslation');
    $("#btnSent").hide();
    $("#addRow").hide();
    $('#bar-status').hide();//btnSearch
    $('#btnSearch').hide();
    $('#btnSearch2').show();
    formulario.find("#idTraslation").val('');
    formulario.find("#idTraslation").attr("readonly", false);
    formulario.find("#txt_date_request_traslation").attr("readonly", false);
    formulario.find("#txt_date_request_traslation").val('');
    formulario.find("#trasl_descripcion").attr("readonly", false);
    formulario.find("#trasl_descripcion").val('');
    formulario.find("#txt_trasl_type").hide();
    formulario.find("#txt_crs_id_destination").hide();
    formulario.find("#txt_crs_id_destination").val('');
    formulario.find("#crs_id_destination").show();
    formulario.find("#trasl_type_id").show();
    formulario.find("#pdf_download_dir").attr("href", result[0]['trasl_path']);
    formulario.find("#pdf_download_dir").hide();


}

function reviewHistory(ppl_id, csr_id) {

    var dat = {
        "Traslation": 'reviewHistory',
        "ppl_id": ppl_id,
        "csr_id": csr_id

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
                alert(result['message']);

            }
        },
        error: function (result) {
            alert('ERROR AL CONECTAR LA BASE DE DATOS"');
        }

    });

}

function readMovesPPL(prontuario) {
    var dat = {
        "PrisonMove": 'PrisonMove',
        "prontuario":prontuario
    };

    $.ajax({
        data: dat,
        url: './Controller/PrisonMoveController.php',
        type: 'POST',
        dataType: 'JSON',
        beforeSend: function () {
            // alert('before');
            $("#tblHistoryMove tbody").empty();
        }
        ,
        success: function (result) {
            if (result[0]['success']) {
                $("#tblHistoryMove tbody").empty();
                $.each(result, function (i, data) {
                     /* date	number	crs_source	ubi_source	crs_destination	ubi_destination	funcionario */
                    var body = "<tr>";
                    body += "<td>" + data.date + "</td>";
                    body += "<td>" + data.number + "</td>";
                    body += "<td>" + data.crs_source + "</td>";
                    body += "<td>" + data.ubi_source + "</td>";
                    body += "<td>" + data.crs_destination + "</td>";
                    body += "<td>" + data.ubi_destination + "</td>";
                    body += "<td>" + data.funcionario + "</td>";
                    body += "</tr>";
                    $("#tblHistoryMove tbody").append(body);
                });
            }
        }
        ,
        error: function () {

        }
    })
}



