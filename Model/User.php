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

//Fields
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
    private $conn;

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
        //parent::__construct();
        $this->conn= Connection::getInstance();
    }

//Methods
    public function create($query) {
        
    }

    public function delete($query) {
        
    }

    public function deleteById($id) {
        
    }

    public function listAll() {
        $info;
        try {
            $query = "SELECT usr.usr_id_sgp, usr.name_complete,usr.usr_nick,typ.trasl_type_descripcion,prfl.prfle_description, pl.\"name\"	as crs,	dir.area_desription,	usr.usr_email, usr.usr_state FROM user_login usr
LEFT JOIN profile prfl ON usr.prfle_id=prfl.prfle_id
LEFT JOIN  traslation_type typ ON usr.trasl_type_id=typ.trasl_type_id
LEFT JOIN prison_location pl ON usr.crs_id = pl.id
LEFT JOIN direction_area dir ON usr.area_id = dir.area_id WHERE usr.usr_state='t';";
            //echo '' . $query;  
            $rs = $this->conn->execute_sgp($query);
            if ($rs) {
                while ($row = pg_fetch_row($rs)) {
                    $info[] = array('success' => TRUE,
                        'message' => 'Lista de Usuario Encontrados',
                        'usr_id_sgp' => $row[0],
                        'name_complete' => $row[1],
                        'usr_nick' => $row[2],
                        'trasl_type_descripcion' => $row[3],
                        'prfle_description' => $row[4],
                        'crs' => $row[5],
                        'area_desription' => $row[6],
                        'usr_email' => $row[7],
                        'usr_state' => $row[8]
                    );
                }
                if (!empty($info)) {
                    return $info;
                } else {
                    return array(array('success' => FALSE, 'message' => 'Lista de Usuarios no Encontrados',));
                }
            } else {
                return array(array('success' => FALSE, 'message' => 'Problemas con la Base de Datos',));
            }
        } catch (Exception $exc) {
            /* echo $exc->getTraceAsString(); */
            return array('success' => FALSE, 'message' => 'error al consultar lista' . $exc->getMessage());
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

    public function getUserByNickPass($nick, $pass, $ldapname_complete) {
        $pass_encrypt = md5("" . $pass);
        $query_if_exist = "SELECT if_exist_user('$nick','$pass_encrypt','$ldapname_complete');";
        //echo $query_if_exist;
        $rs_exist = $this->conn->fetch_result_sgp($query_if_exist);
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
where u.usr_nick='$nick' and u.usr_password='$pass_encrypt' order by psv.prfl_saved_id asc;";
                //echo '' . $query;               

                $rs = $this->conn->execute_sgp($query);
                if ($rs) {

                    while ($row = pg_fetch_row($rs)) {
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
                    if(!empty($info)) {
                       return $info; 
                    } else {
                       return array(array('success' => FALSE, 'message' => 'Error No hay Usuario y/o Perfiles')); 
                    }
                } else {
                    return array(array('success' => FALSE, 'message' => 'Error Algun Problema con la base de datos')); 
                }
            } catch (Exception $exc) {
                /* echo $exc->getTraceAsString(); */
                return array('success' => FALSE, 'message' => 'error al consultar lista' . $exc->getMessage());
            } finally {
                //parent::closeConnection();
            }
        }
    }

    public function listDirectorsPlantCtrl() {
        try {
            $query = "SELECT usr_id, usr_name,	usr_lasname from user_login WHERE prfle_id=4;";

            $this->rs = $this->conn->execute_sgp($query);
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
            $this->rs = $this->conn->execute_sgp($query);
            if ($this->rs) {

                while ($row = pg_fetch_row($this->rs)) {
                    $info = array('success' => TRUE,
                        'message' => 'mail encontrado',
                        'usr_email' => $row[0]
                    );
                }
                if (!empty($info)) {
                    return $info;
                } else {
                    return array('success' => FALSE, 'message' => 'No hay email');
                }
                return $info;
            } else {
                return $info;
            }
        } catch (Exception $exc) {
            /* echo $exc->getTraceAsString(); */
            return array('success' => FALSE, 'message' => 'error al consultar lista' . $exc->getMessage());
        } finally {
            //parent::closeConnection();
        }
    }

    public function getUserByIdSgp($idSgp) {
        $info;
        try {
            $query = "select
u.usr_id, u.crs_id, u.name_complete, u.usr_nick, crs.name,u.usr_id_sgp,prfl.prfle_description
from user_login u
INNER JOIN  prison_location crs ON u.crs_id =crs.id
LEFT JOIN  profile prfl        ON u.prfle_id=prfl.prfle_id
where u.usr_id_sgp=$idSgp;";
            //echo '' . $query; 
            $this->rs = $this->conn->execute_sgp($query);
            if ($this->rs) {
                while ($row = pg_fetch_row($this->rs)) {
                    $info = array('success' => TRUE,
                        'message' => 'Usuario encontrado',
                        'usr_id' => $row[0],
                        'crs_id' => $row[1],
                        'name_complete' => $row[2],
                        'usr_nick' => $row[3],
                        'crs_name' => $row[4],
                        'usr_id_sgp' => $row[5],
                        'prfle_description' => $row[6]
                    );
                }
                if (!empty($info)) {
                    return $info;
                } else {
                    return array('success' => FALSE, 'message' => 'Usuario No encontrado');
                }
            } else {
                return array('success' => FALSE, 'message' => 'Hubo problemas con la base de Datos');
            }
        } catch (Exception $exc) {
            /* echo $exc->getTraceAsString(); */
            return array('success' => FALSE, 'message' => 'error al consultar ' . $exc->getMessage());
        } finally {
            // parent::closeConnection();
        }
    }

}
