
<script src="./View/js/CreatePPL/createppl.js" type="text/javascript"></script>
<style>
    .container_global{
        /*background-color:#CCC;*/
        width:100%;
        display:flex;
        justify-content: space-between;
    }
    .content-table{
        /* background-color: #C00;*/
        width: 75%;
        padding: 2px;
    }
    .content-search{
        /* background-color: #337ab7;*/
        width: 15%;
        padding: 2px;
    }
    input {
        /*border: 0;*/

    }
    table tbody tr td input{
        width: 387px;
        font-weight: bold;
    }
    table tbody tr td{
        font-weight: bold;
    }
</style>



<div id="respuestaAjax">


</div>
<div class="">

    <label id="nuevaAsistencia" class="btn btn-info"  > Persona Privada de Libertad</label>
    <fieldset><legend>Buscar PPL</legend>
        <label>Tipo Documento</label>
        <select id="doc_type_id" name="doc_type_id" required="">
            <option value="0">Selecionar Tipo </option>
            <option value="1">Cédula </option>
            <option value="2">Pasaporte</option>
            <option value="3">Otro</option>
        </select>
        <input type="text"  id="txtIdentification" name="txtIdentification"   required="">
        <input type="submit" class="btn btn-primary" value="BUSCAR"   style="margin-left: 75px" onclick="searchPPLsByCedula()"/> </td> 
    </fieldset>
</div>
<div>
    <form action="action" id="formBSGData">
        <div class="container_global" id="">

            <div class="content-table">
                <table id="tbbsg"  >                   
                    <tr><td>Condicion.Cedulado</td><td><input type="text"  id="txtCondition" name="txtCondition" readonly="" ></td> <td>Nro.Cédula</td><td><input type="text"  id="txtNUI" name="txtNUI" readonly=""></td></tr>
                    <tr><td>Nombres </td><td><input type="text"  id="txtName" name="txtName" readonly=""></td><td>Domicilio</td><td><input type="text"  id="txtResidence" name="txtResidence" readonly="" > </td>  </tr>
                    <tr><td>Profesion </td><td><input type="text"  id="txtProfession" name="txtProfession" readonly="" ></td><td>FechaInscripcionGenero</td><td> <input type="text"  id="txtDatetInscriptionGender" name="txtDatetInscriptionGender" readonly="" > </td>       </tr>
                    <tr><td>FechaNacimiento</td><td> <input type="text"  id="txtDateBorn" name="txtDateBorn"  readonly="" > </td>             <td>Sexo</td>  <td><input type="text"  id="txtSex" name="txtSex" readonly="" ></td> </tr>
                    <tr><td>Instruccion</td><td><input type="text"  id="txtInstruction" name="txtInstruction" readonly=""  > </td>                  <td>EstadoCivil </td> <td><input type="text"  id="txtMarriedStatus" name="txtMarriedStatus" readonly="" ></td></tr>
                    <tr><td><strong>Calle</strong></td><td><input type="text"  id="txtStreet" name="txtStreet" readonly="" ></td><td>LugarNacimiento</td><td><input type="text"  id="txtStreetBorn" name="txtStreetBorn" readonly="" ></td></tr>
                    <tr><td>Consulta</td><td> <input type="text"  id="txtResult" name="txtResult" readonly=""  ></td>                     <td>NombreMadre </td><td><input type="text"  id="txtNameMother" name="txtNameMother" readonly=""  ></td></tr>
                    <tr><td>FechaCedulación</td><td> <input type="text"  id="txtDateDocument" name="txtDateDocument" readonly="" > </td>             <td>NombrePadre</td><td><input type="text"  id="txtNameFather" name="txtNameFather" readonly=""  ></td></tr>
                    <tr><td>Nacionalidad </td><td><input type="text"  id="txtNationality" name="txtNationality" readonly="" ></td><td>Conyuge</td><td> <input type="text"  id="txtSpouse" name="txtSpouse" readonly="" readonly=""  > </td> </tr>
                    <tr><td>FechaInscripcionDefuncion</td><td> <input type="text"  id="txtDateDie" name="txtDateDie" readonly="" > </td>    <td>NumeroCasa</td><td><input type="text"  id="txtNumberHome" name="txtNumberHome" readonly=""  ></td></tr>
                    <tr><td>Genero</td><td> <input type="text"  id="txtGender" name="txtGender" readonly=""  ></td>                       <td>CodigoError</td> <td><input type="text"  id="txtCodeError" name="txtCodeError" readonly=""  ></td> </tr>
                    <tr><td>LugarInscripcionGenero</td><td> <input type="text"  id="txtStreetInscriptionGender" name="txtStreetInscriptionGender" readonly="" > </td>      <td></td> <td></td></tr>
                </table> 
            </div>
            <div class="content-search">

            </div>



        </div>


    </form>



    <div id="mensaje"></div>


    <div id="contenidoRegistro"></div>
    <div class="modal-footer">
        <!--<input type="button"  onclick="guardUsuario()" class="btn btn-default" value="Guardar" id="btnSaveUser"/>-->
        <input type="submit"   class="btn btn-info btn-sm" value="Guardar" id="btnSavePPL" name="btnSavePPL" onclick="validFielsEmpty()"/>
    </div>
</div>








