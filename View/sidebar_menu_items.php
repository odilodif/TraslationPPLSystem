
<?php

 ?>

<div id="mySidebar" class="sidebar">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
  <?php
foreach ($_SESSION['_USU'] as $key=>$value)
    {
    $ahref=isset($value['menu_description_href']) ? $value['menu_description_href'] :"";
    $descp=isset($value['menu_description_description']) ? $value['menu_description_description'] : "";
     echo '<a class="active" href="'.$ahref.'"><i class="fa fa-fw fa-dashboard"></i>'.$descp.'</a>';
    }
 ?>
</div>



 
