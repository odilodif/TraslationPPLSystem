<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ProfileSaved
 *
 * @author odilo.ipiales
 */
include_once './../Model/connection.php';
include_once './../Model/ICrud.php';

class ProfileSaved extends Connection implements ICrud {

    //Fields    
    private $prfl_saved_id;
    private $usr_id;
    private $menu_description_id;
    private $prfl_saved_state;
    private $conn;
    private $rs;
                function getPrfl_saved_id() {
        return $this->prfl_saved_id;
    }

    function getUsr_id() {
        return $this->usr_id;
    }

    function getMenu_description_id() {
        return $this->menu_description_id;
    }

    function getPrfl_saved_state() {
        return $this->prfl_saved_state;
    }

    function setPrfl_saved_id($prfl_saved_id) {
        $this->prfl_saved_id = $prfl_saved_id;
    }

    function setUsr_id($usr_id) {
        $this->usr_id = $usr_id;
    }

    function setMenu_description_id($menu_description_id) {
        $this->menu_description_id = $menu_description_id;
    }

    function setPrfl_saved_state($prfl_saved_state) {
        $this->prfl_saved_state = $prfl_saved_state;
    }

    public function create($query) {
        
    }

    //The Contructor

    function __construct() {
         //parent::__construct();
      $this->conn=Connection::getInstance();
    }

//Methods
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

    public function readByUser($idUser) {
        $info;
        try {
            $query = "SELECT * from profile_saved WHERE usr_id=(SELECT usr_id from user_login  WHERE usr_id_sgp= $idUser);";
            //echo '' . $query;            
            $this->rs = $this->conn->execute_sgp($query);
            if ($this->rs) {
                while ($row = pg_fetch_row($this->rs)) {
                    $info[] = array('success' => TRUE,
                        'message' => 'List Profiles Saved',
                        'prfl_saved_id' => $row[0],
                        'usr_id' => $row[1],
                        'menu_description_id' => $row[2],
                        'prfl_saved_state' => $row[3]
                    );
                }
                if (!empty($info)) {
                    return $info;
                } else {
                    return array(array('success' => FALSE, 'message' => 'List Profiles no Found',));
                }
            } else {
                return array(array('success' => FALSE, 'message' => 'Problems With Data Bases!!',));
            }
        } catch (Exception $exc) {
            /* echo $exc->getTraceAsString(); */
            return array('success' => FALSE, 'message' => 'error al consultar lista' . $exc->getMessage());
        } finally {
           // $this->conn->closeConnectionSgp();
        }
    }

}
