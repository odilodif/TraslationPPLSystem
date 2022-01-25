<?php
// start a session
//session_start();
// manipulate session variables
?>
<!DOCTYPE html>

<style media="screen">
    .objets-container, .type-traslation-container, .roles-acctions-container  {
        width: 30%;
        height:400px;
        border: solid 1px #555;
        float: left;
        margin-left: 10px;
        padding: 16px;
        background-color: lightblue;
        overflow-y: scroll;

    }
    #fmrUser{
        margin: 1% auto;
        width: 70%;
    }
    #usr_img{
        float:left;
    }
    .section-fileds-global{
        display:flex;
        margin-bottom: 20px;
        flex-direction: row;
        flex-wrap: nowrap;
    }

    .section-fileds-uno, .section-fileds-dos{
        padding-top: 9px;
        heigth:300px;
        width:400px;

    }

    .section-fileds-tres{
        padding-top: 9px;
        heigth:300px;
        width:150px;
    }

    .btn-save{
        /*color: #fff;
         background-color: #337ab7;
         border-color: #2e6da4;
         margin-left: 199px;
         margin-bottom: 4px;
         padding: 5px 10px;
         font-size: 12px;
         line-height: 1.5;
         border-radius: 3px;*/
    }
    #container-buttons{
        width:250;
        margin: 11px 0px 0px 217px;
    }

</style>
<script src="./View/js/Menu/Menu.js" type="text/javascript"></script>
<script src="./View/js/TraslationType/TraslationType.js" type="text/javascript"></script>
<script src="./View/js/Roles/Roles.js" type="text/javascript"></script>
<script src="./View/js/User/User.js" type="text/javascript"></script>
<script src="./View/js/Profile/Profile.js" type="text/javascript"></script>
<script src="./View/js/SettingsUserViews/SettingsUserViews.js" type="text/javascript"></script>
<div id="form-container"> 
    <div id="container-buttons">
        <input type="submit" id="btn-edit"  class="btn btn-primary btn-sm" value="Editar"   onclick="enableEdition()" >        
        <input type="submit"  id="btn-save"  class="btn-save btn-success" value="Guardar" onclick="saveSettingsUser(idUsrSgp)" >
        <input type="submit" id="btn-cancel"  class="" value="Cancelar"   onclick="" >
    </div>


    <form  id="fmrUser">
        <div class="section-fileds-global">
            <img id="usr_img" src="./View/images/avatar_4830521.png" alt="Girl in a jacket" width="100" height="100">
            <div class="section-fileds-uno">               
                <label for="fname">Nombres Completos:</label><br>
                <input type="text" id="name_complete" name="name_complete" value=""style="width:300px" readonly=""><br>
                <label for="lname">Perfil:</label><br>
                <input type="text" id="txt_profile" name="txt_profile" value=""style="width:300px" readonly="">
                <select id="slect-profile">
                    <option value="0">Seleccione.Una.Opción</option>                    
                </select>
            </div>
            <div class="section-fileds-dos">
                <label for="fname">Centro CPL/CPPL:</label><br>
                <input type="text" id="crs_name" name="crs_name" value=""style="width:300px" readonly=""><br>
                <label for="lname">Usuario:</label><br>
                <input type="text" id="user_nick" name="user_nick" value=""style="width:300px" readonly=""> 

            </div>


        </div>
    </form>
    <div class="container-settings">
        <div class="objets-container">
            <h2>Menus- Objetos</h2>
            <table id="menus_objetos">
                <tbody></tbody>



            </table>
        </div>
        <div class="type-traslation-container">
            <h2>Tipo de Traslado</h2>
            <table id="tbl_traslation_type">

                <tbody></tbody>

            </table>

        </div>
        <div class="roles-acctions-container">
            <h2>Roles, Acciones y Permisos </h2>
            <table id="tbl_roles">

                <tbody>
                    <tr>
                        <th>Opción</th>
                        <th>Descripción.Roles</th>  
                        <th>Crear</th> 
                        <th>Leer</th> 
                        <th>Actualizar</th> 
                        <th>Eliminar</th>                          

                    </tr>
                </tbody>

            </table>
        </div>

    </div>


</div>

<script>
    var btnSave = document.getElementById("btn-save");
    var btnEdit = document.getElementById("btn-edit");
    var btnCancel = document.getElementById("btn-cancel");
    var select = document.getElementById("slect-profile");
    var txt_profile = document.getElementById("txt_profile");
    var idUsrSgp

    /*When init method this page*/
    $(document).ready(function () {
        idUsrSgp = '<?php echo"" . (isset($_GET['idSgp'])) ? $_GET['idSgp'] : " " ?>';
        if (idUsrSgp) {
            //console.log('->'+idUsrSgp);
            loadUserForm(idUsrSgp);
            loadListMenu(idUsrSgp);
            loadTraslationType(idUsrSgp);
            loadListRoles(idUsrSgp);
            loadProfilesAlls();
        }


        btnSave.style.display = "none";
        btnCancel.style.display = "none";
        select.style.display = "none";
        btnEdit.addEventListener("click", showBtnSave);
        btnCancel.addEventListener("click", excuteCancel);
        btnSave.addEventListener("click", showBtnEdit);
    });

    (function () {


    })();



    function showBtnSave() {
        btnSave.style.display = "";
        btnCancel.style.display = "";
        btnEdit.style.display = "none";
        select.style.display = "block";
        txt_profile.style.display = "none";
    }
    function showBtnEdit() {
        btnEdit.style.display = "block";
        btnCancel.style.display = "block";
        btnSave.style.display = "none";
        btnCancel.style.display = "none";
        select.style.display = "none";
        txt_profile.style.display = "";
    }

    function excuteCancel() {
        disableEdition();
        btnCancel.style.display = "none";
        btnSave.style.display = "none";
        btnEdit.style.display = "";
        select.style.display = "none";
        txt_profile.style.display = "";
    }

    $('#menus_objetos').on('dblclick', 'tr', function (e) {
        e.preventDefault();
        if ($(this).find('#menu_check').is(":checked")) {
            alert('checked..' + $(this).find('#menu_check').val() + '...->' + idUsrSgp);


        } else
        {
            alert('Por favor ponga un check en el cuadro ...')
        }
    });

</script>