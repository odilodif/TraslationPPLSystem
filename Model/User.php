<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of User
 *
 * @author OIpiales
 */
include_once './../Model/connection.php';
include_once './../Model/ICrud.php';

class User extends Connection implements ICrud {

//Fileds
    private $usr_id;
    private $usr_name;
    private $usr_lastname;
    private $usr_nick;
    private $usr_password;
    private $usr_state;
    private $create_date;
    private $write_date;
    private $write_idu;
    private $create_idu;
    private $prfle_id;

    function getUsr_id() {
        return $this->usr_id;
    }

    function getUsr_name() {
        return $this->usr_name;
    }

    function getUsr_lastname() {
        return $this->usr_lastname;
    }

    function getUsr_nick() {
        return $this->usr_nick;
    }

    function getUsr_password() {
        return $this->usr_password;
    }

    function getUsr_state() {
        return $this->usr_state;
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

    function getCreate_idu() {
        return $this->create_idu;
    }

    function getPrfle_id() {
        return $this->prfle_id;
    }

    function setUsr_id($usr_id) {
        $this->usr_id = $usr_id;
    }

    function setUsr_name($usr_name) {
        $this->usr_name = $usr_name;
    }

    function setUsr_lastname($usr_lastname) {
        $this->usr_lastname = $usr_lastname;
    }

    function setUsr_nick($usr_nick) {
        $this->usr_nick = $usr_nick;
    }

    function setUsr_password($usr_password) {
        $this->usr_password = $usr_password;
    }

    function setUsr_state($usr_state) {
        $this->usr_state = $usr_state;
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

    function setCreate_idu($create_idu) {
        $this->create_idu = $create_idu;
    }

    function setPrfle_id($prfle_id) {
        $this->prfle_id = $prfle_id;
    }

//The Contructor

    function __construct() {
        parent::__construct();
    }

//Methods
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

    public function getUserByNickPass($nick, $pass,$ldapname_complete) {
        $query_if_exist = "SELECT if_exist_user('$nick','$pass','$ldapname_complete');";
        $rs_exist = parent::fetch_result_sgp($query_if_exist);
        if ((boolean) $rs_exist) {
            //echo "true...".$rs_exist;
            $info = NULL;
            try {
                $query = "select
u.usr_id, u.prfle_id, u.crs_id, u.trasl_type_id, u.name_complete,u.usr_id_sgp, u.usr_nick,u.usr_password ,mb.menu_description_description,mb.menu_description_href,mb.menu_traslation_path_img, crs.name
from user_login u
INNER JOIN  profile_saved psv on u.usr_id=psv.usr_id
INNER JOIN  menu_objects mb on  mb.menu_description_id=psv.menu_description_id
INNER JOIN  prison_location crs on u.crs_id =crs.id
where u.usr_nick='$nick' and u.usr_password='$pass' order by psv.prfl_saved_id asc;";
               //echo '' . $query;               
                
                $this->rs = parent::execute_sgp($query);
                if ($this->rs) {

                    while ($row = pg_fetch_row($this->rs)) {
                        $info[] = array('success' => TRUE,
                            'message' => 'Usuario encontrado',
                            'usr_id' => $row[0],
                            'prfle_id' => $row[1],
                            'crs_id' => $row[2],
                            'trasl_type_id' => $row[3],
                            'usr_name' => $ldapname_complete,
                            'usr_id_sgp' => $row[5],
                            'usr_nick' => $row[6],
                            'usr_password' => $row[7],
                            'menu_description_description' => $row[8],
                            'menu_description_href' => $row[9],
                            'menu_traslation_path_img' => $row[10],
                            'crs_description' => $row[11]
                        );
                    }
                    return $info;
                } else {
                    return $info;
                }
            } catch (Exception $exc) {
                /* echo $exc->getTraceAsString(); */
                return array('success' => FALSE, 'message' => 'error al consultar lista' . $exc->getMessage());
            } finally {
                parent::closeConnection();
            }
        }
    }

    public function listDirectorsPlantCtrl() {
        try {
            $query = "SELECT usr_id, usr_name,	usr_lasname from user_login WHERE prfle_id=4;";

            $this->rs = parent::execute($query);
            if ($this->rs) {

                while ($row = pg_fetch_row($this->rs)) {
                    $info[] = array('success' => TRUE,
                        'message' => 'Lista de directores PlantCtrl encontrada',
                        'usr_id' => $row[0],
                        'usr_name' => $row[1],
                        'usr_lasname' => $row[2]
                    );
                }
                return $info;
            } else {
                return $info;
            }
        } catch (Exception $exc) {
            /* echo $exc->getTraceAsString(); */
            return array('success' => FALSE, 'message' => 'error al consultar lista' . $exc->getMessage());
        } finally {
            parent::closeConnection();
        }
    }

    public function getmailByTypTrasl($typ) {
        $info = NULL;
        try {
            $query = "select usr.usr_email from traslation_type typ
INNER JOIN user_login usr ON typ.usr_id=usr.usr_id
WHERE typ.trasl_type_id=$typ";
            //echo ''.$query;
            $this->rs = parent::execute($query);
            if ($this->rs) {

                while ($row = pg_fetch_row($this->rs)) {
                    $info = array('success' => TRUE,
                        'message' => 'mail encontrado',
                        'usr_email' => $row[0]
                    );
                }
                return $info;
            } else {
                return $info;
            }
        } catch (Exception $exc) {
            /* echo $exc->getTraceAsString(); */
            return array('success' => FALSE, 'message' => 'error al consultar lista' . $exc->getMessage());
        } finally {
            parent::closeConnection();
        }
    }

}
