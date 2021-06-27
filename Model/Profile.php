<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Profile
 *
 * @author odilo.ipiales
 */
include_once './../Model/connection.php';
include_once './../Model/ICrud.php';

class Profile extends Connection implements ICrud {

    //Fields
    private $prfle_id;
    private $rol_id;
    private $prfle_description;
    private $prfle_state;
    private $conn;

    //Getters and Setters
    function getPrfle_id() {
        return $this->prfle_id;
    }

    function getRol_id() {
        return $this->rol_id;
    }

    function getPrfle_description() {
        return $this->prfle_description;
    }

    function getPrfle_state() {
        return $this->prfle_state;
    }

    function getConn() {
        return $this->conn;
    }

    function setPrfle_id($prfle_id) {
        $this->prfle_id = $prfle_id;
    }

    function setRol_id($rol_id) {
        $this->rol_id = $rol_id;
    }

    function setPrfle_description($prfle_description) {
        $this->prfle_description = $prfle_description;
    }

    function setPrfle_state($prfle_state) {
        $this->prfle_state = $prfle_state;
    }

    function setConn($conn) {
        $this->conn = $conn;
    }

    //The Contructor
    function __construct() {
        //parent::__construct();
        $this->conn = Connection::getInstance();
    }

// The Methods
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
    public function getProfileRolByIdSgp($idSGP){
         $info;
        try {
            $query = "SELECT pfl.prfle_id, pfl.prfle_description, rl.rol_id, rl.rol_description   
 FROM user_login usr 
 INNER JOIN profile pfl ON usr.prfle_id=pfl.prfle_id
 INNER JOIN rol rl ON pfl.rol_id=rl.rol_id
 WHERE usr.usr_id_sgp =$idSGP";
            //echo '' . $query;
            $rs = $this->conn->execute_sgp($query);
            if ($rs) {
                while ($row = pg_fetch_row($rs)) {
                    $info = array('success' => TRUE,
                        'message' => ' Perfil y  Rol encontrados',
                        'prfle_id' => $row[0],
                        'prfle_description' => $row[1],
                        'rol_id' => $row[2],
                        'rol_description' => $row[3]
                    );
                }
                if (!empty($info)) {
                    return $info;
                } else {
                    return array('success' => FALSE, 'message' => ' Perfiles y Roles no Encontrados');
                }
            } else {
                return array('success' => FALSE, 'message' => 'Problemas con la Base de Datos!!');
            }
        } catch (Exception $exc) {
            /* echo $exc->getTraceAsString(); */
            return array('success' => FALSE, 'message' => 'error al consultar lista' . $exc->getMessage());
        } finally {
            //parent::closeConnection();
        }
    }

}
