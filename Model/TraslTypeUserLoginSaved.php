<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of TraslTypeUserLoginSaved
 *
 * @author odilo.ipiales
 */
include_once './../Model/connection.php';
include_once './../Model/ICrud.php';

class TraslTypeUserLoginSaved extends Connection implements ICrud {

    //Fields
    private $trasl_type_user_id;
    private $usr_id;
    private $trasl_type_id;
    private $conn;

    //Getters and Setters
    function getTrasl_type_user_id() {
        return $this->trasl_type_user_id;
    }

    function getUsr_id() {
        return $this->usr_id;
    }

    function getTrasl_type_id() {
        return $this->trasl_type_id;
    }

    function setTrasl_type_user_id($trasl_type_user_id) {
        $this->trasl_type_user_id = $trasl_type_user_id;
    }

    function setUsr_id($usr_id) {
        $this->usr_id = $usr_id;
    }

    function setTrasl_type_id($trasl_type_id) {
        $this->trasl_type_id = $trasl_type_id;
    }

    //The Constructor
    public function __construct() {
        $this->conn = Connection::getInstance();
        //parent::__construct();
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

    public function update($parametro) {
        
    }

    public function updateByParameters($id, $name, $path) {
        
    }

    public function getListByIdSGP($idSGP) {
        try {
            $query = "SELECT typu.trasl_type_id  FROM   trasl_type_user_login_saved typu  INNER JOIN user_login usr  on  typu.usr_id = usr.usr_id 
 WHERE typu.usr_id=  (SELECT usr_id FROM user_login WHERE usr_id_sgp=$idSGP );";
            //echo ''.$query;
            $rs = $this->conn->execute_sgp($query);
            if ($rs) {
                while ($row = pg_fetch_row($rs)) {
                    $info[] = array('success' => TRUE,
                        'message' => ' Tipos de Traslados asignados al Usuario',
                        'trasl_type_id' => $row[0]
                    );
                }
                if(!empty($info)) {
                     return $info;
                } else {
                    return array(array('success' => FALSE, 'message' => 'No hay Tipos de Traslados Asignados'));
                }
               
            } else {
                return array( array('success' => FALSE, 'message' => 'Error: Problemas conla base de datos'));
            }
        } catch (Exception $exc) {
            return array('success' => FALSE, 'message' => 'error al consultar lista' . $exc->getMessage());
        } finally {
            // parent::closeConnection();
        }
    }

}
