<?php

include_once './../Model/connection.php';
include_once './../Model/ICrud.php';

class TraslationType extends Connection implements ICrud {
    /* Fields */

    private $rs = null;
    private $trasl_type_id;
    private $trasl_type_descripcion;
    private $trasl_type_state;

    /* Getters and Setters */

    function getTrasl_type_id() {
        return $this->trasl_type_id;
    }

    function getTrasl_type_descripcion() {
        return $this->trasl_type_descripcion;
    }

    function getTrasl_type_state() {
        return $this->trasl_type_state;
    }

    function setTrasl_type_id($trasl_type_id) {
        $this->trasl_type_id = $trasl_type_id;
    }

    function setTrasl_type_descripcion($trasl_type_descripcion) {
        $this->trasl_type_descripcion = $trasl_type_descripcion;
    }

    function setTrasl_type_state($trasl_type_state) {
        $this->trasl_type_state = $trasl_type_state;
    }

    /* Construct */

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
        $info;
        try {
            $query = "  select trasl_type_id,	trasl_type_descripcion,	trasl_type_state,area_id,usr_id from traslation_type  where trasl_type_state='t' order by 1";
            $this->rs = parent::execute_sgp($query);
            if ($this->rs) {
                while ($row = pg_fetch_row($this->rs)) {
                    $info[] = array('success' => TRUE,
                        'message' => ' Tipos de Traslados encontrados',
                        'trasl_type_id' => $row[0],
                        'trasl_type_descripcion' => $row[1],
                        'trasl_type_state' => $row[2],
                        'check' => FALSE
                    );
                }
                if(!empty($info)) {
                    return $info;   
                } else {
                    return array(array('success' => FALSE,'message' => ' Tipos de Traslados asignados no encontrados'));
                }
                
            } else {
                return array(array('success' => FALSE, 'message' => 'Problemas con la Base de datos o Consulta'));                
            }
        } catch (Exception $exc) {
            return array('success' => FALSE, 'message' => 'error al consultar lista' . $exc->getMessage());
        } finally {
          //  parent::closeConnection();
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

?>
