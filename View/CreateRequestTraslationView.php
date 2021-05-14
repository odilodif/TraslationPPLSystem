
<!-- Font Awesome -->
<link rel="stylesheet" href="./View/bower_components/font-awesome/css/font-awesome.min.css">
<link rel="stylesheet" href="./View/bower_components/Ionicons/css/ionicons.min.css">
<link rel="stylesheet" href="./View/css/traslationxsecurityForm.css">
<link href="./View/css/createrequesttraslation.css" rel="stylesheet" type="text/css"/>
<link rel="stylesheet" href="./View/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">

<script src="./Utilitarian/js/utils.js" type="text/javascript"></script>
<script src="./View/js/director/director.js" type="text/javascript"></script>
<link href="./View/js/jquery-ui-1.12.1.custom/jquery-ui.css" rel="stylesheet" type="text/css"/>
<link href="./View/js/jquery-ui-1.12.1.custom/jquery-ui.css" rel="stylesheet" type="text/css"/>
<script src="./View/js/jquery-ui-1.12.1.custom/jquery-ui.js" type="text/javascript"></script>
<!--Style Modal-->
<style>
    body {font-family: Arial, Helvetica, sans-serif;}

    /* The Modal (background) */
    .modal {
        display: none; /* Hidden by default */
        position: fixed; /* Stay in place */
        z-index: 1; /* Sit on top */
        padding-top: 100px; /* Location of the box */
        left: 0;
        top: 0;
        width: 100%; /* Full width */
        height: 100%; /* Full height */
        overflow: auto; /* Enable scroll if needed */
        background-color: rgb(0,0,0); /* Fallback color */
        background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
    }

    /* Modal Content */
    .modal-content {
        background-color: #fefefe;
        margin-left:242px;
        padding: 20px;
        border: 1px solid #888;
        width: 81%;
        height: 346px;
    }

    /* The Close Button */
    .close {
        color: #aaaaaa;
        float: right;
        font-size: 28px;
        font-weight: bold;
    }

    .close:hover,
    .close:focus {
        color: #000;
        text-decoration: none;
        cursor: pointer;
    }
</style>
<!-- Page Heading -->

<div align="center" id="navegation-bar">
    <button id="btnFirstRecord">
        <li>
            <span class="glyphicon glyphicon-step-backward" aria-hidden="true"></span>
            <span class="glyphicon-class">Primer </span>
        </li>
    </button>
    <button id="btnBackwardRecord">
        <li>
            <span class="glyphicon glyphicon-fast-backward" aria-hidden="true"></span>
            <span class="glyphicon-class">Anterior</span>
        </li>
    </button>
    <button id="btnForwardRecord">
        <li>
            <span class="glyphicon glyphicon-fast-forward" aria-hidden="true"id=""></span>
            <span class="glyphicon-class">Siguiente</span>
        </li>
    </button>
    <button id="btnLastRecord">
        <li>
            <span class="glyphicon glyphicon-step-forward" aria-hidden="true"></span>
            <span class="glyphicon-class">Ultimo</span>
        </li>
    </button>
</div>
<div id="respuestaAjax">


</div>
<form id="fmrCreateTraslation" action="" method="POST" enctype="multipart/form-data" style="margin: -2% auto;" class="scaled"  >

    <div class="" id="modalContenido">
        <ol class="breadcrumb">
            <li class="active">
                <!-- <button type="button" class="btn btn-info btn-xs" id="btnSaveTraslation">Guardar</button>  -->
                <i class="fa fa-dashboard"></i> <img src="./View/images/auction.png"  style="height:2%;width: 2%" /> Crear Solicitud de Traslado PPL <small>Sistema de Traslados   </small>
                <a href='javascript:clearFields();' class='glyphicon glyphicon-search' id="btnSearch"  ><span class="glyphicon glyphicon-search" aria-hidden="true"></span><b>Buscar</b></a>
                <a href='#' class='glyphicon glyphicon-search' id="btnSearch2" style="display: none"><span class="glyphicon glyphicon-search" ></span><b>Buscando</b></a>
                <a href='javascript:show_form_income();' class='glyphicon glyphicon-plus' id="btnAddIcon"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span><b>Añadir</b></a>
                <a  class='glyphicon glyphicon-new-window' id="btnNewTraslation" ><span class="glyphicon glyphicon-new-window" aria-hidden="true"></span><b>Nuevo</b></a>

            </li>
        </ol>
        <div class="">
            <div class="">
                <div align="center">
                    <div class="">
                        <div id="nav-bar">
                            <ul id="bar-status">
                                <li><a href="#" id="status_start" value="Inicio">Inicio</a></li>
                                <li><a href="#" id="status_sent" value="Enviado">Enviado</a></li>
                                <li><a href="#" id="status_revision" value="Revisión">Revision</a></li>
                                <li><a href="#" id="status_approved" value="Aprobado">Aprobado</a></li>
                                <li><a href="#" id="status_executed" value="Autorizado">Autorizado</a></li>
                                <li><a href="#" id="status_closed" value="Ejecutado">Finalizado</a></li>
                            </ul>
                        </div>
                    </div>


                </div>


            </div>
            <fieldset><legend></legend>
                <div class="row no-padding" style="margin-left: 5px;">

                    <div class="col-md-1" >
                        <label>Nro. Solicitud</label>
                    </div>
                    <label class="input col-md-4" style="margin-left: 5px;"   >

                        <td><input type="text" id="idTraslation"  name="idTraslation" readonly="" style="color:red"/></td>
                    </label>

                    <div class="col-md-1" >

                    </div>
                    <label class="input col-md-4" style="margin-left: 5px;" >

                    </label>

                </div>
                <div class="row no-padding" style="margin-left: 5px;">

                    <div class="col-md-1" >
                        <label>Tipo de Traslado</label>
                    </div>
                    <div>
                        <label class="input col-md-4" style="margin-left: 5px;">
                            <input type="text" id="txt_trasl_type"  name="trasl_type_iew" readonly="" hidden="" />
                            <select id="trasl_type_id" name="trasl_type_id" required="" >
                                <option value="0">Selecionar Tipo de Traslados </option>
                            </select>
                        </label>
                    </div>
                    <div class="col-md-1" >

                    </div>
                    <div>
                        <label class="input col-md-4" style="margin-left: 5px;" >
                            <input  id="txt_date_request_traslation" name="txt_date_request_traslation" type="date" value="" required="">
                        </label>
                    </div>

                </div>
                <div class="row no-padding" style="margin-left: 5px;">
                    <div class="col-md-1" >
                        <label>CPL Destino</label>
                    </div>
                    <div>
                        <label class="input col-md-4" style="margin-left: 5px;" >
                            <input  id="txt_crs_id_destination" name="txt_crs_id_destination" type="text" value="" readonly="" hidden="">
                            <select id="crs_id_destination" name="crs_id_destination"  >
                                <option value="0">Selecionar Crs </option>
                            </select>
                        </label>
                    </div>
                    <div class="col-md-1" >

                    </div>
                    <div>
                        <label class="input col-md-4" style="margin-left: 5px;" >
                            <input type="text" id="trasl_descripcion" name="trasl_descripcion" style="width: 300px;" required="" placeholder="Comentario" />

                        </label>
                    </div>

                </div>
                <div class="row no-padding" style="margin-left: 5px;">
                    <div class="col-md-1" >
                        <label></label>
                    </div>
                    <div>
                        <label class="input col-md-4" style="margin-left: -41px;" >
                            <a id="pdf_download_dir" href="" download="certificado-desde-crs.pdf" hidden="" class="btn btn-primary pull-right" >Certificado Enviado desde Crs PDF<img src="./View/images/icons/internet-download-symbol.png" alt=""></a>
                            <input  type="file" id="file_pdf"  name="file_pdf" required="" style="margin-left: 44px;"/>
                        </label>
                    </div>
                </div>
            </fieldset>
        </div>
        <div id="mensaje"></div>

        <br />
        <div id="contenidoRegistro"></div>
        <div class="" style="text-align: right;">
            <input type="submit" name="btnSent" id="btnSent" class="btn btn-success btn-xs" value="Enviar"/>
        </div>
    </div>
</form>
<form id="fmrEditTraslation" action="" method="POST" enctype="multipart/form-data" style="margin: 2% auto;" hidden="" class="scaled">

    <div class="" id="">
        <div class="modal-body">
            <div class="">
                <div align="center">
                    <div class="">
                        <div id="nav-bar">
                            <ul id="bar-status">
                                <li><a href="#" id="status_start" value="Inicio">Inicio</a></li>
                                <li><a href="#" id="status_sent" value="Enviado">Enviado</a></li>
                                <li><a href="#" id="status_revision" value="Revisión">Revision</a></li>
                                <li><a href="#" id="status_approved" value="Aprobado">Aprobado</a></li>
                                <li><a href="#" id="status_executed" value="Autorizado">Autorizado</a></li>
                                <li><a href="#" id="status_closed" value="Ejecutado">Finalizado</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row no-padding" style="margin-left: 5px;">
                <div class="col col-lg-12" style="margin-left: 5px;" id="idTxtNombreEdit">
                    <div class="col-md-1" >
                        <label>Nro. Solicitud</label>
                    </div>
                    <label class="input col-md-4" style="margin-left: 5px;"   >

                        <td><input type="text" id="idTraslation"  name="idTraslationEdit"  readonly="" style="color:red"/></td>
                    </label>

                    <div class="col-md-1" >

                    </div>
                    <label class="input col-md-4" style="margin-left: 5px;" >

                    </label>
                </div>
            </div>
            <div class="row no-padding" style="margin-left: 5px;">
                <div class="col col-lg-12" style="margin-left: 5px;" id="idTxtNombre">
                    <div class="col-md-1" >
                        <label>Tipo de Traslado</label>
                    </div>
                    <label class="input col-md-4" style="margin-left: 5px;"   >
                        <input type="text" id="txt_trasl_typeEdit"  name="trasl_type_iew" readonly />

                    </label>

                    <div class="col-md-1" >
                        <label>Fecha</label>
                    </div>
                    <label class="input col-md-4" style="margin-left: 5px;" >
                        <input  id="txt_date_request_traslEdit" name="txt_date_request_traslEdit" type="date" readonly="">
                    </label>
                </div>
            </div>
            <div class="row no-padding" style="margin-left: 5px;">
                <div class="col col-lg-12" style="margin-left: 5px;">
                    <div class="col-md-1" >
                        <label>CPL Destino</label>
                    </div>
                    <label class="input col-md-4" style="margin-left: 5px;" >
                        <input  id="txt_crs_id_destinationEdit" name="txt_crs_id_destinationEdit" type="text" value="" readonly="" hidden="">
                        <select id="crs_id_destinationEdit" name="crs_id_destinationEdit" required="" >
                            <option value="0">Selecionar Crs </option>
                        </select>
                    </label>

                    <div class="col-md-1" >
                        <label>Comentario</label>
                    </div>
                    <label class="input col-md-4" style="margin-left: 15px;" >
                        <input type="text" id="trasl_descripcionEdit" name="trasl_descripcionEdit" style="width: 300px;" readonly="" />

                    </label>


                </div>
            </div>
            <div class="row no-padding" style="margin-left: 5px;">
                <div class="col col-lg-12" style="margin-left: 5px;">
                    <div class="col-md-1" >
                        <label>Archivos Adjuntos</label>
                    </div>
                    <label class="input col-md-4" style="margin-left: -41px;" >
                        <a id="pdf_download_dir" href="" download="certificado-desde-crs.pdf" hidden="" class="btn btn-primary pull-right" >Certificado Enviado desde Crs PDF<img src="./View/images/icons/internet-download-symbol.png" alt=""></a>

                    </label>

                    <div class="col-md-1" >
                        <label></label>
                    </div>
                    <label class="input col-md-4" style="margin-left: 5px;" >

                    </label>
                </div>
            </div>

        </div>
        <div id="mensaje"></div>

        <br />
        <div id="contenidoRegistro"></div>
        <div class="" style="text-align: right;">
            <input type="submit" name="btnEdit" id="btnEdit" class="btn btn-success btn-xs" value="Guardar"/>
        </div>
    </div>
</form>

<!-- Trigger/Open The Modal -->
<button id="myBtn">Buscar PPL</button>
<!-- Table Content PPL -->
<div style="width:auto; height: auto; overflow-y: scroll;">
    <table border="1" id="tblppl" class="display" style="width:100%;font-size: 10px;">
        <thead>
            <tr>
                <th>Identificacion</th><th>Nombres</th><th>Apellidos</th><th>Sexo</th><th>Prontuario</th><th>Nro</th><th>Estado</th>
            </tr>
        </thead>

        <tbody >

        </tbody>

    </table>


</div>
<!--modal add PPL-->
<div class="">
    <!-- The Modal -->
    <div id="myModal" class="modal">
        <!-- Modal content -->
        <div class="modal-content">
            <span class="close">&times;</span>
            <div class=" col-md-6">
                <!--<button id="addRow"  class="btn btn-info btn-xs" style="text-align: left;" >Añadir PPL</button> <div id="resultID"></div>-->
                <button id="AddPPL"  class="btn btn-info btn-xs" style="text-align: left;" >Añadir PPL</button>
                <div style="width:auto; height: 70px; overflow-y: scroll;">
                    <table border="1" id="tblppl2" class="display" style="width:100%;font-size: 10px;">
                        <thead>
                            <tr>
                                <th>Identificacion</th><th>Nombres</th><th>Apellidos</th><th>Sexo</th><th>Prontuario</th><th>Nro</th><th>Estado</th>
                            </tr>
                        </thead>

                        <tbody >

                        </tbody>

                    </table>


                </div>
            </div>
            <div class="  col-md-4">
                <!-- Historial-->
                <div style="width:auto; height: 100px; overflow-y: scroll;">



                </div>
            </div>
        </div>

    </div>
</div>
<!--Ready Document Load make functions-->
<script>
    $(document).ready(function () {
        var crs_id = '<?php echo "" . $_SESSION['_USU'][0]['crs_id']; ?>';
        console.log(crs_id);
        var type = '<?php echo"" . (isset($_GET['type'])) ? $_GET['type'] : " " ?>';
        /*Edit Taslation from table with $_GET*/
        var getIdTraslation = '<?php echo"" . (isset($_GET['idTraslation'])) ? $_GET['idTraslation'] : " " ?>';
        //alert(getIdTraslation);
        if (getIdTraslation != ' ') {
            $('#fmrEditTraslation').show();
            $('#fmrCreateTraslation').hide();
            var id_traslation = getIdTraslation;
            //loadRecordTraslationEdit('out_crs', id_traslation, '', '', type);
        } else
        {
            loadRecordTraslation('LastRecord', '', '', crs_id, '', type);
        }

        loadComboboxTraslationType();
        loadComboboxCrs();

        // loadCrsSgp();
        var $table = $("#tblppl");
        var $tableBody = $("tbody", $table);
        $('#addRow').on('click', function () {

            var newtr = $('<tr><td><input type="text" class="description" style="border: 0;" name="" /></td><td></td><td></td><td></td><td></td><td></td><td></td></tr>');
            $('.description', newtr).autocomplete(autocomp_opt);
            $tableBody.append(newtr);
            //var id_traslation = $('#idTraslation').val();
        });//btnAddIcon

        $('#btnAddIcon').on('click', function () {

            var newtr = $('<tr><td><input type="text" class="description" style="border: 0;" name="" /></td><td></td><td></td><td></td><td></td><td></td><td></td></tr>');
            $('.description', newtr).autocomplete(autocomp_opt);
            $tableBody.append(newtr);
            //var id_traslation = $('#idTraslation').val();
        });

        var autocomp_opt = {
            source: function (request, response) {
                $.ajax({
                    url: "./Controller/PrisonPersonController.php",
                    dataType: "json",
                    type: "post",
                    data: {
                        maxRows: 15,
                        term: request.term
                    },
                    success: function (data) {

                        response($.map(data, function (item) {
                            return {
                                label: item.prison_per_identification + '-> ' + item.prison_per_name + ' ' + item.prison_per_lastname,
                                value: item.prison_per_identification,
                                prison_per_id: item.prison_per_id,
                                prison_per_name: item.prison_per_name,
                                prison_per_lastname: item.prison_per_lastname,
                                prison_per_identification: item.prison_per_identification,
                                prison_per_sex: item.prison_per_sex,
                                prison_per_prontuario: item.prison_per_prontuario,
                                prison_per_state: item.prison_per_state

                            }
                        }))
                    }
                })
            },
            minLength: 1,
            select: function (event, ui) {

                if ($('#crs_id_destination').val() != 0) {
                    var crs_id = $('#crs_id_destination').val();
                    /*  reviewHistory(crs_id, ui.item.prison_per_id);*/
                    var tr = $(this).closest('tr');
                    $(tr).find('td:eq(1)').text(ui.item.prison_per_name);
                    $(tr).find('td:eq(2)').text(ui.item.prison_per_lastname);
                    $(tr).find('td:eq(3)').text(ui.item.prison_per_sex);
                    $(tr).find('td:eq(4)').text(ui.item.prison_per_prontuario);
                    $(tr).find('td:eq(5)').text(ui.item.prison_per_id);
                    $(tr).find('td:eq(6)').text(ui.item.prison_per_state);
                } else
                {
                    if ($('#trasl_type_id').val() == 2 || $('#trasl_type_id').val() == 3) {
                        var tr = $(this).closest('tr');
                        $(tr).find('td:eq(1)').text(ui.item.prison_per_name);
                        $(tr).find('td:eq(2)').text(ui.item.prison_per_lastname);
                        $(tr).find('td:eq(3)').text(ui.item.prison_per_sex);
                        $(tr).find('td:eq(4)').text(ui.item.prison_per_prontuario);
                        $(tr).find('td:eq(5)').text(ui.item.prison_per_id);
                        $(tr).find('td:eq(6)').text(ui.item.prison_per_state);
                    } else {
                        alert('Favor elija un Centro antes de agregar PPL');
                        location.reload();
                    }

                }


            }
        };


        $("#btnNewTraslation").click(function () {
            var user_id = '<?php echo "" . $_SESSION['_USU'][0]['usr_id']; ?>';
            var crs_source_id = '<?php echo "" . $_SESSION['_USU'][0]['crs_id']; ?>';
            createAdnSendTraslation(user_id, crs_source_id, dateSystem());
        });
        /*Preview*/
        $("#btnBackwardRecord").click(function () {
            var user_id = '<?php echo "" . $_SESSION['_USU'][0]['usr_id']; ?>';
            var crs_id = '<?php echo "" . $_SESSION['_USU'][0]['crs_id']; ?>';
            var id_traslation = $('#idTraslation').val();
            loadRecordTraslation('Backward', id_traslation, '', crs_id, type);
        });//btnForwardRecord

        $("#btnForwardRecord").click(function () {
            var user_id = '<?php echo "" . $_SESSION['_USU'][0]['usr_id']; ?>';
            var crs_source_id = '<?php echo "" . $_SESSION['_USU'][0]['crs_id']; ?>';
            var id_traslation = $('#idTraslation').val();
            loadRecordTraslation('Forward', id_traslation, '', crs_source_id, type);
        });//btnLastRecord


        $("#btnLastRecord").click(function () {
            var user_id = '<?php echo "" . $_SESSION['_USU'][0]['usr_id']; ?>';
            var crs_source_id = '<?php echo "" . $_SESSION['_USU'][0]['crs_id']; ?>';
            var id_traslation = $('#idTraslation').val();
            loadRecordTraslation('LastRecord', '', '', crs_source_id);
        });

        $("#btnFirstRecord").click(function () {
            var user_id = '<?php echo "" . $_SESSION['_USU'][0]['usr_id']; ?>';
            var crs_source_id = '<?php echo "" . $_SESSION['_USU'][0]['crs_id']; ?>';
            var id_traslation = $('#idTraslation').val();
            loadRecordTraslation('First', '', '', crs_source_id, type);
        });

        $("#btnSearch2").click(function () {
            var user_id = '<?php echo "" . $_SESSION['_USU'][0]['usr_id']; ?>';
            var crs_source_id = '<?php echo "" . $_SESSION['_USU'][0]['crs_id']; ?>';
            var id_traslation = $('#idTraslation').val();
            loadRecordTraslation('current', id_traslation, '', crs_source_id, type);
            //bntMove, idTRaslation, status_proccess, id_crs
        });
    });

    $(document).ready(function (e) {
        $("#fmrCreateTraslation").on('submit', function (e) {
            e.preventDefault();
            var objTable = $('#tblppl tbody tr');
            if (valid() && validTablePPL(objTable)) {

                $.ajax({
                    url: './Controller/TraslationController.php',
                    type: "POST",
                    data: new FormData(this),
                    contentType: false,
                    cache: false,
                    processData: false,
                    beforeSend: function ()
                    {
                        $('#waiting').modal('show');
                    },
                    success: function (result) { //console.log(response);
                $('#waiting').modal('hide');
                        var obj = JSON.parse(result);
                        if (obj.success) {
                            //alert();
                            $('#waiting').modal('hide');
                            var id_traslation = $('#idTraslation').val();
                            var i = 0;
                            var rowCount = $('#tblppl tr').length;
                            var jsonObj = [];
                            $("#tblppl tbody tr").each(function () {
                                var col0 = $(this).find("td").eq(0).find(":text").val();
                                var col1 = $(this).find('td:eq(1)').text();
                                var col2 = $(this).find('td:eq(2)').text();
                                var col3 = $(this).find('td:eq(3)').text();
                                var col4 = $(this).find('td:eq(4)').text();
                                var col5 = $(this).find('td:eq(5)').text();
                                var col6 = $(this).find('td:eq(6)').text();
                                /*trasl_id,prison_per_id,trasl_det_status*/
                                if ((col0 != undefined && col0 != '')) {
                                    jsonObj.push({"identification": col0, "trasl_id": id_traslation, "name": col1, "last_name": col2, "sex": col3, "prontuario": col4, "prison_per_id": col5, "status_sgp": col6});
                                }
                                /*else {
                                 alert('Asegurese de que no exista campos vacios en la tabla de PPLs');
                                 }*/

                                i++;
                            });
                            ifExistsPPL(jsonObj, id_traslation);
                            /* createTraslationDetails(jsonObj, id_traslation);*/

                        } else
                        {
                            alert(obj.message);
                        }

                    }
                });

            }

        });



        $("#file_pdf").change(function () {
            var file = this.files[0];
            var fileType = file.type;
            var match = ['application/pdf'];
            if (!((fileType == match[0]))) {
                alert('Asegúrese, que sea documentos PDF ');
                alert('Vuelva  a Cargar el Archivo');
                $("#file").val('');
                return false;
            }
        });
    });

    $(document).ready(function (e) {
        $("#fmrEditTraslation").on('submit', function (e) {
            e.preventDefault();
            $.ajax({
                url: './Controller/TraslationController.php',
                type: "POST",
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                beforeSend: function ()
                {


                },
                success: function (result) { //console.log(response);
                    var obj = JSON.parse(result);
                    if (obj.success) {
                        alert(obj.message);
                        location.reload();
                    } else
                    {
                        alert(obj.message);
                    }

                }
            });



        });
    });

    $(document).ready(function () {
        $("#trasl_type_id").on('change', function () {
            $("#trasl_type_id option:selected").each(function () {
                var selected = $(this).val();
                if (selected == 3 || selected == 2) {
                    $('#crs_id_destination').hide();
                } else
                {
                    $('#crs_id_destination').show();
                }

            });
        });
        $("#crs_id_destination").on('change', function () {
            $("#crs_id_destination option:selected").each(function () {
                var crs_id = $('#crs_id').val();
                var selected = $(this).val();
                if (selected == crs_id) {
                    alert('No puede hacer traslado al mismo centro!!! ');
                    location.reload();
                }

            });
        });
    });
</script>
<!--Events Modal-->
<script>
// Get the modal
    var modal = document.getElementById("myModal");

// Get the button that opens the modal
    var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal
    btn.onclick = function () {
        modal.style.display = "block";

    }

// When the user clicks on <span> (x), close the modal
    span.onclick = function () {
        modal.style.display = "none";
    }

// When the user clicks anywhere outside of the modal, close it
    window.onclick = function (event) {
        if (event.target == modal) {
            //  modal.style.display = "none";
        }
    }
</script>