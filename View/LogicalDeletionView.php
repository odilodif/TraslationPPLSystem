<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <script type="text/javascript">
        function loadfile() {
            console.log('loadfile');
            $('#respuestaAjax').html('<span style="color: red;"> Espere por favor. </span></spam><img id="loader" src="./View/images/giphy.gif"/>');
        }
    </script>

    <body>
        <div id="respuestaAjax">


        </div>
        <form class="form-horizontal" action="./Controller/LogicalDeletionController.php" method="post" name="upload_excel" enctype="multipart/form-data">
            <fieldset>

                <label class="col-md-4 control-label" for="singlebutton">Asegúrese que el archivo tenga extensión csv.</label>
                <!-- File Button -->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="filebutton">Seleccione un Archivo</label>
                    <div class="col-md-4">
                        <input type="file" name="file" id="file" class="input-large" accept=".csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel"/>
                    </div>
                </div>

                <!-- Button -->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="singlebutton">Cargar Prontuarios al Sistema SGP</label>
                    <div class="col-md-4">
                        <button type="submit" id="execute" name="execute" class="btexecuten btn-primary button-loading" data-loading-text="Loading..." onclick="loadfile()">Ejecutar</button>
                    </div>
                </div>

            </fieldset>
        </form>
    </body>
</html>
