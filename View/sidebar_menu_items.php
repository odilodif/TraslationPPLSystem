
<?php

 ?>
 <div class="collapse navbar-collapse navbar-ex1-collapse">
     <ul class="nav navbar-nav side-nav">
<?php
foreach ($_SESSION['_USU'] as $key=>$value)
    {
    $ahref=isset($value['menu_description_href']) ? $value['menu_description_href'] :"";
    $descp=isset($value['menu_description_description']) ? $value['menu_description_description'] : "";
     echo ' <li class="active"><a href="'.$ahref.'"><i class="fa fa-fw fa-dashboard"></i>'.$descp.'</a></li>';
    }
 ?>
     </ul>
   </div>
