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
    #form-container{

    }
    #usr_img{        
        float: left;
    }


</style>
<script src="./View/js/Menu/Menu.js" type="text/javascript"></script>
<script src="./View/js/TraslationType/TraslationType.js" type="text/javascript"></script>
<script src="./View/js/Roles/Roles.js" type="text/javascript"></script>
<script src="./View/js/User/User.js" type="text/javascript"></script>
<div id="form-container">

    <form action="" id="frmUsuer">
        <img id="usr_img" src="./View/images/avatar_4830521.png" alt="Girl in a jacket" width="100" height="100">
        <label for="fname">Nombres Completos:</label><br>
        <input type="text" id="name_complete" name="name_complete" value=""style="width:300px" readonly=""><br>
        <label for="lname">Perfil:</label><br>
        <input type="text" id="txt_profile" name="txt_profile" value=""style="width:300px" readonly=""><br><br>
         <!--select>
            <option>Administrador</option>
             <option>Analista</option>
        </select><br><br-->


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
                <h2>Roles y Acciones </h2>
                <table id="tbl_roles">
                    <tbody></tbody>
                   
                </table>
            </div>

        </div>
    </form> 

</div>

<script>
    $(document).ready(function () {

        var idUsrSgp = '<?php echo"" . (isset($_GET['idSgp'])) ? $_GET['idSgp'] : " " ?>';        
        if (idUsrSgp) {
            //console.log('->'+idUsrSgp);
            loadUserForm(idUsrSgp);
            loadListMenu(idUsrSgp);
            loadTraslationType(idUsrSgp);
            loadListRoles(idUsrSgp);
        }

    });

</script>