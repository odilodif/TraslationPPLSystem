<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

date_default_timezone_set('America/Guayaquil');
if (isset($_POST['FileDocument'])) {
    include_once ('./../Model/FileDocument.php');
     if ($_POST['FileDocument'] === 'DeleteDocument') {
        $document = new FileDocument();
        $document->setFile_id($_POST['idDoc']);
        $result = $document->update($parametro);
        if ($result['success']) {
            echo json_encode($result);
        } else {
            echo json_encode($result);
        }
    }
}



if ($_FILES['file_pdf_ppl']) {
    $valid_extensions = array( 'pdf'); // valid extensions
    $pathUpload = './../View/documents/PPL/'; // upload directory
    $pathSave = "View/documents/PPL/";
    $img = $_FILES['file_pdf_ppl']['name'];
    $tmp = $_FILES['file_pdf_ppl']['tmp_name'];
    // get uploaded file's extension
    $ext = strtolower(pathinfo($img, PATHINFO_EXTENSION));
    // can upload same image using rand function    
    $final_image = $img;
    
    // check's valid format
    if (in_array($ext, $valid_extensions)) {
        $pathUpload = $pathUpload . strtolower($final_image);
        $pathSave = $pathSave . strtolower($final_image);        
        if (move_uploaded_file($tmp, $pathUpload)) {
            //echo 'test';
            include_once ('./../Model/FileDocument.php');
            $file = new FileDocument();
            $file->setFile_path($pathSave);
            $file->setPrison_per_id($_POST['prison_per_id']);
            $file->setFile_description_name($final_image);
            $info = $file->savePathPdf();
            if ($info['success']) {
                $response = array('success' => TRUE, 'message' => 'Documeto Guardado Exitosamente', 'path' => $pathSave);
                echo json_encode($response);
            } else {
                echo json_encode($info);
            }
        }
    } else {
        $list = array('success' => FALSE, 'message' => 'extension de archivo invalido');
        echo json_encode($list);
    }
}
