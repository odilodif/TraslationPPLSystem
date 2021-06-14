<?php

include_once ('./../Utilitarian/php/Utilitarian.php');

date_default_timezone_set('America/Guayaquil');
if (isset($_POST['TraslationDetails'])) {

    include_once ('./../Model/TraslationDetails.php');
    if ($_POST['TraslationDetails'] === 'createTraslationDetails') {
        $traslation_details = new TraslationDetails();
        if (isset($_POST['trasl_details'])) {
            $list = $_POST['trasl_details'];
            $result;
            $values = "";
            $i = 0;
            foreach ($list as $key => $value) {
                $trasl_id = $value['trasl_id'];
                $prontuario = $value['prontuario']; 
                
                if ($i == 0) {
                    $values = "VALUES($trasl_id, (SELECT \"id\" FROM prison_person WHERE prontuario='$prontuario'),'t')";
                }
                $values .= ",($trasl_id, (SELECT \"id\" FROM prison_person WHERE prontuario='$prontuario'),'t')";
                $i++;
            }
            $result = $traslation_details->create($values);           
            if ($result['success']) {
                $res = array('success' => TRUE, 'message' => 'Datos Guardados',
                    'nro' => $i
                );
                echo json_encode($res);
            } else {
                $res = array('success' => FALSE,
                    'message' => 'No se pudo Guardar los Datos',
                    'nro' => '0'
                );
                echo json_encode($res);
            }
        }
    }

    if ($_POST['TraslationDetails'] === 'TraslationDetailsList') {
        $traslation_details = new TraslationDetails();

        if ($_POST['crs_id'] != 57) {
            $result = $traslation_details->loadTraslationDetailsListCrs($_POST['crs_id']);
            if ($result[0]['success']) {
                echo json_encode($result);
            } else {
                $res = array('success' => FALSE,
                    'message' => 'No hay datos'
                );
                echo json_encode($res);
            }
        } else {
            // echo '1';
            $result = $traslation_details->loadTraslationDetailsList();
            if ($result[0]['success']) {
                echo json_encode($result);
            } else {
                $res = array('success' => FALSE,
                    'message' => 'No hay datos'
                );
                echo json_encode($res);
            }
        }
    }

    if ($_POST['TraslationDetails'] === 'seachTrasDetailsList') {

        $flag_id_empty = TRUE;
        $flag_date_empty = TRUE;
        $flag_field_empty = TRUE;
        $trasl_id;
        $date_from;
        $date_to;
        $criterion = null;
        $where = ' ';
        $date_searching = '';
        $i = 0;
        /* if ($_POST['crs_id'] != 57) { */
        $traslation_details = new TraslationDetails();
        $list = $_POST['fields_search'];
        $utils = new Utilitarian();
        $query2 = $utils->buildQuerySearchingReport3($list, $_POST['crs_id']);


        $result = $traslation_details->report3MultiSearching($query2);
        if ($result[0]['success']) {
            echo json_encode($result);
        } else {
            $res = array('success' => FALSE,
                'message' => 'No hay datos'
            );
            echo json_encode($res);
        }
        /* } */
    }
}

