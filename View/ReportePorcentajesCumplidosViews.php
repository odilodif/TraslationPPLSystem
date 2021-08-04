
<link rel="stylesheet" type="text/css" href="./View/css/datatables/dataTables.bootstrap.min.css">

<script src="./View/css/datatables/jquery.dataTables.min.js" type="text/javascript"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap.min.js" type="text/javascript"></script>
<script src="./View/js/Elapsed_Porcentage/elapsed_porcentage.js" type="text/javascript"></script>

<!-- Font Awesome -->

<link href="./View/bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
<!-- Ionicons -->

<link href="./View/bower_components/Ionicons/css/ionicons.min.css" rel="stylesheet" type="text/css"/>
<!-- Theme style -->
<link rel="stylesheet" href="../../dist/css/AdminLTE.min.css">  
<link href="./View/dist/css/skins/_all-skins.min.css" rel="stylesheet" type="text/css"/>
<!-- iCheck -->  
<link href="./View/plugins/iCheck/flat/blue.css" rel="stylesheet" type="text/css"/>




<script src="./View/js/Reports/Report1.js" type="text/javascript"></script>
<link rel="stylesheet" type="text/css" href="./View/DataTables-1.10.19/media/css/jquery.dataTables.css">
<link rel="stylesheet" type="text/css" href="./View/DataTables-1.10.19/examples/resources/syntax/shCore.css">
jquery-ui-1.10.3.minimal.min.js
<script type="text/javascript" language="javascript" src="./View/DataTables-1.10.19/media/js/jquery.dataTables.js"></script>
<script type="text/javascript" language="javascript" src="./View/DataTables-1.10.19/examples/resources/syntax/shCore.js"></script>
<script type="text/javascript" language="javascript" src="./View/DataTables-1.10.19/examples/resources/demo.js"></script>
<a href="Reports.php"></a>
<!--- others libraries-->

<link rel="stylesheet" type="text/css" href="./View/exporting/datatables.min.css" />






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
    .wrapper{

        margin-top: 65px;

    }
</style>

<div class="row">
    <h1> SysTra <span>Sistema de Gestion y Traslados SNAI</span></h1>
    <div class="info">

    </div>
    <div class="demo-html">
        <div id="respuestaAjax">


        </div>

    </div>
</div>
<!-- /.row -->




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
                            <li class="active"><a href="#sesenta" name="sesenta">Porcentaje.60%</a></li>                            
                            <li><a href="#setenta" name="setenta">Porcentaje.70%</a></li>
                            <li><a href="#ochenta" name="ochenta">Porcentaje.80%</a></li>
                            <li><a href="#noventa" name="noventa">Porcentaje.90%</a></li>                            

                        </ul>
                    </div>
                    <div class="tab-content">
                        <div id="sesenta" class="tab-pane fade in active">
                            <h3>Porcentaje.Cumplido.60%</h3>
                            <p>Lista de las Personas Privadas de la Libertad con el 60% de pena Cumplida</p>
                            <div class="box box-default">                        
                                <div class="box-body">
                                    <div class="">
                                        <div class="mailbox-controls">
                                            <span id="id_DirectionParent" style="color:white;"></span><span id="directionParentDesc"></span>
                                        </div>
                                        <div class="table-responsive mailbox-messages">
                                            <div class="table-responsive mailbox-messages">

                                                <table id="tbl60Porcent" class="table table-striped table-bordered table table-hover" style="width:100%">

                                                    <thead>
                                                        <tr>
                                                            <th>%Porcentaje</th>
                                                            <th>Días.a.la.Fecha</th>
                                                            <th>Total.Días.Judiciales.Impuestos</th>
                                                            <th>Prontuario</th>
                                                            <th>Nombres.PPL</th>
                                                            <th>Apellidos.PPL</th>                                                            
                                                            <th>Número.de.Detención</th>
                                                            <th>Centro</th>
                                                            <th>Fecha.Ingreso</th>
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
                        <div id="setenta" class="tab-pane fade">
                            <h3>Porcentaje.Cumplido.70%</h3>
                            <p>Lista de las Personas Privadas de la Libertad con el 70% de pena Cumplida</p>
                            <table id="tbl70Porcent" class="table table-striped table-bordered table table-hover" style="width:100%">

                                <thead>
                                    <tr>
                                        <th>%Porcentaje</th>
                                        <th>Días.a.la.Fecha</th>
                                        <th>Total.Días.Judiciales.Impuestos</th>
                                        <th>Prontuario</th>
                                        <th>Nombres.PPL</th>
                                        <th>Apellidos.PPL</th>                                                            
                                        <th>Número.de.Detención</th>
                                        <th>Centro</th>
                                        <th>Fecha.Ingreso</th>
                                    </tr>
                                </thead>
                                <tbody>


                                </tbody>

                            </table>                      
                        </div>
                        <div id="ochenta" class="tab-pane fade">
                            <h3>Porcentaje.Cumplido.80%</h3>
                            <p>Lista de las Personas Privadas de la Libertad con el 80% de pena Cumplida</p>
                            <table id="tblAuthorized" class="table table-striped table-bordered table table-hover" style="width:100%">

                                <thead>
                                    <tr>
                                        <th>%Porcentaje</th>
                                        <th>Días.a.la.Fecha</th>
                                        <th>Total.Días.Judiciales.Impuestos</th>
                                        <th>Prontuario</th>
                                        <th>Nombres.PPL</th>
                                        <th>Apellidos.PPL</th>                                                            
                                        <th>Número.de.Detención</th>
                                        <th>Centro</th>
                                        <th>Fecha.Ingreso</th>
                                    </tr>
                                </thead>
                                <tbody>


                                </tbody>

                            </table>                      
                        </div>
                        <div id="noventa" class="tab-pane fade">
                            <h3>Porcentaje.Cumplido.90%</h3>
                            <p>Lista de las Personas Privadas de la Libertad con el 80% de pena Cumplida</p>


                            <table id="tblAprobedExecuted" class="table table-striped table-bordered table table-hover" style="width:100%">

                                <thead>
                                    <tr>
                                        <th>%Porcentaje</th>
                                        <th>Días.a.la.Fecha</th>
                                        <th>Total.Días.Judiciales.Impuestos</th>
                                        <th>Prontuario</th>
                                        <th>Nombres.PPL</th>
                                        <th>Apellidos.PPL</th>                                                            
                                        <th>Número.de.Detención</th>
                                        <th>Centro</th>
                                        <th>Fecha.Ingreso</th>
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
                                    <labe> </labe>
                                    <div style="width:auto; height: 100px; overflow-y: scroll;">
                                        <table border="1" id="tblpplAnalyst" class="display" style="width:100%">
                                            <thead style="background: grey;">
                                                <tr>
                                                    <th >
                                                        Prontuario
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

            </div>
        </section>
        <!-- /.content -->
    </div>

</div>
<script>
    $(document).ready(function () {
        get60Prcentage();
        /*When user client click on tabs load tables Authorized and Executed*/

        $(".nav-tabs a").click(function () {
            $(this).tab('show');
            var option = $(this).attr('name');
            if (option == 'sesenta') {
                console.log('->' + $(this).attr('name'));
                
            } else if (option == 'setenta') {
                console.log('->' + $(this).attr('name'));
                get70Prcentage();
            } else if (option == 'ochenta') {
                console.log('->' + $(this).attr('name'));
            } else if (option == 'noventa')
            {
                console.log('->' + $(this).attr('name'));
            }

        });



    });


</script>