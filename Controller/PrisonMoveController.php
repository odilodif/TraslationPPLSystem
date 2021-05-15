<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

date_default_timezone_set('America/Guayaquil');

if (isset($_POST['PrisonMove'])) {    
    include_once ('./../Model/PrisonMove.php');   
    if ($_POST['PrisonMove'] === 'PrisonMove') {
        $prontuario = $_POST['prontuario'];
        $prison_move = new PrisonMove();
        $moves = $prison_move->readMovesProntuario($prontuario);
        if ($moves[0]['success']) {
            echo json_encode($moves);
        } else {
            echo json_encode($moves);
        }
    }
}