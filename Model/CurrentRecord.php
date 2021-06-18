<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of CurrentRecord
 *
 * @author odilo
 */
include_once './../Model/ISurfMove.php';

class CurrentRecord implements ISurfMove {
    /* The Constructor */

    private $id = '';
    private $crs_id;

    public function __construct($id, $crs_id) {
        $this->id = $id;
        $this->crs_id = $crs_id;
    }

    /* Record Empty */

    public function FielsEmpty() {

        $query = "	SELECT th.trasl_id,	center_crs.crs_description as crs_source,' ' as crs_destination
		,ty.trasl_type_descripcion,th.trasl_date_request,u.usr_name,u.usr_lasname,' ' as trasl_descripcion,' ' as trasl_path,
		case
when th.trasl_state_process ='START'  then 'Inicio'
when th.trasl_state_process ='SENT'  then 'Enviado'
when th.trasl_state_process ='APPROVED'  then 'Aprobado'
when th.trasl_state_process ='REVISION'  then 'Revision'
when th.trasl_state_process ='EXECUTED'  then 'Finalizado'
when th.trasl_state_process ='AUTHORIZED'  then 'Autorizado'
else 'Sin Estado'
end as trasl_state_process
		,' ' as prison_per_id,' ' as prison_per_identification,' ' as prison_per_name,' ' as prison_per_lastname,' ' as id_sgp,' ' as sex,' ' as prontuario,' ' as status_sgp
		from traslation_head  th
		LEFT JOIN center_crs   on th.crs_id_source=center_crs.crs_id
		LEFT JOIN center_crs crsd  on th.crs_id_destination=crsd.crs_id
                LEFT JOIN  traslation_type ty on th.trasl_type_id=ty.trasl_type_id
		LEFT JOIN  user_login u    on  th.usr_id=u.usr_id
		LEFT JOIN  traslation_details tdls    on  th.trasl_id=tdls.trasl_id
		LEFT JOIN prison_person pp  on  tdls.prison_per_id=pp.id_sgp
		WHERE   th.trasl_id= $this->id and th.trasl_state='t' and th.crs_id_source=$this->crs_id;";
        return $query;
    }

    /* All Records */

    public function move1() {
        $query = "		SELECT th.trasl_id,	center_crs.crs_description as crs_source,crsd.crs_description as crs_destination
		,	ty.trasl_type_descripcion,th.trasl_date_request,u.usr_name,u.usr_lasname,th.trasl_descripcion,th.trasl_path,
		case
when th.trasl_state_process ='start'  then 'Inicio'
when th.trasl_state_process ='sent'  then 'Enviado'
when th.trasl_state_process ='approved'  then 'Aprobado'
when th.trasl_state_process ='revision'  then 'Revision'
when th.trasl_state_process ='executed'  then 'Finalizado'
when th.trasl_state_process ='authorized'  then 'Autorizado'
else 'Sin Estado'
end as trasl_state_process
		,pp.prison_per_id,pp.prison_per_identification,pp.prison_per_name,pp.prison_per_lastname,pp.id_sgp,	pp.sex,	pp.prontuario,	pp.status_sgp
		from traslation_head  th
		INNER JOIN center_crs   on th.crs_id_source=center_crs.crs_id
		INNER JOIN center_crs crsd  on th.crs_id_destination=crsd.crs_id
    INNER JOIN  traslation_type ty on th.trasl_type_id=ty.trasl_type_id
		INNER JOIN  user_login u    on  th.usr_id=u.usr_id
		INNER JOIN  traslation_details tdls    on  th.trasl_id=tdls.trasl_id
		INNER JOIN prison_person pp  on  tdls.prison_per_id=pp.id_sgp
		WHERE   th.trasl_id= $this->id and th.trasl_state='t' and tdls.trasl_det_status='t' and th.crs_id_source=$this->crs_id;";
        return $query;
    }

    /* Only Head */

    public function move2() {
      $query = "		SELECT th.trasl_id,	center_crs.crs_description as crs_source,' ' as crs_destination
		,	ty.trasl_type_descripcion,th.trasl_date_request,u.usr_name,u.usr_lasname,th.trasl_descripcion,th.trasl_path,
		case
when th.trasl_state_process ='START'  then 'Inicio'
when th.trasl_state_process ='SENT'  then 'Enviado'
when th.trasl_state_process ='APPROVED'  then 'Aprobado'
when th.trasl_state_process ='REVISION'  then 'Revision'
when th.trasl_state_process ='EXECUTED'  then 'Finalizado'
when th.trasl_state_process ='AUTHORIZED'  then 'Autorizado'
else 'Sin Estado'
end as trasl_state_process
		,pp.prison_per_id,pp.prison_per_identification,pp.prison_per_name,pp.prison_per_lastname,pp.id_sgp,	pp.sex,	pp.prontuario,	pp.status_sgp
		from traslation_head  th
		INNER JOIN center_crs   on th.crs_id_source=center_crs.crs_id
		
    INNER JOIN  traslation_type ty on th.trasl_type_id=ty.trasl_type_id
		INNER JOIN  user_login u    on  th.usr_id=u.usr_id
		INNER JOIN  traslation_details tdls    on  th.trasl_id=tdls.trasl_id
		INNER JOIN prison_person pp  on  tdls.prison_per_id=pp.id_sgp
		WHERE   th.trasl_id= $this->id and th.trasl_state='t' and tdls.trasl_det_status='t' and th.crs_id_source=$this->crs_id;";
        return $query;
    }

//put your code here
}
