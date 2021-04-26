<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of CrsSgp
 *
 * @author odilo
 */

include_once './../Model/connection.php';
include_once './../Model/ICrud.php';

class CrsSgp extends Connection implements ICrud{
    /*Fields*/
    private $id;
    private $name_centro;
    /*getters and setters*/

    function getId() {
        return $this->id;
    }

    function getName_centro() {
        return $this->name_centro;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setName_centro($name_centro) {
        $this->name_centro = $name_centro;
    }




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
        try {
            $sqlsgp = "select id, name from prison_location where type='crs' ORDER BY id DESC;";

            $this->rs = parent::execute_sgp($sqlsgp);
            if ($this->rs) {


                while ($row = pg_fetch_row($this->rs)) {
                    $info[] = array('success'             => TRUE,
                        'message'                         => 'Crs encontrados',
                        'crs_id'                          => $row[0],
                        'crs_description'                 => $row[1]
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

    public function listByParameter($id, $name, $path) {

    }

    public function read($query) {

    }

    public function update($parametro) {

    }

    public function updateByParameters($id, $name, $path) {

    }

}
