<!DOCTYPE html>

<script src="./View/js/User/User.js" type="text/javascript"></script>
<link rel="stylesheet" type="text/css" href="./View/css/datatables/dataTables.bootstrap.min.css">
<script src="./View/css/datatables/jquery.dataTables.min.js" type="text/javascript"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap.min.js" type="text/javascript"></script>


<div class="wrapper">
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Main content -->
        <section class="content">                           
            <div class="box-body">
                <div class=""> 
                    <div class="">                             
                        <table id="tblUserList" class="table table-striped table-bordered" style="width:100%;font-size: 10px">
                            <thead>
                                <tr>                                                        
                                    <th>ID.SGP</th>                                                        
                                    <th>Nombres.Completos</th>
                                    <th>Usuario.Nick</th>
                                    <th>Perfil</th>
                                    <th>TipoTraslado.Asig</th>
                                    <th>Centro.CPL.CPPL</th> 
                                    <th>Area.Dirección</th>                                                         
                                    <th>Mail</th>
                                    <th>Estado</th>                                                        
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                </div>

            </div>                    
            <!---Modals Section-->
            <!-- /.modal Edit -->
            <div class="modal fade" id="pplEditModal" role="dialog" data-toggle="" data-backdrop="static" data-keyboard="false">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" id="btn-close-edit" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span></button>
                        </div>
                        <div class="modal-body">
                            <form id="fmrEditorPPL" action="" method="POST" enctype="multipart/form-data">                           

                                <input type="text" id="idPPLEdit"  name="idTraslationEdit" readonly="" style="color:red"/>
                                <div class="grid-container">
                                    <div class=""><label>Nombre</label></div>

                                    <div class="item4">
                                        <input  id="txt_name" name="" type="text" value="" required="">

                                    </div>

                                    <div class="item3">  <labe>Apellido</labe></div>
                                    <div class="item4">
                                        <input  id="txt_lastname" name="" type="text" value="" required="">

                                    </div>

                                </div>                                
                                <div class="modal-footer">                                        

                                    <input type="submit" name="" class="btn btn-success submitBtn" onclick="savePPLEdit($('#idPPLEdit').val(), $('#txt_name').val(), $('#txt_lastname').val())" value="Guardar"/>
                                </div>
                            </form>

                        </div>

                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
        </section>
        <!-- /.content -->
    </div>
</div>
<script>
    $(document).ready(function () {
        listUsers();        
    });

</script>

