<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of DirectionArea
 *
 * @author odilo
 */
include_once './../Model/connection.php';
include_once './../Model/ICrud.php';

class DirectionArea extends Connection implements ICrud {

    private $area_id;
    private $area_desription;
    private $area_state;

    /* Getters and Setters */

    function getArea_id() {
        return $this->area_id;
    }

    function getArea_desription() {
        return $this->area_desription;
    }

    function getArea_state() {
        return $this->area_state;
    }

    function setArea_id($area_id) {
        $this->area_id = $area_id;
    }

    function setArea_desription($area_desription) {
        $this->area_desription = $area_desription;
    }

    function setArea_state($area_state) {
        $this->area_state = $area_state;
    }

    /* The Constructor */

    public function __construct() {
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

    public function update($parametro) {
        
    }

    public function updateByParameters($id, $name, $path) {
        
    }

    public function loadDirecctionAssigned($user_id) {
        try {
            $query = "	SELECT u.usr_id,da.area_desription,u.usr_name,u.usr_lasname from  direction_area da
		INNER JOIN 	 user_login u  on da.area_id=u.area_id
		where da.area_id=(SELECT 
case 
when da.area_parent is null  then da.area_id
else
da.area_parent
end
from  direction_area da
		INNER JOIN 	 user_login u  on da.area_id=u.area_id
		where u.usr_id=$user_id)";
            $this->rs = parent::execute_sgp($query);
            if ($this->rs) {
                /*
                 * area_id	area_desription	
                 * usr_name	usr_lasname
                 */
                while ($row = pg_fetch_row($this->rs)) {
                    $info = array('success' => TRUE,
                        'message' => 'Direccción Encontrada',
                        'area_id' => $row[0],
                        'area_desription' => $row[1],
                        'usr_name' => $row[2],
                        'usr_lasname' => $row[3]
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

    public function loadDirectionParent($usr_id) {
        $info;
        try {
            $query = "SELECT da.area_parent,da.area_desription  from  direction_area da
INNER JOIN user_login u   on da.area_id=u.area_id
WHERE u.usr_id=$usr_id;";
            $this->rs = parent::execute_sgp($query);
            if ($this->rs) {
                /*
                 * area_parent	area_desription
                 */
                while ($row = pg_fetch_row($this->rs)) {
                    $info = array('success' => TRUE,
                        'message' => 'Direccción Encontrada',
                        'area_parent' => $row[0],
                        'area_desription' => $row[1]
                    );
                }
                if (!empty($info)) {
                    return $info;
                } else {
                    return array('success'=>FALSE,'message'=>'No Tiene Privilegios en esta area');
                }
            } else {
                return array('success'=>FALSE,'message'=>'Hay problemas DDBB');
            }
        } catch (Exception $exc) {
            /* echo $exc->getTraceAsString(); */
            return array('success' => FALSE, 'message' => 'error al consultar lista' . $exc->getMessage());
        } finally {
            parent::closeConnection();
        }
    }

    public function loadDirection($usr_id) {
        try {
            $query = "SELECT da.area_id,da.area_desription  from  direction_area da
INNER JOIN user_login u   on da.area_id=u.area_id
WHERE u.usr_id=$usr_id;";
            $this->rs = parent::execute_sgp($query);
            if ($this->rs) {
                /*
                 * area_parent	area_desription
                 */
                while ($row = pg_fetch_row($this->rs)) {
                    $info = array('success' => TRUE,
                        'message' => 'Direccción Encontrada',
                        'area_parent' => $row[0],
                        'area_desription' => $row[1]
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

//put your code here
}
