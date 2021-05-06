
<?php
$currentDateTime = date('Y-m-d');
?>
<script src="./View/js/Reports/Report1.js" type="text/javascript"></script>
<link rel="stylesheet" type="text/css" href="./View/DataTables-1.10.19/media/css/jquery.dataTables.css">
<link rel="stylesheet" type="text/css" href="./View/DataTables-1.10.19/examples/resources/syntax/shCore.css">
<link rel="stylesheet" type="text/css" href="./View/DataTables-1.10.19/examples/resources/demo.css">
<script type="text/javascript" language="javascript" src="./View/DataTables-1.10.19/media/js/jquery-3.3.1.js"></script>
<script type="text/javascript" language="javascript" src="./View/DataTables-1.10.19/media/js/jquery.dataTables.js"></script>
<script type="text/javascript" language="javascript" src="./View/DataTables-1.10.19/examples/resources/syntax/shCore.js"></script>
<script type="text/javascript" language="javascript" src="./View/DataTables-1.10.19/examples/resources/demo.js"></script>
<a href="Reports.php"></a>
<!--- others libraries-->

<link rel="stylesheet" type="text/css" href="./View/exporting/datatables.min.css"/>
<script type="text/javascript" src="./View/exporting/datatables.min.js"></script>



<script type="text/javascript" language="javascript" class="init">
    $(document).ready(function () {

        loadReport1();

    });



</script>
</head>
<body class="dt-example">
    <br>
    <br>
    <br>
    <div class="">
        
            <h1>Sistemas de Administracion Traslados SNAI <span>Reporte  de Traslados</span></h1>
            <div class="info">

            </div>
            <div class="demo-html">
                <div id="respuestaAjax">


                </div>

            </div>
            <table id="Report1" class="display" style="width:100%">
                <thead>
                    <tr>
                        <th>Nro.</th>  <th>Fecha Inicio</th> <th>Fecha Aprobacion</th><th>Fecha Ejecución</th>  <th>Tipo de Traslado</th> <th>CPL Origen</th>  <th>CPL Destino</th>  <th>Estado</th><th>Director Crs</th><th>Analista</th><th>Aprobado por</th>

                    </tr>
                </thead>
                <tbody>

                </tbody>
            </table>





    </div>
</div>
</section>
