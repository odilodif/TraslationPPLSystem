<?php

/**
 * Description of FileDocument
 *
 * @author odilo
 */
include_once './../Model/connection.php';
include_once './../Model/ICrud.php';

class FileDocument extends Connection implements ICrud {

    private $file_id;
    private $prison_per_id;
    private $file_state;
    private $file_path;
    private $file_description_name;
    function getFile_description_name() {
        return $this->file_description_name;
    }

    function setFile_description_name($file_description_name) {
        $this->file_description_name = $file_description_name;
    }

    
    function getFile_id() {
        return $this->file_id;
    }

    function getPrison_per_id() {
        return $this->prison_per_id;
    }

    function getFile_state() {
        return $this->file_state;
    }

    function getFile_path() {
        return $this->file_path;
    }

    function setFile_id($file_id) {
        $this->file_id = $file_id;
    }

    function setPrison_per_id($prison_per_id) {
        $this->prison_per_id = $prison_per_id;
    }

    function setFile_state($file_state) {
        $this->file_state = $file_state;
    }

    function setFile_path($file_path) {
        $this->file_path = $file_path;
    }

    public function __construct() {
        parent::__construct();
    }

    /* The Construct  */

    public function create($query) {
        
    }

    public function delete($query) {
        
    }

    public function deleteById($id) {
        
    }

    public function listAll() {
        
    }

    public function listByParameter($id, $name, $path) {
        
    }

    public function read($query) {
        
    }

    public function update($parametro) {
        try {
            $query = "UPDATE  file_document  SET file_state='f' WHERE file_id= $this->file_id;";
            //echo "string".$query;
            $rs = parent::execute_sgp($query);
            if ($rs) {
                return $info = array('success' => TRUE, 'message' => 'Documento Eliminado');
            } else {

                return $info = array('success' => FALSE, 'message' => 'Documento no fue eliminado');
            }
        } catch (Exception $exc) {
            //echo 'error exception al crear Traslados' . $exc->getMessage();
        } finally {
            /*parent::closeConnection();*/
        }
    }

    public function updateByParameters($id, $name, $path) {
        
    }

    public function savePathPdf() {
        try {
            $query = "INSERT  INTO file_document (prison_per_id,file_state,file_path,file_description_name)   VALUES( $this->prison_per_id,'t','$this->file_path','$this->file_description_name');";
            //echo "string".$query;
            $rs = parent::execute_sgp($query);
            if ($rs) {
                return $info = array('success' => TRUE, 'message' => 'Documento Guardado');
            } else {

                return $info = array('success' => FALSE, 'message' => 'Docuemnto no pudo ser Guardado');
            }
        } catch (Exception $exc) {
            //echo 'error exception al crear Traslados' . $exc->getMessage();
        } finally {
            /*parent::closeConnection();*/
        }
    }

}
