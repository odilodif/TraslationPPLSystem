<?php
date_default_timezone_set('America/Guayaquil');
if (isset($_POST['CenterCrs'])) {
    include_once ('./../Model/CrsSgp.php');
    if ($_POST['CenterCrs'] === 'listCenterCrs') {
        $usr_id_sgp=$_POST['usr_id_sgp'];
        $crs = new CrsSgp();
        $list = $crs->listCrsSgpUsr($usr_id_sgp);
        if ($list[0]['success']) {
            echo json_encode($list);
        } else {
            echo json_encode($list);
        }


      }
    }


 ?>
