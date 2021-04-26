<?php

date_default_timezone_set('America/Guayaquil');
if (isset($_POST['CrsSgp'])) {
    include_once ('./../Model/CrsSgp.php');
    if ($_POST['CrsSgp'] === 'listCrs') {
        $crs = new CrsSgp();
        $list = $crs->listAll();
        if ($list[0]['susccess']) {
            echo json_encode($list);
        } else {
            echo json_encode($list);
        }


      }
    }


 ?>
