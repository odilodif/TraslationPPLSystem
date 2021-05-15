<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of PrisonMove
 *
 * @author odilo.ipiales
 */
include_once './../Model/connection.php';
include_once './../Model/ICrud.php';

class PrisonMove extends Connection implements ICrud {

    private $date;
    private $number;
    private $crs_source;
    private $ubi_source;
    private $crs_destination;
    private $ubi_destination;
    private $funcionario;

    function getDate() {
        return $this->date;
    }

    function getNumber() {
        return $this->number;
    }

    function getCrs_source() {
        return $this->crs_source;
    }

    function getUbi_source() {
        return $this->ubi_source;
    }

    function getCrs_destination() {
        return $this->crs_destination;
    }

    function getUbi_destination() {
        return $this->ubi_destination;
    }

    function getFuncionario() {
        return $this->funcionario;
    }

    function setDate($date) {
        $this->date = $date;
    }

    function setNumber($number) {
        $this->number = $number;
    }

    function setCrs_source($crs_source) {
        $this->crs_source = $crs_source;
    }

    function setUbi_source($ubi_source) {
        $this->ubi_source = $ubi_source;
    }

    function setCrs_destination($crs_destination) {
        $this->crs_destination = $crs_destination;
    }

    function setUbi_destination($ubi_destination) {
        $this->ubi_destination = $ubi_destination;
    }

    function setFuncionario($funcionario) {
        $this->funcionario = $funcionario;
    }

    //put your code here
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

    public function readMovesProntuario($prontuario) {
        $query = "SELECT pm.date,pm.number, (SELECT name FROM prison_location where id=pm.center_id) as crs_source,
(SELECT complete_name FROM prison_location where id=pm.loc_from_id) as ubi_source,
(SELECT \"name\" FROM prison_location where id=pm.center_to_id) as crs_destination,
(SELECT complete_name FROM prison_location where id=pm.location_id) as ubi_destination,
(SELECT par.\"name\"  FROM res_users u INNER JOIN res_partner par on  u.partner_id =par.\"id\" where  u.\"id\"=pm.write_uid) as funcionario
FROM prison_move pm
WHERE pm.ppl_id=(SELECT id from prison_person WHERE prontuario='$prontuario') ORDER BY pm.date DESC;";
        try {
            Connection::getInstance()->getConnection();
            $rs = parent::execute_sgp($query);
            if ($rs) {
                $info = null;
                /* date	number	crs_source	ubi_source	crs_destination	ubi_destination	funcionario */
                while ($row = pg_fetch_row($rs)) {
                    $info[] = array('success' => TRUE,
                        'message' => 'Traslado  encontrado',
                        'date' => $row[0],
                        'number' => $row[1],
                        'crs_source' => $row[2],
                        'ubi_source' => $row[3],
                        'crs_destination' => $row[4],
                        'ubi_destination' => $row[5],
                        'funcionario' => $row[6]
                    );
                }
                return $info;
            } else {
                return array('success' => FALSE, 'message' => 'No hay resultado');
            }
        } catch (Exception $exc) {
            /* echo $exc->getTraceAsString(); */
            return array('success' => FALSE, 'message' => 'error al consultar Traslado' . $exc->getMessage());
        }
    }

    public function update($parametro) {
        
    }

    public function updateByParameters($id, $name, $path) {
        
    }

}
