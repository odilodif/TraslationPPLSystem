
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


<script src="./View/js/ppl/ppl.js" type="text/javascript"></script>
<link rel="stylesheet" type="text/css" href="./View/css/datatables/dataTables.bootstrap.min.css">
<script src="./View/css/datatables/jquery.dataTables.min.js" type="text/javascript"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap.min.js" type="text/javascript"></script>

<!--Style Modal-->
<link href="./View/css/CreateResquestTraslationView/CreateRequestTraslationView.css" rel="stylesheet" type="text/css"/>

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
                <a href="" class='glyphicon glyphicon-new-window' id="btnNewTraslation" ><span class="glyphicon glyphicon-new-window" aria-hidden="true"></span><b>Nuevo</b></a>

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
                        <label class=""  >
                            <a id="pdf_download_dir" href="" download="certificado-desde-crs.pdf" hidden="" class="btn btn-primary pull-right" >Certificado Enviado desde Crs PDF<img src="./View/images/icons/internet-download-symbol.png" alt=""></a>
                            <input  type="file" id="file_pdf"  name="file_pdf" required="" style="margin-left: 44px;"/>
                        </label>
                    </div>
                </div>
                <div class="row no-padding" style="margin-left: 5px;">
                    <div class="col-md-1" >
                        <label></label>
                    </div>
                    <div>
                        <label class="input col-md-4" style="margin-left: 5px;" >


                        </label>
                    </div>
                    <div class="col-md-1" >

                    </div>
                    <div>
                        <label class="input col-md-4" style="margin-left: 5px;" >
                            <label id="audit_usr"> </label>                          

                        </label>
                    </div>

                </div>
            </fieldset>
        </div>
        <div id="mensaje"></div>

        <br />
        <div id="contenidoRegistro"></div>
        <div class="" >
            <input type="submit" name="btnSent" id="btnSent" class="btn btn-success btn-xs" value="Enviar" style="font-size: 20px;"/>
        </div>
    </div>
</form>


<!-- Trigger/Open The Modal -->
<button id="btnSearching">Buscar PPL</button>
<!-- Table Content PPL -->
<div style="width:auto; height: auto; overflow-y: scroll;">
    <table border="1" id="tblppl" class="display" style="width:100%;font-size: 10px;">
        <thead>
            <tr>
                <th>Identificacion</th><th>Nombres</th><th>Apellidos</th><th>Sexo</th><th>Prontuario</th><th>Estado</th>
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
            <button id="AddPPL"  class="btn btn-info btn-xs" style="text-align: left;" >Añadir PPL</button>
            <span class="close">&times;</span>
            <div class="" id="content-btn-tbl">
                <!--<button id="addRow"  class="btn btn-info btn-xs" style="text-align: left;" >Añadir PPL</button> <div id="resultID"></div>-->

                <div class="" id="content-tbl">                             
                    <table id="tblPPLList" class="table table-striped table-bordered" style="width:96%;font-size: 10px">
                        <thead>
                            <tr>
                                <th>&nbsp;&nbsp;&nbsp;</th>
                                <th>Prontuario</th>
                                <th>Cédula</th>
                                <th>Nombres</th>
                                <th>Apellidos</th> 
                                <th>Estado</th>
                                <th>Centro</th>
                                <th>Sexo</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>

                    </table>

                </div>
                <div class="">
                    <!-- Historial-->
                    <label>Historial Traslados SGP</label>
                    <table id="tblHistoryMove" class="table table-striped table-bordered" style="width:100%;font-size: 10px">
                        <thead>
                            <tr>                                  
                                <th>Fecha</th>
                                <th>Numero</th>
                                <th>CentroOrigen</th>
                                <th>Ubi.Origen</th>
                                <th>CentroDestino</th> 
                                <th>Ubi.Destino</th>
                                <th>Funcionario</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>

                    </table>
                </div>
            </div>

        </div>

    </div>
</div>
<!--Ready Document Load make functions-->
<script>
    $(document).ready(function () {
        var crs_id = '<?php echo "" . $_SESSION['_USU'][0]['crs_id']; ?>';//Get Crs from Variable Sesion        
        var type = '<?php echo"" . (isset($_GET['type'])) ? $_GET['type'] : " " ?>';
        var getIdTraslation = '<?php echo"" . (isset($_GET['idTraslation'])) ? $_GET['idTraslation'] : " " ?>';//Edit Taslation from table with $_GET              
        if (getIdTraslation != ' ') {

            var id_traslation = getIdTraslation;
            loadRecordTraslation('current', id_traslation, '', crs_id, type);
        } else
        {
            loadRecordTraslation('LastRecord', '', '', crs_id, '', type);


        }

        loadComboboxTraslationType();
        loadComboboxCrs();

        // loadCrsSgp();
        var tblppl = $("#tblppl");
        var tblpplBody = $("tbody", tblppl);
        $('#AddPPL').on('click', function () {

            $("#tblPPLList tbody tr").each(function () {
                var checked = $(this).find('td:eq(0) input');
                if (checked.is(':checked')) {
                    var prontuario = $(this).find('td:eq(1)').text();
                    var cedula = $(this).find('td:eq(2)').text();
                    var nombres = $(this).find('td:eq(3)').text();
                    var apellidos = $(this).find('td:eq(4)').text();
                    var stateppl = $(this).find('td:eq(5)').text();
                    var crs = $(this).find('td:eq(6)').text();
                    var sex = $(this).find('td:eq(7)').text();
                    //alert(prontuario);
                    /*Identificacion,Nombres,Apellidos,Sexo,Prontuario,Estado*/
                    var bodyppl = "<tr>";
                    bodyppl += "<td>" + cedula + "</td>";
                    bodyppl += "<td>" + nombres + "</td>";
                    bodyppl += "<td>" + apellidos + "</td>";
                    bodyppl += "<td>" + sex + "</td>";
                    bodyppl += "<td>" + prontuario + "</td>";
                    bodyppl += "<td>" + stateppl + "</td>";
                    bodyppl += "</tr>";
                    $("#tblppl tbody").append(bodyppl);
                }

            });

            modal.style.display = "none";
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
        });


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
                        //alert();
                        var obj = JSON.parse(result);
                        if (obj.success) {
                            //alert();
                            $('#waiting').modal('hide');
                            var id_traslation = $('#idTraslation').val();
                            var i = 0;
                            var rowCount = $('#tblppl tr').length;
                            var jsonObj = [];
                            $("#tblppl tbody tr").each(function () {
                                var col0 = $(this).find('td:eq(0)').text();
                                var col1 = $(this).find('td:eq(1)').text();
                                var col2 = $(this).find('td:eq(2)').text();
                                var col3 = $(this).find('td:eq(3)').text();
                                var col4 = $(this).find('td:eq(4)').text();
                                var col5 = $(this).find('td:eq(5)').text();
                                var col6 = $(this).find('td:eq(6)').text();

                                if ((col0 != undefined && col0 != '')) {
                                    jsonObj.push({"identification": col0, "trasl_id": id_traslation, "name": col1, "last_name": col2, "sex": col3, "prontuario": col4, "status_sgp": col6});
                                } else {
                                    alert('Asegurese de que no exista campos vacios en la tabla de PPLs');
                                }

                                i++;
                            });
                            /*ifExistsPPL(jsonObj, id_traslation);*/
                           /* var count = Object.keys(jsonObj).length;
                            console.log(count);*/
                            createTraslationDetails(jsonObj, id_traslation, obj);

                        } else
                        {
                            alert(obj.message);
                        }

                    },
                    error: function (jqXHR, exception) {
                        alert('Error.\n' + jqXHR.responseText);
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

    $(document).ready(function () {

        // code to read selected table row cell data (values).
        $("#tblPPLList").on('click', 'tr', function (e) {
            // e.preventDefault();
            var col1 = $(this).find('td:eq(1)').text();
            readMovesPPL(col1);
        });
    });
</script>
<!--Events Modal-->
<script>
// Get the modal
    var modal = document.getElementById("myModal");

// Get the button that opens the modal
    var btnSearch = document.getElementById("btnSearching");

// Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal
    btnSearch.onclick = function () {

        modal.style.display = "block";
        listPPL();
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