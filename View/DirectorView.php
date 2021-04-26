
<?php

?>
<script src="./View/js/director/director.js" type="text/javascript"></script>
<link rel="stylesheet" type="text/css" href="./View/css/datatables/dataTables.bootstrap.min.css">

<script src="./View/css/datatables/jquery.dataTables.min.js" type="text/javascript"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap.min.js" type="text/javascript"></script>
<br>
<br>
<div class="row">
    <div class="col-lg-12">

    </div>

    <style>
        .example-modal .modal {
            position: relative;
            top: auto;
            bottom: auto;
            right: auto;
            left: auto;
            display: block;
            z-index: 1;
        }

        .example-modal .modal {
            background: transparent !important;
        }


        .grid-container {
            display: grid;
            grid-template-columns: auto auto auto auto;
            grid-gap: 10px;

            padding: 10px;
        }

        .grid-container > div {
            background-color: rgba(255, 255, 255, 0.8);
            /*border: 1px solid black;
            text-align: center;*/

        }
    </style>

    
    
    <div class="wrapper">
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Main content -->
            <section class="content">
                <div class="row">
                    <div class="col-xs-12">
                        <div id="respuestaAjax">


                        </div>
                        <div class="">
                            <div class="box-body">
                                <div class=""> 
                                    <div class="">                                        
                                        <img src="./View/images/auction.png"  style="height:2%;width: 2%" /><small>  <img src="./View/images/encabezado.png" alt="" style="height:4%;width: 5%"/>  - Sistema de Traslados Lista   </small>
                                        
                                        <table id="tblTraslationList" class="table table-striped table-bordered" style="width:100%;font-size: 10px;">
                                            <thead>
                                                <tr>
                                                    <th>Nro.</th>
                                                    <th>Fecha</th>
                                                    <th>Tipo de Traslado</th>
                                                    <th>CPL Destino</th>
                                                    <th>Estado</th>
                                                    <th>Opciones</th>

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
                </div>
                <!---Modals Section-->
              
                <!-- /.modal Edit -->
                <div class="modal fade" id="TraslationEdit" role="dialog" data-toggle="" data-backdrop="static" data-keyboard="false">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" id="btn-close-edit" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span></button>
                            </div>
                            <div class="modal-body">
                                <form id="fmrEditorTraslation" action="" method="POST" enctype="multipart/form-data">                           

                                    <input type="text" id="idTraslationEdit"  name="idTraslationEdit" readonly="" style="color:red"/>
                                    <div class="grid-container">
                                        <div class="item1"><label>Tipo de Traslado</label></div>
                                        <div class="item2">
                                            <div>
                                                <select id="trasl_type_id-edit" name="trasl_type_id-edit" required="">
                                                    <option value="0">Selecionar Tipo de Traslados </option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="item3">  <labe>Fecha</labe></div>
                                        <div class="item4">
                                            <input  id="txt_date_request_traslation-edit" name="txt_date_request_traslation-edit" type="date" value="" required="">

                                        </div>
                                        <div class="item5">  <label>CPL de Destino</label></div>
                                        <div class="item6">
                                            <select id="crs_id_destination-edit" name="crs_id_destination-edit" required="">
                                                <option value="0">Selecionar Crs </option>
                                            </select>
                                        </div>
                                        <div class="item7"><labe>Comentario</labe></div>
                                        <div class="item8">
                                            <input type="text" id="trasl_descripcion_edit" name="trasl_descripcion_edit" required="" />
                                        </div>
                                        <div class="item9"><labe>Archivos Adjuntos </labe></div>
                                        <div class="item10">
                                            <input type="file" id="file_pdf_edit"  name="file_pdf_edit" required=""/>
                                        </div>
                                        <div class="item11"></div>
                                        <div class="item12"></div>
                                    </div>                                
                                    <div class="modal-footer">
                                        <!--  <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Cerrar</button>-->
                                        <!--  <button type="button"  id="btnSent" class="btn btn-outline" onclick="Valid()" >Enviar</button>-->
                                        <input type="submit" name="btnSentEdit" class="btn btn-success btn-xs" value="Enviar"/>
                                    </div>
                                </form>
                                <button id="addRowEdit" class="btn btn-info btn-xs">Añadir PPL</button>
                                <div style="width:auto; height: 100px; overflow-y: scroll;">
                                    <table border="1" id="tblpplEdit" class="display" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>Identificacion</th><th>Nombres</th><th>Apellidos</th><th>Foto</th><th>Huella</th>  
                                            </tr>                                       
                                        </thead>
                                        <tbody >                                    

                                        </tbody>

                                    </table>


                                </div>

                            </div>

                        </div>
                        <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                </div>
                <!-- /.modal View-->
                <div class="modal fade" id="TraslationView" role="dialog" data-toggle="" data-backdrop="static" data-keyboard="false">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" id="btn-close-view" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span></button>
                            </div>
                            <div class="modal-body">
                                <form id="fmrViewTraslation" action="" method="POST" enctype="multipart/form-data">                           

                                    <input type="text" id="idTraslationView"  name="idTraslationView" readonly="" style="color:red"/>
                                    <div class="grid-container">
                                        <div class="item1"><label>Tipo de Traslado</label></div>
                                        <div class="item2">
                                            <div>

                                                <input type="text" id="trasl_type_iew"  name="trasl_type_iew" readonly="" />
                                            </div>
                                        </div>
                                        <div class="item3">  <labe>Fecha</labe></div>
                                        <div class="item4">
                                            <input  id="txt_date_request_view" name="txt_date_request_view" type="date" value="" readonly="">

                                        </div>
                                        <div class="item5">  <label>CPL de Destino</label></div>
                                        <div class="item6">

                                            <input  id="crs_id_destinationView" name="crs_id_destinationView" type="text" value="" readonly="">
                                        </div>
                                        <div class="item7"><labe>Comentario</labe></div>
                                        <div class="item8">
                                            <input type="text" id="trasl_descripcion_view" name="trasl_descripcion_view" readonly="" />
                                        </div>
                                        <div class="item9"><labe>Archivos Adjuntos </labe></div>
                                        <div class="item10">

                                            <!--<a id="file_pdf_View" href="" download="certificado-desde-crs.pdf">Solicitud <img src="./View/images/icons/internet-download-symbol.png" alt=""></a>-->
                                        </div>
                                        <div class="item11"></div>
                                        <div class="item12"></div>
                                    </div>                                
                                    <div class="modal-footer">
                                        <!--  <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Cerrar</button>-->
                                        <!--  <button type="button"  id="btnSent" class="btn btn-outline" onclick="Valid()" >Enviar</button>-->

                                    </div>
                                </form>

                                <div style="width:auto; height: 100px; overflow-y: scroll;">
                                    <table border="1" id="tblpplView" class="display" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>Identificacion</th><th>Nombres</th><th>Apellidos</th><th>Foto</th><th>Huella</th>
                                            </tr>

                                        </thead>
                                        <tbody >                                    

                                        </tbody>

                                    </table>


                                </div>

                            </div>

                        </div>
                        <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                </div>

                <!-- /.modal -->


                <!-- /.modal -->
            </section>
            <!-- /.content -->
        </div>

    </div>

    <script>


        $(document).ready(function () {
            var counter = 1;
            $('#addRow').on('click', function () {
                var markup = '<tr><td><input type="text"></td><td><input type="text"></td><td><input type="text"></td><td></td><td></td></tr>';
                $("#tblppl tbody").append(markup);
                var id_traslation = $('#idTraslation').val();

                //$('#tblppl tr:first').after(' <tr><td><input type="text"></td><td><input type="text"></td><td><input type="text"></td><td></td><td></td></tr>');
            });



            $('#addRowEdit').on('click', function () {
                var markup = '<tr><td><input type="text"></td><td><input type="text"></td><td><input type="text"></td><td></td><td></td></tr>';
                $("#tblpplEdit tbody").append(markup);

            });


            loadComboboxTraslationType();
            loadComboboxCrs();
            //loadCrsSgp();
            var crs_id = '<?php echo "" . $_SESSION['_USU'][0]['crs_id']; ?>';
            loadTraslationList(crs_id);

            $("#btnNewTraslation").click(function () {
                var user_id = '<?php echo "" . $_SESSION['_USU'][0]['usr_id']; ?>';
                var crs_source_id = '<?php echo "" . $_SESSION['_USU'][0]['crs_id']; ?>';
                createAdnSendTraslation(user_id, crs_source_id, dateSystem());
            });
        });



        $("#file_pdf").change(function () {
            var file = this.files[0];
            var fileType = file.type;
            var match = ['application/pdf'];
            if (!((fileType == match[0]))) {
                alert('Asegúrese, que sea documentos PDF');
                $("#file").val('');
                return false;
            }
        });

        function valid() {
            if (jQuery('#trasl_type_id').val() != 0 && jQuery('#crs_id_destination').val() != 0 && jQuery('#trasl_descripcion').val() != '' && jQuery('#file_pdf').val() != '' && jQuery('#txt_date_request_traslation').val() != '')
            {

                return true;
            }
            else
            {

                alert('Todos lo campos son requeridos');
                return false;
            }
        }

        function validEdit() {
            if (jQuery('#trasl_type_id-edit').val() != 0 && jQuery('#crs_id_destination-edit').val() != 0 && jQuery('#trasl_descripcion_edit').val() != '' && jQuery('#file_pdf_edit').val() != '' && jQuery('#txt_date_request_traslation-edit').val() != '')
            {
                return true;
            }
            else
            {

                alert('Todos lo campos son requeridos');
                return false;
            }
        }




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


                        },
                        success: function (result) { //console.log(response);
                            var obj = JSON.parse(result);
                            if (obj.success) {
                                //alert();
                                var id_traslation = $('#idTraslation').val();
                                var i = 0;
                                var rowCount = $('#tblppl tr').length;
                                var jsonObj = [];
                                $("#tblppl tbody tr").each(function () {
                                    var textval0 = $(this).find("td").eq(0).find(":text").val();
                                    var textval1 = $(this).find("td").eq(1).find(":text").val();
                                    var textval2 = $(this).find("td").eq(2).find(":text").val();
                                    if ((textval0 != undefined && textval0 != '') && (textval1 != undefined && textval1 != '') && (textval2 != undefined && textval2 != '')) {

                                        /* jsonObj.members['identification'] = textval0;
                                         jsonObj.members['name'] = textval1;
                                         jsonObj.members['lastname'] = textval2;*/

                                        jsonObj.push({"identification": textval0, "name": textval1, "lastname": textval2});
                                        i++;

                                    }
                                    else {
                                        if (textval0 != undefined || textval1 != undefined || textval2 != undefined) {
                                            alert('Asegurese de que no exista campos vacios en la tabla');
                                        }

                                    }

                                });
                                insertPersonPrison(jsonObj, id_traslation);

                            }
                            else
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
        //fmrEditorTraslation
        $(document).ready(function (e) {
            $("#fmrEditorTraslation").on('submit', function (e) {
                e.preventDefault();
                var objTable = $("#tblpplEdit tbody tr");
                if (validEdit() && validTablePPL(objTable)) {

                    $.ajax({
                        url: './Controller/TraslationController.php',
                        type: "POST",
                        data: new FormData(this),
                        contentType: false,
                        cache: false,
                        processData: false,
                        beforeSend: function ()
                        {

                            $('#respuestaAjax').html('<img id="loader" src="./View/images/giphy.gif"/>');
                        },
                        success: function (result) { //console.log(response);
                            $('#respuestaAjax').html('');
                            var obj = JSON.parse(result);
                            if (obj.success) {
                                //alert();
                                var id_traslation = $('#idTraslationEdit').val();
                                var i = 0;
                                var jsonObj = [];
                                $("#tblpplEdit tbody tr").each(function () {
                                    var textval0 = $(this).find("td").eq(0).find(":text").val();
                                    var textval1 = $(this).find("td").eq(1).find(":text").val();
                                    var textval2 = $(this).find("td").eq(2).find(":text").val();
                                    if ((textval0 != undefined && textval0 != '') && (textval1 != undefined && textval1 != '') && (textval2 != undefined && textval2 != '')) {
                                        jsonObj.push({"identification": textval0, "name": textval1, "lastname": textval2});
                                        i++;
                                    }
                                    else {
                                        if (textval0 != undefined || textval1 != undefined || textval2 != undefined) {
                                            alert('Asegurese de que no exista campos vacios en la tabla');
                                        }

                                    }

                                });
                                insertPersonPrison(jsonObj, id_traslation);
                            }
                            else
                            {
                                alert(obj.message);
                            }

                        }
                    });

                }

            });

            $("#file_pdf_edit").change(function () {
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




    </script>
    
    
  
</div>