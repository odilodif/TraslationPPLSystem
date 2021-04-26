<script src="./View/js/Reports/report3.js" type="text/javascript"></script>
<link rel="stylesheet" type="text/css" href="./View/css/datatables/dataTables.bootstrap.min.css">



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
                                        <button type="button" class="btn-primary btn-xs checkbox-toggle" id="btn_search">Buscar</button>

                                        <table id="tblTraslationDetailsList" class="table table-striped table-bordered" style="width:100%;font-size: 10px;">
                                            <thead>
                                                <tr>
                                                    <th>Nro.</th>
                                                    <th>Fecha</th>
                                                    <th>Estado</th>
                                                    <th>Comentario</th>
                                                    <th>Cédula</th>
                                                    <th>Nombre</th>
                                                    <th>Apellido</th>
                                                    <th>Sexo</th>
                                                    <th>Prontuario</th>
                                                    <th>EstadoSgp</th>
                                                    <th>TipoTraslado</th>
                                                    <th>CplOrigen</th>
                                                    <th>CplDestino</th>
                                                    <th>AnalistaNombre</th>
                                                    <th>AnalistaApellido</th>

                                                </tr>
                                            </thead>
                                            <tbody>

                                            </tbody>


                                        </table>

                                        <table id="tblTraslationDetailsList2" class="table table-striped table-bordered" style="width:100%;font-size: 10px;" hidden="">
                                            <thead>
                                                <tr>
                                                    <th>Nro.</th>
                                                    <th>Fecha</th>
                                                    <th>Estado</th>
                                                    <th>Comentario</th>
                                                    <th>Cédula</th>
                                                    <th>Nombre</th>
                                                    <th>Apellido</th>
                                                    <th>Sexo</th>
                                                    <th>Prontuario</th>
                                                    <th>EstadoSgp</th>
                                                    <th>TipoTraslado</th>
                                                    <th>CplOrigen</th>
                                                    <th>CplDestino</th>
                                                    <th>AnalistaNombre</th>
                                                    <th>AnalistaApellido</th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td><input type="text"  style="width:50px;" id="trasl_id" /></td>
                                                    <td><input type="text"  style="width:70px;" id="trasl_date_request"/></td>
                                                    <td><input type="text"  style="width:70px;" id="status"/></td>
                                                    <td><input type="text"  style="width:70px;" id="trasl_descripcion"/></td>
                                                    <td><input type="text"  style="width:70px;" id="prison_per_identification"/></td>
                                                    <td><input type="text"  style="width:70px;" id="prison_per_name"/></td>
                                                    <td><input type="text"  style="width:70px;" id="prison_per_lastname"/></td>
                                                    <td><input type="text"  style="width:70px;" id="sex"/></td>
                                                    <td><input type="text"  style="width:70px;" id="prontuario"/></td>
                                                    <td><input type="text"  style="width:70px;" id="status_sgp"/></td>
                                                    <td><input type="text"  style="width:70px;" id="trasl_type_descripcion"/></td>
                                                    <td><input type="text"  style="width:70px;" id="crs_andigen"/></td>
                                                    <td><input type="text"  style="width:100px;"id="crs_destino"/></td>
                                                    <td><input type="text"  style="width:70px;" id="name_analyst"/></td>
                                                    <td><input type="text"  style="width:100px;"id="lastname_analyst"/></td>
                                                </tr>
                                            </tbody>


                                        </table>
                                        <div style="float: right;">
                                            TOTAL TRASLADOS
                                            <input type="text" id="txt_total" readonly=""/>
                                        </div>
                                        
                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <!---Modals Section-->



                <!-- /.modal -->
            </section>
            <!-- /.content -->
        </div>

    </div>


    <script>
        $(function () {
            //Enable check and uncheck all functionality
            $(".checkbox-toggle").click(function () {

                var clicks = $(this).data('clicks');
                if (clicks) {
                    // alert(1);
                    var fields_search = [];
                    $("#tblTraslationDetailsList2 tbody tr").each(function () {

                        var col0 = $(this).find("td").eq(0).find(":text").val() == '' ? 0 : $(this).find("td").eq(0).find(":text").val();
                        var col1 = $(this).find("td").eq(1).find(":text").val();
                        var col2 = $(this).find("td").eq(2).find(":text").val();
                        var col3 = $(this).find("td").eq(3).find(":text").val();
                        var col4 = $(this).find("td").eq(4).find(":text").val();
                        var col5 = $(this).find("td").eq(5).find(":text").val();
                        var col6 = $(this).find("td").eq(6).find(":text").val();
                        var col7 = $(this).find("td").eq(7).find(":text").val();
                        var col8 = $(this).find("td").eq(8).find(":text").val();
                        var col9 = $(this).find("td").eq(9).find(":text").val();
                        var col10 = $(this).find("td").eq(10).find(":text").val();
                        var col11 = $(this).find("td").eq(11).find(":text").val();
                        var col12 = $(this).find("td").eq(12).find(":text").val();
                        var col13 = $(this).find("td").eq(13).find(":text").val();
                        var col14 = $(this).find("td").eq(14).find(":text").val();

                        /*trasl_id	
                         * trasl_date_request	
                         * status	
                         * trasl_descripcion	
                         * prison_per_identification	
                         * prison_per_name	
                         * prison_per_lastname	
                         * sex	
                         * prontuario	
                         * status_sgp	
                         * trasl_type_descripcion	
                         * crs_andigen	
                         * crs_destino	
                         * name_analyst	
                         * lastname_analyst*/

                        fields_search.push({"th.trasl_id": col0, "th.trasl_date_request": col1, "th.trasl_state_process": col2,
                            "th.trasl_descripcion": col3, "ppl.prison_per_identification": col4,
                            "ppl.prison_per_name": col5, "ppl.prison_per_lastname": col6,
                            "ppl.sex": col7, "ppl.prontuario": col8, "ppl.status_sgp": col9,
                            "typ.trasl_type_descripcion": col10, "crss.crs_description": col11,
                            "crsd.crs_description": col12, "usr.usr_name": col13,
                            "usr.usr_lasname": col14});
                    });

                    $('#tblTraslationDetailsList tbody').empty();
                    var crs_id = '<?php echo "" . $_SESSION['_USU'][0]['crs_id']; ?>';
                    
                    seachTrasDetailsList(crs_id, fields_search);
                } else {
                    // alert(2);
                    clearFliedsBySearchTraslDetails();
                }
                $(this).data("clicks", !clicks);
            });
        });

        $(document).ready(function () {
            var crs_id = '<?php echo "" . $_SESSION['_USU'][0]['crs_id']; ?>';
            loadTraslationDetailsList(crs_id);

        });
        
     




    </script>



</div>