<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of LogicalDeletion
 *
 * @author odilo.ipiales
 */
include_once './../Model/connection.php';
include_once './../Model/ICrud.php';

class LogicalDeletion extends Connection implements ICrud {

    private $rs;
    private $prontuario;

    function getProntuario() {
        return $this->prontuario;
    }

    function setProntuario($prontuario) {
        $this->prontuario = $prontuario;
    }

    //The Contructor

    function __construct() {
        parent::__construct();
    }

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

    public function readProntuarioIfExist($query) {

        $query = "SELECT * FROM prison_person where prontuario='$query';";
        $this->rs = parent::execute_sgp($query);
        if ($this->rs) {
            //parent::closeConnectionSgp();
            return TRUE;
        } else {
            //parent::closeConnectionSgp();
            return FALSE;
        }
    }

    public function readSL_ifExist($query) {
        $query = "SELECT * from prison_freedom where name ='$query';";
        $this->rs = parent::execute_sgp($query);
        if ($this->rs) {
            // parent::closeConnectionSgp();
            return TRUE;
        } else {
            // parent::closeConnectionSgp();
            return FALSE;
        }
    }

    public function updateSL($parameter) {
        $query = "UPDATE prison_freedom SET \"state\"='draft' WHERE \"name\" ='$parameter';";
        // echo ''.$query;
        $this->rs = parent::execute_sgp($query);
        if ($this->rs) {

            return TRUE;
        } else {

            return FALSE;
        }
    }

    
     public function setFree($prontuario) {
        $query = "UPDATE prison_person SET center_id=NULL ,ult_centro=(SELECT CASE  
WHEN center_id IS NULL  THEN center_to_id
ELSE center_id END 
FROM prison_move WHERE ppl_id= 
(SELECT id FROM prison_person WHERE prontuario='$prontuario') 
AND id =(SELECT max(id) from prison_move WHERE ppl_id=(SELECT id FROM prison_person WHERE prontuario='$prontuario'))), state='free',location_id=NULL,pabellon_id=NULL,piso_id=NULL, ala_id=NULL WHERE id=(SELECT id FROM prison_person WHERE prontuario='$prontuario');";
        // echo ''.$query;
        $this->rs = parent::execute_sgp($query);
        if ($this->rs) {
            return TRUE;
        } else {

            return FALSE;
        }
    }
    
        
    public function deleteLogicProntuario($prontuario) {
        $query="UPDATE prison_person SET center_id=NULL ,ult_centro=(SELECT CASE  
WHEN center_id IS NULL  THEN center_to_id
ELSE center_id END 
FROM prison_move WHERE ppl_id= 
(SELECT id FROM prison_person WHERE prontuario='$prontuario') 
AND id =(SELECT max(id) from prison_move WHERE ppl_id=(SELECT id FROM prison_person WHERE prontuario='$prontuario'))), state='deleted',location_id=NULL,pabellon_id=NULL,piso_id=NULL, ala_id=NULL WHERE id=(SELECT id FROM prison_person WHERE prontuario='$prontuario') ;";
        $this->rs = parent::execute_sgp($query);
        if ($this->rs) {
            parent::closeConnectionSgp();
            return TRUE;
        } else {
            parent::closeConnectionSgp();
            return FALSE;
        }
    }

    public function update($parametro) {
        
    }

    public function updateByParameters($id, $name, $path) {
        
    }

    public function deleteLogProntuario($query) {
        
    }

}
