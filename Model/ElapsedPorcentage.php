<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ElapsedPorcentage
 *
 * @author odilo.ipiales
 */
include_once './../Model/connection.php';
include_once './../Model/ICrud.php';

class ElapsedPorcentage extends Connection implements ICrud {

    private $porcent_cumplido;
    private $dias_a_la_fecha;
    private $total_dias_judiciales_impuestos;
    private $name_ppl, $last_name_ppl, $prontuario, $numero_detencion, $nombre_crs, $fecha_in;

    /* GettersAndSetters */

    function getPorcent_cumplido() {
        return $this->porcent_cumplido;
    }

    function getDias_a_la_fecha() {
        return $this->dias_a_la_fecha;
    }

    function getTotal_dias_judiciales_impuestos() {
        return $this->total_dias_judiciales_impuestos;
    }

    function getName_ppl() {
        return $this->name_ppl;
    }

    function getLast_name_ppl() {
        return $this->last_name_ppl;
    }

    function getProntuario() {
        return $this->prontuario;
    }

    function getNumero_detencion() {
        return $this->numero_detencion;
    }

    function getNombre_crs() {
        return $this->nombre_crs;
    }

    function getFecha_in() {
        return $this->fecha_in;
    }

    function setPorcent_cumplido($porcent_cumplido) {
        $this->porcent_cumplido = $porcent_cumplido;
    }

    function setDias_a_la_fecha($dias_a_la_fecha) {
        $this->dias_a_la_fecha = $dias_a_la_fecha;
    }

    function setTotal_dias_judiciales_impuestos($total_dias_judiciales_impuestos) {
        $this->total_dias_judiciales_impuestos = $total_dias_judiciales_impuestos;
    }

    function setName_ppl($name_ppl) {
        $this->name_ppl = $name_ppl;
    }

    function setLast_name_ppl($last_name_ppl) {
        $this->last_name_ppl = $last_name_ppl;
    }

    function setProntuario($prontuario) {
        $this->prontuario = $prontuario;
    }

    function setNumero_detencion($numero_detencion) {
        $this->numero_detencion = $numero_detencion;
    }

    function setNombre_crs($nombre_crs) {
        $this->nombre_crs = $nombre_crs;
    }

    function setFecha_in($fecha_in) {
        $this->fecha_in = $fecha_in;
    }

    /* The Contructor */

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

    public function update($parametro) {
        
    }

    public function updateByParameters($id, $name, $path) {
        
    }

    public function calcule_porcentage_and_get_table_elapsed_percentage($param) {
        $info;
        try {
            $query = "SELECT f_calcule_porcentage_and_get_table_elapsed_percentage60($param);";
            //echo '' . $query;
            
            $rs = parent::execute_sgp($query);
            if ($rs) {
                while ($row = pg_fetch_row($rs)) {
                    $result= (explode(",",trim($row[0],'()')));
                    //var_dump($result);
                    $info[] = array('success' => TRUE,
                        'message' => 'Lista Pocentaje',
                        'porcent_cumplido' => $result[0],
                        'dias_a_la_fecha' => $result[1],
                        'total_dias_judiciales_impuestos' => $result[2],
                        'prontuario' => $result[3],
                        'name_ppl' => $result[4],
                        'last_name_ppl' => $result[5],
                        'numero_detencion' => $result[6],
                        'nombre_crs' => $result[7],
                        'fecha_in' => $result[8]
                    );
                }
                if (!empty($info)) {
                    return $info;
                } else {
                    return array(array('success' => FALSE, 'message' => 'Porcentajes no Encontrados',));
                }
            } else {
                return array(array('success' => FALSE, 'message' => 'Problemas con la Base de Datos!!!',));
            }
        } catch (Exception $exc) {
            /* echo $exc->getTraceAsString(); */
            return array('success' => FALSE, 'message' => 'error al consultar lista Porcentajes' . $exc->getMessage());
        } finally {
            //parent::closeConnection();
        }
    }
    
     public function calcule_porcentage_and_get_table_elapsed_percentage70($param) {
        $info;
        try {
            $query = "SELECT f_calcule_porcentage_and_get_table_elapsed_percentage70($param);;";
            //echo '' . $query;
            
            $rs = parent::execute_sgp($query);
            if ($rs) {
                while ($row = pg_fetch_row($rs)) {
                    $result= (explode(",",trim($row[0],'()')));
                    //var_dump($result);
                    $info[] = array('success' => TRUE,
                        'message' => 'Lista Pocentaje',
                        'porcent_cumplido' => $result[0],
                        'dias_a_la_fecha' => $result[1],
                        'total_dias_judiciales_impuestos' => $result[2],
                        'prontuario' => $result[3],
                        'name_ppl' => $result[4],
                        'last_name_ppl' => $result[5],
                        'numero_detencion' => $result[6],
                        'nombre_crs' => $result[7],
                        'fecha_in' => $result[8]
                    );
                }
                if (!empty($info)) {
                    return $info;
                } else {
                    return array(array('success' => FALSE, 'message' => 'Porcentajes no Encontrados',));
                }
            } else {
                return array(array('success' => FALSE, 'message' => 'Problemas con la Base de Datos!!!',));
            }
        } catch (Exception $exc) {
            /* echo $exc->getTraceAsString(); */
            return array('success' => FALSE, 'message' => 'error al consultar lista Porcentajes' . $exc->getMessage());
        } finally {
            //parent::closeConnection();
        }
    }

}
