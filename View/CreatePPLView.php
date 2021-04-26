
<?php
if (isset($_GET['result'])) {
    if ($_GET['result'] == 1) {
        echo '<script type="text/javascript">'
        . 'alert("Usuario guardado Satisfatoriamente!");'
        . ' profilesSelectOption();'
        . ''
        . '</script>';
    } else {
        echo '<script type="text/javascript">'
        . 'alert("Error al Guardar Usuario");'
        . 'profilesSelectOption();'
        . ''
        ;
    }
}
?>
<script src="./View/js/CreatePPL/createppl.js" type="text/javascript"></script>
 <form  action="" method="POST" onsubmit="return false;"  id="frmCreatePPL" >

    <div class="modal-content" id="modalContenido">
        <div class="modal-header">

            <input type="button" value="Persona Privada de Libertad" id="nuevaAsistencia"   class="btn btn-info btn-sm"/>

        </div>


        <div class="modal-body">
            <fieldset><legend>1. Generar PPL</legend> 
                <div class="row no-padding" style="margin-left: 5px;">
                    <div class="col col-lg-12" style="margin-left: 5px;" id="idTxtNombre">
                        <div class="col-md-1" >
                            <label>Tipo Documento</label>
                        </div>
                        <label class="input col-md-4" style="margin-left: 5px;"   >
    <!--                                <input type="text" value="Ramiro Calderon"/>-->
                            <select id="doc_type_id" name="doc_type_id" required="" >
                                <option value="0">Selecionar Tipo </option>
                                <option value="1">Cédula </option>
                                <option value="2">Pasaporte</option>
                                <option value="3">Otro</option>
                            </select>
                        </label>

                        <div class="col-md-1" >
                            <!--<label>Foto</label>-->
                        </div>
                        <label class="input col-md-4" style="margin-left: 5px;" >
                            <!--<input type="text"  class="form-control" placeholder="foto" readonly=""/>-->
                        </label>
                    </div>
                </div>




                <div class="row no-padding" style="margin-left: 5px;">
                    <div class="col col-lg-12" style="margin-left: 5px;" id="idTxtNombre">
                        <div class="col-md-1" >
                            <label>Cédula</label>
                        </div>
                        <label class="input col-md-4" style="margin-left: 5px;"   >
    <!--                                <input type="text" value="Ramiro Calderon"/>-->
                            <td><input type="text"  class="form-control" id="txtIdentification" name="txtIdentification" maxlength="50" placeholder="1722678000" required/></td>
                        </label>

                        <div class="col-md-1" >
                            <!--<label>Foto</label>-->
                        </div>
                        <label class="input col-md-4" style="margin-left: 5px;" >
                            <!--<input type="text"  class="form-control" placeholder="foto" readonly=""/>-->
                        </label>
                    </div>
                </div>
                <div class="row no-padding" style="margin-left: 5px;">
                    <div class="col col-lg-12" style="margin-left: 5px;">
                        <div class="col-md-1" >
                            <label>Nombres</label>
                        </div>
                        <label class="input col-md-4" style="margin-left: 5px;" >

                            <td><input type="text"  class="form-control" id="txtName" name="txtName"    required  placeholder="nombres"/></td>
                        </label>

                        <div class="col-md-1" >
                            <!-- <label>Huella</label>-->
                        </div>
                        <label class="input col-md-4" style="margin-left: 5px;" >

                          <!--  <input type="text" class="form-control"  placeholder="Huella" readonly=""/>-->
                        </label>


                    </div>
                </div>
                <div class="row no-padding" style="margin-left: 5px;">
                    <div class="col col-lg-12" style="margin-left: 5px;">
                        <div class="col-md-1" >
                            <label>Apellidos</label>
                        </div>
                        <label class="input col-md-4" style="margin-left: 5px;" >    
                            <td><input type="text" class="form-control"  name="txtLastname" id="txtLastname"  placeholder="apellidos" required/></td>
                        </label>

                        <div class="col-md-1" >
                            <label></label>
                        </div>
                        <label class="input col-md-4" style="margin-left: 5px;" >   

                        </label>
                    </div>
                </div>
            </fieldset>
        </div>
        <div id="mensaje"></div>
        <fieldset><legend>Registro del PPL</legend>

        </fieldset>
        <br />
        <div id="contenidoRegistro"></div>
        <div class="modal-footer">
            <!--<input type="button"  onclick="guardUsuario()" class="btn btn-default" value="Guardar" id="btnSaveUser"/>-->
            <input type="submit"   class="btn btn-info btn-sm" value="Guardar" id="btnSavePPL" name="btnSavePPL" onclick="validFielsEmpty()"/>
        </div>
    </div>

</form>

<script  type="text/javascript">

    $(document).ready(function () {
        

    });
    



    /*$("#doc_type_id").on('change', function () {
        $("#doc_type_id option:selected").each(function () {
            var selected = $(this).val();
            alert(selected);
            switch (selected) {
                case '1':
                    validIdentification();
                    console.log('cedula');
                    break;
                case '2':
                    console.log('pasaporte');
                    break;
                case '3':
                    console.log('otro');
                    break;

                default:
                    console.log('default' + selected + '.');
            }

        });

    });*/

   


</script>



