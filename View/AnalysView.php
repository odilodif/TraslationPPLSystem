  

<script src="./View/js/analyst/analyst.js" type="text/javascript"></script>
<link rel="stylesheet" type="text/css" href="./View/css/datatables/dataTables.bootstrap.min.css">
<script src="./View/css/datatables/jquery.dataTables.min.js" type="text/javascript"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap.min.js" type="text/javascript"></script>




<script>

    $(document).ready(function () {
       var typeTrasl = '<?php echo"" . (isset($_GET['typ'])) ? $_GET['typ'] : " " ?>';
        var user_id = '<?php echo "" . $_SESSION['_USU'][0]['usr_id']; ?>';
        setDirectionAssigned(user_id);
        traslationListAnalyst(user_id,typeTrasl);        
       
    });


</script>


<!-- Page Heading -->
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            <h1><small>SNAI -PLANTA CENTRAL   </small></h1>
        </h1>
        <ol class="breadcrumb">
            <li class="active">
                <i class="fa fa-dashboard"></i>
                SNAI - Sistema de Traslados
            </li>
        </ol>
    </div>
</div>
<!-- /.row -->


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

<div class="container">


</div>
<div class="wrapper">
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div id="respuestaAjax">


                    </div>
                    <div class="box box-default">

                        <div class="box-body">
                            <div class="">
                                <div class="">

                                    <!--<table  id="tblTralationAnalyst" class="table table-striped table-bordered" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>Nro.</th>
                                                <th> Fecha</th>
                                                <th>CPL ORIGEN</th>
                                                <th> CPL DESTINO</th>
                                                <th>EDITAR</th>
                                            </tr>
                                        </thead>-->

                                    <table id="tblTralationAnalyst" class="table table-striped table-bordered" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>Código</th>                                                
                                                <th>Crs Origen</th>
                                                <th>Crs Destino</th>
                                                <th>FechaSolicitud</th>
                                                <th>Tipo de Traslado</th>                                                
                                                <th>Estado</th>
                                                <th>Editar</th>

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

            <!-- /.modal -->


            <!-- /.modal -->

            <div class="modal fade" id="traslationAnalystNearFmly" role="dialog" data-toggle="modal" data-backdrop="static" data-keyboard="false">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span></button>                            
                        </div>
                        <form id="fmrEditTraslationAnalyst">
                            <div class="modal-body">
                                <input type="text" id="idTraslation"  name="idTraslation" readonly="" style="color:red"/>
                                <div class="grid-container">
                                    <div class="item1"><label>Cpl Origen</label></div>
                                    <div class="item2">
                                        <div>
                                            <input type="text" id="CplSource" value="" readonly="">
                                        </div>
                                    </div>
                                    <div class="item3">  <label>Cpl Destino</label></div>
                                    <div class="item4">
                                        <input type="text" id="CplDestination" value="" readonly="">
                                    </div>
                                    <div class="item5">  <label>Nombre Director</label></div>
                                    <div class="item6">
                                        <input type="text"  id="DirectorName" value="" readonly="">
                                    </div>
                                    <div class="item7"><label>Comentario  Analista Plt Central</label></div>
                                    <div class="item8">
                                        <input type="text" id="obsevationAbalyst" />
                                    </div>
                                    <div class="item9">
                                        <label>Ver Archivos Adjuntos Director: </label>
                                    </div>
                                    <a id="pdf_download_dir" href="" download="certificado-desde-crs.pdf">Certificado Enviado desde Crs.pdf [66kb]<img src="./View/images/icons/internet-download-symbol.png" alt=""></a>

                                    <div class="item10">
                                        <label>Dirección Técnica</label>
                                    </div>
                                    <div class="item11">
                                        <input type="text" id="trasl_director_assigned" hidden="" >
                                        <input type="text" id="area_desription" >
                                        <input type="text" id="directorsPltaCtrl" >
                                    </div>
                                    <div class="item12">
                                        <label> Cometario Director CPL</label>

                                    </div>
                                    <div class="item13">
                                        <input type="text" id="trasl_descripcion" readonly="" />
                                    </div>
                                    <div class="item14">
                                        <label> Fecha Solicitud</label>

                                    </div>
                                    <div class="item15">
                                        <input type="text" id="trasl_date_request" readonly="" />
                                    </div>
                                </div>
                                <br>
                                <labe>Añadir Archivos de Respaldo </labe>
                                <div style="width:auto; height: 100px; overflow-y: scroll;">
                                    <table border="1" id="tblpplAnalyst" class="display" style="width:100%">
                                        <thead style="background: grey;">
                                            <tr>
                                                <th >
                                                    Identificación
                                                </th>
                                                <th >
                                                    Nombres
                                                </th>
                                                <th>
                                                    Apellidos
                                                </th>

                                                <th>
                                                    Observación
                                                </th>
                                                <th>
                                                    Arch.Respaldos
                                                </th>

                                            </tr>
                                        </thead>
                                        <tbody>

                                        </tbody>

                                    </table>


                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-primary" onclick="sendToDirector();">Enviar a Director</button>
                            </div>
                        </form>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>

            <!-- /.modal -->


            <div class="modal modal-info fade" id="modal_ppl_load_pdf"  role="dialog" data-toggle="modal" data-backdrop="static" data-keyboard="false">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title">Subir Certificados</h4>
                        </div>
                        <div class="modal-body">
                            <table>
                                <tr>
                                    <td>  <div style="width:300px;">
                                    <form id="fmrloadPdfPPL">
                                        <div>
                                            <input type="text" name="prison_per_id" id="prison_per_id"  value="" hidden="" />
                                        </div>
                                        <div>   
                                            <label>Nombres Completos del PPL</label>
                                            <input type="text" id="ppl_name_lastname" value="" style="width:300px"/> <br>
                                            <label>Subir Archivo</label>
                                            <input type="file" id="file_pdf_ppl"   name="file_pdf_ppl" value=""/>
                                        </div>
                                        <div class="modal-footer">
                                            <input type="submit" name="btnSavePdf" class="btn btn-success btn-xs" value="Guardar"/>
                                        </div>
                                    </form>
                                </div></td>  <td><div style="width:300px;">
                                    Lista de Documentos
                                    <table border="1" id="tblpplDocument" class="display" style="width:100%">
                                        <thead style="background: grey;">
                                            <tr>
                                                <th >
                                                    Codigo
                                                </th>
                                                <th >
                                                    Description
                                                </th>
                                                <th>
                                                    Adjuntos
                                                </th>                                              

                                            </tr>
                                        </thead>
                                        <tbody>

                                        </tbody>

                                    </table>
                                </div></td>   
                                </tr>
                            </table>
                            <div class="row">
                              

                                
                            </div>



                        </div>

                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
            <!-- /.modal -->

            <!-- /.modal -->


            <!-- /.modal -->


            <!-- /.modal -->
        </section>
        <!-- /.content -->
    </div>

</div>
<script>
    $(document).ready(function (e) {
        $("#fmrloadPdfPPL").on('submit', function (e) {
            e.preventDefault();
            $.ajax({
                url: './Controller/FilleDocumentController.php',
                type: "POST",
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                beforeSend: function ()
                {

                },
                success: function (result) {
                    var obj = JSON.parse(result);

                    if (obj.success) {
                        alert(obj.message);
                        $("#file_pdf_ppl").val('');
                        $('#modal_ppl_load_pdf').modal('hide');
                    }
                    else
                    {
                        alert(obj.message);
                    }


                }

            });



        });
    });


    $("#file_pdf_ppl").change(function () {
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






</script>
