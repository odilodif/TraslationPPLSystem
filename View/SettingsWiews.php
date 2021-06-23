<!DOCTYPE html>

<style media="screen">
    .objets-container, .type-traslation-container, .roles-acctions-container  {
        width: 30%;
        height:400px;
        border: solid 1px #555;
        float: left;
        margin-left: 10px;
        padding: 16px;
    }



</style>
<div id="form-container">
    <form action="/action_page.php">
        <label for="fname">First name:</label><br>
        <input type="text" id="fname" name="fname" value="John"><br>
        <label for="lname">Last name:</label><br>
        <input type="text" id="lname" name="lname" value="Doe"><br><br>
        <input type="submit" value="Submit">
        <div class="container-settings">
            <div class="objets-container">



                <h2>Menus- Objetos</h2>
                <table >
                    <tr>
                        <td> <input type="checkbox" name="" value=""> </td> <td>Inicio</td>
                    </tr>
                    <tr>
                        <td> <input type="checkbox" name="" value=""> </td> <td>CrearSolicitud de Traslado</td>
                    </tr>
                    <tr>
                        <td> <input type="checkbox" name="" value=""> </td> <td>Lista de Traslados </td>
                    </tr>
                    <tr>
                        <td> <input type="checkbox" name="" value=""> </td> <td>Vista-Analista</td>
                    </tr>
                    <tr>
                        <td> <input type="checkbox" name="" value=""> </td> <td>Vista Director Planta Central</td>
                    </tr>
                    <tr>
                        <td> <input type="checkbox" name="" value=""> </td> <td>Vista Subdirector Técnico </td>
                    </tr>
                    <tr>
                        <td> <input type="checkbox" name="" value=""> </td> <td>Vista Operativos Seguridad Penitenciaria </td>
                    </tr>
                    <tr>
                        <td> <input type="checkbox" name="" value=""> </td> <td>Reportes 1</td>
                    </tr>
                    <tr>
                        <td> <input type="checkbox" name="" value=""> </td> <td>Reportes 2 </td>
                    </tr>
                    <tr>
                        <td> <input type="checkbox" name="" value=""> </td> <td>Configuraciones</td>
                    </tr>

                </table>
            </div>
            <div class="type-traslation-container">
                <h2>Tipo de Traslado</h2>
                <table >

                    <tr>
                        <td> <input type="checkbox" name="" value=""> </td> <td>Por seguridad</td>
                    </tr>
                    <tr>
                        <td> <input type="checkbox" name="" value=""> </td> <td>Orden Juducial</td>
                    </tr>
                    <tr>
                        <td> <input type="checkbox" name="" value=""> </td> <td>Hacinamiento</td>
                    </tr>
                    <tr>
                        <td> <input type="checkbox" name="" value=""> </td> <td>Acercamiento Familiar</td>
                    </tr>
                    <tr>
                        <td> <input type="checkbox" name="" value=""> </td> <td>Por Salud</td>
                    </tr>
                    <tr>
                        <td> <input type="checkbox" name="" value=""> </td> <td>Por niños menores a los 36 meses</td>
                    </tr>
                </table>

            </div>
            <div class="roles-acctions-container">
                <h2>Roles-Perfiles y Acciones </h2>
                <table>
                    <tr>
                        <td> <input type="checkbox" name="" value=""> </td> <td>Crear</td>
                    </tr>
                    <tr>
                        <td> <input type="checkbox" name="" value=""> </td> <td>Traladar</td>
                    </tr>
                    <tr>
                        <td> <input type="checkbox" name="" value=""> </td> <td>Revisar</td>
                    </tr>
                    <tr>
                        <td> <input type="checkbox" name="" value=""> </td> <td>Aprobar</td>
                    </tr>
                    <tr>
                        <td> <input type="checkbox" name="" value=""> </td> <td>Autorizar</td>
                    </tr>
                    <tr>
                        <td> <input type="checkbox" name="" value=""> </td> <td>Finalizar Proceso de Traslados</td>
                    </tr>
                </table>
            </div>

        </div>
    </form> 

</div>

<script>
    $(document).ready(function () {

        var idSgp = '<?php echo"" . (isset($_GET['idSgp'])) ? $_GET['idSgp'] : " " ?>';
        if (idSgp) {
            loadUserForm(idSgp);
        } else {
            alert(idSgp);
        }
    });

</script>