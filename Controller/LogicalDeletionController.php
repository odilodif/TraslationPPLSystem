<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include_once ('./../Model/LogicalDeletion.php');
if (isset($_POST["execute"])) {

    $filename = $_FILES["file"]["tmp_name"];
    if ($_FILES["file"]["size"] > 0) {
        $file = fopen($filename, "r");
        //skip first line
        fgetcsv($file);
        $ld = new LogicalDeletion(); 
        $row=1;
        
             
        
        while (($getData = fgetcsv($file, 10000, ";")) !== FALSE) {
            if (!$getData[0]) {
                echo "<script type=\"text/javascript\">alert(\"El archivo CSV no es correcto.\");"
                . "window.location = \"./../index.php\" "
                ."  $('#respuestaAjax').html(''); "
                ."</script>";
            }
            /*Check whether SolicitudLibertad Exist for make change */
            if ($getData[5]=='SL') {                
                if ($ld->readProntuarioIfExist($getData[0]) && $ld->readSL_ifExist($getData[1])) {
                    $ld->updateSL($getData[1]);
                     echo "<script type=\"text/javascript\">alert(\"El cambio se realizó satisfactoriamente.\");"
                     . "window.location = \"./../index.php\" "                    
                     . "</script>";
                } else {
                    echo "<script type=\"text/javascript\">alert(\"El prontuario o solicitud de libertad inválidos.\"".$row. " )"
                    . "window.location = \"./../index.php\""
                    ."  $('#respuestaAjax').html(''); "        
                    ."</script>";
                }
            }
            //check whether exists prontuario for delete
            if ($getData[5]=='MJDHC-A') {
                
            }
            $row++;
        }

        fclose($file);
    }
}