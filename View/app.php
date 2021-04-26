<!--<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&signed_in=true"></script>-->
<link href="views/components/css/site.css" rel="stylesheet" type="text/css"/>
 <!--<script src="views/components/js/jquery-3.0.0.min.js" type="text/javascript"></script>-->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDJwq2qinNKzEATOCw-W0DflHdqI7A6n1c&callback=initMap"></script>
<script src="views/components/js/app/site.js" type="text/javascript"></script>
<script type="text/javascript">

    $(document).ready(function () {
        unidadesCunrso();
        loadCarreraPendiantes();
        unitsAvailable();

    });
</script>
<style>
    .container-fluid {
        padding-right: 0px;
        padding-left: 0px;
        margin-right: -10px;
        margin-left: -10px;
    }
    .well{
        margin-left: 0;
        padding-left: 0;
        padding-right: 10px;
        padding-top: 0;
        padding-bottom: 0;
        overflow: auto;
    }
    .cd-dropdown {
        padding-left: 0px;
        min-width: 310px;
    }
</style>
<section class="" style="padding-top: 20px">
    <article class="item floatl ph9 sm9 md9 lg9">
        <section class="cart" >
            <div class="map-content " id="map"></div>
        </section>
    </article>
    <article class="item floatl ph3 sm3 md3 lg3">
        <section class="container-full cart">
            <article class="item ph12 sm12 md12 lg12">
                <ul class="right nav-bar-top ">
                    <li class="monitoring btn btn-danger btn-xs "><b>Apagar Radar </b> <i class="fa fa-gear fa-spin fa-lg" ></i> <i class="fa fa-power-off fa-lg" ></i></li>
                    <li class="error-monitor-content btn btn-warning btn-xs f1_75"><b>Error - </b><b class="btn-primary error-monitor">0</b></li>
                    <li class="btn btn-danger btn-xs"><b>Salir </b><i class="fa fa-sign-out fa-lg"></i></li>
                </ul>
            </article>
        </section>
        <section class="side-menu-right cart">

            <section class="tabs">
                <input id="tab-1" type="radio" name="radio-set" class="tab-selector-1" checked="checked" />
                <label for="tab-1" class="tab-label-1"><i class="fa fa-map fa-2x"></i><i class="fa fa-map-marker fa-2x"></i><i class="fa fa-taxi fa-2x"></i></label>

                <input id="tab-2" type="radio" name="radio-set" class="tab-selector-2" />
                <label for="tab-2" class="tab-label-2"><i class="fa fa-taxi fa-2x"></i></label>

                <input id="tab-3" type="radio" name="radio-set" class="tab-selector-3" />
                <label for="tab-3" class="tab-label-3"><i class="fa fa-map-o fa-2x"></i><i class="fa fa-street-view fa-2x"></i></label>

                <!--<input id="tab-4" type="radio" name="radio-set" class="tab-selector-4" />
                <label for="tab-4" class="tab-label-4"><i class="fa fa-question fa-2x"></i></label>-->

                <div class="clear-shadow"></div>

                <div class="content">
                    <div class="content-1">
                        <aside id="" class="cd-dropdown">
                            <h2 class="center">UNIDADES EN CURSO</h2>
                            <div id="tblencurso" >
                                <div class="well sidebar-nav col-lg-10" >
                                    <table id="tblEnCurso" class="table table-bordered">
                                        <thead  class="bg-primary">
                                            <tr>
                                                <th>CODIGO</th><th>PLACAS</th>
                                            </tr>
                                        </thead>
                                        <tbody id="tbodyEnCurso"> 
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </aside>
                    </div>
                    <div class="content-2">
                        <aside id="" class="cd-dropdown">
                            <h2 class="center">UNIDADES DISPONIBLES</h2>
                            <div class="well sidebar-nav col-lg-10">
                                <table id="tblUnits" class="table table-bordered">
                                    <thead  class="bg-primary">
                                        <tr>
                                            <th>CODIGO</th><th>CANT.</th><th>PLACAS_UNID</th><th></th>
                                        </tr>
                                    </thead>
                                    <tbody id="tbodyUnits">
                                    </tbody>
                                </table>
                            </div>
                        </aside>
                    </div>
                    <div class="content-3">
                        <aside id="" class="cd-dropdown">
                            <h2 class="center">CARRERAS PENDIENTES</h2>
                            <div class="well sidebar-nav  col-lg-10">
                                <table id="tblCarrerasP" class="table table-bordered">
                                    <thead  class="bg-primary">
                                        <tr>
                                            <th>CODIGO </th><th>DIRECCION</th><th>CLIENTE</th>
                                        </tr>
                                    </thead>
                                    <tbody id="tbodyCPendientes"> 
                                    </tbody>
                                </table>
                            </div>
                        </aside>
                    </div>
                    <div class="content-4">
                        <aside id="" class="cd-dropdown">
                            <h2 class="center">OTRA OPCION</h2>
                            <ul>
                                <li class=""><i class="btn fa fa-toggle-on fa-2x"></i><label >ddddd</label></li>
                                <li class=""><i class="btn fa fa-toggle-on fa-2x"></i><label >ddddd</label></li>
                                <li class=""><i class="btn fa fa-map-marker fa-2x"></i><label >ddddd</label></li>
                                <li class=""><i class="btn fa fa-toggle-on fa-2x"></i><label >ddddd</label></li>
                                <li class=""><i class="btn fa fa-toggle-off fa-2x"></i><label >ddddd</label></li>
                            </ul>
                        </aside>
                    </div>
                </div>
            </section>
            <div id="directionsPanel"></div>
        </section>
    </article>

</section>

<input type="hidden" value="" id="txtIdUnit" />
<input type="hidden" value="" id="txtCodUnit" />
<input type="hidden" value="" id="txtIdConductor" />

<!--Modal  para asignar carrera a unidades-->
<div class="modal clear-shadow" id="modalAsignar"  tabindex="-1" role="dialog" aria-labelledby="myModalLebel" aria-hidden="true">
    <div class="modal-dialog" id="modaldiagAsignar">
        <div class="modal-content" id="">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <input type="button"  style="width:100%;"value="Asisgnación de Carreras" id="listaMenu"   class="btn btn-primary btn-xs" disabled="true"/>

            </div>
            <div class="modal-body">
                <fieldset><legend>CARRERAS PENDIENTES</legend>                    
                    <div class="row bordes" > 
                        <div class="col-lg-10">
                            <div class="well sidebar-nav" id="tblscroll1 active">
                                <div class="panel panel-default" style="width:100%; height:100%;">
                                    <table id="tblmodalcp"  style=" margin: 0 auto; padding-left: 220px"class="table table-bordered">
                                        <thead>
                                            <tr class="bg-primary">
                                                <th>
                                                </th>
                                                <th>
                                                    CODIGO 
                                                </th>
                                                <th>
                                                    DIRECCION
                                                </th>
                                                <th>
                                                    CLIENTE
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody id="tbodymodalcp"> 

                                        </tbody>
                                    </table> 

                                </div>
                            </div>                                
                        </div>
                    </div>
                </fieldset>
            </div>
        </div>
    </div>
</div> 

