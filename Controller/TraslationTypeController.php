<?php

date_default_timezone_set('America/Guayaquil');
if (isset($_POST['TraslationType'])) {
    include_once ('./../Model/TraslationType.php');
    include_once ('./../Model/TraslTypeUserLoginSaved.php');
    if ($_POST['TraslationType'] === 'listTraslationType') {
        $idUsrSgp = $_POST['idUsrSgp'];
        $traslation_type = new TraslationType();
        $trasl_type_user = new TraslTypeUserLoginSaved();
        $list_type_tral_asigned = $trasl_type_user->getListByIdSGP($idUsrSgp);
        $list = $traslation_type->listAll();
        if ($list_type_tral_asigned[0]['success']) {
            foreach ($list as $key1 => $row_type_trasl) {
                foreach ($list_type_tral_asigned as $key2 => $row_type_trasl_asigned) {
                    if ($row_type_trasl['trasl_type_id'] == $row_type_trasl_asigned['trasl_type_id']) {
                        $list[$key1]['check'] = TRUE;
                        break;
                    }
                }
            }
        }
        echo json_encode($list);
    }
}

if (isset($_POST['listTraslTypeRequest'])) {
    if ($_POST['listTraslTypeRequest'] === 'listTraslTypeRequest') { 
        include_once ('./../Model/TraslationType.php');
        $traslation_type = new TraslationType(); 
        $list = $traslation_type->listAll();
        echo json_encode($list);
    }
}
?>
