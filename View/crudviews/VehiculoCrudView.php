<script>
    function preparingUpdateVehi() {
        //alert('guarda');
        if (jQuery('#placaunit').val() != '' && jQuery('#codunit').val() != '' && jQuery('#colorunit').val() != '' && jQuery('#modelunit').val() != '' && jQuery('#coductorunit').val() != 'SELECCIONE UN CONDUCTOR' && jQuery('#idvehicule').val() != ''  && jQuery('#colorunit').val() != '') {
            //alert(jQuery('#idvehicule').val());
            updateVehicule($('#placaunit').val(), $('#codunit').val(), $('#colorunit').val(), $('#modelunit').val(), $('#coductorunit').val(), $('#idvehicule').val(), $('#marcaunit').val());
            //INSERT INTO usuario (USU_NOMBRE,USU_APELLIDO,USU_EMAIL,USU_TELEFONO,USU_CEDULA,USU_PASSWORD,USU_ESTADO,USU_DIRECCION,PERF_ID) 
        } else {
            alert('LLENAR LOS CAMPOS DEL USUARIO Y SELECCIONE PERFIL')
        }

    }
</script>



<div class="modal clear-shadow" id="modalVehiculoCrudView"  tabindex="-1" role="dialog" aria-labelledby="myModalLebel" aria-hidden="true">
    <div class="modal-dialog" id="modalVehiculoCrudViewdiag">
        <div class="modal-content" id="">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <input type="button"  style="width:100%;"value="Vehiculo" id="listaMenu"   class="btn btn-primary btn-xs" disabled="true"/>

            </div>
            <div class="modal-body">
                <fieldset><legend>Edición Vehículos</legend>                    
                    <div class="row bordes" > 
                        <div class="col-lg-10">
                            <div class="well sidebar-nav" id="tblscroll1 active">
                                <div class="panel panel-default" style="width:100%; height:100%;">
                                    <form id="formVehiculo">
                                        <h1>Sistema Control y Geoposicionamiento Ecutaxi</h1>

                                        <div class="contentform">
                                            <div class="leftcontact">
                                                <div class="form-group">
                                                    <input type="text" id="idvehicule" hidden="true" />
                                                    <p>PLACAS<span>*</span></p>
                                                    <span class="icon-case"><i class="fa fa-taxi"></i></span>
                                                    <input type="text" id="placaunit" data-rule="required" data-msg="Es requerido" required="true"/>
                                                    <div class="validation"></div>
                                                </div> 
                                                <div class="form-group">
                                                    <p>CODIGO UNIDAD <span>*</span></p>
                                                    <span class="icon-case"><i class="fa fa-truck"></i></span>
                                                    <input type="text"  id="codunit" data-rule="required" data-msg="Es requerido" required="true"/>
                                                    <div class="validation"></div>
                                                </div>

                                                <div class="form-group">
                                                    <p>COLOR <span>*</span></p>	
                                                    <span class="icon-case"><i class="fa fa-instagram"></i></span>
                                                    <input type="text"  id="colorunit" data-rule="" data-msg="Es requerido" required="true" />
                                                    <div class="validation"></div>
                                                </div>	




                                            </div>

                                            <div class="rightcontact" >	

                                                <div class="form-group">
                                                    <p>MODELO <span>*</span></p>
                                                    <span class="icon-case"><i class="fa fa-map-marker"></i></span>
                                                    <input type="text"  id="modelunit" data-rule="required" data-msg="Es requerido." required="true"/>
                                                    <div class="validation"></div>
                                                </div>
                                                <div class="form-group">
                                                    <p>MARCA <span>*</span></p>
                                                    <span class="icon-case"><i class="fa fa-map-marker"></i></span>
                                                    <input type="text"  id="marcaunit" data-rule="required" data-msg="Es requerido." required="true"/>
                                                    <div class="validation"></div>
                                                </div>

                                                <div class="form-group" hidden="true" id="selectorConductor">
                                                    <p>CONDUCTOR <span>*</span></p>
                                                    <span class="icon-case"><i class="fa fa-child"></i></span>
                                                    <select  id="coductorunit">
                                                        <!--<option value="Seleccione Perfil">SELECCIONE UN PERFIL</option>-->
                                                        <!--<option value="1">Administrador</option>-->
                                                    </select>
                                                    <div class="validation"></div>
                                                </div>

                                                <div class="form-group" id="divConductor"
                                                     <p>CONDUCTOR <span>*</span></p>
                                                    <span class="icon-case"><i class="fa fa-user"></i></span>
                                                    <input type="text"  id="txtConductor" data-rule="required" data-msg="Es requerido." required="true"/>
                                                    <div class="validation"></div>
                                                </div>


                                            </div>
                                        </div>       
                                        <div id="button" class="contenbutton">
                                            <input type="button"  onclick="preparingUpdateVehi()" id="btnSaveVehicule" value="Guardar"/>
                                        </div>
                                    </form>	

                                </div>
                            </div>                                
                        </div>
                    </div>
                </fieldset>
            </div>
        </div>

    </div>



</div> 