<?php
date_default_timezone_set('America/Guayaquil');
if (isset($_POST['TraslationType'])) {
    include_once ('./../Model/TraslationType.php');
    if ($_POST['TraslationType'] === 'listTraslationType') {
        $traslation_type = new TraslationType();
        $list = $traslation_type->listAll();

        if ($list[0]['success']) {
            echo json_encode($list);
        } else {
            echo json_encode($list);
        }


      }
    }

 ?>
