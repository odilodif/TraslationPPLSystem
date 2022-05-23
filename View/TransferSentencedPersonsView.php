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
<script src="./View/js/TransferSentencedPersonsView/TransferSentencedPersons.js" type="text/javascript"></script>
<!--Style Modal-->
<link href="./View/css/CreateResquestTraslationView/CreateRequestTraslationView.css" rel="stylesheet" type="text/css"/>
<style>

    #navegation-bar{
        width: 467px;
        float: right;
        margin-right: 38%;
    }

    #content_data_ppl,  #content_data_ppl_dos{

        width: 30,33%;
    }

    #content_data_ppl_tres, #content_data_ppl_cuatro, #content_data_ppl_cinco, #content_data_ppl_seis, #content_data_ppl_siete{

        width: 20%;
    }
    #content_photo_ppl{



    }

    div{
        border-radius: 5px;
    }
    .container_global{
        background-color:#CCC;
        width:100%;
        display:flex;
        justify-content: space-between;
    }
    .contents{

    }

</style>
<div  id="navegation-bar">
    <div id="respuestaAjax">


    </div>
    <div style="display:flex; ">   <p>NRO. DE DOCUMENTO:</p> &nbsp;&nbsp; <p style="color: red;  font-size: 14px; font-weight: bold;">SNAI-TE-00067397 </p> </div>
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
<div>TRASLADO DE PPL</div>
<form name="" action="./Controller/TransferSentencedPersonController.php" method="POST">
    <input type="submit" value="Descargar" name="downloadPDF"  class="btn-primary" style="float: right;" />
</form>

<div>

    <select id="op_searchingPPL" name="op_searchingPPL"><option value="0">Cédula</option><option value="1">Prontuario</option></select>
    <input type="text" id="txtIdentificatorPPL" name="txtIdentificatorPPL"/> <button class="btn-primary" onclick="searchPPLIdentificatorProntuario()">Buscar.PPL</button>

</div>

<form name="" action="" method="POST">
    <div style="float:right">
        <input type="submit" id="btnTransfSentencedPPL" class="btn-primary" value="Enviar.Solicitud" style=""/>

    </div>

    <div id="content_ficha_ppl" class="container_global">
        <div id="content_data_ppl" class="contents">
            <table>                   
                <tr><td>  Fecha de Pédida de Libertad </td><td> : 17/01/2017 </td> </tr>
                <tr><td>Nombres Completos</td><td>: VILLACRES MERACARLOS ALFONSO</td></tr>  
                <tr><td>Delito Principal</td><td>: ART. 379\LESIONES CAUSADAS POR ACCIDENTE DE TRANSITO</td></tr>             
                <tr><td>Centro Origen </td><td>: CDP - CDC MASCULINO - EL INCA</td></tr>
                <tr><td>Ubicación Origen Celda</td><td>: CDP - CDC MASCULINO - EL INCA / TRANSITO</td></tr>
                <tr><td>Traslado</td><td>: Externo</td></tr>
                <tr><td>Quipux.Motivado</td><td><input type="file" id="fileQuipux" name="fileQuipux" required=""><input type="text" id="numquipux" name="numquipux" required="" >Nro.Quipux</td> </tr>
                <tr><td>Informe.Jurídico</td><td><input type="file" id="fileInfJur" name="fileInfJur" required=""></td></tr> 
                <tr><td>Acta.Junta.Tratamiento</td><td><input type="file" id="fileActaTra" name="fileActaTra" required=""></td></tr> 
                <tr><td>Informe.Seguridad</td><td><input type="file" id="fileInfoSeg" name="fileInfoSeg" required=""></td></tr>
                <tr><td>Partes.Seguridad.PPL</td><td><input type="file" id="fileInfoSeg" name="fileInfoSeg" required=""></td></tr> 
            </table>
        </div> 
        <div id="content_data_ppl_dos" class="contents">
            <table>
                <tr><td>Tiempo de Permanencia en el centro </td><td> <input type="number" id="tentacles" name="tentacles"
                                                                            min="0" max="100">Años<input type="number" id="tentacles" name="tentacles"
                                                                            min="0" max="12"> Meses <input type="number" id="tentacles" name="tentacles"
                                                                            min="0" max="31">Días </td></tr>
                <tr><td>No.Proceso</td><td><table><tr><td>2015-03922 UJP MANTA</td></tr><tr><td>Hello</td></tr></table></td></tr>
                <tr><td>% de Cumplimiento</td><td>: 80%</td></tr> 
                <tr><td>Situación Jurídica de la PPL </td><td>:Sentenciado</td></tr>
                <tr><td>SANCION A PRIVADO DE LIBERTAD </td><td>: MJDHC-SEG-SAN-00000678</td></tr>  
                <tr><td>Fecha de Registro</td><td><input type="date" id="dateReg"/></td></tr>
                <tr><td>Tipo de Traslado</td><td> <select id="trasl_type_id" name="trasl_type_id" required="">
                            <option value="0">Selecionar Tipo de Traslados </option>
                            <option value="1">Orden Judicial</option><option value="2">Seguridad</option><option value="3">Salud</option><option value="4">Cercanía Familiar</option><option value="5">Hacinamiento</option><option value="6">Separación</option><option value="7">Madres con Niños Menores 36m</option><option value="8">Todos</option></select> </td></tr>

                <tr><td>Centro de Destino</td><td>:
                        <select id="crs_id_destination" name="crs_id_destination">
                            <option value="0">Selecionar Crs </option>
                            <option value="10882">UNIDAD DE DEPURACION EL INCA</option><option value="10875">UNIDAD DE REINSERCION SOCIAL CRS QUITO VARONES NRO. 4 </option><option value="10867">UNIDAD DE REINSERCION SOCIAL SUCUMBIOS</option><option value="10862">UNIDAD DE REINSERCION SOCIAL SANTO DOMINGO</option><option value="10855">UNIDAD DE REINSERCION SOCIAL  COTOPAXI</option><option value="10851">CPL-LA ROCA</option><option value="10845">UNIDAD DE REINSERCION SOCIAL  MACHALA</option><option value="10837">UNIDAD DE REINSERCION SOCIAL  PUYO</option><option value="10833">UNIDAD DE REINSERCION SOCIAL JIPIJAPA</option><option value="10829">UNIDAD DE REINSERCION SOCIAL IBARRA</option><option value="10825">UNIDAD DE REINSERCION SOCIAL MIXTO - GUAYAQUIL</option><option value="10821">UNIDAD DE REINSERCION SOCIAL ESMERALDAS MASCULINO</option><option value="10817">UNIDAD DE REINSERCION SOCIAL DE CAÑAR</option><option value="10810">UNIDAD DE REINSERCION SOCIAL DE ARCHIDONA</option><option value="10806">UNIDAD DE REINSERCION SOCIAL DE AMBATO</option><option value="10798">UNIDAD DE REINSERCION SOCIAL DE ZARUMA</option><option value="10795">UNIDAD DE REINSERCION SOCIAL DE PORTOVIEJO FEMENINO</option><option value="10791">UNIDAD DE REINSERCION SOCIAL DE BABAHOYO</option><option value="10788">UNIDAD DE REINSERCION SOCIAL DE LOJA</option><option value="10784">UNIDAD DE REINSERCION SOCIAL DE QUEVEDO</option><option value="10780">UNIDAD DE REINSERCION SOCIAL ESMERALDAS  FEMENINO</option><option value="10774">UNIDAD  REINSERCION SOCIAL ALAUSI</option><option value="10772">UNIDAD DE REINSERCION SOCIAL EL RODEO</option><option value="10768">UNIDAD DE REINSERCION SOCIAL BAHÍA DE CARAQUEZ</option><option value="10763">UNIDAD DE REINSERCION SOCIAL DE AZOGUES</option><option value="10761">UNIDAD DE REINSERCION SOCIAL DE GUARANDA</option><option value="10757">UNIDAD DE REINSERCION SOCIAL  TULCAN</option><option value="10755">UNIDAD DE REINSERCION SOCIAL DE QUITO</option><option value="10745">CPPL QUEVEDO</option><option value="10744">CRS ALAUSI</option><option value="10721">UAT FLAGRANCIA DURAN</option><option value="10716">UAT FLAGRANCIA GUAYAQUIL</option><option value="10715">CRS 4 VARONES</option><option value="10681">CDP - CDC - MIXTO - ALAUSI</option><option value="10597">UAT FLAGRANCIA QUITUMBE</option><option value="10593">UAT FLAGRANCIA ALAUSI</option><option value="10592">UAT FLAGRANCIA EL EMPALME</option><option value="10591">UAT FLAGRANCIA ESMERALDAS</option><option value="10416">UAT FLAGRANCIA AMBATO</option><option value="10378">UAT FLAGRANCIA MANTA</option><option value="9825">UAT FLAGRANCIA QUITO</option><option value="9787">UNIDAD DE REINSERCION SOCIAL MACAS</option><option value="9777">UNIDAD DE REINSERCION SOCIAL RIOBAMBA</option><option value="9772">UNIDAD DE REINSERCION SOCIAL TURI</option><option value="9654">CRS MIXTO - QUEVEDO </option><option value="9640">CDP - CDC MASCULINO - CAÑAR</option><option value="9616">CDP - CDC MASCULINO - JIPIJAPA</option><option value="9545">CRS FEMENINO ESMERALDAS</option><option value="9460">CDP MIXTO - MACAS</option><option value="4289">CRS MASCULINO - SANTO DOMINGO</option><option value="4288">CDP - CDC MIXTO - SANTO DOMINGO</option><option value="4287">CRS MASCULINO - SUCUMBIOS</option><option value="4286">CDP - CDC - MIXTO - SUCUMBIOS</option><option value="4285">CRS MIXTO - AMBATO</option><option value="4284">CDP - CDC MIXTO - AMBATO</option><option value="4283">CRS FEMENINO - QUITO (Ate.Pri)</option><option value="4282">CRS QUITO VARONES NRO. 4</option><option value="4280">CC MIXTO - QUITO</option><option value="4279">CDP - CDC - MIXTO - PUYO</option><option value="4278">CRS MIXTO - ARCHIDONA</option><option value="4277">CDP - CDC MIXTO - ARCHIDONA</option><option value="4276">CC MIXTO - ARCHIDONA</option><option value="4275">CRS MIXTO - MACAS</option><option value="4274">CRS MASCULINO - BAHIA</option><option value="4273">CRS MASCULINO - JIPIJAPA</option><option value="4272">CRS MASCULINO - EL RODEO</option><option value="4271">CRS FEMENINO - PORTOVIEJO</option><option value="4270">CDP - CDC MASCULINO - BAHIA</option><option value="4268">CDP - CDC MIXTO - PORTOVIEJO</option><option value="4266">CRS MASCULINO - BABAHOYO</option><option value="4265">CDP - CDC MASCULINO - BABAHOYO</option><option value="4264">CRS MIXTO - LOJA</option><option value="4263">CDP - CDC MIXTO - LOJA</option><option value="4262">CRS MASCULINO - IBARRA</option><option value="4260">CRS FEMENINO - GUAYAQUIL</option><option value="4257">CC MIXTO-GUAYAQUIL</option><option value="4255">CRS MASCULINO - ESMERALDAS</option><option value="4254">CDP - CDC MIXTO - ESMERALDAS</option><option value="4253">CRS FEMENINO - ZARUMA</option><option value="4252">CRS MASCULINO - MACHALA</option><option value="4251">CRS MIXTO - RIOBAMBA</option><option value="4249">CDP - CDC MIXTO - RIOBAMBA</option><option value="4248">CRS RSCN MIXTO - COTOPAXI</option><option value="4247">CDP - CDC RSCN MIXTO - COTOPAXI</option><option value="4246">CRS MIXTO - TULCAN</option><option value="4245">CRS MASCULINO - CAÑAR</option><option value="4244">CRS MASCULINO - AZOGUES</option><option value="4242">CDP - CDC MASCULINO - AZOGUES</option><option value="4241">CRS MIXTO - GUARANDA</option><option value="4240">CDP - CDC MASCULINO - GUARANDA</option><option value="4239">CRS RSCS MIXTO - TURI</option><option value="4238">CDP - CDC RSCS MIXTO - TURI</option><option value="3301">CRS REGIONAL GUAYAS</option><option value="3092">CRS GUAYAQUIL VARONES 1</option><option value="2505">CDP CDC MIXTO GUAYAQUIL</option></select>
                <tr><td>Nivel de Seguridad</td><td><select id="oe-field-input-578" name="regimen">

                            <option>

                                Selecione una opción
                            </option>

                            <option>

                                MINIMA
                            </option>

                            <option>

                                MEDIANA
                            </option>

                            <option>

                                MAXIMA
                            </option>



                        </select></td></tr>
                <tr><td>Estado de la Cuasa </td><td><select id="state_cause" name="state_cause">
                            <option>
                                Deligencias
                            </option>
                            <option>
                                Audiencia Preparatoria
                            </option>
                            <option>
                                Indagación
                            </option>
                            <option>
                                Instrucción Fiscal
                            </option>



                        </select></td></tr> 
                
                
                <tr><td>Autorizado por: (Director/Juez)</td><td><input type="text"/></td></tr>
            </table>
        </div> 
        <div id="content_photo_ppl" class="contents">

            <div>
                PRONTUARIO:
            </div>
            <div>
                MJDHC-A-00040048
            </div>
            <div>
                <img src="./View/images/user2-160x160.jpg" alt="Girl in a jacket">
                &nbsp;&nbsp;
            </div>
        </div>


    </div>
    <div id="content_ficha_trasf" class="container_global" style="margin-top:3px">

        <div id="content_data_ppl_tres" >
            <textarea name="textarea" rows="10" cols="33">Antecedentes de los Hechos que Motivan el Traslado </textarea>
        </div> 
        <div id="content_data_ppl_cuatro" >
            <textarea name="textarea" rows="10" cols="33"> Situación Jurídica de la PPL  </textarea>

        </div> 
        <div id="content_data_ppl_cinco" >
            <textarea name="textarea" rows="10" cols="33"> Perfil y Antecedentes de la PPL </textarea>

        </div> 
        <div id="content_data_ppl_seis" >
            <textarea name="textarea" rows="10" cols="33"> Conclusiones</textarea>

        </div> 
        <div id="content_data_ppl_siete" >
            <textarea name="textarea" rows="10" cols="33">Recomendaciones </textarea>

        </div> 

    </div>
</form>
<?php
// put your code here
?>
