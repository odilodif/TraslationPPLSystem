<!-- Page Heading -->
<div class="row">
    <div class="col-lg-12">
      
            <h1><img src="./View/images/auction.png"  style="height:2%;width: 2%" /><small>SNAI - Sistema de Traslados   </small></h1>
        </h1>
        <ol class="breadcrumb">
            <li class="active">
                <i class="fa fa-dashboard"></i> Panel Principal
            </li>
        </ol>
    </div>
</div>
<!-- /.row -->

<div class="row">
    <div class="col-lg-12">
        <div class="alert alert-info alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <!--<i class="fa fa-info-circle"></i>  <strong>Like SB Admin?</strong> Try out <a href="http://startbootstrap.com/template-overviews/sb-admin-2" class="alert-link">SB Admin 2</a> for additional features!-->
        </div>
    </div>
</div>
<!-- /.row -->
<?php
foreach ($_SESSION['_USU'] as $key=>$value)
    { ?>
      <div class="col-xs-4 col-md-3">
          <div class="thumbnail">
              <a href="<?php echo isset($value['menu_description_href']) ? $value['menu_description_href']: ""; ?>" ><?php echo isset($value['menu_traslation_path_img']) ? $value['menu_traslation_path_img']:""; ?></a>
              <div class="text-center">
                  <h4><?php echo isset($value['menu_description_description']) ? $value['menu_description_description']: ""; ?></h4>
              </div>
          </div>
      </div>

<?php } ?>
<!--  <div class="col-xs-4 col-md-3">
      <div class="thumbnail">
          <a href="./?pagina=app" ><img src="./View/images/abrtion.jpg" alt="..." /></a>
          <div class="text-center">
              <h4>Orden Judicial</h4>
          </div>
      </div>
  </div>
  <div class="col-xs-4 col-md-3">
      <div class="thumbnail">
          <a href="./?pagina=UserFormRegister" ><img src="./View/images/salud-OMS-e1551914081412.jpg" alt="..."></a>
          <div class="text-center">
              <h4>Salud</h4>
          </div>
      </div>
  </div>
  <div class="col-xs-4 col-md-3">
      <div class="thumbnail">
          <a href="./?rc-content=materia" ><img src="./View/images/semFYC_Familia3.jpg" alt="..."></a>
          <div class="text-center">
              <h4>Cercanía Familiar</h4>
          </div>
      </div>
  </div>
  <div class="col-xs-4 col-md-3">
      <div class="thumbnail">
          <a href="./?pagina=ListVehicules" ><img src="./View/images/hacinamiento.jpeg" alt="..."></a>
          <div class="text-center">
              <h4>Hacinamiento</h4>
          </div>
      </div>
  </div>
  <div class="col-xs-4 col-md-3">
      <div class="thumbnail">
          <a href="#" ><img src="./View/images/separacion.jpeg" alt="..."></a>
          <div class="text-center">
              <h4>Separación</h4>
          </div>
      </div>
  </div>
  <div class="col-xs-4 col-md-3">
      <div class="thumbnail">
          <a href="#" ><img src="./View/images/niños.jpg" alt="..."></a>
          <div class="text-center">
              <h4>Madres con Niños Menores</h4>
          </div>
      </div>
  </div>

</div>-->
