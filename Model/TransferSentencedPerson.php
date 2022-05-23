<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

/**
 * Description of TransferSentencedPerson
 *
 * @author odilo
 */
include_once './../Model/connection.php';
include_once './../Model/ICrud.php';

class TransferSentencedPerson extends Connection implements ICrud {

    //The Contructor

    function __construct() {
        //parent::__construct();
        $this->conn = Connection::getInstance();
    }

    //put your code here
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

    public function getIdsCrimes($cedula) {
        $info;
        try {
            $query = "SELECT * FROM prison_detention WHERE person_id=(SELECT id FROM prison_person WHERE identificador = '$cedula');";
            //echo '' . $query; 
            $get_detentions = $this->conn->execute_sgp($query);
            $crime_ids;
            if ($get_detentions) {
                while ($row = pg_fetch_row($get_detentions)) {
                    $state_det = (string) $row[14];

                    if ($state_det !== "free") {
                        $crime_ids = array(
                            'crime_id' => $row[12]
                        );
                    }
                }
                return $crime_ids;
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
    
       public function get_crime_namecoplete($idcrime) {
        
        try {
            $query = "SELECT * FROM prison_crime WHERE id=".$idcrime;
            //echo '' . $query; 
            $crime_namecomplete = $this->conn->execute_sgp($query);
            $crime_name;
            if ($crime_namecomplete) {
                while ($row = pg_fetch_row($crime_namecomplete)) { 
                        $crime_name = array(
                            'crime_name_complete' => $row[8]
                        );                    
                }
                return $crime_name;
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
