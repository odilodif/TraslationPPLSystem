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

    public function deleteLogicProntuario($query) {
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
