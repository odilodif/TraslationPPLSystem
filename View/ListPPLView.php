<?php
$currentDateTime = date('Y-m-d');
?>
<script src="./View/js/ppl/ppl.js" type="text/javascript"></script>
<link rel="stylesheet" type="text/css" href="./View/css/datatables/dataTables.bootstrap.min.css">
<script src="./View/css/datatables/jquery.dataTables.min.js" type="text/javascript"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap.min.js" type="text/javascript"></script>
<script>
    $(document).ready(function () {        
      listPPL();
    });




</script>



<!-- Page Heading -->

<br>
<br>
<img src="./View/images/auction.png"  style="height:2%;width: 2%" /><small>SNAI - Sistema de Traslados   </small>
<i class="fa fa-dashboard"></i> Lista de PPLS



<div class="row">

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
                                        <table id="tblPPLList" class="table table-striped table-bordered" style="width:100%;font-size: 10px">
                                            <thead>
                                                <tr>
                                                    <th>&nbsp;&nbsp;&nbsp;</th>
                                                    <th>Prontuario</th>
                                                    <th>Cédula</th>
                                                    <th>Nombres</th>
                                                    <th>Apellidos</th> 
                                                    <th>Estado</th>
                                                    <th>Centro</th>
                                                   

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
                <div class="modal fade" id="TraslationNew" role="dialog" data-toggle="" data-backdrop="static" data-keyboard="false">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" id="btn-close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span></button>


                            </div>
                            <div class="modal-body">

                                <form id="fmrCreateTraslation" action="" method="POST" enctype="multipart/form-data">                           

                                    <input type="text" id="idTraslation"  name="idTraslation" readonly="" style="color:red"/>
                                    <div class="grid-container">
                                        <div class="item1"><label>Tipo de Traslado</label></div>
                                        <div class="item2">
                                            <div>
                                                <select id="trasl_type_id" name="trasl_type_id" required="">
                                                    <option value="0">Selecionar Tipo de Traslados </option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="item3">  <labe>Fecha</labe></div>
                                        <div class="item4">
                                            <input  id="txt_date_request_traslation" name="txt_date_request_traslation" type="date" value="" required="">

                                        </div>
                                        <div class="item5">  <label>CPL de Destino</label></div>
                                        <div class="item6">
                                            <select id="crs_id_destination" name="crs_id_destination" required="">
                                                <option value="0">Selecionar Crs </option>
                                            </select>
                                        </div>
                                        <div class="item7"><labe>Comentario</labe></div>
                                        <div class="item8">
                                            <input type="text" id="trasl_descripcion" name="trasl_descripcion" required="" />
                                        </div>
                                        <div class="item9"><labe>Archivos Adjuntos </labe></div>
                                        <div class="item10">
                                            <input type="file" id="file_pdf"  name="file_pdf" required=""/>
                                        </div>
                                        <div class="item11"></div>
                                        <div class="item12"></div>
                                    </div>                                
                                    <div class="modal-footer">
                                        <!--  <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Cerrar</button>-->
                                        <!--  <button type="button"  id="btnSent" class="btn btn-outline" onclick="Valid()" >Enviar</button>-->
                                        <input type="submit" name="btnSent" class="btn btn-success submitBtn" value="Enviar"/>
                                    </div>
                                </form>
                                <button id="addRow" class="btn btn-info">Añadir PPL</button>
                                <div style="width:auto; height: 100px; overflow-y: scroll;">
                                    <table border="1" id="tblppl" class="display" style="width:100%">
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
                <!-- /.modal Edit -->
                <div class="modal fade" id="pplEditModal" role="dialog" data-toggle="" data-backdrop="static" data-keyboard="false">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" id="btn-close-edit" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span></button>
                            </div>
                            <div class="modal-body">
                                <form id="fmrEditorPPL" action="" method="POST" enctype="multipart/form-data">                           

                                    <input type="text" id="idPPLEdit"  name="idTraslationEdit" readonly="" style="color:red"/>
                                    <div class="grid-container">
                                        <div class=""><label>Nombre</label></div>
                                       
                                            <div class="item4">
                                                <input  id="txt_name" name="" type="text" value="" required="">

                                            </div>
                                    
                                        <div class="item3">  <labe>Apellido</labe></div>
                                        <div class="item4">
                                            <input  id="txt_lastname" name="" type="text" value="" required="">

                                        </div>

                                    </div>                                
                                    <div class="modal-footer">                                        
                                        
                                        <input type="submit" name="" class="btn btn-success submitBtn" onclick="savePPLEdit($('#idPPLEdit').val(),$('#txt_name').val(),$('#txt_lastname').val())" value="Guardar"/>
                                    </div>
                                </form>

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

                                            <a id="file_pdf_View" href="" download="certificado-desde-crs.pdf">Solicitud <img src="./View/images/icons/internet-download-symbol.png" alt=""></a>
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
