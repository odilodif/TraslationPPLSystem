<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>AdminLTE 2 | General Form Elements</title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

        <style>

            /**{
                border: 1px solid;
                color:red;

            }*/

            .row {
                position: relative;
                min-height: 1px;
                padding-right: 15px;
                padding-left: 15px;
            }




        </style>


        <!-- Font Awesome -->
        <link rel="stylesheet" href="./View/bower_components/font-awesome/css/font-awesome.min.css">
        <!-- Ionicons -->
        <link rel="stylesheet" href="./View/bower_components/Ionicons/css/ionicons.min.css">
        <link rel="stylesheet" href="./View/css/traslationxsecurityForm.css">
        <!-- DataTables -->
        <link rel="stylesheet" href="./View/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">




    </head>
    <body class="hold-transition skin-blue sidebar-mini">
        <div class="wrapper">

            <header class="main-header">
                <nav class="navbar navbar-static-top">

                </nav>
            </header>


            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
                        <li><a href="#">Formulario</a></li>
                        <li class="active">SNAI - Sistema de Traslados</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
                    <div class="">
                        <div id="nav-bar">
                            <ul>
                                <li><a href="#">Inicio</a></li>
                                <li><a href="#">Revisión</a></li>
                                <li><a href="#">Aprobación</a></li>
                                <li><a href="#">Traslado</a></li>
                                <li><a href="#">Cierre</a></li>
                            </ul>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#insertdatappl">Ingreso Datos PPL</a></li>
                            <li><a href="#revision">Revisión </a></li>
                            <li><a href="#add">Adjuntar</a></li>
                            <li><a href="#photos">Fotos/Videos</a></li>
                            <li><a href="#datetraslation">Fecha Traslado PPLS</a></li>
                        </ul>
                    </div>
                    <div class="tab-content">

                        <div id="insertdatappl" class="tab-pane fade in active">
                            <section>
                                <form>

                                    <div class=" row " >
                                        <div class="col-sm-6 ">
                                            <label class="control-label" for="inputWarning"><i class="fa fa-drivers-license-o"></i> Cédula/Pasaporte
                                            </label>
                                            <input type="text" class="form-control" id="inputWarning" placeholder="Enter ...">


                                        </div>
                                        <div class="col-sm-6 ">
                                            <label class="control-label" for="inputWarning"><i class="fa fa-fw fa-balance-scale"></i> Prontuario/Sgp
                                            </label>
                                            <input type="text" class="form-control" id="inputWarning" placeholder="Enter ...">



                                        </div>

                                    </div>

                                    <div class="row"  >
                                        <div class="col-sm-6 ">
                                            <label class="control-label" for="inputWarning"><i class="fa fa-user"></i> Nombres
                                            </label>
                                            <input type="text" class="form-control" id="inputWarning" placeholder="Enter ...">
                                        </div>
                                        <div class="col-sm-6 ">
                                            <label class="control-label" for="inputWarning"><i class="fa fa-user"></i> Apellidos
                                            </label>
                                            <input type="text" class="form-control" id="inputWarning" placeholder="Enter ...">

                                        </div>
                                    </div>

                                    <div class="row" >
                                        <div class="col-sm-6 ">
                                            <label class="control-label" for="inputWarning"><i class="fa fa-drivers-license-o"></i> Edad
                                            </label>
                                            <input type="text" class="form-control" id="inputWarning" placeholder="Enter ...">
                                        </div>
                                        <div class="col-sm-6 ">
                                            <label class="control-label" for="inputWarning"><i class="fa fa-venus"></i> <i class="fa fa-mars"></i>Sexo &nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;
                                            </label>
                                            <select>
                                                <option value="female">Opción</option>
                                                <option value="female">Femenino</option>
                                                <option value="female">Masculino</option>
                                            </select>

                                        </div>
                                    </div>
                                    <div class="row" >

                                        <div class="col-sm-6 ">
                                            <label class="control-label" for="inputWarning"><i class="fa fa-calendar"></i> Fecha Trámite
                                            </label>
                                            <input type="text" class="form-control" id="inputWarning" placeholder="Enter ...">
                                        </div>
                                        <div class="col-sm-6">
                                            <label class="control-label" for="inputWarning"><i class="fa fa-exchange"></i> Estado
                                            </label>
                                            <input type="text" class="form-control" id="inputWarning" placeholder="Enter ...">
                                        </div>
                                    </div>
                                    <div class="row" >

                                        <div class="col-sm-6 ">
                                            <label class="control-label" for="inputWarning"><i class="fa fa-home"></i> Crs/Origen
                                            </label>
                                            <input type="text" class="form-control" id="inputWarning" placeholder="Enter ...">
                                        </div>
                                        <div class="col-sm-6 ">
                                            <label class="control-label" for="inputWarning"><i class="fa fa-home"></i> Crs/Destino
                                            </label>
                                            <input type="text" class="form-control" id="inputWarning" placeholder="Enter ...">
                                        </div>
                                    </div>
                                    <div class="row" >
                                        <div class="col-sm-6 ">
                                            <label class="control-label" for="inputWarning"><i class="fa fa-book"></i> Observaciones
                                            </label>
                                            <input type="text" class="form-control" id="inputWarning" placeholder="Enter ...">
                                        </div>
                                    </div>




                                </form>
                            </section>

                        </div>

                        <div id="revision" class="tab-pane fade">

                            <table>
                                <tr>
                                    <th>
                                        <label class="control-label" for="inputWarning"><i class="fa fa-drivers-license-o"></i> Cargar archivo
                                        </label>
                                    </th>
                                    <th>
                                        <input type="text" class="form-control" id="inputWarning" placeholder="Nombre Archivo ...">
                                    </th>
                                    <th>
                                        <input type="file" />
                                    </th>
                                    <th>

                                    </th>
                                    <th>
                                        <label class="control-label" for="inputWarning"><i class="fa fa-fw fa-balance-scale"></i> Tipo de Informe
                                        </label>
                                    </th>
                                    <th>
                                        <select>
                                            <option value="female">SelecioneOp</option>
                                            <option value="female">Informe UIP</option>
                                            <option value="female">Informe Epicrisis</option>
                                        </select>
                                    </th>
                                </tr>
                                <tr>
                                    <th>
                                        <label class="control-label" for="inputWarning"><i class="fa fa-user"></i> Sent./Procesado
                                        </label>

                                    </th>
                                    <th>
                                        <select>
                                            <option value="female">SelecioneOp</option>
                                            <option value="female">Sentenciado</option>
                                            <option value="female">Procesado</option>
                                        </select>
                                    </th>
                                    <th></th>
                                    <th></th>

                                    <th>
                                        <label class="control-label" for="inputWarning"><i class="fa fa-user"></i> Observaciones
                                        </label>


                                    </th>
                                    <th>
                                        <input type="text" class="form-control" id="inputWarning" placeholder="Enter ...">


                                    </th>

                                </tr>
                                <tr>
                                    <th>
                                        <label class="control-label" for="inputWarning"><i class="fa fa-drivers-license-o"></i> Porcentaje de Pena
                                        </label>
                                    </th>
                                    <th>
                                        <input type="number" class="form-control" id="inputWarning" >
                                    </th>
                                    <th>

                                    </th>
                                    <th>

                                    </th>
                                    <th>
                                        <label class="control-label" for="inputWarning"><i class="fa fa-fw fa-balance-scale"></i> Nro. Delitos
                                        </label>
                                    </th>
                                    <th>
                                        <input type="number" class="form-control" id="inputWarning" >
                                    </th>
                                </tr>
                            </table>

                            <section class="content">
                                <div class="row">
                                    <div class="col-xs-12">
                                        <div class="box">
                                            <div class="box-header">
                                                <h3 class="box-title">Listado de Documentos</h3>
                                            </div>
                                            <!-- /.box-header -->
                                            <div class="box-body">
                                                <table id="example1" class="table table-bordered table-striped">
                                                    <thead>
                                                        <tr>
                                                            <th>Rendering engine</th>
                                                            <th>Browser</th>
                                                            <th>Platform(s)</th>
                                                            <th>Engine version</th>
                                                            <th>CSS grade</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>Trident</td>
                                                            <td>Internet
                                                                Explorer 4.0
                                                            </td>
                                                            <td>Win 95+</td>
                                                            <td> 4</td>
                                                            <td>X</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Trident</td>
                                                            <td>Internet
                                                                Explorer 5.0
                                                            </td>
                                                            <td>Win 95+</td>
                                                            <td>5</td>
                                                            <td>C</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Trident</td>
                                                            <td>Internet
                                                                Explorer 5.5
                                                            </td>
                                                            <td>Win 95+</td>
                                                            <td>5.5</td>
                                                            <td>A</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Trident</td>
                                                            <td>Internet
                                                                Explorer 6
                                                            </td>
                                                            <td>Win 98+</td>
                                                            <td>6</td>
                                                            <td>A</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Trident</td>
                                                            <td>Internet Explorer 7</td>
                                                            <td>Win XP SP2+</td>
                                                            <td>7</td>
                                                            <td>A</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Trident</td>
                                                            <td>AOL browser (AOL desktop)</td>
                                                            <td>Win XP</td>
                                                            <td>6</td>
                                                            <td>A</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Gecko</td>
                                                            <td>Firefox 1.0</td>
                                                            <td>Win 98+ / OSX.2+</td>
                                                            <td>1.7</td>
                                                            <td>A</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Gecko</td>
                                                            <td>Firefox 1.5</td>
                                                            <td>Win 98+ / OSX.2+</td>
                                                            <td>1.8</td>
                                                            <td>A</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Gecko</td>
                                                            <td>Firefox 2.0</td>
                                                            <td>Win 98+ / OSX.2+</td>
                                                            <td>1.8</td>
                                                            <td>A</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Gecko</td>
                                                            <td>Firefox 3.0</td>
                                                            <td>Win 2k+ / OSX.3+</td>
                                                            <td>1.9</td>
                                                            <td>A</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Gecko</td>
                                                            <td>Camino 1.0</td>
                                                            <td>OSX.2+</td>
                                                            <td>1.8</td>
                                                            <td>A</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Gecko</td>
                                                            <td>Camino 1.5</td>
                                                            <td>OSX.3+</td>
                                                            <td>1.8</td>
                                                            <td>A</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Gecko</td>
                                                            <td>Netscape 7.2</td>
                                                            <td>Win 95+ / Mac OS 8.6-9.2</td>
                                                            <td>1.7</td>
                                                            <td>A</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Gecko</td>
                                                            <td>Netscape Browser 8</td>
                                                            <td>Win 98SE+</td>
                                                            <td>1.7</td>
                                                            <td>A</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Gecko</td>
                                                            <td>Netscape Navigator 9</td>
                                                            <td>Win 98+ / OSX.2+</td>
                                                            <td>1.8</td>
                                                            <td>A</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Gecko</td>
                                                            <td>Mozilla 1.0</td>
                                                            <td>Win 95+ / OSX.1+</td>
                                                            <td>1</td>
                                                            <td>A</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Gecko</td>
                                                            <td>Mozilla 1.1</td>
                                                            <td>Win 95+ / OSX.1+</td>
                                                            <td>1.1</td>
                                                            <td>A</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Gecko</td>
                                                            <td>Mozilla 1.2</td>
                                                            <td>Win 95+ / OSX.1+</td>
                                                            <td>1.2</td>
                                                            <td>A</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Gecko</td>
                                                            <td>Mozilla 1.3</td>
                                                            <td>Win 95+ / OSX.1+</td>
                                                            <td>1.3</td>
                                                            <td>A</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Gecko</td>
                                                            <td>Mozilla 1.4</td>
                                                            <td>Win 95+ / OSX.1+</td>
                                                            <td>1.4</td>
                                                            <td>A</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Gecko</td>
                                                            <td>Mozilla 1.5</td>
                                                            <td>Win 95+ / OSX.1+</td>
                                                            <td>1.5</td>
                                                            <td>A</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Gecko</td>
                                                            <td>Mozilla 1.6</td>
                                                            <td>Win 95+ / OSX.1+</td>
                                                            <td>1.6</td>
                                                            <td>A</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Gecko</td>
                                                            <td>Mozilla 1.7</td>
                                                            <td>Win 98+ / OSX.1+</td>
                                                            <td>1.7</td>
                                                            <td>A</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Gecko</td>
                                                            <td>Mozilla 1.8</td>
                                                            <td>Win 98+ / OSX.1+</td>
                                                            <td>1.8</td>
                                                            <td>A</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Gecko</td>
                                                            <td>Seamonkey 1.1</td>
                                                            <td>Win 98+ / OSX.2+</td>
                                                            <td>1.8</td>
                                                            <td>A</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Gecko</td>
                                                            <td>Epiphany 2.20</td>
                                                            <td>Gnome</td>
                                                            <td>1.8</td>
                                                            <td>A</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Webkit</td>
                                                            <td>Safari 1.2</td>
                                                            <td>OSX.3</td>
                                                            <td>125.5</td>
                                                            <td>A</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Webkit</td>
                                                            <td>Safari 1.3</td>
                                                            <td>OSX.3</td>
                                                            <td>312.8</td>
                                                            <td>A</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Webkit</td>
                                                            <td>Safari 2.0</td>
                                                            <td>OSX.4+</td>
                                                            <td>419.3</td>
                                                            <td>A</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Webkit</td>
                                                            <td>Safari 3.0</td>
                                                            <td>OSX.4+</td>
                                                            <td>522.1</td>
                                                            <td>A</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Webkit</td>
                                                            <td>OmniWeb 5.5</td>
                                                            <td>OSX.4+</td>
                                                            <td>420</td>
                                                            <td>A</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Webkit</td>
                                                            <td>iPod Touch / iPhone</td>
                                                            <td>iPod</td>
                                                            <td>420.1</td>
                                                            <td>A</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Webkit</td>
                                                            <td>S60</td>
                                                            <td>S60</td>
                                                            <td>413</td>
                                                            <td>A</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Presto</td>
                                                            <td>Opera 7.0</td>
                                                            <td>Win 95+ / OSX.1+</td>
                                                            <td>-</td>
                                                            <td>A</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Presto</td>
                                                            <td>Opera 7.5</td>
                                                            <td>Win 95+ / OSX.2+</td>
                                                            <td>-</td>
                                                            <td>A</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Presto</td>
                                                            <td>Opera 8.0</td>
                                                            <td>Win 95+ / OSX.2+</td>
                                                            <td>-</td>
                                                            <td>A</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Presto</td>
                                                            <td>Opera 8.5</td>
                                                            <td>Win 95+ / OSX.2+</td>
                                                            <td>-</td>
                                                            <td>A</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Presto</td>
                                                            <td>Opera 9.0</td>
                                                            <td>Win 95+ / OSX.3+</td>
                                                            <td>-</td>
                                                            <td>A</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Presto</td>
                                                            <td>Opera 9.2</td>
                                                            <td>Win 88+ / OSX.3+</td>
                                                            <td>-</td>
                                                            <td>A</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Presto</td>
                                                            <td>Opera 9.5</td>
                                                            <td>Win 88+ / OSX.3+</td>
                                                            <td>-</td>
                                                            <td>A</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Presto</td>
                                                            <td>Opera for Wii</td>
                                                            <td>Wii</td>
                                                            <td>-</td>
                                                            <td>A</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Presto</td>
                                                            <td>Nokia N800</td>
                                                            <td>N800</td>
                                                            <td>-</td>
                                                            <td>A</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Presto</td>
                                                            <td>Nintendo DS browser</td>
                                                            <td>Nintendo DS</td>
                                                            <td>8.5</td>
                                                            <td>C/A<sup>1</sup></td>
                                                        </tr>
                                                        <tr>
                                                            <td>KHTML</td>
                                                            <td>Konqureror 3.1</td>
                                                            <td>KDE 3.1</td>
                                                            <td>3.1</td>
                                                            <td>C</td>
                                                        </tr>
                                                        <tr>
                                                            <td>KHTML</td>
                                                            <td>Konqureror 3.3</td>
                                                            <td>KDE 3.3</td>
                                                            <td>3.3</td>
                                                            <td>A</td>
                                                        </tr>
                                                        <tr>
                                                            <td>KHTML</td>
                                                            <td>Konqureror 3.5</td>
                                                            <td>KDE 3.5</td>
                                                            <td>3.5</td>
                                                            <td>A</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Tasman</td>
                                                            <td>Internet Explorer 4.5</td>
                                                            <td>Mac OS 8-9</td>
                                                            <td>-</td>
                                                            <td>X</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Tasman</td>
                                                            <td>Internet Explorer 5.1</td>
                                                            <td>Mac OS 7.6-9</td>
                                                            <td>1</td>
                                                            <td>C</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Tasman</td>
                                                            <td>Internet Explorer 5.2</td>
                                                            <td>Mac OS 8-X</td>
                                                            <td>1</td>
                                                            <td>C</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Misc</td>
                                                            <td>NetFront 3.1</td>
                                                            <td>Embedded devices</td>
                                                            <td>-</td>
                                                            <td>C</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Misc</td>
                                                            <td>NetFront 3.4</td>
                                                            <td>Embedded devices</td>
                                                            <td>-</td>
                                                            <td>A</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Misc</td>
                                                            <td>Dillo 0.8</td>
                                                            <td>Embedded devices</td>
                                                            <td>-</td>
                                                            <td>X</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Misc</td>
                                                            <td>Links</td>
                                                            <td>Text only</td>
                                                            <td>-</td>
                                                            <td>X</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Misc</td>
                                                            <td>Lynx</td>
                                                            <td>Text only</td>
                                                            <td>-</td>
                                                            <td>X</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Misc</td>
                                                            <td>IE Mobile</td>
                                                            <td>Windows Mobile 6</td>
                                                            <td>-</td>
                                                            <td>C</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Misc</td>
                                                            <td>PSP browser</td>
                                                            <td>PSP</td>
                                                            <td>-</td>
                                                            <td>C</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Other browsers</td>
                                                            <td>All others</td>
                                                            <td>-</td>
                                                            <td>-</td>
                                                            <td>U</td>
                                                        </tr>
                                                    </tbody>
                                                    <tfoot>
                                                        <tr>
                                                            <th>Rendering engine</th>
                                                            <th>Browser</th>
                                                            <th>Platform(s)</th>
                                                            <th>Engine version</th>
                                                            <th>CSS grade</th>
                                                        </tr>
                                                    </tfoot>
                                                </table>
                                            </div>
                                            <!-- /.box-body -->
                                        </div>
                                        <!-- /.box -->
                                    </div>
                                    <!-- /.col -->
                                </div>
                                <!-- /.row -->
                            </section>

                        </div>

                        <div id="add" class="tab-pane fade">
                            <h3>Menu 2</h3>
                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.</p>
                        </div>
                        <div id="photos" class="tab-pane fade">
                            <h3>Menu 3</h3>
                            <p>Eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
                        </div>
                        <div id="datetraslation" class="tab-pane fade">
                            <h3>Menu 3</h3>
                            <p>Eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
                        </div>
                    </div>

                </section>
                <!-- /.content -->
            </div>


        </div>
        <!-- ./wrapper -->



        <script>

            $(document).ready(function() {
                $(".nav-tabs a").click(function() {
                    $(this).tab('show');
                });

                $('#example2').DataTable({
                    'paging': true,
                    'lengthChange': false,
                    'searching': false,
                    'ordering': true,
                    'info': true,
                    'autoWidth': false
                })
            });
        </script>

    </body>
</html>
