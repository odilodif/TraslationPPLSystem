

<script src="./View/js/DirectorPlantCtrl1/directorPlantCtrl1.js" type="text/javascript"></script>
<link rel="stylesheet" type="text/css" href="./View/css/datatables/dataTables.bootstrap.min.css">

<script src="./View/css/datatables/jquery.dataTables.min.js" type="text/javascript"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap.min.js" type="text/javascript"></script>


<!-- Font Awesome -->

<link href="./View/bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
<!-- Ionicons -->

<link href="./View/bower_components/Ionicons/css/ionicons.min.css" rel="stylesheet" type="text/css"/>
<!-- Theme style -->
<link rel="stylesheet" href="../../dist/css/AdminLTE.min.css">  
<link href="./View/dist/css/skins/_all-skins.min.css" rel="stylesheet" type="text/css"/>
<!-- iCheck -->  
<link href="./View/plugins/iCheck/flat/blue.css" rel="stylesheet" type="text/css"/>
<!-- Page Heading -->
<br>
<div class="row">
    <div class="col-lg-12">
        <ol class="breadcrumb">
            <li class="active">
                <i class="fa fa-dashboard"></i>
                SNAI - Sistema de Traslados Lista-SNAI PLANTA CENTRAL  
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
                    <div class="row">
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#list-to-approve">Por Aprobar</a></li>
                            <li><a href="#approved">Historial Aprobados </a></li>
                            <li><a href="#authorized">Historial Autorizados</a></li>
                            <li><a href="#executed">Historial Finalizados</a></li>                            

                        </ul>
                    </div>
                    <div class="tab-content">
                        <div id="list-to-approve" class="tab-pane fade in active">
                            <div class="box box-default">                        
                                <div class="box-body">
                                    <div class="">
                                        <div class="mailbox-controls">
                                            <!-- Check all button -->
                                            <button type="button" class="btn btn-default btn-sm checkbox-toggle"><i class="fa fa-square-o"></i>
                                            </button>
                                            <div class="btn-group">
                                               <!-- <button type="button" class="btn btn-default btn-sm"><i class="fa fa-trash-o"></i></button>
                                                <button type="button" class="btn btn-default btn-sm"><i class="fa fa-reply"></i></button>
                                                <button type="button" class="btn btn-default btn-sm"><i class="fa fa-share"></i></button>-->
                                            </div>
                                            <!-- /.btn-group -->
                                            <!--<button type="button" class="btn btn-default btn-sm"><i class="fa fa-refresh"></i></button>-->
                                            <button type="button" class="btn btn-warning btn-xs" name="button" id="btn-aprobed-all" onclick="btnApprobed()">Aprobar</button>
                                            <?php echo "" . $_SESSION['_USU'][0]['menu_description_description'] ?> <span id="id_DirectionParent" style="color:white;"></span><span id="directionParentDesc"></span>
                                        </div>
                                        <div class="table-responsive mailbox-messages">
                                            <div class="table-responsive mailbox-messages">

                                                <table id="tblAprobed_to_approved" class="table table-striped table-bordered table table-hover" style="width:100%">

                                                    <thead>
                                                        <tr>
                                                            <th>&nbsp;&nbsp;&nbsp;</th>
                                                            <th>Nro</th>
                                                            <th>FechaSolicitud</th>
                                                            <th>SolicitadoPor</th>
                                                            <th>CrsOrigen</th>
                                                            <th>CrsDestino</th>
                                                            <th>TipoTraslado</th>
                                                            <th>FechaEnvíoParaAprb.</th>
                                                            <th>Analista</th>
                                                            <th>Estado</th>
                                                            <th>Revisar</th>
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
                        <div id="approved" class="tab-pane fade">
                            <h3>Traslados Aprobados </h3>
                           <?php echo "" . $_SESSION['_USU'][0]['menu_description_description'] ?> 
                            <table id="tblAprobed" class="table table-striped table-bordered table table-hover" style="width:100%">

                                <thead>
                                    <tr>                                       
                                        <th>Nro</th>
                                        <th>FechaSolicitud</th>
                                        <th>SolicitadoPor</th>
                                        <th>CrsOrigen</th>
                                        <th>CrsDestino</th>
                                        <th>TipoTraslado</th>
                                        <th>FechaEnvíoParaAprb.</th>
                                        <th>Analista</th>
                                        <th>Estado</th>
                                        <th>Revisar</th>
                                    </tr>
                                </thead>
                                <tbody>


                                </tbody>

                            </table>                      
                        </div>
                        <div id="authorized" class="tab-pane fade">
                            <h3>Traslados Autorizados </h3>
                            <p>Lista de Traslados Autorizados por el Subdirector Técnico </p>
                            <table id="tblAuthorized" class="table table-striped table-bordered table table-hover" style="width:100%">

                                <thead>
                                    <tr>                                       
                                        <th>Nro</th>
                                        <th>FechaSolicitud</th>
                                        <th>SolicitadoPor</th>
                                        <th>CrsOrigen</th>
                                        <th>CrsDestino</th>
                                        <th>TipoTraslado</th>
                                        <th>FechaEnvíoParaAprb.</th>
                                        <th>Analista</th>
                                        <th>Estado</th>
                                        <th>Revisar</th>
                                    </tr>
                                </thead>
                                <tbody>


                                </tbody>

                            </table>                      
                        </div>
                        <div id="executed" class="tab-pane fade">
                            <h3>Traslados Ejecutados</h3>
                            <p>Historial de Traslados  Ejecutados por el Director Técnico de <b>Operativos</b>, Logística, Equipamiento e Infraestructura.</p>


                            <table id="tblAprobedExecuted" class="table table-striped table-bordered table table-hover" style="width:100%">

                                <thead>
                                    <tr>
                                        
                                        <th>Nro</th>
                                        <th>FechaSolicitud</th>
                                        <th>SolicitadoPor</th>
                                        <th>CrsOrigen</th>
                                        <th>CrsDestino</th>
                                        <th>TipoTraslado</th>
                                        <th>FechaEnvíoParaAprb.</th>
                                        <th>Analista</th>
                                        <th>Estado</th>
                                        <th>Revisar</th>
                                    </tr>
                                </thead>
                                <tbody>


                                </tbody>

                            </table>                      

                        </div>

                    </div>

                </div>





                <!---Modals Section-->
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
                                        <div class="item7">
                                            <label>Comentario Director Crs</label>
                                        </div>
                                        <div class="item8">
                                            <input type="text" id="txtCommentaryDirCrs" readonly=""/> 
                                        </div>
                                        <div class="item9">
                                            <label>Ver Archivos Adjuntos Director: </label>
                                        </div>
                                        <div class="item10">
                                            <a id="pdf_download_dir" href="" download="certificado-desde-crs.pdf">Certificado Enviado desde Crs.pdf [66kb]<img src="./View/images/icons/internet-download-symbol.png" alt=""></a> 
                                        </div>

                                        <div class="item11">

                                            <label>Comentario Analista</label>

                                        </div>
                                        <div class="item12">

                                            <input type="text" id="obsevationAbalyst" readonly=""/> 

                                        </div>
                                        <div class="item13">

                                            <label>Comentario Director Plt Central</label>

                                        </div>
                                        <div class="item14">

                                            <input type="text" id="commentarytDirPltaCtrl" />

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
                                    <button type="button" class="btn btn-outline" onclick="saveCommentary();">Guardar</button>
                                </div>
                            </form>
                        </div>
                        <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                </div>
                <!-- /.modal -->
                <div class="modal modal-warning fade" id="modal_ppl_load_pdf"  role="dialog" data-toggle="modal" data-backdrop="static" data-keyboard="false">
                    <div class="modal-dialog">
                        <div class="modal-content" style="    width: 104%;">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title">Revisar Certificados</h4>
                            </div>
                            <div class="modal-body">
                                <form id="fmrloadPdfPPL">
                                    <div>
                                        <input type="text" name="prison_per_id" id="prison_per_id"  value="" hidden="" />
                                    </div>
                                    <div>   
                                        <label>Nombres Completos del PPL</label>
                                        <input type="text" id="ppl_name_lastname" value=""/> <br>
                                        <lavel>Adjuntos</lavel>
                                        <div style=" height: 200px; overflow-y: scroll;">
                                            <table id="listCertificatesPPLS" class="table table-striped table-bordered" style="width:70%">
                                                <thead style="background: grey;">
                                                    <tr>                                                
                                                        <th >
                                                            Descripción
                                                        </th>
                                                        <th>
                                                            Arch.Adjuntos
                                                        </th>

                                                    </tr>
                                                </thead>

                                                <tbody>

                                                </tbody> 
                                            </table>
                                        </div>



                                    </div>
                                    <div class="modal-footer">
                                        <!--<input type="submit" name="btnSavePdf" class="btn btn-success submitBtn" value="Guardar"/>-->
                                    </div>
                                </form>
                            </div>

                        </div>
                        <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                </div>


        </section>
        <!-- /.content -->
    </div>

</div>

<script>


    $(document).ready(function () {
        /*LoadTables ByApproved Approved And Executed*/
        var usr_id = '<?php echo "" . $_SESSION['_USU'][0]['usr_id']; ?>';
        loadDirectionParent(usr_id);
        listTraslationByApprobePltanCtrl1(usr_id);
        listTraslationApprobedPltanCtrl1(usr_id);
        listTraslationExecutedPltanCtrl1(usr_id);
        listTraslationAuthorizedPltanCtrl1(usr_id);
        $(".nav-tabs a").click(function () {
            $(this).tab('show');
        });


    });

    $(document).ready(function () {
        $('#btn-aprobed-all').click(function () {

            $('#tblAprobed tr').each(function () {
                $("#tblAprobed > tbody > tr >td > input ").prop("checked", true);
            });
        });
    });

</script>


<!-- Slimscroll -->
<script src="./View/bower_components/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
<!-- FastClick -->

<script src="./View/bower_components/fastclick/lib/fastclick.js" type="text/javascript"></script>
<!-- AdminLTE App -->
<script src="./View/dist/js/adminlte.min.js" type="text/javascript"></script>
<!-- iCheck -->
<script src="./View/plugins/iCheck/icheck.min.js" type="text/javascript"></script>
<!-- Page Script -->
<script>
    $(function () {
        //Enable iCheck plugin for checkboxes
        //iCheck for checkbox and radio inputs
        $('.mailbox-messages input[type="checkbox"]').iCheck({
            checkboxClass: 'icheckbox_flat-blue',
            radioClass: 'iradio_flat-blue'
        });

        //Enable check and uncheck all functionality
        $(".checkbox-toggle").click(function () {
            
            var clicks = $(this).data('clicks');
            if (clicks) {
                //Uncheck all checkboxes
                $(".mailbox-messages input[type='checkbox']").iCheck("uncheck");
                $(".fa", this).removeClass("fa-check-square-o").addClass('fa-square-o');
            } else {
                //Check all checkboxes
                $(".mailbox-messages input[type='checkbox']").iCheck("check");
                $(".fa", this).removeClass("fa-square-o").addClass('fa-check-square-o');
            }
            $(this).data("clicks", !clicks);
        });

        //Handle starring for glyphicon and font awesome
        $(".mailbox-star").click(function (e) {
            e.preventDefault();
            //detect type
            var $this = $(this).find("a > i");
            var glyph = $this.hasClass("glyphicon");
            var fa = $this.hasClass("fa");

            //Switch states
            if (glyph) {
                $this.toggleClass("glyphicon-star");
                $this.toggleClass("glyphicon-star-empty");
            }

            if (fa) {
                $this.toggleClass("fa-star");
                $this.toggleClass("fa-star-o");
            }
        });

    });
</script>
<!-- AdminLTE for demo purposes -->
<script src="./View/dist/js/demo.js" type="text/javascript"></script>