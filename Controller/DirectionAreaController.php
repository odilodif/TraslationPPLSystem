<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

date_default_timezone_set('America/Guayaquil');
if (isset($_POST['DirectionArea'])) {
    include_once ('./../Model/DirectionArea.php');
    if ($_POST['DirectionArea'] === 'loadDirecctionAssigned') {
        $direction = new DirectionArea();
        $result = $direction->loadDirecctionAssigned($_POST['user_id']);
        if ($result['success']) {
            echo json_encode($result);
        } else {
            echo json_encode($result);
        }
    }
    if ($_POST['DirectionArea'] === 'loadDirectionParent') {
        $direction = new DirectionArea();
        $result = $direction->loadDirectionParent($_POST['usr_id']);
        if ($result['success']) {
            echo json_encode($result);
        } else {
            echo json_encode($result);
        }
    }
     if ($_POST['DirectionArea'] === 'loadDirection') {
        $direction = new DirectionArea();
        $result = $direction->loadDirection($_POST['usr_id']);
        if ($result['success']) {
            echo json_encode($result);
        } else {
            echo json_encode($result);
        }
    }
}