<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Rol
 *
 * @author odilo.ipiales
 */
include_once './../Model/connection.php';
include_once './../Model/ICrud.php';

class Rol extends Connection implements ICrud {

    //Fields
    private $rol_id;
    private $rol_description;
    private $rol_state;
    private $create_idu;
    private $create_date;
    private $write_date;
    private $write_idu;
    private $rol_buttons;

    function getRol_id() {
        return $this->rol_id;
    }

    function getRol_description() {
        return $this->rol_description;
    }

    function getRol_state() {
        return $this->rol_state;
    }

    function getCreate_idu() {
        return $this->create_idu;
    }

    function getCreate_date() {
        return $this->create_date;
    }

    function getWrite_date() {
        return $this->write_date;
    }

    function getWrite_idu() {
        return $this->write_idu;
    }

    function getRol_buttons() {
        return $this->rol_buttons;
    }

    function setRol_id($rol_id) {
        $this->rol_id = $rol_id;
    }

    function setRol_description($rol_description) {
        $this->rol_description = $rol_description;
    }

    function setRol_state($rol_state) {
        $this->rol_state = $rol_state;
    }

    function setCreate_idu($create_idu) {
        $this->create_idu = $create_idu;
    }

    function setCreate_date($create_date) {
        $this->create_date = $create_date;
    }

    function setWrite_date($write_date) {
        $this->write_date = $write_date;
    }

    function setWrite_idu($write_idu) {
        $this->write_idu = $write_idu;
    }

    function setRol_buttons($rol_buttons) {
        $this->rol_buttons = $rol_buttons;
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
        $info;
        try {
            $query = "SELECT prfle_id, prfle_description FROM profile WHERE prfle_state='t' ORDER BY 2;";
            //echo '' . $query;
            $rs = parent::execute_sgp($query);
            if ($rs) {
                while ($row = pg_fetch_row($rs)) {
                    $info[] = array('success' => TRUE,                        
                        'rol_id' => $row[0],
                        'rol_description' => $row[1]
                    );
                }
                if (!empty($info)) {
                    return $info;
                } else {
                    return array(array('success' => FALSE, 'message' => 'Lista de Perfiles no Encontrados',));
                }
            } else {
                return array(array('success' => FALSE, 'message' => 'Problemas con la Base de Datos!!!',));
            }
        } catch (Exception $exc) {
            /* echo $exc->getTraceAsString(); */
            return array('success' => FALSE, 'message' => 'error al consultar lista' . $exc->getMessage());
        } finally {
            //parent::closeConnection();
        }
    }

    public function listByParameter($id, $name, $path) {
        
    }

    public function read($query) {
        
    }

    public function update($parametro) {
        
    }

    public function updateByParameters($id, $name, $path) {
        
    }

}
