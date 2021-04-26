<?php
include_once './../Model/connection.php';
include_once './../Model/ICrud.php';

class CenterCrs extends Connection implements ICrud{

    /*Fieds*/
    private $crs_id;
    private $crs_id_sgp;
    private $crs_description;
    private $csr_state;

    /*Geters and Setters*/


    function getCrs_id() {
        return $this->crs_id;
    }

    function getCrs_id_sgp() {
        return $this->crs_id_sgp;
    }

    function getCrs_description() {
        return $this->crs_description;
    }

    function getCsr_state() {
        return $this->csr_state;
    }

    function setCrs_id($crs_id) {
        $this->crs_id = $crs_id;
    }

    function setCrs_id_sgp($crs_id_sgp) {
        $this->crs_id_sgp = $crs_id_sgp;
    }

    function setCrs_description($crs_description) {
        $this->crs_description = $crs_description;
    }

    function setCsr_state($csr_state) {
        $this->csr_state = $csr_state;
    }

        /*The Contructor*/
    public function __construct() {
        parent::__construct();
    }


    /*The Methods*/
    public function create($query) {

    }

    public function delete($query) {

    }

    public function deleteById($id) {

    }

    public function listAll() {
      $query = " select id, name from prison_location where type='crs' ORDER BY id  DESC";
      $this->rs = parent::execute($query);
     if ($this->rs) {
              while ($row = pg_fetch_row($this->rs)) {
                  $info[] = array('success'       => TRUE,
                      'message'                   => ' Tipos de Traslados encontrados',
                      'crs_id'                    => $row[0],
                      'crs_id_sgp'                => utf8_encode($row[1]),
                      'crs_description'           => $row[2],
                      'crs_state'                 => $row[3]
                  );
              }
              return $info;

      } else {
        $info[] = array('success' => FALSE, 'message' => 'No hay datos de Crs');

          return $info;
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
