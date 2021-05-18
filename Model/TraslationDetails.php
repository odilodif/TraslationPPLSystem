<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of TraslationDetails
 *
 * @author odilo
 */
include_once './../Model/connection.php';
include_once './../Model/ICrud.php';

class TraslationDetails extends Connection implements ICrud {
    /* Fiels */

    private $trasl_det_id;
    private $trasl_id;
    private $prison_per_id;
    private $trasl_det_status;

    /* Getters an Setters */

    function getTrasl_det_id() {
        return $this->trasl_det_id;
    }

    function getTrasl_id() {
        return $this->trasl_id;
    }

    function getPrison_per_id() {
        return $this->prison_per_id;
    }

    function getTrasl_det_status() {
        return $this->trasl_det_status;
    }

    function setTrasl_det_id($trasl_det_id) {
        $this->trasl_det_id = $trasl_det_id;
    }

    function setTrasl_id($trasl_id) {
        $this->trasl_id = $trasl_id;
    }

    function setPrison_per_id($prison_per_id) {
        $this->prison_per_id = $prison_per_id;
    }

    function setTrasl_det_status($trasl_det_status) {
        $this->trasl_det_status = $trasl_det_status;
    }

    public function __construct() {
        parent::__construct();
    }

    public function create($query) {
        $sql="INSERT INTO traslation_details(trasl_id,prison_per_id,trasl_det_status) ".$query;
        try {
            // echo "" . $sql;
           // Connection::getInstance()->getConnection();
           
            $rs = parent::execute_sgp($query);
            if ($rs) {
                return $info[] = array('success' => TRUE, 'message' => 'PPL Creado');
            } else {

                return $info[] = array('success' => FALSE, 'message' => 'No se pudo crear PPL');
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

    public function report3a($trasl_id, $date_from, $date_to, $status, $trasl_descripcion, $prison_per_identification, $prison_per_name, $prison_per_lastname, $sex, $prontuario, $status_sgp, $trasl_type_descripcion, $crs_origen, $crs_destino, $name_analyst, $lastname_analyst) {
        //echo ''.$trasl_id;
        try {
            $query = "SELECT th.trasl_id,th.trasl_date_request,
case
when th.trasl_state_process ='start'  then 'Inicio'
when th.trasl_state_process ='sent'  then 'Enviado'
when th.trasl_state_process ='approved'  then 'Aprobado'
when th.trasl_state_process ='revision'  then 'Revision'
when th.trasl_state_process ='executed'  then 'Finalizado'
when th.trasl_state_process ='authorized'  then 'Autorizado'
else 'Sin Estado'
end AS status, th.trasl_descripcion,ppl.prison_per_identification,ppl.prison_per_name
,	ppl.prison_per_lastname,ppl.sex,	ppl.prontuario,	ppl.status_sgp,	typ.trasl_type_descripcion
,crss.crs_description as crs_andigen, crsd.crs_description as crs_destino,usr.usr_name as name_analyst
,usr.usr_lasname as lastname_analyst,(SELECT  COUNT(*) from traslation_head th
INNER JOIN traslation_details td on th.trasl_id=td.trasl_id
INNER JOIN prison_person ppl    on  td.prison_per_id=ppl.id_sgp
INNER JOIN traslation_type typ  on  th.trasl_type_id= typ.trasl_type_id
INNER JOIN center_crs crss     on  th.crs_id_source= crss.crs_id
INNER JOIN center_crs crsd     on  th.crs_id_destination= crsd.crs_id
INNER JOIN user_login usr     on  th.trasl_analyzed_by= usr.usr_id WHERE crss.crs_id=$crs_origen  ) as total
 from traslation_head th
INNER JOIN traslation_details td on th.trasl_id=td.trasl_id
INNER JOIN prison_person ppl    on  td.prison_per_id=ppl.id_sgp
INNER JOIN traslation_type typ  on  th.trasl_type_id= typ.trasl_type_id
INNER JOIN center_crs crss     on  th.crs_id_source= crss.crs_id
INNER JOIN center_crs crsd     on  th.crs_id_destination= crsd.crs_id
INNER JOIN user_login usr     on  th.trasl_analyzed_by= usr.usr_id WHERE crss.crs_id=$crs_origen
";
            //echo '' . $query;
            $result = parent::execute($query);
            if (pg_fetch_row($result)) {
                $numrows = pg_numrows($result);
                // Loop through rows in the result set
                for ($i = 0; $i < $numrows; $i++) {
                    $row = pg_fetch_array($result, $i);

                    $info[] = array('success' => TRUE,
                        'message' => 'Lista  encontrada',
                        'trasl_id' => $row[0],
                        'trasl_date_request' => $row[1],
                        'status' => $row[2],
                        'trasl_descripcion' => $row[3],
                        'prison_per_identification' => $row[4],
                        'prison_per_name' => $row[5],
                        'prison_per_lastname' => $row[6],
                        'sex' => $row[7],
                        'prontuario' => $row[8],
                        'status_sgp' => $row[9],
                        'trasl_type_descripcion' => $row[10],
                        'crs_origen' => $row[11],
                        'crs_destino' => $row[12],
                        'name_analyst' => $row[13],
                        'lastname_analyst' => $row[14],
                        'total' => $row[15]
                    );
                }
                return $info;
            } else {
                $info[] = array(
                    'success' => FALSE,
                    'message' => 'No hay datos que mostrar'
                );
                return $info;
            }
        } catch (Exception $exc) {
            /* echo $exc->getTraceAsString(); */
            return array('success' => FALSE, 'message' => 'error al consultar report1' . $exc->getMessage());
        } finally {
            parent::closeConnection();
        }
    }

    public function report3b($trasl_id, $date_from, $date_to, $status, $trasl_descripcion, $prison_per_identification, $prison_per_name, $prison_per_lastname, $sex, $prontuario, $status_sgp, $trasl_type_descripcion, $crs_origen, $crs_destino, $name_analyst, $lastname_analyst, $crs_id) {
        //echo ''.$trasl_id;
        try {
            $query = "SELECT th.trasl_id,th.trasl_date_request,
case
when th.trasl_state_process ='start'  then 'Inicio'
when th.trasl_state_process ='sent'  then 'Enviado'
when th.trasl_state_process ='approved'  then 'Aprobado'
when th.trasl_state_process ='revision'  then 'Revision'
when th.trasl_state_process ='executed'  then 'Finalizado'
when th.trasl_state_process ='authorized'  then 'Autorizado'
else 'Sin Estado'
end AS status, th.trasl_descripcion,ppl.prison_per_identification,ppl.prison_per_name
,	ppl.prison_per_lastname,ppl.sex,	ppl.prontuario,	ppl.status_sgp,	typ.trasl_type_descripcion
,crss.crs_description as crs_andigen, crsd.crs_description as crs_destino,usr.usr_name as name_analyst
,usr.usr_lasname as lastname_analyst,(SELECT  COUNT(*) from traslation_head th
INNER JOIN traslation_details td on th.trasl_id=td.trasl_id
INNER JOIN prison_person ppl    on  td.prison_per_id=ppl.id_sgp
INNER JOIN traslation_type typ  on  th.trasl_type_id= typ.trasl_type_id
INNER JOIN center_crs crss     on  th.crs_id_source= crss.crs_id
INNER JOIN center_crs crsd     on  th.crs_id_destination= crsd.crs_id
INNER JOIN user_login usr     on  th.trasl_analyzed_by= usr.usr_id WHERE th.trasl_id=$trasl_id and	( th.trasl_state_process like '%$status%' and	th.trasl_descripcion like '%$trasl_descripcion%' and 	ppl.prison_per_identification like '%$prison_per_identification%'	
    and ppl.prison_per_name like '%$prison_per_name%'	 
and ppl.prison_per_lastname like '%$prison_per_lastname%' and	ppl.sex like '%$sex%' and	prontuario like '%$prontuario%' and	
ppl.status_sgp like '%$status_sgp%' 
and 	typ.trasl_type_descripcion like '%$trasl_type_descripcion%'	and crss.crs_description like '%$crs_origen%' 
and	crsd.crs_description like '%$crs_destino%' and usr.usr_name like '%$name_analyst%' and usr.usr_lasname like '%$lastname_analyst%')
and (th.trasl_date_request BETWEEN '$date_from' and '$date_to') ) as total
 from traslation_head th
INNER JOIN traslation_details td on th.trasl_id=td.trasl_id
INNER JOIN prison_person ppl    on  td.prison_per_id=ppl.id_sgp
INNER JOIN traslation_type typ  on  th.trasl_type_id= typ.trasl_type_id
INNER JOIN center_crs crss     on  th.crs_id_source= crss.crs_id
INNER JOIN center_crs crsd     on  th.crs_id_destination= crsd.crs_id
INNER JOIN user_login usr     on  th.trasl_analyzed_by= usr.usr_id
WHERE
(th.trasl_id = $trasl_id)	
and	( th.trasl_state_process like '%$status%' and	th.trasl_descripcion like '%$trasl_descripcion%' and 	ppl.prison_per_identification like '%$prison_per_identification%'	
    and ppl.prison_per_name like '%$prison_per_name%'	 
and ppl.prison_per_lastname like '%$prison_per_lastname%' and	ppl.sex like '%$sex%' and	prontuario like '%$prontuario%' and	
ppl.status_sgp like '%$status_sgp%' 
and 	typ.trasl_type_descripcion like '%$trasl_type_descripcion%'	and crss.crs_description like '%$crs_origen%' 
and	crsd.crs_description like '%$crs_destino%' and usr.usr_name like '%$name_analyst%' and usr.usr_lasname like '%$lastname_analyst%')
and (th.trasl_date_request BETWEEN '$date_from' and '$date_to'); 
 ";
            //  echo '' . $query;
            $result = parent::execute($query);
            if (pg_fetch_row($result)) {
                $numrows = pg_numrows($result);
                // Loop through rows in the result set
                for ($i = 0; $i < $numrows; $i++) {
                    $row = pg_fetch_array($result, $i);

                    $info[] = array('success' => TRUE,
                        'message' => 'Lista  encontrada',
                        'trasl_id' => $row[0],
                        'trasl_date_request' => $row[1],
                        'status' => $row[2],
                        'trasl_descripcion' => $row[3],
                        'prison_per_identification' => $row[4],
                        'prison_per_name' => $row[5],
                        'prison_per_lastname' => $row[6],
                        'sex' => $row[7],
                        'prontuario' => $row[8],
                        'status_sgp' => $row[9],
                        'trasl_type_descripcion' => $row[10],
                        'crs_origen' => $row[11],
                        'crs_destino' => $row[12],
                        'name_analyst' => $row[13],
                        'lastname_analyst' => $row[14],
                        'total' => $row[15]
                    );
                }
                return $info;
            } else {
                $info[] = array(
                    'success' => FALSE,
                    'message' => 'No hay datos que mostrar'
                );
                return $info;
            }
        } catch (Exception $exc) {
            /* echo $exc->getTraceAsString(); */
            return array('success' => FALSE, 'message' => 'error al consultar report1' . $exc->getMessage());
        } finally {
            parent::closeConnection();
        }
    }

    public function report3c($trasl_id, $date_from, $date_to, $status, $trasl_descripcion, $prison_per_identification, $prison_per_name, $prison_per_lastname, $sex, $prontuario, $status_sgp, $trasl_type_descripcion, $crs_origen, $crs_destino, $name_analyst, $lastname_analyst) {
        //echo ''.$trasl_id;
        try {
            $query = "SELECT th.trasl_id,th.trasl_date_request,
case
when th.trasl_state_process ='start'  then 'Inicio'
when th.trasl_state_process ='sent'  then 'Enviado'
when th.trasl_state_process ='approved'  then 'Aprobado'
when th.trasl_state_process ='revision'  then 'Revision'
when th.trasl_state_process ='executed'  then 'Finalizado'
when th.trasl_state_process ='authorized'  then 'Autorizado'
else 'Sin Estado'
end AS status, th.trasl_descripcion,ppl.prison_per_identification,ppl.prison_per_name
,ppl.prison_per_lastname,ppl.sex,	ppl.prontuario,	ppl.status_sgp,	typ.trasl_type_descripcion
,crss.crs_description as crs_andigen, crsd.crs_description as crs_destino,usr.usr_name as name_analyst
,usr.usr_lasname as lastname_analyst,(SELECT  COUNT(*) from traslation_head th
INNER JOIN traslation_details td on th.trasl_id=td.trasl_id
INNER JOIN prison_person ppl    on  td.prison_per_id=ppl.id_sgp
INNER JOIN traslation_type typ  on  th.trasl_type_id= typ.trasl_type_id
INNER JOIN center_crs crss     on  th.crs_id_source= crss.crs_id
INNER JOIN center_crs crsd     on  th.crs_id_destination= crsd.crs_id
INNER JOIN user_login usr     on  th.trasl_analyzed_by= usr.usr_id WHERE th.trasl_id=$trasl_id ) as total
 from traslation_head th
INNER JOIN traslation_details td on th.trasl_id=td.trasl_id
INNER JOIN prison_person ppl    on  td.prison_per_id=ppl.id_sgp
INNER JOIN traslation_type typ  on  th.trasl_type_id= typ.trasl_type_id
INNER JOIN center_crs crss     on  th.crs_id_source= crss.crs_id
INNER JOIN center_crs crsd     on  th.crs_id_destination= crsd.crs_id
INNER JOIN user_login usr     on  th.trasl_analyzed_by= usr.usr_id
WHERE th.trasl_id =$trasl_id ; ";
            // echo '' . $query;
            $result = parent::execute($query);
            if (pg_fetch_row($result)) {
                $numrows = pg_numrows($result);
                // Loop through rows in the result set
                for ($i = 0; $i < $numrows; $i++) {
                    $row = pg_fetch_array($result, $i);

                    $info[] = array('success' => TRUE,
                        'message' => 'Lista  encontrada',
                        'trasl_id' => $row[0],
                        'trasl_date_request' => $row[1],
                        'status' => $row[2],
                        'trasl_descripcion' => $row[3],
                        'prison_per_identification' => $row[4],
                        'prison_per_name' => $row[5],
                        'prison_per_lastname' => $row[6],
                        'sex' => $row[7],
                        'prontuario' => $row[8],
                        'status_sgp' => $row[9],
                        'trasl_type_descripcion' => $row[10],
                        'crs_origen' => $row[11],
                        'crs_destino' => $row[12],
                        'name_analyst' => $row[13],
                        'lastname_analyst' => $row[14],
                        'total' => $row[15]
                    );
                }
                return $info;
            } else {
                $info[] = array(
                    'success' => FALSE,
                    'message' => 'No hay datos que mostrar'
                );
                return $info;
            }
        } catch (Exception $exc) {
            /* echo $exc->getTraceAsString(); */
            return array('success' => FALSE, 'message' => 'error al consultar report1' . $exc->getMessage());
        } finally {
            parent::closeConnection();
        }
    }

    public function report3d($criterion) {
        for ($index = 0; $index < count($criterion); $index++) {
            $where .= " %" . $criterion[i] . "%";
        }


        //echo ''.$trasl_id;
        try {
            $query = "SELECT th.trasl_id,th.trasl_date_request,
case
when th.trasl_state_process ='start'  then 'Inicio'
when th.trasl_state_process ='sent'  then 'Enviado'
when th.trasl_state_process ='approved'  then 'Aprobado'
when th.trasl_state_process ='revision'  then 'Revision'
when th.trasl_state_process ='executed'  then 'Finalizado'
when th.trasl_state_process ='authorized'  then 'Autorizado'
else 'Sin Estado'
end AS status, th.trasl_descripcion,ppl.prison_per_identification,ppl.prison_per_name
,	ppl.prison_per_lastname,ppl.sex,	ppl.prontuario,	ppl.status_sgp,	typ.trasl_type_descripcion
,crss.crs_description as crs_andigen, crsd.crs_description as crs_destino,usr.usr_name as name_analyst
,usr.usr_lasname as lastname_analyst, (SELECT  COUNT(*) from traslation_head th
INNER JOIN traslation_details td on th.trasl_id=td.trasl_id
INNER JOIN prison_person ppl    on  td.prison_per_id=ppl.id_sgp
INNER JOIN traslation_type typ  on  th.trasl_type_id= typ.trasl_type_id
INNER JOIN center_crs crss     on  th.crs_id_source= crss.crs_id
INNER JOIN center_crs crsd     on  th.crs_id_destination= crsd.crs_id
LEFT JOIN user_login usr     on  th.trasl_analyzed_by= usr.usr_id WHERE ( th.trasl_state_process like '%$status%' and	th.trasl_descripcion like '%$trasl_descripcion%' and 	
ppl.prison_per_identification like '%$prison_per_identification%'	and ppl.prison_per_name like '%$prison_per_name%'	 
and ppl.prison_per_lastname like '%$prison_per_lastname%' and	ppl.sex like '%$sex%' 
and	prontuario like '%$prontuario%' and	ppl.status_sgp like '%$status_sgp%' 
and 	typ.trasl_type_descripcion like '%$trasl_type_descripcion%'	and crss.crs_description like '%$crs_origen%' 
and	crsd.crs_description like '%$crs_destino%' and usr.usr_name like '%$name_analyst%' and usr.usr_lasname like '%$lastname_analyst%') ) as total
 from traslation_head th
INNER JOIN traslation_details td on th.trasl_id=td.trasl_id
INNER JOIN prison_person ppl    on  td.prison_per_id=ppl.id_sgp
INNER JOIN traslation_type typ  on  th.trasl_type_id= typ.trasl_type_id
INNER JOIN center_crs crss     on  th.crs_id_source= crss.crs_id
INNER JOIN center_crs crsd     on  th.crs_id_destination= crsd.crs_id
LEFT JOIN user_login usr     on  th.trasl_analyzed_by= usr.usr_id
WHERE
	( th.trasl_state_process like '%$status%' and	th.trasl_descripcion like '%$trasl_descripcion%' and 	
ppl.prison_per_identification like '%$prison_per_identification%'	and ppl.prison_per_name like '%$prison_per_name%'	 
and ppl.prison_per_lastname like '%$prison_per_lastname%' and	ppl.sex like '%$sex%' 
and	prontuario like '%$prontuario%' and	ppl.status_sgp like '%$status_sgp%' 
and 	typ.trasl_type_descripcion like '%$trasl_type_descripcion%'	and crss.crs_description like '%$crs_origen%' 
and	crsd.crs_description like '%$crs_destino%' and usr.usr_name like '%$name_analyst%' and usr.usr_lasname like '%$lastname_analyst%')
 ";
            //echo '' . $query;
            $result = parent::execute($query);
            if (pg_fetch_row($result)) {
                $numrows = pg_numrows($result);
                // Loop through rows in the result set
                for ($i = 0; $i < $numrows; $i++) {
                    $row = pg_fetch_array($result, $i);

                    $info[] = array('success' => TRUE,
                        'message' => 'Lista  encontrada',
                        'trasl_id' => $row[0],
                        'trasl_date_request' => $row[1],
                        'status' => $row[2],
                        'trasl_descripcion' => $row[3],
                        'prison_per_identification' => $row[4],
                        'prison_per_name' => $row[5],
                        'prison_per_lastname' => $row[6],
                        'sex' => $row[7],
                        'prontuario' => $row[8],
                        'status_sgp' => $row[9],
                        'trasl_type_descripcion' => $row[10],
                        'crs_origen' => $row[11],
                        'crs_destino' => $row[12],
                        'name_analyst' => $row[13],
                        'lastname_analyst' => $row[14],
                        'total' => $row[15]
                    );
                }
                return $info;
            } else {
                $info[] = array(
                    'success' => FALSE,
                    'message' => 'No hay datos que mostrar'
                );
                return $info;
            }
        } catch (Exception $exc) {
            /* echo $exc->getTraceAsString(); */
            return array('success' => FALSE, 'message' => 'error al consultar report1' . $exc->getMessage());
        } finally {
            parent::closeConnection();
        }
    }

    public function report3e($trasl_id, $date_from, $date_to, $status, $trasl_descripcion, $prison_per_identification, $prison_per_name, $prison_per_lastname, $sex, $prontuario, $status_sgp, $trasl_type_descripcion, $crs_origen, $crs_destino, $name_analyst, $lastname_analyst) {
        //echo ''.$trasl_id;
        try {
            $query = "SELECT th.trasl_id,th.trasl_date_request,
case
when th.trasl_state_process ='start'  then 'Inicio'
when th.trasl_state_process ='sent'  then 'Enviado'
when th.trasl_state_process ='approved'  then 'Aprobado'
when th.trasl_state_process ='revision'  then 'Revision'
when th.trasl_state_process ='executed'  then 'Finalizado'
when th.trasl_state_process ='authorized'  then 'Autorizado'
else 'Sin Estado'
end AS status, th.trasl_descripcion,ppl.prison_per_identification,ppl.prison_per_name
,	ppl.prison_per_lastname,ppl.sex,	ppl.prontuario,	ppl.status_sgp,	typ.trasl_type_descripcion
,crss.crs_description as crs_andigen, crsd.crs_description as crs_destino,usr.usr_name as name_analyst
,usr.usr_lasname as lastname_analyst, (SELECT  COUNT(*) from traslation_head th
INNER JOIN traslation_details td on th.trasl_id=td.trasl_id
INNER JOIN prison_person ppl    on  td.prison_per_id=ppl.id_sgp
INNER JOIN traslation_type typ  on  th.trasl_type_id= typ.trasl_type_id
INNER JOIN center_crs crss     on  th.crs_id_source= crss.crs_id
INNER JOIN center_crs crsd     on  th.crs_id_destination= crsd.crs_id
INNER JOIN user_login usr     on  th.trasl_analyzed_by= usr.usr_id WHERE (th.trasl_date_request BETWEEN '$date_from' and '$date_to')) as total
 from traslation_head th
INNER JOIN traslation_details td on th.trasl_id=td.trasl_id
INNER JOIN prison_person ppl    on  td.prison_per_id=ppl.id_sgp
INNER JOIN traslation_type typ  on  th.trasl_type_id= typ.trasl_type_id
INNER JOIN center_crs crss     on  th.crs_id_source= crss.crs_id
INNER JOIN center_crs crsd     on  th.crs_id_destination= crsd.crs_id
INNER JOIN user_login usr     on  th.trasl_analyzed_by= usr.usr_id
WHERE
(th.trasl_date_request BETWEEN '$date_from' and '$date_to'); ";
            // echo '' . $query;
            $result = parent::execute($query);
            if (pg_fetch_row($result)) {
                $numrows = pg_numrows($result);
                // Loop through rows in the result set
                for ($i = 0; $i < $numrows; $i++) {
                    $row = pg_fetch_array($result, $i);

                    $info[] = array('success' => TRUE,
                        'message' => 'Lista  encontrada',
                        'trasl_id' => $row[0],
                        'trasl_date_request' => $row[1],
                        'status' => $row[2],
                        'trasl_descripcion' => $row[3],
                        'prison_per_identification' => $row[4],
                        'prison_per_name' => $row[5],
                        'prison_per_lastname' => $row[6],
                        'sex' => $row[7],
                        'prontuario' => $row[8],
                        'status_sgp' => $row[9],
                        'trasl_type_descripcion' => $row[10],
                        'crs_origen' => $row[11],
                        'crs_destino' => $row[12],
                        'name_analyst' => $row[13],
                        'lastname_analyst' => $row[14],
                        'total' => $row[15]
                    );
                }
                return $info;
            } else {
                $info[] = array(
                    'success' => FALSE,
                    'message' => 'No hay datos que mostrar'
                );
                return $info;
            }
        } catch (Exception $exc) {
            /* echo $exc->getTraceAsString(); */
            return array('success' => FALSE, 'message' => 'error al consultar report1' . $exc->getMessage());
        } finally {
            parent::closeConnection();
        }
    }

    public function report3f($trasl_id, $date_from, $date_to, $status, $trasl_descripcion, $prison_per_identification, $prison_per_name, $prison_per_lastname, $sex, $prontuario, $status_sgp, $trasl_type_descripcion, $crs_origen, $crs_destino, $name_analyst, $lastname_analyst) {
        //echo ''.$trasl_id;
        try {
            $query = "SELECT th.trasl_id,th.trasl_date_request,
case
when th.trasl_state_process ='start'  then 'Inicio'
when th.trasl_state_process ='sent'  then 'Enviado'
when th.trasl_state_process ='approved'  then 'Aprobado'
when th.trasl_state_process ='revision'  then 'Revision'
when th.trasl_state_process ='executed'  then 'Finalizado'
when th.trasl_state_process ='authorized'  then 'Autorizado'
else 'Sin Estado'
end AS status, th.trasl_descripcion,ppl.prison_per_identification,ppl.prison_per_name
,	ppl.prison_per_lastname,ppl.sex,	ppl.prontuario,	ppl.status_sgp,	typ.trasl_type_descripcion
,crss.crs_description as crs_andigen, crsd.crs_description as crs_destino,usr.usr_name as name_analyst
,usr.usr_lasname as lastname_analyst, (SELECT  COUNT(*) from traslation_head th
INNER JOIN traslation_details td on th.trasl_id=td.trasl_id
INNER JOIN prison_person ppl    on  td.prison_per_id=ppl.id_sgp
INNER JOIN traslation_type typ  on  th.trasl_type_id= typ.trasl_type_id
INNER JOIN center_crs crss     on  th.crs_id_source= crss.crs_id
INNER JOIN center_crs crsd     on  th.crs_id_destination= crsd.crs_id
INNER JOIN user_login usr     on  th.trasl_analyzed_by= usr.usr_id WHERE th.trasl_id=$trasl_id and	( th.trasl_state_process like '%$status%' and	th.trasl_descripcion like '%$trasl_descripcion%' and 	
    ppl.prison_per_identification like '%$prison_per_identification%'	and ppl.prison_per_name like '%$prison_per_name%'	 
and ppl.prison_per_lastname like '%$prison_per_lastname%' and	ppl.sex like '%$sex%' and	prontuario like '%$prontuario%' and	ppl.status_sgp like '%$status_sgp%' 
and 	typ.trasl_type_descripcion like '%$trasl_type_descripcion%'	and crss.crs_description like '%$crs_origen%' and	crsd.crs_description like '%$crs_destino%' and usr.usr_name like '%$name_analyst%' and usr.usr_lasname like '%$lastname_analyst%')
  ) as total
 from traslation_head th
INNER JOIN traslation_details td on th.trasl_id=td.trasl_id
INNER JOIN prison_person ppl    on  td.prison_per_id=ppl.id_sgp
INNER JOIN traslation_type typ  on  th.trasl_type_id= typ.trasl_type_id
INNER JOIN center_crs crss     on  th.crs_id_source= crss.crs_id
INNER JOIN center_crs crsd     on  th.crs_id_destination= crsd.crs_id
INNER JOIN user_login usr     on  th.trasl_analyzed_by= usr.usr_id
WHERE
(th.trasl_id =$trasl_id)	
and	( th.trasl_state_process like '%$status%' and	th.trasl_descripcion like '%$trasl_descripcion%' and 	
    ppl.prison_per_identification like '%$prison_per_identification%'	and ppl.prison_per_name like '%$prison_per_name%'	 
and ppl.prison_per_lastname like '%$prison_per_lastname%' and	ppl.sex like '%$sex%' and	prontuario like '%$prontuario%' and	ppl.status_sgp like '%$status_sgp%' 
and 	typ.trasl_type_descripcion like '%$trasl_type_descripcion%'	and crss.crs_description like '%$crs_origen%' and	crsd.crs_description like '%$crs_destino%' and usr.usr_name like '%$name_analyst%' and usr.usr_lasname like '%$lastname_analyst%')
 ; ";
            // echo '' . $query;
            $result = parent::execute($query);
            if (pg_fetch_row($result)) {
                $numrows = pg_numrows($result);
                // Loop through rows in the result set
                for ($i = 0; $i < $numrows; $i++) {
                    $row = pg_fetch_array($result, $i);

                    $info[] = array('success' => TRUE,
                        'message' => 'Lista  encontrada',
                        'trasl_id' => $row[0],
                        'trasl_date_request' => $row[1],
                        'status' => $row[2],
                        'trasl_descripcion' => $row[3],
                        'prison_per_identification' => $row[4],
                        'prison_per_name' => $row[5],
                        'prison_per_lastname' => $row[6],
                        'sex' => $row[7],
                        'prontuario' => $row[8],
                        'status_sgp' => $row[9],
                        'trasl_type_descripcion' => $row[10],
                        'crs_origen' => $row[11],
                        'crs_destino' => $row[12],
                        'name_analyst' => $row[13],
                        'lastname_analyst' => $row[14],
                        'total' => $row[15]
                    );
                }
                return $info;
            } else {
                $info[] = array(
                    'success' => FALSE,
                    'message' => 'No hay datos que mostrar'
                );
                return $info;
            }
        } catch (Exception $exc) {
            /* echo $exc->getTraceAsString(); */
            return array('success' => FALSE, 'message' => 'error al consultar report1' . $exc->getMessage());
        } finally {
            parent::closeConnection();
        }
    }

    public function report3g($trasl_id, $date_from, $date_to, $status, $trasl_descripcion, $prison_per_identification, $prison_per_name, $prison_per_lastname, $sex, $prontuario, $status_sgp, $trasl_type_descripcion, $crs_origen, $crs_destino, $name_analyst, $lastname_analyst) {

        try {
            $query = "SELECT th.trasl_id,th.trasl_date_request,
case
when th.trasl_state_process ='start'  then 'Inicio'
when th.trasl_state_process ='sent'  then 'Enviado'
when th.trasl_state_process ='approved'  then 'Aprobado'
when th.trasl_state_process ='revision'  then 'Revision'
when th.trasl_state_process ='executed'  then 'Finalizado'
when th.trasl_state_process ='authorized'  then 'Autorizado'
else 'Sin Estado'
end AS status, th.trasl_descripcion,ppl.prison_per_identification,ppl.prison_per_name,	
ppl.prison_per_lastname,ppl.sex,	ppl.prontuario,	ppl.status_sgp,	typ.trasl_type_descripcion
,crss.crs_description as crs_andigen, crsd.crs_description as crs_destino,usr.usr_name as name_analyst
,usr.usr_lasname as lastname_analyst, (SELECT  COUNT(*) from traslation_head th
INNER JOIN traslation_details td on th.trasl_id=td.trasl_id
INNER JOIN prison_person ppl    on  td.prison_per_id=ppl.id_sgp
INNER JOIN traslation_type typ  on  th.trasl_type_id= typ.trasl_type_id
INNER JOIN center_crs crss     on  th.crs_id_source= crss.crs_id
INNER JOIN center_crs crsd     on  th.crs_id_destination= crsd.crs_id
INNER JOIN user_login usr     on  th.trasl_analyzed_by= usr.usr_id WHERE ( th.trasl_state_process like '%$status%' and	th.trasl_descripcion like '%$trasl_descripcion%' and 	
            ppl.prison_per_identification like '%$prison_per_identification%'	and ppl.prison_per_name like '%$prison_per_name%'	 
and ppl.prison_per_lastname like '%$prison_per_lastname%' and	ppl.sex like '%$sex%' and	prontuario like '%$prontuario%' and	
    ppl.status_sgp like '%$status_sgp%' 
and 	typ.trasl_type_descripcion like '%$trasl_type_descripcion%'	and crss.crs_description like '%$crs_origen%' 
    and	crsd.crs_description like '%$crs_destino%' and usr.usr_name like '%$name_analyst%' and usr.usr_lasname like '%$lastname_analyst%')
and (th.trasl_date_request BETWEEN '$date_from' and '$date_to')) as total
 from traslation_head th
INNER JOIN traslation_details td on th.trasl_id=td.trasl_id
INNER JOIN prison_person ppl    on  td.prison_per_id=ppl.id_sgp
INNER JOIN traslation_type typ  on  th.trasl_type_id= typ.trasl_type_id
INNER JOIN center_crs crss     on  th.crs_id_source= crss.crs_id
INNER JOIN center_crs crsd     on  th.crs_id_destination= crsd.crs_id
INNER JOIN user_login usr     on  th.trasl_analyzed_by= usr.usr_id
WHERE
	( th.trasl_state_process like '%$status%' and	th.trasl_descripcion like '%$trasl_descripcion%' and 	
            ppl.prison_per_identification like '%$prison_per_identification%'	and ppl.prison_per_name like '%$prison_per_name%'	 
and ppl.prison_per_lastname like '%$prison_per_lastname%' and	ppl.sex like '%$sex%' and	prontuario like '%$prontuario%' and	
    ppl.status_sgp like '%$status_sgp%' 
and 	typ.trasl_type_descripcion like '%$trasl_type_descripcion%'	and crss.crs_description like '%$crs_origen%' 
    and	crsd.crs_description like '%$crs_destino%' and usr.usr_name like '%$name_analyst%' and usr.usr_lasname like '%$lastname_analyst%')
and (th.trasl_date_request BETWEEN '$date_from' and '$date_to'); ";
            // echo '' . $query;
            $result = parent::execute($query);
            if (pg_fetch_row($result)) {
                $numrows = pg_numrows($result);
                // Loop through rows in the result set
                for ($i = 0; $i < $numrows; $i++) {
                    $row = pg_fetch_array($result, $i);

                    $info[] = array('success' => TRUE,
                        'message' => 'Lista  encontrada',
                        'trasl_id' => $row[0],
                        'trasl_date_request' => $row[1],
                        'status' => $row[2],
                        'trasl_descripcion' => $row[3],
                        'prison_per_identification' => $row[4],
                        'prison_per_name' => $row[5],
                        'prison_per_lastname' => $row[6],
                        'sex' => $row[7],
                        'prontuario' => $row[8],
                        'status_sgp' => $row[9],
                        'trasl_type_descripcion' => $row[10],
                        'crs_origen' => $row[11],
                        'crs_destino' => $row[12],
                        'name_analyst' => $row[13],
                        'lastname_analyst' => $row[14],
                        'total' => $row[15]
                    );
                }
                return $info;
            } else {
                $info[] = array(
                    'success' => FALSE,
                    'message' => 'No hay datos que mostrar'
                );
                return $info;
            }
        } catch (Exception $exc) {
            /* echo $exc->getTraceAsString(); */
            return array('success' => FALSE, 'message' => 'error al consultar report1' . $exc->getMessage());
        } finally {
            parent::closeConnection();
        }
    }

    public function loadTraslationDetailsListCrs($crs_id) {
        try {
            $query = "SELECT th.trasl_id,th.trasl_date_request,case
when th.trasl_state_process ='start'  then 'Inicio'
when th.trasl_state_process ='approved'  then 'Aprobado'
when th.trasl_state_process ='revision'  then 'Revision'
when th.trasl_state_process ='executed'  then 'Finalizado'
else 'Sin Estado'
end AS status, th.trasl_descripcion,ppl.prison_per_identification,ppl.prison_per_name,	ppl.prison_per_lastname,ppl.sex
,	ppl.prontuario,	ppl.status_sgp,	typ.trasl_type_descripcion,crss.crs_description as crs_andigen
, crsd.crs_description as crs_destino,usr.usr_name as name_analyst
,usr.usr_lasname as lastname_analyst,(SELECT  COUNT(*) from traslation_head th
INNER JOIN traslation_details td on th.trasl_id=td.trasl_id
INNER JOIN prison_person ppl    on  td.prison_per_id=ppl.id_sgp
INNER JOIN traslation_type typ  on  th.trasl_type_id= typ.trasl_type_id
INNER JOIN center_crs crss     on  th.crs_id_source= crss.crs_id
INNER JOIN center_crs crsd     on  th.crs_id_destination= crsd.crs_id
INNER JOIN user_login usr     on  th.trasl_analyzed_by= usr.usr_id WHERE th.crs_id_source=$crs_id ) as total
 from traslation_head th
INNER JOIN traslation_details td on th.trasl_id=td.trasl_id
INNER JOIN prison_person ppl    on  td.prison_per_id=ppl.id_sgp
INNER JOIN traslation_type typ  on  th.trasl_type_id= typ.trasl_type_id
INNER JOIN center_crs crss     on  th.crs_id_source= crss.crs_id
INNER JOIN center_crs crsd     on  th.crs_id_destination= crsd.crs_id
INNER JOIN user_login usr     on  th.trasl_analyzed_by= usr.usr_id
WHERE th.crs_id_source=$crs_id GROUP BY th.trasl_id,th.trasl_date_request,th.trasl_state_process, th.trasl_descripcion,ppl.prison_per_identification,ppl.prison_per_name,	ppl.prison_per_lastname,ppl.sex,	ppl.prontuario,	ppl.status_sgp,	typ.trasl_type_descripcion,crss.crs_description , crsd.crs_description ,usr.usr_name 
,usr.usr_lasname ; ";
            //echo '' . $query;
            $result = parent::execute($query);
            if (pg_fetch_row($result)) {
                $numrows = pg_numrows($result);
                // Loop through rows in the result set
                for ($i = 0; $i < $numrows; $i++) {
                    $row = pg_fetch_array($result, $i);

                    $info[] = array('success' => TRUE,
                        'message' => 'Lista  encontrada',
                        'trasl_id' => $row[0],
                        'trasl_date_request' => $row[1],
                        'status' => $row[2],
                        'trasl_descripcion' => $row[3],
                        'prison_per_identification' => $row[4],
                        'prison_per_name' => $row[5],
                        'prison_per_lastname' => $row[6],
                        'sex' => $row[7],
                        'prontuario' => $row[8],
                        'status_sgp' => $row[9],
                        'trasl_type_descripcion' => $row[10],
                        'crs_origen' => $row[11],
                        'crs_destino' => $row[12],
                        'name_analyst' => $row[13],
                        'lastname_analyst' => $row[14],
                        'total' => $row[15]
                    );
                }
                return $info;
            } else {
                $info[] = array(
                    'success' => FALSE,
                    'message' => 'No hay datos que mostrar'
                );
                return $info;
            }
        } catch (Exception $exc) {
            /* echo $exc->getTraceAsString(); */
            return array('success' => FALSE, 'message' => 'error al consultar report1' . $exc->getMessage());
        } finally {
            parent::closeConnection();
        }
    }

    public function loadTraslationDetailsList() {
        try {
            $query = "SELECT th.trasl_id,th.trasl_date_request,case
when th.trasl_state_process ='START'  then 'INICIO'
when th.trasl_state_process ='SENT'  then 'ENVIADO'
when th.trasl_state_process ='APPROVED'  then 'APROBADO'
when th.trasl_state_process ='REVISION'  then 'REVISION'
when th.trasl_state_process ='AUTHORIZED'  then 'AUTORIZADO'
when th.trasl_state_process ='EXECUTED'  then 'FINALIZADO'
else 'SIN ESTADO'
end AS status, th.trasl_descripcion,ppl.prison_per_identification,ppl.prison_per_name
,	ppl.prison_per_lastname,ppl.sex,	ppl.prontuario,	ppl.status_sgp,	typ.trasl_type_descripcion
,crss.crs_description as crs_andigen, crsd.crs_description as crs_destino,usr.usr_name as name_analyst
,usr.usr_lasname as lastname_analyst,(SELECT  COUNT(*) from traslation_head th
LEFT JOIN traslation_details td on th.trasl_id=td.trasl_id
LEFT JOIN prison_person ppl    on  td.prison_per_id=ppl.id_sgp
LEFT JOIN traslation_type typ  on  th.trasl_type_id= typ.trasl_type_id
LEFT JOIN center_crs crss     on  th.crs_id_source= crss.crs_id
LEFT JOIN center_crs crsd     on  th.crs_id_destination= crsd.crs_id
LEFT JOIN user_login usr     on  th.trasl_analyzed_by= usr.usr_id) as total
 from traslation_head th
LEFT JOIN traslation_details td on th.trasl_id=td.trasl_id
LEFT JOIN prison_person ppl    on  td.prison_per_id=ppl.id_sgp
LEFT JOIN traslation_type typ  on  th.trasl_type_id= typ.trasl_type_id
LEFT JOIN center_crs crss     on  th.crs_id_source= crss.crs_id
LEFT JOIN center_crs crsd     on  th.crs_id_destination= crsd.crs_id
LEFT JOIN user_login usr     on  th.trasl_analyzed_by= usr.usr_id
 ; ";
            //echo '' . $query;
            $result = parent::execute($query);
            if (pg_fetch_row($result)) {
                $numrows = pg_numrows($result);
                // Loop through rows in the result set
                for ($i = 0; $i < $numrows; $i++) {
                    $row = pg_fetch_array($result, $i);

                    $info[] = array('success' => TRUE,
                        'message' => 'Lista  encontrada',
                        'trasl_id' => $row[0],
                        'trasl_date_request' => $row[1],
                        'status' => $row[2],
                        'trasl_descripcion' => $row[3],
                        'prison_per_identification' => $row[4],
                        'prison_per_name' => $row[5],
                        'prison_per_lastname' => $row[6],
                        'sex' => $row[7],
                        'prontuario' => $row[8],
                        'status_sgp' => $row[9],
                        'trasl_type_descripcion' => $row[10],
                        'crs_origen' => $row[11],
                        'crs_destino' => $row[12],
                        'name_analyst' => $row[13],
                        'lastname_analyst' => $row[14],
                        'total' => $row[15]
                    );
                }
                return $info;
            } else {
                $info[] = array(
                    'success' => FALSE,
                    'message' => 'No hay datos que mostrar'
                );
                return $info;
            }
        } catch (Exception $exc) {
            /* echo $exc->getTraceAsString(); */
            return array('success' => FALSE, 'message' => 'error al consultar report1' . $exc->getMessage());
        } finally {
            parent::closeConnection();
        }
    }
    
     public function report3MultiSearching($query) {
         
        //echo ''.$trasl_id;
        try {
            //echo '' . $query;
            $result = parent::execute($query);
            if (pg_fetch_row($result)) {
                $numrows = pg_numrows($result);
                // Loop through rows in the result set
                for ($i = 0; $i < $numrows; $i++) {
                    $row = pg_fetch_array($result, $i);

                    $info[] = array('success' => TRUE,
                        'message' => 'Lista  encontrada',
                        'trasl_id' => $row[0],
                        'trasl_date_request' => $row[1],
                        'status' => $row[2],
                        'trasl_descripcion' => $row[3],
                        'prison_per_identification' => $row[4],
                        'prison_per_name' => $row[5],
                        'prison_per_lastname' => $row[6],
                        'sex' => $row[7],
                        'prontuario' => $row[8],
                        'status_sgp' => $row[9],
                        'trasl_type_descripcion' => $row[10],
                        'crs_origen' => $row[11],
                        'crs_destino' => $row[12],
                        'name_analyst' => $row[13],
                        'lastname_analyst' => $row[14],
                        'total' => $row[15]
                    );
                }
                return $info;
            } else {
                $info[] = array(
                    'success' => FALSE,
                    'message' => 'No hay datos que mostrar'
                );
                return $info;
            }
        } catch (Exception $exc) {
            /* echo $exc->getTraceAsString(); */
            return array('success' => FALSE, 'message' => 'error al consultar report1' . $exc->getMessage());
        } finally {
            parent::closeConnection();
        }
    }
    

//put your code here
}
