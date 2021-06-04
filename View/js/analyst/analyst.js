/* 
 * Global List Traslation Analist List
 */

function traslationListAnalyst(usr_id,type) {
//alert(crs_id);
    var dat = {
        "Traslation": 'TraslationListAnalyst',
        "usr_id": usr_id,
        "type":type
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
                    var body = "<tr>";
                    body += "<td><a href='./?page=CreateRequestTraslationView&type="+type+"&idTraslation="+ data.trasl_id +"'>"+data.trasl_id+"</a></td>";
                    body += "<td>" + data.crs_source + "</td>";
                    body += "<td>" + data.crs_destination + "</td>";
                    body += "<td>" + data.trasl_date_request + "</td>";
                    body += "<td>" + data.trasl_type_descripcion + "</td>";
                    body += "<td>" + data.trasl_state_process + "</td>";
                    body += "<td><button class='btn btn-info btn-xs' onclick='javascript:editTraslationAnalystNearFmly(" + data.trasl_id + "," + usr_id + ",\"" + data.trasl_state_process + "\")' >Analizar </button> </td>";

                    /* body += "<td>" + "<a href='javascript:deleteeditTraslationDirectorCrsDialog(" + data.trasl_id + ", \"" + data.trasl_date_request + "\" );' class = 'glyphicon glyphicon-remove-circle' > </a>" + "</td>";*/
                    body += "</tr>";
                    $("#tblTralationAnalyst tbody").append(body);
                });
                $(document).ready(function () {
                    $('#tblTralationAnalyst').DataTable();
                });
            }
        }
        ,
        error: function () {

        }
    })

}


/**********************   edit Traslation-PPL     **************************/

function editTraslationAnalystNearFmly(trasl_id, usr_id, status_process) {
    if (status_process == 'Enviado') {
        var formulario = $('#fmrEditTraslationAnalyst');
        var dat = {
            "Traslation": 'editTraslationAnalyst',
            "idTraslation": trasl_id,
            "usr_id": usr_id
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
                    /*
                     trasl_id	crs_source	
                     crs_destination	
                     trasl_type_descripcion	
                     trasl_date_request	
                     usr_name	
                     usr_lasname	
                     trasl_descripcion	
                     trasl_path	
                     prison_per_id	
                     prison_per_identification	
                     prison_per_name	
                     prison_per_lastname	
                     prison_per_observations
                     **/


                    formulario.find("#idTraslation").val(result[0]['trasl_id']);
                    formulario.find("#CplSource").val(result[0]['crs_source']);
                    formulario.find("#CplDestination").val(result[0]['crs_destination']);
                    formulario.find("#DirectorName").val(result[0]['usr_name'] + ' ' + result[0]['usr_lasname']);
                    formulario.find("#obsevationAbalyst").val(result[0]['trasl_observations']);
                    formulario.find("#pdf_download_dir").attr("href", result[0]['trasl_path']);
                    formulario.find("#trasl_date_request").val(result[0]['trasl_date_request']);
                    formulario.find("#trasl_descripcion").val(result[0]['trasl_descripcion']);

                    /*****************Load PPL table*********************************************************/
                    $("#tblpplAnalyst tbody").empty();
                    $.each(result, function (i, data) {
                        //alert( data.prison_per_lastname);
                        var body = "<tr>";
                        body += "<td hidden><input type ='text' value='" + data.prison_per_id + "' /></td>";
                        body += "<td>" + data.prison_per_identification + "</td>";
                        body += "<td>" + data.prison_per_name + "</td>";
                        body += "<td>" + data.prison_per_lastname + "</td>";
                        body += "<td><input type = 'text' value='" + data.prison_per_observations + "' /></td>";
                        body += "<td>" + "<a href='javascript:loadPfPPL(" + data.prison_per_id + ");' class='glyphicon glyphicon-edit'>Agregar Certificado Pdf</a>" + "</td>";
                        /*body += "<td>" + "<a href='javascript:deletePPLDialog(" + data.prison_per_id + ", \"" + data.prison_per_lastname + "\" );' class = 'glyphicon glyphicon-remove-circle' > </a>" + "</td>";*/
                        body += "</tr>";
                        $("#tblpplAnalyst tbody").append(body);
                    });

                    $('#traslationAnalystNearFmly').modal('show');


                } else {
                    alert('Hubo un error al Editar  el Traslado');
                }
            },
            error: function (result) {
                alert('ERROR AL CONECTAR LA BASE DE DATOS"');
            }

        });
    }
    else
    {
        alert('El Traslado debe estar en Estado de Revisión ');
    }




}



/**********************   call PPL for Pdf Load     **************************/
function loadPfPPL(id_ppl) {

    var formulario = $('#fmrloadPdfPPL');
    var dat = {
        "PrisionPerson": 'callPPL',
        "id_ppl": id_ppl,
        "btnmove": 'current'
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
                $("#tblpplDocument tbody").empty();
                /*
                 * prison_per_id	
                 * prison_per_name	
                 * prison_per_lastname	
                 * file_id	
                 * file_path	
                 * file_description_name
                 * 
                 */
                if (result[0]['file_id'] != ' ') {
                    $.each(result, function (i, data) {
                        //alert( data.prison_per_lastname);
                        var body = "<tr>";
                        body += "<td hidden><input type ='text' value='" + data.file_id + "' /></td>";
                        body += "<td>" + data.file_description_name + "</td>";
                        body += "<td><a id=\"pdf_download_dir\" href=\"" + data.file_path + "\" download=\"certificado-desde-crs.pdf\">Documento.pdf [66kb]<img src=\"./View/images/icons/internet-download-symbol.png\"></a></td>";
                        body += "<td>" + "<a href='javascript:deleteDocument(" + data.file_id + ","+ id_ppl+ ");' class='glyphicon glyphicon-edit'>Eliminar</a>" + "</td>";
                        /*body += "<td>" + "<a href='javascript:deletePPLDialog(" + data.prison_per_id + ", \"" + data.prison_per_lastname + "\" );' class = 'glyphicon glyphicon-remove-circle' > </a>" + "</td>";*/
                        body += "</tr>";
                        $("#tblpplDocument tbody").append(body);
                    });
                }

                $('#modal_ppl_load_pdf').modal('show');

            } else {
                alert('Hubo un error al buscar PPL');
            }
        },
        error: function (result) {
            alert('ERROR AL CONECTAR LA BASE DE DATOS"');
        }

    });






}



function sendToDirector() {
    usr_id_analyst = $('#txtIdUser').val();
    var trasl_id = $('#idTraslation').val();
    var obsAnalys = $('#obsevationAbalyst').val();
    var trasl_director_assigned = $('#trasl_director_assigned').val();
    var dat = {
        "Traslation": 'updateTraslationAnalyst',
        "idTraslation": trasl_id,
        "obsAnalys": obsAnalys,
        "trasl_director_assigned": trasl_director_assigned,
        "user_id": usr_id_analyst


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
            if (result['success']) {
                $("#tblpplAnalyst tbody tr").each(function () {
                    var idppl = $(this).find("td").eq(0).find(":text").val();
                    var obs = $(this).find("td").eq(4).find(":text").val();
                    updatePPLObservations(idppl, obs);
                });
                $('#respuestaAjax').html('');

                alert('Datos Guardados Satisfactoriamente');
                $('#traslationAnalystNearFmly').modal('hide');
                location.reload();

            }
            else {
                alert('Hubo un error al Guardar  el Traslado');
            }

        },
        error: function (result) {
            alert('ERROR AL CONECTAR LA BASE DE DATOS"');
        }


    });




}



function updatePPLObservations(id_ppl, observations) {

    var dat = {
        "PrisionPerson": 'updatePPL',
        "idppl": id_ppl,
        "observations": observations
    };


    $.ajax({
        data: dat,
        url: './Controller/PrisonPersonController.php',
        type: 'POST',
        dataType: 'JSON',
        beforeSend: function () {


        }
        ,
        success: function (result) {
            if (result['success']) {
                console.log('ppl actualizado');
            }
        }
        ,
        error: function () {

        }
    })

}


function setDirectionAssigned(user_id) {

    var dat = {
        "DirectionArea": 'loadDirecctionAssigned',
        "user_id":user_id
    };

    $.ajax({
        data: dat,
        url: './Controller/DirectionAreaController.php',
        type: 'POST',
        dataType: 'JSON',
        beforeSend: function () {
            //  alert('before');
        }
        ,
        success: function (result) {
            var formulario = $('#fmrEditTraslationAnalyst');
            if (result['success']) {
                formulario.find("#trasl_director_assigned").val(result['area_id']);
                formulario.find("#area_desription").val(result['area_desription']);
                formulario.find("#directorsPltaCtrl").val(result['usr_name'] + ' ' + result['usr_lasname']);

            }
            else
            {
                alert('Hay Un problema con la Dirección');
            }
        }
        ,
        error: function () {

        }
    })
}

function deleteDocument(idDoc,idPPL) {
    var r = confirm("Está Seguro que desea eliminar este Documento! ");
    if (r == true) {
        var dat = {
            "FileDocument": 'DeleteDocument',
            "idDoc": idDoc
        };


        $.ajax({
            data: dat,
            url: './Controller/FilleDocumentController.php',
            type: 'POST',
            dataType: 'JSON',
            beforeSend: function () {


            }
            ,
            success: function (result) {
                if (result['success']) {
                    alert(result['message']);
                    loadPfPPL(idPPL);
                    //$('#modal_ppl_load_pdf').hide();
                }
            }
            ,
            error: function () {

            }
        })

    }

}

