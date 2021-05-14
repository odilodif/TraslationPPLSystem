<?php

include_once './../Model/connection.php';
include_once './../Model/ICrud.php';
include_once './../Model/ISurfMove.php';
include_once './../Model/CurrentRecord.php';

class Traslation extends Connection implements ICrud {

    private $trasl_id;
    private $usr_id;
    private $trasl_type_id;
    private $crs_id_source;
    private $crs_id_destination;
    private $trasl_date_request;
    private $trasl_descripcion;
    private $trasl_state_process;
    private $trasl_state = 't';
    private $trasl_send_revisions;
    private $trasl_send_confirm;
    private $trasl_path;
    private $trasl_observations;
    private $trasl_direction_assigned;
    private $strategy;
    private $query;
    private $trasl_approved_by;
    private $trasl_director_assigned;

    /* Getters and Setters */

    function getTrasl_director_assigned() {
        return $this->trasl_director_assigned;
    }

    function setTrasl_director_assigned($trasl_director_assigned) {
        $this->trasl_director_assigned = $trasl_director_assigned;
    }

    function getTrasl_approved_by() {
        return $this->trasl_approved_by;
    }

    function setTrasl_approved_by($trasl_approved_by) {
        $this->trasl_approved_by = $trasl_approved_by;
    }

    function getTrasl_direction_assigned() {
        return $this->trasl_direction_assigned;
    }

    function setTrasl_direction_assigned($trasl_direction_assigned) {
        $this->trasl_direction_assigned = $trasl_direction_assigned;
    }

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

    function getTrasl_observations() {
        return $this->trasl_observations;
    }

    function setTrasl_observations($trasl_observations) {
        $this->trasl_observations = $trasl_observations;
    }

    function getTrasl_path() {
        return $this->trasl_path;
    }

    function setTrasl_path($trasl_path) {
        $this->trasl_path = $trasl_path;
    }

    function getTrasl_id() {
        return $this->trasl_id;
    }

    function getUsr_id() {
        return $this->usr_id;
    }

    function getTrasl_type_id() {
        return $this->trasl_type_id;
    }

    function setTrasl_id($trasl_id) {
        $this->trasl_id = $trasl_id;
    }

    function setUsr_id($usr_id) {
        $this->usr_id = $usr_id;
    }

    function setTrasl_type_id($trasl_type_id) {
        $this->trasl_type_id = $trasl_type_id;
    }

    function getCrs_id_source() {
        return $this->crs_id_source;
    }

    function getCrs_id_destination() {
        return $this->crs_id_destination;
    }

    function getTrasl_date_request() {
        return $this->trasl_date_request;
    }

    function getTrasl_descripcion() {
        return $this->trasl_descripcion;
    }

    function getTrasl_state_process() {
        return $this->trasl_state_process;
    }

    function getTrasl_state() {
        return $this->trasl_state;
    }

    function getTrasl_send_revisions() {
        return $this->trasl_send_revisions;
    }

    function getTrasl_send_confirm() {
        return $this->trasl_send_confirm;
    }

    function setCrs_id_source($crs_id_source) {
        $this->crs_id_source = $crs_id_source;
    }

    function setCrs_id_destination($crs_id_destination) {
        $this->crs_id_destination = $crs_id_destination;
    }

    function setTrasl_date_request($trasl_date_request) {
        $this->trasl_date_request = $trasl_date_request;
    }

    function setTrasl_descripcion($trasl_descripcion) {
        $this->trasl_descripcion = $trasl_descripcion;
    }

    function setTrasl_state_process($trasl_state_process) {
        $this->trasl_state_process = $trasl_state_process;
    }

    function setTrasl_state($trasl_state) {
        $this->trasl_state = $trasl_state;
    }

    function setTrasl_send_revisions($trasl_send_revisions) {
        $this->trasl_send_revisions = $trasl_send_revisions;
    }

    function setTrasl_send_confirm($trasl_send_confirm) {
        $this->trasl_send_confirm = $trasl_send_confirm;
    }

    /* Execute Head and Detall Traslations/*
     * 
     */

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

    /* The Constructor */

    public function __construct() {
        parent::__construct();
    }

    public function create($query) {
        try {
            $query_local = "INSERT INTO traslation_head (usr_id,crs_id_source,trasl_date_request,trasl_state_process,trasl_state)    " . $query;
            //echo "string".$query_local;
            $rs = parent::execute_sgp($query_local);
            if ($rs) {
                return $info = array('success' => TRUE, 'message' => 'Encabezado de Traslado Creado');
            } else {

                return $info = array('success' => FALSE, 'message' => 'No se pudo crear Traslado');
                
            }
        } catch (Exception $exc) {
            //echo 'error exception al crear Traslados' . $exc->getMessage();
        } finally {
            parent::closeConnection();
        }
    }

    public function delete($query) {
        
    }

    public function deleteById($id) {
        
    }

    public function listAll() {


        try {
            $query = "Select lpad( t.trasl_id::text, 4, '0') , t.trasl_date_request,tp.trasl_type_descripcion,crs.crs_description
, case
when t.trasl_state_process ='start'  then 'Inicio'
when t.trasl_state_process ='approved'  then 'Aprobado'
when t.trasl_state_process ='revision'  then 'Revision'
when t.trasl_state_process ='executed'  then 'Finalizado'
else 'Sin Estado'
end
from traslation_head  t
LEFT  JOIN traslation_type tp on tp.trasl_type_id=t.trasl_type_id
LEFT  JOIN center_crs crs  		on crs.crs_id=t.crs_id_destination
WHERE  t.trasl_state='t'  ORDER BY t.trasl_id  asc ;";
            $this->rs = parent::execute($query);
            if ($this->rs) {


                while ($row = pg_fetch_row($this->rs)) {
                    $info[] = array('success' => TRUE,
                        'message' => 'Lista  encontrada',
                        'trasl_id' => $row[0],
                        'trasl_date_request' => $row[1],
                        'trasl_type_descripcion' => $row[2],
                        'crs_description' => $row[3],
                        'status_proces' => $row[4]
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

    public function lastRecording() {
        try {
            $query = "SELECT  lpad(max(trasl_id) ::text, 5, '00')   FROM traslation_head;";
            $this->rs = parent::execute_sgp($query);
            if ($this->rs) {
                while ($row = pg_fetch_row($this->rs)) {
                    $info = array('success' => TRUE,
                        'message' => 'Ultimo Registro',
                        'trasl_id' => $row[0]
                    );
                }
                return $info;
            } else {
                return null;
            }
        } catch (Exception $exc) {
            /* echo $exc->getTraceAsString(); */
            return array('success' => FALSE, 'message' => 'error al consultar lista' . $exc->getMessage());
        } finally {
            parent::closeConnection();
        }
    }

    public function sendUpdateTraslation() {
        if ($this->crs_id_destination != 0) {
            $query = "UPDATE traslation_head SET  trasl_type_id=$this->trasl_type_id,crs_id_destination=$this->crs_id_destination,trasl_descripcion='$this->trasl_descripcion',trasl_date_request='$this->trasl_date_request',trasl_state_process='SENT',trasl_path='$this->trasl_path'  
                            WHERE   trasl_id=$this->trasl_id;";
        } else {
            $query = "UPDATE traslation_head SET  trasl_type_id=$this->trasl_type_id,trasl_descripcion='$this->trasl_descripcion',trasl_date_request='$this->trasl_date_request',trasl_state_process='SENT',trasl_path='$this->trasl_path'  
                            WHERE   trasl_id=$this->trasl_id;";
        }

        try {

            //echo "string".$query;
            $rs = parent::execute($query);
            if ($rs) {
                return $info = array('success' => TRUE, 'message' => 'Traslado Creado'); //User View
            } else {

                return $info = array('success' => FALSE, 'message' => 'Traslado no fue Creado'); //User View
                ;
            }
        } catch (Exception $exc) {
            //echo 'error exception al crear Traslados' . $exc->getMessage();
        } finally {
            parent::closeConnection();
        }
    }

    public function updateTraslByDestination() {
        $query = "UPDATE traslation_head SET  crs_id_destination=$this->crs_id_destination  WHERE   trasl_id=$this->trasl_id;";
        // echo ''.$query;
        try {
            //echo "string".$query;
            $rs = parent::execute($query);
            if ($rs) {
                return $info = array('success' => TRUE, 'message' => 'Traslado Actualizado'); //User View
            } else {

                return $info = array('success' => FALSE, 'message' => 'Traslado no fue Actualizado'); //User View
                ;
            }
        } catch (Exception $exc) {
            //echo 'error exception al crear Traslados' . $exc->getMessage();
        } finally {
            parent::closeConnection();
        }
    }

    public function readTraslationHeadAdnPrisonPerson($idTraslation) {
        try {
            $query = "	SELECT 
                        th.trasl_id,th.trasl_date_request,	th.trasl_descripcion,p.prison_per_id,	p.prison_per_name,	p.prison_per_lastname,	p.prison_per_identification
                        from traslation_head th
                        INNER JOIN prison_person p on  p.trasl_id=th.trasl_id 
                        WHERE th.trasl_id=$idTraslation and p.prison_per_state='t';";
            $this->rs = parent::execute($query);
            if ($this->rs) {

                while ($row = pg_fetch_row($this->rs)) {
                    $info[] = array('success' => TRUE,
                        'message' => 'Traslados y PPL encontrados ',
                        'trasl_id' => $row[0],
                        'trasl_date_request' => $row[1],
                        'trasl_descripcion' => $row[2],
                        'prison_per_id' => $row[3],
                        'prison_per_name' => $row[4],
                        'prison_per_lastname' => $row[5],
                        'prison_per_identification' => $row[6]
                    );
                }
                return $info;
            } else {
                return $info;
            }
        } catch (Exception $exc) {
            /* echo $exc->getTraceAsString(); */
            return array('success' => FALSE, 'message' => 'error al consultar Traslados y PPLs' . $exc->getMessage());
        } finally {
            parent::closeConnection();
        }
    }

    public function listAllByCrs($crs_id) {
        try {
            $query = "SELECT th.trasl_id,th.trasl_date_request,ty.trasl_type_descripcion,crs.crs_description
, case
when th.trasl_state_process ='start'  then 'Inicio'
when th.trasl_state_process ='sent'  then 'Enviado'
when th.trasl_state_process ='approved'  then 'Aprobado'
when th.trasl_state_process ='revision'  then 'Revision'
when th.trasl_state_process ='executed'  then 'Finalizado'
when th.trasl_state_process ='authorized'  then 'Autorizado'
else 'Sin Estado'
end as trasl_state_process
,th.crs_id_source
from traslation_head th
left  join  traslation_type ty on th.trasl_type_id=ty.trasl_type_id  
left  JOIN center_crs crs  		on th.crs_id_destination = crs.crs_id
where th.trasl_state='t' and th.crs_id_source=$crs_id ORDER BY trasl_id ASC;";
            $this->rs = parent::execute($query);
            if ($this->rs) {

                while ($row = pg_fetch_row($this->rs)) {
                    $info[] = array('success' => TRUE,
                        'message' => 'Lista  encontrada',
                        'trasl_id' => $row[0],
                        'trasl_date_request' => $row[1],
                        'trasl_type_descripcion' => $row[2],
                        'crs_description' => $row[3],
                        'status_proces' => $row[4],
                        'crs_id' => $row[5]
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

    public function traslationListAnalyst($type) {
        $info = NULL;
        try {
            $query = "SELECT th.trasl_id,	center_crs.crs_description as crs_source,crsd.crs_description as crs_destination,	trasl_date_request,typ.trasl_type_descripcion
, case
when th.trasl_state_process ='START'  then 'Inicio'
when th.trasl_state_process ='SENT'  then 'Enviado'
when th.trasl_state_process ='APPROVED'  then 'Aprobado'
when th.trasl_state_process ='REVISION'  then 'Revision'
when th.trasl_state_process ='EXECUTED'  then 'Finalizado'
when th.trasl_state_process ='AUTHORIZED'  then 'Autorizado'
else 'Sin Estado'
end as trasl_state_process
from traslation_head  th
INNER JOIN center_crs   on th.crs_id_source=center_crs.crs_id
LEFT JOIN center_crs crsd  on th.crs_id_destination=crsd.crs_id
INNER JOIN traslation_type typ  on th.trasl_type_id=typ.trasl_type_id
WHERE  typ.trasl_type_id =$type and th.trasl_state_process='SENT'
ORDER BY th.trasl_id ASC;";

            //echo ''.$query;
            $this->rs = parent::execute($query);
            if ($this->rs) {

                while ($row = pg_fetch_row($this->rs)) {
                    $info[] = array('success' => TRUE,
                        'message' => 'Lista Traslados de Analista encontrada',
                        'trasl_id' => $row[0],
                        'crs_source' => $row[1],
                        'crs_destination' => $row[2],
                        'trasl_date_request' => $row[3],
                        'trasl_type_descripcion' => $row[4],
                        'trasl_state_process' => $row[5]
                    );
                }
                return $info;
            } else {
                return $info;
            }
        } catch (Exception $exc) {
            return array('success' => FALSE, 'message' => 'error al consultar lista' . $exc->getMessage());
        } finally {
            parent::closeConnection();
        }
    }

    public function editTraslationAnalyst() {
        try {
            $query = "SELECT th.trasl_id,	center_crs.crs_description as crs_source,crsd.crs_description as crs_destination
		,	ty.trasl_type_descripcion,th.trasl_date_request,u.usr_name,u.usr_lasname,th.trasl_descripcion,th.trasl_path
		,pp.prison_per_id,pp.prison_per_identification,pp.prison_per_name,pp.prison_per_lastname,pp.prison_per_observations
		from traslation_head  th
		INNER JOIN center_crs   on th.crs_id_source=center_crs.crs_id
		INNER JOIN center_crs crsd  on th.crs_id_destination=crsd.crs_id
    INNER JOIN  traslation_type ty on th.trasl_type_id=ty.trasl_type_id
		INNER JOIN  user_login u    on  th.usr_id=u.usr_id
		INNER JOIN  traslation_details tdls    on  th.trasl_id=tdls.trasl_id
		INNER JOIN prison_person pp  on  tdls.prison_per_id=pp.id_sgp		
		WHERE   th.trasl_id=$this->trasl_id and th.trasl_state='t' and tdls.trasl_det_status='t';";
           // echo ''.$query;
            $this->rs = parent::execute($query);
            if ($this->rs) {
                /*
                 */
                while ($row = pg_fetch_row($this->rs)) {
                    $info[] = array('success' => TRUE,
                        'message' => 'Traslado de Analista encontrado',
                        'trasl_id' => $row[0],
                        'crs_source' => $row[1],
                        'crs_destination' => $row[2],
                        'trasl_type_descripcion' => $row[3],
                        'trasl_date_request' => $row[4],
                        'usr_name' => $row[5],
                        'usr_lasname' => $row[6],
                        'trasl_descripcion' => $row[7],
                        'trasl_path' => $row[8],
                        'prison_per_id' => $row[9],
                        'prison_per_identification' => $row[10],
                        'prison_per_name' => $row[11],
                        'prison_per_lastname' => $row[12],
                        'prison_per_observations' => $row[13]
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

    public function updateObservationsAnalyst() {
        $currentDateTime = date('Y-m-d');
        try {
            $query = " UPDATE traslation_head SET trasl_observations_analyst='$this->trasl_observations', trasl_state_process='REVISION', trasl_director_assigned = $this->trasl_director_assigned,trasl_analyzed_by=$this->usr_id,tras_date_analyst_send='$currentDateTime' WHERE trasl_id =$this->trasl_id ";
            //echo "string".$query;
            $rs = parent::execute($query);
            if ($rs) {
                return $info = array('success' => TRUE, 'message' => 'Observaciones de Traslado Actualizadas');
            } else {

                return $info = array('success' => FALSE, 'message' => 'No se pudo actualizar las Observaciones del Traslado');
                ;
            }
        } catch (Exception $exc) {
            //echo 'error exception al crear Traslados' . $exc->getMessage();
        } finally {
            parent::closeConnection();
        }
    }

    public function listTaslationPlantCtrl1() {

        try {
            $query = "SELECT th.trasl_id,th.trasl_date_request,concat(usr.usr_name,' ', usr.usr_lasname) as names_dircrs ,crss.crs_description as crs_source ,crsd.crs_description as crs_destination,typ.trasl_type_descripcion
,th.tras_date_analyst_send
,concat(usranlyst.usr_name,' ', usranlyst.usr_lasname) as names_analyst
,
case 
when th.trasl_state_process ='start'  then 'Inicio' 
when th.trasl_state_process ='approved'  then 'Aprobado' 
when th.trasl_state_process ='revision'  then 'Revision' 
when th.trasl_state_process ='executed'  then 'Finalizado'
when th.trasl_state_process ='authorized'  then 'Autorizado'
else 'Sin Estado'
end as status_proces
from traslation_head th 
INNER JOIN center_crs crss ON th.crs_id_source = crss.crs_id 
INNER JOIN center_crs crsd ON th.crs_id_destination = crsd.crs_id 
INNER JOIN traslation_type typ ON th.trasl_type_id = typ.trasl_type_id 
INNER JOIN user_login usr ON th.usr_id= usr.usr_id
INNER JOIN user_login usranlyst ON th.trasl_analyzed_by= usranlyst.usr_id
WHERE th.trasl_state_process in('revision') AND th.trasl_director_assigned=$this->trasl_director_assigned ;";
            // echo ''.$query;
            $this->rs = parent::execute($query);
            if ($this->rs) {

                while ($row = pg_fetch_row($this->rs)) {
                    $info[] = array('success' => TRUE,
                        'message' => 'Lista  encontrada Approbed',
                        'trasl_id' => $row[0],
                        'trasl_date_request' => $row[1],
                        'names_dircrs' => $row[2],
                        'crs_source' => $row[3],
                        'crs_destination' => $row[4],
                        'trasl_type_descripcion' => $row[5],
                        'tras_date_analyst_send' => $row[6],
                        'names_analyst' => $row[7],
                        'status_proces' => $row[8]
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

    public function toAuthorize($direction) {
        try {
            $query = "SELECT th.trasl_id,th.trasl_date_request,concat(usr.usr_name,' ', usr.usr_lasname) as names_dircrs ,crss.crs_description as crs_source ,crsd.crs_description as crs_destination,typ.trasl_type_descripcion
,th.tras_date_analyst_send
,concat(usranlyst.usr_name,' ', usranlyst.usr_lasname) as names_analyst
,
case 
when th.trasl_state_process ='START'  then 'Inicio' 
when th.trasl_state_process ='APPROVED'  then 'Aprobado' 
when th.trasl_state_process ='REVISION'  then 'Revision' 
when th.trasl_state_process ='EXECUTED'  then 'Finalizado'
when th.trasl_state_process ='AUTHORIZED'  then 'Autorizado'
else 'Sin Estado'
end as status_proces
from traslation_head th 
INNER JOIN center_crs crss ON th.crs_id_source = crss.crs_id 
INNER JOIN center_crs crsd ON th.crs_id_destination = crsd.crs_id 
INNER JOIN traslation_type typ ON th.trasl_type_id = typ.trasl_type_id 
INNER JOIN user_login usr ON th.usr_id= usr.usr_id
INNER JOIN user_login usranlyst ON th.trasl_analyzed_by= usranlyst.usr_id
WHERE th.trasl_state_process in('APPROVED') AND th.trasl_direction_assigned=$direction;";
            // echo ''.$query;
            $this->rs = parent::execute($query);
            if ($this->rs) {

                while ($row = pg_fetch_row($this->rs)) {
                    $info[] = array('success' => TRUE,
                        'message' => 'Lista  encontrada Approbed',
                        'trasl_id' => $row[0],
                        'trasl_date_request' => $row[1],
                        'names_dircrs' => $row[2],
                        'crs_source' => $row[3],
                        'crs_destination' => $row[4],
                        'trasl_type_descripcion' => $row[5],
                        'tras_date_analyst_send' => $row[6],
                        'names_analyst' => $row[7],
                        'status_proces' => $row[8]
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

    public function listTaslationPlantCtrl1Approved($profile) {
        Connection::getInstance()->getConnection();

        try {
            $query = "SELECT th.trasl_id,th.trasl_date_request,concat(usr.usr_name,' ', usr.usr_lasname) as names_dircrs ,crss.crs_description as crs_source ,crsd.crs_description as crs_destination,typ.trasl_type_descripcion
,th.tras_date_analyst_send
,concat(usranlyst.usr_name,' ', usranlyst.usr_lasname) as names_analyst
,
case 
when th.trasl_state_process ='START'  then 'Inicio' 
when th.trasl_state_process ='APPROVED'  then 'Aprobado' 
when th.trasl_state_process ='REVISION'  then 'Revision' 
when th.trasl_state_process ='EXECUTED'  then 'Finalizado' 
when th.trasl_state_process ='AUTHORIZED'  then 'Autorizado' 
else 'Sin Estado'
end as status_proces
from traslation_head th 
INNER JOIN center_crs crss ON th.crs_id_source = crss.crs_id 
INNER JOIN center_crs crsd ON th.crs_id_destination = crsd.crs_id 
INNER JOIN traslation_type typ ON th.trasl_type_id = typ.trasl_type_id 
INNER JOIN user_login usr ON th.usr_id= usr.usr_id
INNER JOIN user_login usranlyst ON th.trasl_analyzed_by= usranlyst.usr_id
WHERE th.trasl_state_process in('APPROVED')  AND th.trasl_approved_by= $this->trasl_approved_by";
            //echo ''.$query;
            $this->rs = parent::execute($query);
            if ($this->rs) {

                while ($row = pg_fetch_row($this->rs)) {
                    $info[] = array('success' => TRUE,
                        'message' => 'Lista  encontrada Approbed',
                        'trasl_id' => $row[0],
                        'trasl_date_request' => $row[1],
                        'names_dircrs' => $row[2],
                        'crs_source' => $row[3],
                        'crs_destination' => $row[4],
                        'trasl_type_descripcion' => $row[5],
                        'tras_date_analyst_send' => $row[6],
                        'names_analyst' => $row[7],
                        'status_proces' => $row[8]
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

    public function listTaslationPlantCtrl1Executed() {
        Connection::getInstance()->getConnection();

        try {
            $query = "SELECT th.trasl_id,th.trasl_date_request,concat(usr.usr_name,' ', usr.usr_lasname) as names_dircrs ,crss.crs_description as crs_source ,crsd.crs_description as crs_destination,typ.trasl_type_descripcion
,th.tras_date_analyst_send
,concat(usranlyst.usr_name,' ', usranlyst.usr_lasname) as names_analyst
,
case 
when th.trasl_state_process ='START'  then 'Inicio' 
when th.trasl_state_process ='APPROVED'  then 'Aprobado' 
when th.trasl_state_process ='REVISION'  then 'Revision' 
when th.trasl_state_process ='EXECUTED'  then 'Finalizado'
when th.trasl_state_process ='AUTHORIZED'  then 'Autorizado'
else 'Sin Estado'
end as status_proces
from traslation_head th 
INNER JOIN center_crs crss ON th.crs_id_source = crss.crs_id 
INNER JOIN center_crs crsd ON th.crs_id_destination = crsd.crs_id 
INNER JOIN traslation_type typ ON th.trasl_type_id = typ.trasl_type_id 
INNER JOIN user_login usr ON th.usr_id= usr.usr_id
INNER JOIN user_login usranlyst ON th.trasl_analyzed_by= usranlyst.usr_id
WHERE th.trasl_state_process in('EXECUTED') AND th.trasl_approved_by= $this->trasl_approved_by;";
            // echo ''.$query;
            $this->rs = parent::execute($query);
            if ($this->rs) {

                while ($row = pg_fetch_row($this->rs)) {
                    $info[] = array('success' => TRUE,
                        'message' => 'Lista  encontrada Approbed',
                        'trasl_id' => $row[0],
                        'trasl_date_request' => $row[1],
                        'names_dircrs' => $row[2],
                        'crs_source' => $row[3],
                        'crs_destination' => $row[4],
                        'trasl_type_descripcion' => $row[5],
                        'tras_date_analyst_send' => $row[6],
                        'names_analyst' => $row[7],
                        'status_proces' => $row[8]
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

    public function listTaslationPlantCtrl1Authorized($profile) {
        Connection::getInstance()->getConnection();

        try {
            $query = "SELECT th.trasl_id,th.trasl_date_request,concat(usr.usr_name,' ', usr.usr_lasname) as names_dircrs ,crss.crs_description as crs_source ,crsd.crs_description as crs_destination,typ.trasl_type_descripcion
,th.tras_date_analyst_send
,concat(usranlyst.usr_name,' ', usranlyst.usr_lasname) as names_analyst
,
case 
when th.trasl_state_process ='START'  then 'Inicio' 
when th.trasl_state_process ='APPROVED'  then 'Aprobado' 
when th.trasl_state_process ='REVISION'  then 'Revision' 
when th.trasl_state_process ='EXECUTED'  then 'Finalizado'
when th.trasl_state_process ='AUTHORIZED'  then 'Autorizado'
else 'Sin Estado'
end as status_proces
from traslation_head th 
INNER JOIN center_crs crss ON th.crs_id_source = crss.crs_id 
INNER JOIN center_crs crsd ON th.crs_id_destination = crsd.crs_id 
INNER JOIN traslation_type typ ON th.trasl_type_id = typ.trasl_type_id 
INNER JOIN user_login usr ON th.usr_id= usr.usr_id
INNER JOIN user_login usranlyst ON th.trasl_analyzed_by= usranlyst.usr_id
WHERE th.trasl_state_process in('AUTHORIZED') AND th.trasl_approved_by= $this->trasl_approved_by;";
            // echo ''.$query;
            $this->rs = parent::execute($query);
            if ($this->rs) {

                while ($row = pg_fetch_row($this->rs)) {
                    $info[] = array('success' => TRUE,
                        'message' => 'Lista  encontrada Approbed',
                        'trasl_id' => $row[0],
                        'trasl_date_request' => $row[1],
                        'names_dircrs' => $row[2],
                        'crs_source' => $row[3],
                        'crs_destination' => $row[4],
                        'trasl_type_descripcion' => $row[5],
                        'tras_date_analyst_send' => $row[6],
                        'names_analyst' => $row[7],
                        'status_proces' => $row[8]
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

    public function listAuthorized2($usr) {
        Connection::getInstance()->getConnection();

        try {
            $query = "SELECT th.trasl_id,th.trasl_date_request,concat(usr.usr_name,' ', usr.usr_lasname) as names_dircrs ,crss.crs_description as crs_source ,crsd.crs_description as crs_destination,typ.trasl_type_descripcion
,th.tras_date_analyst_send
,concat(usranlyst.usr_name,' ', usranlyst.usr_lasname) as names_analyst
,
case 
when th.trasl_state_process ='START'  then 'Inicio' 
when th.trasl_state_process ='APPROVED'  then 'Aprobado' 
when th.trasl_state_process ='REVISION'  then 'Revision' 
when th.trasl_state_process ='EXECUTED'  then 'Finalizado'
when th.trasl_state_process ='AUTHORIZED'  then 'Autorizado'
else 'Sin Estado'
end as status_proces
from traslation_head th 
INNER JOIN center_crs crss ON th.crs_id_source = crss.crs_id 
INNER JOIN center_crs crsd ON th.crs_id_destination = crsd.crs_id 
INNER JOIN traslation_type typ ON th.trasl_type_id = typ.trasl_type_id 
INNER JOIN user_login usr ON th.usr_id= usr.usr_id
INNER JOIN user_login usranlyst ON th.trasl_analyzed_by= usranlyst.usr_id
WHERE th.trasl_state_process in('AUTHORIZED') AND th.trasl_authorized_by=$usr ;";
            // echo ''.$query;
            $this->rs = parent::execute($query);
            if ($this->rs) {

                while ($row = pg_fetch_row($this->rs)) {
                    $info[] = array('success' => TRUE,
                        'message' => 'Lista  encontrada Approbed',
                        'trasl_id' => $row[0],
                        'trasl_date_request' => $row[1],
                        'names_dircrs' => $row[2],
                        'crs_source' => $row[3],
                        'crs_destination' => $row[4],
                        'trasl_type_descripcion' => $row[5],
                        'tras_date_analyst_send' => $row[6],
                        'names_analyst' => $row[7],
                        'status_proces' => $row[8]
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

    public function listExecuted2($usr) {
        Connection::getInstance()->getConnection();

        try {
            $query = "SELECT th.trasl_id,th.trasl_date_request,concat(usr.usr_name,' ', usr.usr_lasname) as names_dircrs ,crss.crs_description as crs_source ,crsd.crs_description as crs_destination,typ.trasl_type_descripcion
,th.tras_date_analyst_send
,concat(usranlyst.usr_name,' ', usranlyst.usr_lasname) as names_analyst
,
case 
when th.trasl_state_process ='START'  then 'Inicio' 
when th.trasl_state_process ='APPROVED'  then 'Aprobado' 
when th.trasl_state_process ='REVISION'  then 'Revision' 
when th.trasl_state_process ='EXECUTED'  then 'Finalizado'
when th.trasl_state_process ='AUTHORIZED'  then 'Autorizado'
else 'Sin Estado'
end as status_proces
from traslation_head th 
INNER JOIN center_crs crss ON th.crs_id_source = crss.crs_id 
INNER JOIN center_crs crsd ON th.crs_id_destination = crsd.crs_id 
INNER JOIN traslation_type typ ON th.trasl_type_id = typ.trasl_type_id 
INNER JOIN user_login usr ON th.usr_id= usr.usr_id
INNER JOIN user_login usranlyst ON th.trasl_analyzed_by= usranlyst.usr_id
WHERE th.trasl_state_process in('EXECUTED') AND th.trasl_authorized_by=$usr ;";
            // echo ''.$query;
            $this->rs = parent::execute($query);
            if ($this->rs) {

                while ($row = pg_fetch_row($this->rs)) {
                    $info[] = array('success' => TRUE,
                        'message' => 'Lista  encontrada Approbed',
                        'trasl_id' => $row[0],
                        'trasl_date_request' => $row[1],
                        'names_dircrs' => $row[2],
                        'crs_source' => $row[3],
                        'crs_destination' => $row[4],
                        'trasl_type_descripcion' => $row[5],
                        'tras_date_analyst_send' => $row[6],
                        'names_analyst' => $row[7],
                        'status_proces' => $row[8]
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

    public function listExecuted3($usr) {
        Connection::getInstance()->getConnection();

        try {
            $query = "SELECT th.trasl_id,th.trasl_date_request,concat(usr.usr_name,' ', usr.usr_lasname) as names_dircrs ,crss.crs_description as crs_source ,crsd.crs_description as crs_destination,typ.trasl_type_descripcion
,th.tras_date_analyst_send
,concat(usranlyst.usr_name,' ', usranlyst.usr_lasname) as names_analyst
,
case 
when th.trasl_state_process ='START'  then 'Inicio' 
when th.trasl_state_process ='APPROVED'  then 'Aprobado' 
when th.trasl_state_process ='REVISION'  then 'Revision' 
when th.trasl_state_process ='EXECUTED'  then 'Finalizado'
when th.trasl_state_process ='AUTHORIZED'  then 'Autorizado'
else 'Sin Estado'
end as status_proces
from traslation_head th 
INNER JOIN center_crs crss ON th.crs_id_source = crss.crs_id 
INNER JOIN center_crs crsd ON th.crs_id_destination = crsd.crs_id 
INNER JOIN traslation_type typ ON th.trasl_type_id = typ.trasl_type_id 
INNER JOIN user_login usr ON th.usr_id= usr.usr_id
INNER JOIN user_login usranlyst ON th.trasl_analyzed_by= usranlyst.usr_id
WHERE th.trasl_state_process in('EXECUTED') AND th.trasl_executed_by=$usr ;";
            // echo ''.$query;
            $this->rs = parent::execute($query);
            if ($this->rs) {

                while ($row = pg_fetch_row($this->rs)) {
                    $info[] = array('success' => TRUE,
                        'message' => 'Lista  encontrada Approbed',
                        'trasl_id' => $row[0],
                        'trasl_date_request' => $row[1],
                        'names_dircrs' => $row[2],
                        'crs_source' => $row[3],
                        'crs_destination' => $row[4],
                        'trasl_type_descripcion' => $row[5],
                        'tras_date_analyst_send' => $row[6],
                        'names_analyst' => $row[7],
                        'status_proces' => $row[8]
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

    public function listToExecute3($usr) {
        Connection::getInstance()->getConnection();

        try {
            $query = "SELECT th.trasl_id,th.trasl_date_request,concat(usr.usr_name,' ', usr.usr_lasname) as names_dircrs ,crss.crs_description as crs_source ,crsd.crs_description as crs_destination,typ.trasl_type_descripcion
,th.tras_date_analyst_send
,concat(usranlyst.usr_name,' ', usranlyst.usr_lasname) as names_analyst
,
case 
when th.trasl_state_process ='START'  then 'Inicio' 
when th.trasl_state_process ='APPROVED'  then 'Aprobado' 
when th.trasl_state_process ='REVISION'  then 'Revision' 
when th.trasl_state_process ='EXECUTE'  then 'Finalizado'
when th.trasl_state_process ='AUTHORIZED'  then 'Autorizado'
else 'Sin Estado'
end as status_proces
from traslation_head th 
INNER JOIN center_crs crss ON th.crs_id_source = crss.crs_id 
INNER JOIN center_crs crsd ON th.crs_id_destination = crsd.crs_id 
INNER JOIN traslation_type typ ON th.trasl_type_id = typ.trasl_type_id 
INNER JOIN user_login usr ON th.usr_id= usr.usr_id
INNER JOIN user_login usranlyst ON th.trasl_analyzed_by= usranlyst.usr_id
WHERE th.trasl_state_process in('AUTHORIZED') ;";
            // echo ''.$query;
            $this->rs = parent::execute($query);
            if ($this->rs) {

                while ($row = pg_fetch_row($this->rs)) {
                    $info[] = array('success' => TRUE,
                        'message' => 'Lista  encontrada Approbed',
                        'trasl_id' => $row[0],
                        'trasl_date_request' => $row[1],
                        'names_dircrs' => $row[2],
                        'crs_source' => $row[3],
                        'crs_destination' => $row[4],
                        'trasl_type_descripcion' => $row[5],
                        'tras_date_analyst_send' => $row[6],
                        'names_analyst' => $row[7],
                        'status_proces' => $row[8]
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

    public function reviewTraslation($trasl_id) {

        try {
            $query = "Select th.trasl_id,	center_crs.crs_description as crs_source,crsd.crs_description as crs_destination
		,	th.trasl_date_request,u.usr_name,u.usr_lasname,th.trasl_observations_analyst,th.trasl_path
		,pp.prison_per_id,pp.prison_per_identification,pp.prison_per_name,pp.prison_per_lastname,pp.prison_per_observations,th.trasl_descripcion,th.trasl_commentary_dir_pltactral from traslation_head  th
		INNER JOIN center_crs   on th.crs_id_source=center_crs.crs_id
		INNER JOIN center_crs crsd  on th.crs_id_destination=crsd.crs_id
		INNER JOIN  user_login u    on  th.usr_id=u.usr_id
		INNER JOIN  traslation_details td on th.trasl_id=td.trasl_id
		INNER JOIN prison_person pp  on  td.prison_per_id=pp.id_sgp
		WHERE    th.trasl_id=$trasl_id";

            //echo ''.$query;
            $this->rs = parent::execute($query);
            if ($this->rs) {
                /* trasl_id	
                 * crs_source	
                 * crs_destination	
                 * trasl_date_request
                 * 	usr_name	
                 * usr_lasname	
                 * prison_per_id	
                 * prison_per_identification	
                 * prison_per_name	
                 * prison_per_lastname */
                while ($row = pg_fetch_row($this->rs)) {
                    $info[] = array('success' => TRUE,
                        'message' => 'Traslado de Analista encontrado',
                        'trasl_id' => $row[0],
                        'crs_source' => $row[1],
                        'crs_destination' => $row[2],
                        'trasl_date_request' => $row[3],
                        'usr_name' => $row[4],
                        'usr_lasname' => $row[5],
                        'trasl_observations' => $row[6],
                        'trasl_path' => $row[7],
                        'prison_per_id' => $row[8],
                        'prison_per_identification' => $row[9],
                        'prison_per_name' => $row[10],
                        'prison_per_lastname' => $row[11],
                        'prison_per_observations' => $row[12],
                        'trasl_descripcion' => $row[13],
                        'trasl_commentary_dir_pltactral' => $row[14]
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

    public function listTaslationPlantCtrl1Proecess() {

        try {
            $query = "SELECT th.trasl_id,th.trasl_date_request,concat(usr.usr_name,' ', usr.usr_lasname) as names_dircrs ,crss.crs_description as crs_source ,crsd.crs_description as crs_destination,typ.trasl_type_descripcion
,th.trasl_date_approved
,concat(usrapproved.usr_name,' ', usrapproved.usr_lasname) as names_approved
,
case 
when th.trasl_state_process ='START'  then 'Inicio' 
when th.trasl_state_process ='APPROVED'  then 'Aprobado' 
when th.trasl_state_process ='REVISION'  then 'Revision' 
when th.trasl_state_process ='EXECUTED'  then 'Finalizado' 
else 'Sin Estado'
end as status_proces
from traslation_head th 
INNER JOIN center_crs crss ON th.crs_id_source = crss.crs_id 
INNER JOIN center_crs crsd ON th.crs_id_destination = crsd.crs_id 
INNER JOIN traslation_type typ ON th.trasl_type_id = typ.trasl_type_id 
INNER JOIN user_login usr ON th.usr_id= usr.usr_id
INNER JOIN user_login usrapproved ON th.trasl_approved_by= usrapproved.usr_id
WHERE th.trasl_state_process in('APPROVED','EXECUTED')";
            //echo ''.$query;
            $this->rs = parent::execute($query);
            if ($this->rs) {

                while ($row = pg_fetch_row($this->rs)) {
                    $info[] = array('success' => TRUE,
                        'message' => 'Lista  encontrada Approbed',
                        'trasl_id' => $row[0],
                        'trasl_date_request' => $row[1],
                        'names_dircrs' => $row[2],
                        'crs_source' => $row[3],
                        'crs_destination' => $row[4],
                        'trasl_type_descripcion' => $row[5],
                        'trasl_date_approved' => $row[6],
                        'names_approved' => $row[7],
                        'status_proces' => $row[8]
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

    public function updateCommentary($commentary, $trasl_id) {
        try {
            $query = " UPDATE traslation_head SET trasl_commentary_dir_pltactral='$commentary' WHERE trasl_id =$trasl_id ";
            //echo "string".$query_local;
            $rs = parent::execute($query);
            if ($rs) {
                return $info = array('success' => TRUE, 'message' => 'Observaciones de Traslado Actualizadas');
            } else {

                return $info = array('success' => FALSE, 'message' => 'No se pudo actualizar las Observaciones del Traslado');
                ;
            }
        } catch (Exception $exc) {
            //echo 'error exception al crear Traslados' . $exc->getMessage();
        } finally {
            parent::closeConnection();
        }
    }

    public function saveTraslationApprobed($trasl_id, $usr_id_approved, $dirParent) {
        $dateapproved = date('Y-m-d');
        try {
            $query = " UPDATE traslation_head SET trasl_state_process='APPROVED',trasl_date_approved='$dateapproved', trasl_approved_by=$usr_id_approved, trasl_direction_assigned= $dirParent WHERE trasl_id =$trasl_id ";
            //  echo "string".$query;
            $rs = parent::execute($query);
            if ($rs) {
                return $info = array('success' => TRUE, 'message' => 'Observaciones de Traslado Actualizadas');
            } else {

                return $info = array('success' => FALSE, 'message' => 'No se pudo actualizar las Observaciones del Traslado');
                ;
            }
        } catch (Exception $exc) {
            //echo 'error exception al crear Traslados' . $exc->getMessage();
        } /* finally {
          parent::closeConnection();
          } */
    }

    public function saveTraslationExecuted($trasl_id, $usr_id_executed) {
        $dateexecuted = date('Y-m-d');
        try {
            $query = " UPDATE traslation_head SET trasl_state_process='EXECUTED',trasl_date_approved='$dateexecuted', trasl_executed_by=$usr_id_executed WHERE trasl_id =$trasl_id ";
            //  echo "string".$query;
            $rs = parent::execute($query);
            if ($rs) {
                return $info = array('success' => TRUE, 'message' => ' Traslados Actualizadas');
            } else {

                return $info = array('success' => FALSE, 'message' => 'No se pudo actualizar los Traslado');
                ;
            }
        } catch (Exception $exc) {
            //echo 'error exception al crear Traslados' . $exc->getMessage();
        } /* finally {
          parent::closeConnection();
          } */
    }

    public function saveTraslationAuthorized($trasl_id, $usr_id_authorized) {
        $dateauthorized = date('Y-m-d');
        try {
            $query = " UPDATE traslation_head SET trasl_state_process='AUTHORIZED',trasl_date_authorized='$dateauthorized', trasl_authorized_by=$usr_id_authorized WHERE trasl_id =$trasl_id ";
            //  echo "string".$query;
            $rs = parent::execute($query);
            if ($rs) {
                return $info = array('success' => TRUE, 'message' => 'Observaciones de Traslado Actualizadas');
            } else {

                return $info = array('success' => FALSE, 'message' => 'No se pudo actualizar las Observaciones del Traslado');
                ;
            }
        } catch (Exception $exc) {
            //echo 'error exception al crear Traslados' . $exc->getMessage();
        } /* finally {
          parent::closeConnection();
          } */
    }

    public function confirmApprovedTraslation($trasl_id) {
        $trasl_date_confirm = date('Y-m-d');
        ;
        try {
            $query = " UPDATE traslation_head SET trasl_state_process='EXECUTED', trasl_date_confirm='$trasl_date_confirm' WHERE trasl_id =$trasl_id ";
            //echo "string".$query_local;
            $rs = parent::execute($query);
            if ($rs) {
                return $info = array('success' => TRUE, 'message' => 'Observaciones de Traslado Actualizadas');
            } else {

                return $info = array('success' => FALSE, 'message' => 'No se pudo actualizar las Observaciones del Traslado');
                ;
            }
        } catch (Exception $exc) {
            //echo 'error exception al crear Traslados' . $exc->getMessage();
        } finally {
            parent::closeConnection();
        }
    }

    // get Navegation Move 
    public function getMove($query) {        
        //echo ''.$query;
        try {
            Connection::getInstance()->getConnection();
            $this->rs = parent::execute_sgp($query);
            if ($this->rs) {
                $info = null;
                ;
                while ($row = pg_fetch_row($this->rs)) {
                    $info[] = array('success' => TRUE,
                        'message' => 'Traslado  encontrado',
                        'trasl_id' => $row[0],
                        'crs_source' => $row[1],
                        'crs_destination' => $row[2],
                        'trasl_type_descripcion' => $row[3],
                        'trasl_date_request' => $row[4],
                        'name_complete' => $row[5],
                        'usr_lasname' => $row[6],
                        'trasl_observations' => $row[7],
                        'trasl_path' => $row[8],
                        'trasl_state_process' => $row[9], //
                        'prison_per_id' => $row[10],
                        'prison_per_identification' => $row[11],
                        'prison_per_name' => $row[12],
                        'prison_per_lastname' => $row[13],
                        'id_sgp' => $row[14],
                        'sex' => $row[15],
                        'prontuario' => $row[16],
                        'status_sgp' => $row[17]
                    );
                }
                return $info;
            } else {
                return array('success' => FALSE, 'message' => 'No hay resultado');
            }
        } catch (Exception $exc) {
            /* echo $exc->getTraceAsString(); */
            return array('success' => FALSE, 'message' => 'error al consultar Traslado' . $exc->getMessage());
        } /* finally {
          parent::closeConnection();
          } */
    }

    public function deleteTraslation($idTraslation) {
        try {
            $query = " UPDATE traslation_head SET trasl_state='f' WHERE trasl_id =$idTraslation ";
            //echo "string".$query;
            $rs = parent::execute($query);
            if ($rs) {
                return $info = array('success' => TRUE, 'message' => ' Traslado Eliminado');
            } else {

                return $info = array('success' => FALSE, 'message' => 'No se pudo Eliminar el Traslado');
                ;
            }
        } catch (Exception $exc) {
            //echo 'error exception al crear Traslados' . $exc->getMessage();
        } finally {
            parent::closeConnection();
        }
    }

    public function report1() {

        try {
            $query = "SELECT th.trasl_id,th.trasl_date_request,th.trasl_date_approved,th.trasl_date_confirm,typ.trasl_type_descripcion,crss.crs_description as crs_source ,crsd.crs_description as crs_destination
,case 
when th.trasl_state_process ='START'  then 'Inicio' 
when th.trasl_state_process ='APPROVED'  then 'Aprobado' 
when th.trasl_state_process ='REVISION'  then 'Revision' 
when th.trasl_state_process ='EXECUTED'  then 'Finalizado' 
else 'Sin Estado'
end as status_proces
,concat(usr.usr_name,' ', usr.usr_lasname) as names_dircrs 
,concat(usranlyst.usr_name,' ', usranlyst.usr_lasname) as names_analyst
,concat(usrapproved.usr_name,' ',usrapproved.usr_lasname)as names_approved
from traslation_head th 
INNER JOIN center_crs crss ON th.crs_id_source = crss.crs_id 
INNER JOIN center_crs crsd ON th.crs_id_destination = crsd.crs_id 
INNER JOIN traslation_type typ ON th.trasl_type_id = typ.trasl_type_id 
INNER JOIN user_login usr ON th.usr_id= usr.usr_id
LEFT JOIN user_login usranlyst ON th.trasl_analyzed_by= usranlyst.usr_id
LEFT JOIN user_login usrapproved ON th.trasl_approved_by= usrapproved.usr_id
;";
            $this->rs = parent::execute($query);
            if ($this->rs) {

                while ($row = pg_fetch_row($this->rs)) {
                    $info[] = array('success' => TRUE,
                        'message' => 'Lista  encontrada',
                        'trasl_id' => $row[0],
                        'trasl_date_request' => $row[1],
                        'trasl_date_approved' => $row[2],
                        'trasl_date_confirm' => $row[3],
                        'trasl_type_descripcion' => $row[4],
                        'crs_source' => $row[5],
                        'crs_destination' => $row[6],
                        'status_proces' => $row[7],
                        'names_dircrs' => $row[8],
                        'names_analyst' => $row[9],
                        'names_approved' => $row[10]
                    );
                }
                return $info;
            } else {
                return $info;
            }
        } catch (Exception $exc) {
            /* echo $exc->getTraceAsString(); */
            return array('success' => FALSE, 'message' => 'error al consultar report1' . $exc->getMessage());
        } finally {
            parent::closeConnection();
        }
    }

    public function report2Crs($from, $to, $crs) {
        try {
            $query = " SELECT count(ppl.prison_per_id ) as numbers,concat(ppl.prison_per_name,' ',ppl.prison_per_lastname)as names FROM traslation_head th 
                        INNER JOIN traslation_details td 		on th.trasl_id=td.trasl_id
                        INNER JOIN  center_crs crs 					on th.crs_id_destination=crs.crs_id
                        INNER JOIN  traslation_type typ 		on th.trasl_type_id = typ.trasl_type_id
                        INNER JOIN prison_person ppl 				on td.prison_per_id=ppl.id_sgp
                        WHERE  th.crs_id_destination= $crs    AND (th.trasl_date_request BETWEEN '$from' AND '$to' )
                        GROUP BY ppl.prison_per_id,ppl.prison_per_id,ppl.prison_per_name,ppl.prison_per_lastname;";
            // echo ''.$query;
            $result = parent::execute($query);
            if (pg_fetch_row($result)) {
                $numrows = pg_numrows($result);
                // Loop through rows in the result set
                for ($i = 0; $i < $numrows; $i++) {
                    $row = pg_fetch_array($result, $i);
                    $info[] = array(
                        'success' => TRUE,
                        'numbers' => $row[0],
                        'names' => $row[1]
                    );
                }
                return $info;
            } else {

                $info[] = array(
                    'success' => FALSE,
                    'message' => 'No hay Datos para mostrar'
                );

                return $info;
            }
        } catch (Exception $exc) {

            return array('success' => FALSE, 'message' => 'error al consultar report1' . $exc->getMessage());
        } finally {
            parent::closeConnection();
        }
    }

    public function report2TypeT($from, $to, $typrT) {

        try {
            Connection::getInstance()->getConnection();
            $query = "SELECT count(ppl.prison_per_id ) as numbers,concat(ppl.prison_per_name,' ',ppl.prison_per_lastname)as names FROM traslation_head th 
INNER JOIN traslation_details td 		on th.trasl_id=td.trasl_id
INNER JOIN  center_crs crs 					on th.crs_id_destination=crs.crs_id
INNER JOIN  traslation_type typ 		on th.trasl_type_id = typ.trasl_type_id
INNER JOIN prison_person ppl 				on td.prison_per_id=ppl.id_sgp
WHERE  th.trasl_type_id =$typrT  AND (th.trasl_date_request BETWEEN '$from' AND '$to' )
GROUP BY ppl.prison_per_id,ppl.prison_per_id,ppl.prison_per_name,ppl.prison_per_lastname;";
            //echo ''.$query;
            $result = parent::execute($query);

            if (pg_fetch_row($result)) {
                $numrows = pg_numrows($result);
                // Loop through rows in the result set
                for ($i = 0; $i < $numrows; $i++) {
                    $row = pg_fetch_array($result, $i);
                    $info[] = array(
                        'success' => TRUE,
                        'numbers' => $row[0],
                        'names' => $row[1]
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
            echo $exc->getTraceAsString();
            return array('success' => FALSE, 'message' => 'error al consultar report1' . $exc->getMessage());
        } finally {
            parent::closeConnection();
        }
    }

    public function report2Todos($from, $to) {
        try {
            $query = "SELECT count(ppl.prison_per_id ) as numbers,concat(ppl.prison_per_name,' ',ppl.prison_per_lastname)as names FROM traslation_head th 
                        INNER JOIN traslation_details td 		on th.trasl_id=td.trasl_id
                        INNER JOIN  center_crs crs 					on th.crs_id_destination=crs.crs_id
                        INNER JOIN  traslation_type typ 		on th.trasl_type_id = typ.trasl_type_id
                        INNER JOIN prison_person ppl 				on td.prison_per_id=ppl.id_sgp
                        WHERE   (th.trasl_date_request BETWEEN '$from' AND '$to' )
                        GROUP BY ppl.prison_per_id,ppl.prison_per_id,ppl.prison_per_name,ppl.prison_per_lastname ORDER BY names;";
            //echo '' . $query;
            $result = parent::execute($query);
            if (pg_fetch_row($result)) {
                $numrows = pg_numrows($result);
                // Loop through rows in the result set
                for ($i = 0; $i < $numrows; $i++) {
                    $row = pg_fetch_array($result, $i);
                    $info[] = array(
                        'success' => TRUE,
                        'numbers' => $row[0],
                        'names' => $row[1]
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

    public function report2CrsTypeT($from, $to, $crs, $typrT) {
        try {
            $query = "SELECT count(ppl.prison_per_id ) as numbers,concat(ppl.prison_per_name,' ',ppl.prison_per_lastname)as names FROM traslation_head th 
                        INNER JOIN traslation_details td 		on th.trasl_id=td.trasl_id
                        INNER JOIN  center_crs crs 					on th.crs_id_destination=crs.crs_id
                        INNER JOIN  traslation_type typ 		on th.trasl_type_id = typ.trasl_type_id
                        INNER JOIN prison_person ppl 				on td.prison_per_id=ppl.id_sgp
                        WHERE th.trasl_type_id =$typrT AND th.crs_id_destination= $crs  AND   (th.trasl_date_request BETWEEN '$from' AND '$to' )
                        GROUP BY ppl.prison_per_id,ppl.prison_per_id,ppl.prison_per_name,ppl.prison_per_lastname ORDER BY names;";
            //echo ''.$query;
            $result = parent::execute($query);
            if (pg_fetch_row($result)) {
                $numrows = pg_numrows($result);
                // Loop through rows in the result set
                for ($i = 0; $i < $numrows; $i++) {
                    $row = pg_fetch_array($result, $i);
                    $info[] = array(
                        'success' => TRUE,
                        'numbers' => $row[0],
                        'names' => $row[1]
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

    public function reviewHistoryTypeT($ppl_id, $crs_id) {
        try {
            $query = " SELECT if_exists_history($ppl_id,$crs_id); ";
            //echo ''.$query;
            $this->rs = parent::execute($query);
            $val = pg_fetch_result($this->rs, 0, 'if_exists_history');
            if ($val === 't' ? TRUE : FALSE) {
                return array('success' => TRUE, 'message' => 'El PPl que eligió ya estuvo en este Centro');
            } else {
                return array('success' => FALSE, 'message' => 'no hay historial');
            }
        } catch (Exception $exc) {
            /* echo $exc->getTraceAsString(); */
            return array('success' => FALSE, 'message' => 'error al consultar report1' . $exc->getMessage());
        } finally {
            parent::closeConnection();
        }
    }

    public function reviewHistoryPPLCenter($ppl_id, $crs_id) {
        try {
            $query = " SELECT if_exists_history($ppl_id,$crs_id); ";
            //echo ''.$query;
            $this->rs = parent::execute($query);
            $val = pg_fetch_result($this->rs, 0, 'if_exists_history');
            if ($val === 't' ? TRUE : FALSE) {
                return array('success' => TRUE, 'message' => 'El PPl que eligió ya estuvo en este Centro');
            } else {
                return array('success' => FALSE, 'message' => 'no hay historial');
            }
        } catch (Exception $exc) {
            /* echo $exc->getTraceAsString(); */
            return array('success' => FALSE, 'message' => 'error al consultar report1' . $exc->getMessage());
        } finally {
            parent::closeConnection();
        }
    }

}

?>
