<script src="./View/js/director/director.js" type="text/javascript"></script>
<script src="./View/js/Reports/Report2.js" type="text/javascript"></script>
<br>
<br>
<br>
<script>
    $(document).ready(function () {
        var today = new Date();
        var date = today.getFullYear() + '-' + (today.getMonth() + 1) + '-' + today.getDate();
        // $('#txtdDateFrom').val(date);
    });
</script>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Traslados</title>

    <style type="text/css">
        #container, #sliders {
            min-width: 310px; 
            max-width: 800px;
            margin: 0 auto;
        }
        #container {
            height: 400px; 
        }
    </style>
</head>
<body>

    <div>
        <button class="btn btn-primary btn-xs" onclick="makeReport()">Reporte</button>&nbsp;
        <input type="date" id="txtdDateFrom" required="">&nbsp;
        <input type="date" id="txtdDateTo" required="">
        &nbsp; <label>CPL Destino</label> &nbsp;
        <select id="crs_id_destination" name="crs_id_destination" required="" >
            <option value="0">Todos </option>
        </select>&nbsp;
        <label>Tipo de Traslados</label> &nbsp;
        <select id="trasl_type_id" name="trasl_type_id" required="" >
            <option value="0">Todos </option>
        </select>
    </div>


    <script src="./View/js/Highcharts-7.2.0/code/highcharts.js" type="text/javascript"></script>
    <script src="./View/js/Highcharts-7.2.0/code/highcharts-3d.js" type="text/javascript"></script>
    <script src="./View/js/Highcharts-7.2.0/code/modules/exporting.js" type="text/javascript"></script>
    <script src="./View/js/Highcharts-7.2.0/code/modules/export-data.js" type="text/javascript"></script>
    <br>
    <br>
    <br>
    <br>
    <div id="container">

    </div>

    <div id="sliders">

    </div>


    <script type="text/javascript">
            $(document).ready(function () {

                loadComboboxCrs();
                loadComboboxTraslationType();
                var from = $('#txtdDateFrom').val();
                var to = $('#txtdDateFrom').val();
                var crs = $('#crs_id_destination').val();
                var typeT = $('#trasl_type_id').val();
                staticsTraslationPPL(from, to, crs,typeT);
            });


    </script>
</body>
