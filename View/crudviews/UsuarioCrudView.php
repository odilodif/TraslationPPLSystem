<script>
   
    function preparingUpdateUser() {        
        if (jQuery('#name').val() != '' && jQuery('#lastname').val() != '' && jQuery('#email').val() != '' && jQuery('#address').val() != '' && jQuery('#password').val() != '' && jQuery('#phone').val() != '' && jQuery('#txtIdUser').val()!='' && jQuery('#selectUsers').val()!='SELECCIONE UN PERFIL') {
            
            updateUser($('#name').val(), $('#lastname').val(), $('#email').val(), $('#address').val(), $('#password').val(), $('#phone').val() , $('#txtIdUser').val(),$('#selectUsers').val());
            
        } else {
            alert('LLENAR LOS CAMPOS DEL USUARIO Y SELECCIONE PERFIL')
        }

    }
</script>



<div class="modal clear-shadow" id="modalUsersCrudView"  tabindex="-1" role="dialog" aria-labelledby="myModalLebel" aria-hidden="true">
    <div class="modal-dialog" id="modalUsersCrudViewdiag" style="width: 60%">
        <div class="modal-content" id="">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <input type="button"  style="width:100%;"value="Edición de Usuarios" id="listaMenu"   class="btn btn-primary btn-xs" disabled="true"/>

            </div>
            <div class="modal-body">
                                 
                    <div class="row bordes" > 
                        <div class="col-lg-14">
                            <div class="well sidebar-nav" id="tblscroll1 active">
                                <div class="panel panel-default" style="width:100%; height:100%;">
                                    <form id="formUser">
                                        <h1>Edicion de Usuarios Sistema Control y Geoposicionamiento Ecutaxi</h1>

                                        <div class="contentform">
                                            <div id="sendmessage"> </div>


                                            <div class="leftcontact">
                                                
                                                 <div class="form-group">
                                                    <p>Codigo<span>*</span></p>
                                                    <span class="icon-case"><i class="fa fa-align-center"></i></span>
                                                    <input type="text" id="txtIdUser"  readonly="true" style="color: red; font-size: 20px"/>
                                                    <div class="validation"></div>
                                                </div> 
                                                <div class="form-group">
                                                    <p>Nombre<span>*</span></p>
                                                    <span class="icon-case"><i class="fa fa-male"></i></span>
                                                    <input type="text" id="name" data-rule="required"  required="true"/>
                                                    <div class="validation"></div>
                                                </div> 
                                                <div class="form-group">
                                                    <p>Apellido <span>*</span></p>
                                                    <span class="icon-case"><i class="fa fa-user"></i></span>
                                                    <input type="text"  id="lastname" data-rule="required"  required="true"/>
                                                    <div class="validation"></div>
                                                </div>

                                                <div class="form-group">
                                                    <p>E-mail <span>*</span></p>	
                                                    <span class="icon-case"><i class="fa fa-envelope-o"></i></span>
                                                    <input type="email"  id="email" data-rule="email" />
                                                    <div class="validation"></div>
                                                </div>	


                                               

                                            </div>

                                            <div class="rightcontact">	
                                                
                                                 <div class="form-group">
                                                    <p>Dirección <span>*</span></p>
                                                    <span class="icon-case"><i class="fa fa-map-marker"></i></span>
                                                    <input type="text"  id="address" data-rule="required" required="true"/>
                                                    <div class="validation"></div>
                                                </div>

                                                <div class="form-group">
                                                    <p>Clave  o Contraseña <span>*</span></p>
                                                    <span class="icon-case"><i class="fa fa-building-o"></i></span>
                                                    <input type="password"  id="password" data-rule="required"  required="true"/>
                                                    <div class="validation"></div>
                                                </div>	

                                                <div class="form-group">
                                                    <p>Telefono <span>*</span></p>	
                                                    <span class="icon-case"><i class="fa fa-phone"></i></span>
                                                    <input type="text" id="phone" data-rule="maxlen:10" required="true"/>
                                                    <div class="validation"></div>
                                                </div>
                                                
                                                <div class="form-group" id="divtxtProile">
                                                    <p>Perfil <span>*</span></p>	
                                                    <span class="icon-case"><i class="fa fa-phone"></i></span>
                                                    <input type="text" id="txtProfile" data-rule="maxlen:10" required="true"/>
                                                    <div class="validation"></div>
                                                </div>

                                                <div class="form-group" id="divCBoxProfile">
                                                    <p>Perfil <span>*</span></p>
                                                    <span class="icon-case"><i class="fa fa-info"></i></span>
                                                    <select  id="selectUsers">
                                                        <!--<option value="Seleccione Perfil">SELECCIONE UN PERFIL</option>-->
                                                        <!--<option value="1">Administrador</option>-->
                                                    </select>
                                                    <div class="validation"></div>
                                                </div>




                                            </div>
                                        </div>       
                                        <div id="button" class="contenbutton">
                                            <input type="button"  onclick="preparingUpdateUser()" id="btnUpdateUser" value="Guardar"/>
                                        </div>
                                    </form>	

                                </div>
                            </div>                                
                        </div>
                    </div>
                
            </div>
        </div>

    </div>



</div> 
