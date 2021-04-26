<?php

include_once './../Model/connection.php';
include_once './../Model/ICrud.php';

class PrisonPerson extends Connection implements ICrud {

    private $prison_per_id;
    private $prison_per_name;
    private $prison_per_lastname;
    private $prison_per_identification;
    private $prison_per_photo;
    private $prison_per_fingerprinter;
    private $trasl_id;
    private $prison_per_state;
    private $prison_per_observations;
    private $strategy;
    private $query;

    function getQuery() {
        return $this->query;
    }

    function setQuery($query) {
        $this->query = $query;
    }

    function getStrategy() {
        return $this->strategy;
    }

    function setStrategy($strategy) {
        $this->strategy = $strategy;
    }

    function getPrison_per_observations() {
        return $this->prison_per_observations;
    }

    function setPrison_per_observations($prison_per_observations) {
        $this->prison_per_observations = $prison_per_observations;
    }

    function getPrison_per_id() {
        return $this->prison_per_id;
    }

    function getPrison_per_name() {
        return $this->prison_per_name;
    }

    function getPrison_per_lastname() {
        return $this->prison_per_lastname;
    }

    function getPrison_per_identification() {
        return $this->prison_per_identification;
    }

    function getPrison_per_photo() {
        return $this->prison_per_photo;
    }

    function getPrison_per_fingerprinter() {
        return $this->prison_per_fingerprinter;
    }

    function getTrasl_id() {
        return $this->trasl_id;
    }

    function getPrison_per_state() {
        return $this->prison_per_state;
    }

    function setPrison_per_id($prison_per_id) {
        $this->prison_per_id = $prison_per_id;
    }

    function setPrison_per_name($prison_per_name) {
        $this->prison_per_name = $prison_per_name;
    }

    function setPrison_per_lastname($prison_per_lastname) {
        $this->prison_per_lastname = $prison_per_lastname;
    }

    function setPrison_per_identification($prison_per_identification) {
        $this->prison_per_identification = $prison_per_identification;
    }

    function setPrison_per_photo($prison_per_photo) {
        $this->prison_per_photo = $prison_per_photo;
    }

    function setPrison_per_fingerprinter($prison_per_fingerprinter) {
        $this->prison_per_fingerprinter = $prison_per_fingerprinter;
    }

    function setTrasl_id($trasl_id) {
        $this->trasl_id = $trasl_id;
    }

    function setPrison_per_state($prison_per_state) {
        $this->prison_per_state = $prison_per_state;
    }

    function executeMove1() {
        $this->query = $this->strategy->move1();
    }

    /* Execute Only Traslations/*
     * 
     */

    function executeMove2() {

        $this->query = $this->strategy->move2();
    }

    /* Execute Only Traslations/*
     * 
     */

    function executeEmpty() {

        $this->query = $this->strategy->FielsEmpty();
    }

    /*

     * The Constructor
     */

    function __construct() {
        parent::__construct();
    }

    /* funcion strategia
     *
     */

    public function listAll() {
        try {
            $query = "SELECT * FROM prison_person WHERE prison_per_state='t'";
            //echo ''.$query;
            /*
              prison_per_id
             * prison_per_name	
             * prison_per_lastname	
             * prison_per_identification	
             * prison_per_photo	
             * prison_per_fingerprinter	
             * prison_per_state	
             * prison_per_observations	
             * crs_id
             */
            $this->rs = parent::execute($query);
            if ($this->rs) {
                while ($row = pg_fetch_row($this->rs)) {
                    $info[] = array(
                        'success' => TRUE,
                        'prison_per_id' => $row[0],
                        'prison_per_name' => $row[1],
                        'prison_per_lastname' => $row[2],
                        'prison_per_identification' => $row[3],
                        'prison_per_photo' => $row[4],
                        'prison_per_fingerprinter' => $row[5],
                        'prison_per_state' => $row[6],
                        'prison_per_observations' => $row[7],
                        'crs_id' => $row[8]
                    );
                }
                return $info;
            } else {

                return array('success' => FALSE, 'message' => 'error al consultar lista PPLs');
            }
        } catch (Exception $ex) {
            return array('success' => FALSE, 'message' => 'error al consultar lista' . $ex->getMessage());
        } finally {
            parent::closeConnection();
        }
    }

    public function listAllSgp() {
        try {
            $query = "SELECT * FROM prison_person WHERE prison_per_state='t' ORDER BY prison_per_id ASC ;";
            //echo ''.$query;
            /*
              prison_per_id
             * prison_per_name	
             * prison_per_lastname	
             * prison_per_identification	
             * prison_per_photo	
             * prison_per_fingerprinter	
             * prison_per_state	
             * prison_per_observations	
             * crs_id
             */
            $this->rs = parent::execute($query);
            if ($this->rs) {
                while ($row = pg_fetch_row($this->rs)) {
                    $info[] = array(
                        'success' => TRUE,
                        'prison_per_id' => $row[0],
                        'prison_per_name' => $row[1],
                        'prison_per_lastname' => $row[2],
                        'prison_per_identification' => $row[3],
                        'prison_per_photo' => $row[4],
                        'prison_per_fingerprinter' => $row[5],
                        'prison_per_state' => $row[6],
                        'prison_per_observations' => $row[7],
                        'crs_id' => $row[8]
                    );
                }
                return $info;
            } else {

                return array('success' => FALSE, 'message' => 'error al consultar lista PPLs');
            }
        } catch (Exception $ex) {
            return array('success' => FALSE, 'message' => 'error al consultar lista' . $ex->getMessage());
        } finally {
            parent::closeConnection();
        }
    }

    public function create($query) {
        try {
            //echo 'id_traslation'.$this->trasl_id;           
            // echo "string" . $query;
            $rs = parent::execute($query);

            if ($rs) {

                return $info = array('success' => TRUE, 'message' => 'PPL Creado');
            } else {

                return $info = array('success' => FALSE, 'message' => 'Error al crear PPL asegúreseque no este duplicado  ');
            }
        } catch (Exception $exc) {
            //echo 'error exception al crear Traslados' . $exc->getMessage();
        } /* finally {
          parent::closeConnection();
          } */
    }

    public function delete($query) {
        
    }

    public function deleteById($id) {
        
    }

    public function listByParameter($id, $name, $path) {
        try {
            $query = "SELECT * from prison_person WHERE prison_per_id =$id or prison_per_name LIKE '%$name%' or prison_per_lastname LIKE '%$lastname%';";
            $this->rs = parent::execute($query);
            if ($this->rs) {
                while ($row = pg_fetch_row($this->rs)) {
                    $info[] = array(
                        'success' => TRUE,
                        'prison_per_id' => $row[0],
                        'prison_per_name' => $row[1],
                        'prison_per_lastname' => $row[2],
                        'prison_per_identification' => $row[3],
                        'prison_per_photo' => $row[4],
                        'prison_per_fingerprinter' => $row[5],
                        'prison_per_state' => $row[6],
                        'prison_per_observations' => $row[7],
                        'crs_id' => $row[8]
                    );
                }
                return $info;
            } else {

                return array('success' => FALSE, 'message' => 'error al consultar lista PPLs');
            }
        } catch (Exception $ex) {
            return array('success' => FALSE, 'message' => 'error al consultar lista' . $ex->getMessage());
        } finally {
            parent::closeConnection();
        }
    }

    public function listByParameterFileds($identification) {
        try {

            Connection::getInstance()->getConnection();
            // echo 'test';
            $query = "SELECT * from prison_person WHERE prison_per_identification LIKE '%$identification%' ;";
            //echo ''.$query;
            $this->rs = parent::execute($query);
            if ($this->rs) {
                while ($row = pg_fetch_row($this->rs)) {
                    $info[] = array(
                        'success' => TRUE,
                        'prison_per_id' => $row[0],
                        'prison_per_name' => $row[1],
                        'prison_per_lastname' => $row[2],
                        'prison_per_identification' => $row[3],
                        'prison_per_photo' => $row[4],
                        'prison_per_fingerprinter' => $row[5],
                        'prison_per_state' => $row[6],
                        'prison_per_observations' => $row[7],
                        'crs_id' => $row[8]
                    );
                }
                return $info;
            } else {

                return array('success' => FALSE, 'message' => 'error al consultar lista PPLs');
            }
        } catch (Exception $ex) {
            return array('success' => FALSE, 'message' => 'error al consultar lista' . $ex->getMessage());
        } finally {
            parent::closeConnection();
        }
    }

    public function read($query) {
        
    }

    public function update($parametro) {
        
    }

    public function updateByParameters($id, $name, $path) {
        try {
            $query = "";
            $rs = parent::execute($query);
            $rows = pg_num_rows($rs);
            //echo ''.$rows;
            if ($rows != 0) {

                return array('success' => TRUE, 'message' => 'PPLs Actualizado');
            } else {

                return array('success' => FALSE, 'message' => 'Error al actualizar PPLs');
            }
        } catch (Exception $ex) {
            return array('success' => FALSE, 'message' => 'error al consultar lista' . $ex->getMessage());
        } finally {
            parent::closeConnection();
        }
    }

    public function updateByParam($id, $name, $lastname) {
        try {
            $query = "UPDATE prison_person SET prison_per_name='$name'	, prison_per_lastname='$lastname' WHERE prison_per_id=$id";
            $rs = parent::execute($query);
            echo ''.$query;
            // $rows = pg_num_rows($rs);           
            if ($rs) {

                return array('success' => TRUE, 'message' => 'PPL Actualizado');
            } else {

                return array('success' => FALSE, 'message' => 'Error al actualizar PPLs');
            }
        } catch (Exception $ex) {
            return array('success' => FALSE, 'message' => 'error al consultar lista' . $ex->getMessage());
        } finally {
            parent::closeConnection();
        }
    }

    public function readPrisonPersonByParameters($id_ppl) {
        try {
            $query = "SELECT ppl.prison_per_id, ppl.prison_per_name, ppl.prison_per_lastname,fd.file_id
	,	fd.file_path,fd.file_description_name
		from prison_person ppl 
		INNER JOIN file_document fd ON ppl.prison_per_id=fd.prison_per_id
		WHERE ppl.prison_per_id = $id_ppl and fd.file_state='t';";
            $rs = parent::execute($query);
            $rows = pg_num_rows($rs);
            //echo ''.$rows;
            if ($rows != 0) {
                /*
                 * prison_per_id	
                 * prison_per_name	
                 * prison_per_lastname	
                 * file_id	
                 * file_path	
                 * file_description_name	
                 */
                while ($row = pg_fetch_row($rs)) {
                    $info[] = array('success' => TRUE,
                        'prison_per_id' => $row[0],
                        'prison_per_name' => $row[1],
                        'prison_per_lastname' => $row[2], //
                        'file_id' => $row[3],
                        'file_path' => $row[4],
                        'file_description_name' => $row[5]
                    );
                }
                return $info;
            } else {

                return array('success' => FALSE, 'message' => 'error al consultar lista PPLs');
            }
        } catch (Exception $ex) {
            return array('success' => FALSE, 'message' => 'error al consultar lista' . $ex->getMessage());
        } finally {
            parent::closeConnection();
        }
    }

    public function updateObservatios() {
        try {
            $lquery = "UPDATE prison_person SET prison_per_observations ='$this->prison_per_observations' WHERE prison_per_id=$this->prison_per_id ;";
            //echo "string".$query_local;
            $rs = parent::execute($lquery);
            if ($rs) {
                return $info = array('success' => TRUE, 'message' => 'PPL Actualizado');
            } else {

                return $info = array('success' => FALSE, 'message' => 'No se pudo actualizar PPL');
                ;
            }
        } catch (Exception $exc) {
            //echo 'error exception al crear Traslados' . $exc->getMessage();
        } finally {
            parent::closeConnection();
        }
    }

    public function readPrisonPersonByFiles($id_ppl) {
        try {
            Connection::getInstance()->getConnection();
            $query = "SELECT ppl.prison_per_id, ppl.prison_per_name, ppl.prison_per_lastname,f.file_path,f.file_description_name from prison_person ppl
 INNER JOIN file_document f on ppl.prison_per_id=f.prison_per_id
 WHERE ppl.prison_per_id = $id_ppl and f.file_state='t';";
            $this->rs = parent::execute($query);
            if ($this->rs) {
                /*  , ,  */
                while ($row = pg_fetch_row($this->rs)) {
                    $info[] = array('success' => TRUE,
                        'prison_per_id' => $row[0],
                        'prison_per_name' => $row[1],
                        'prison_per_lastname' => $row[2],
                        'file_path' => $row[3],
                        'file_description_name' => $row[4]
                    );
                }
                return $info;
            } else {

                return array('success' => FALSE, 'message' => 'error al consultar lista PPLs con Certificados');
            }
        } catch (Exception $ex) {
            return array('success' => FALSE, 'message' => 'error al consultar lista' . $ex->getMessage());
        } finally {
            parent::closeConnection();
        }
    }

    public function getMove($query) {
        //echo ''.$query;
        $info=NULL;
        try {
            Connection::getInstance()->getConnection();
            $rs = parent::execute($query);
            //echo ''.$rows;
            if ($rs) {
                /*
                 * prison_per_id	
                 * prison_per_name	
                 * prison_per_lastname	
                 * file_id	
                 * file_path	
                 * file_description_name	
                 */
                while ($row = pg_fetch_row($rs)) {
                    $info[] = array('success' => TRUE,
                        'prison_per_id' => $row[0],
                        'prison_per_name' => $row[1],
                        'prison_per_lastname' => $row[2], //
                        'file_id' => $row[3],
                        'file_path' => $row[4],
                        'file_description_name' => $row[5]
                    );
                }
                return $info;
            } else {
                return array('success' => FALSE, 'message' => 'No hay resultado');
            }
        } catch (Exception $exc) {
            /* echo $exc->getTraceAsString(); */
            return array('success' => FALSE, 'message' => 'error al consultar Traslado' . $exc->getMessage());
        } finally {
           // parent::closeConnection();
        }
    }

    public function ifExistsPPL($list) {
        Connection::getInstance()->getConnection();
        try {
            foreach ($list as $key => $value) {
                $identification = $value['identification'];
                $name = strtoupper($value['name']);
                $lastname = strtoupper($value['last_name']);
                $sex = strtoupper($value['sex']);
                $prontuario = $value['prontuario'];
                $id_sgp = $value['prison_per_id'];
                $status_sgp = strtoupper($value['status_sgp']);
                $query = "select if_exists_ppl('$name','$lastname','$identification',$id_sgp,'$sex','$prontuario','$status_sgp');";
                //echo '' . $query;
                $rs = parent::execute($query);
            }
            if ($rs > 0) {

                return array('success' => TRUE, 'message' => 'Datos guardados o Actualizados exitosamente');
            } else {

                return array('success' => FALSE, 'message' => 'error al consultar lista PPLs');
            }
        } catch (Exception $exc) {
            //echo 'error exception al crear Traslados' . $exc->getMessage();
        } finally {
            parent::closeConnection();
        }
    }

    public function loadFormEdit($id_ppl) {
        try {
            Connection::getInstance()->getConnection();
            $query = "SELECT ppl.prison_per_id, ppl.prison_per_name, ppl.prison_per_lastname from prison_person ppl
WHERE ppl.prison_per_id = $id_ppl ;";
            $this->rs = parent::execute($query);
            if ($this->rs) {
                /*  prison_per_id	prison_per_name	prison_per_lastname  */
                while ($row = pg_fetch_row($this->rs)) {
                    $info = array('success' => TRUE,
                        'prison_per_id' => $row[0],
                        'prison_per_name' => $row[1],
                        'prison_per_lastname' => $row[2]
                    );
                }
                return $info;
            } else {

                return array('success' => FALSE, 'message' => 'error al consultar  PPLs ');
            }
        } catch (Exception $ex) {
            return array('success' => FALSE, 'message' => 'error al consultar ' . $ex->getMessage());
        } finally {
            parent::closeConnection();
        }
    }
    
    public function deleteBolleanPPL($id) {
        try {
            $query = "UPDATE prison_person SET prison_per_state='f'  WHERE prison_per_id=$id";
            $rs = parent::execute($query);
           // echo ''.$query;
            // $rows = pg_num_rows($rs);           
            if ($rs) {

                return array('success' => TRUE, 'message' => 'PPL Actualizado');
            } else {

                return array('success' => FALSE, 'message' => 'Error al actualizar PPLs');
            }
        } catch (Exception $ex) {
            return array('success' => FALSE, 'message' => 'error al consultar lista' . $ex->getMessage());
        } finally {
            parent::closeConnection();
        }
    }

}
?>







