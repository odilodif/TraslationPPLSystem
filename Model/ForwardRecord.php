<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ForwardRecord
 *
 * @author odilo
 */
include_once './../Model/ISurfMove.php';

class ForwardRecord implements ISurfMove {

    private $id = '';
    private $crs_id;

    public function __construct($id,$crs_id) {
        $this->id = $id;
         $this->crs_id = $crs_id;
    }

    public function FielsEmpty() {
        $query = "SELECT th.trasl_id,	prison_location.name as crs_source,' ' as crs_destination
		,ty.trasl_type_descripcion,th.trasl_date_request,u.usr_name,u.usr_lasname,' ' as trasl_descripcion,' ' as trasl_path,
		case
when th.trasl_state_process ='start'  then 'Inicio'
when th.trasl_state_process ='sent'  then 'Enviado'
when th.trasl_state_process ='approved'  then 'Aprobado'
when th.trasl_state_process ='revision'  then 'Revision'
when th.trasl_state_process ='executed'  then 'Finalizado'
when th.trasl_state_process ='authorized'  then 'Autorizado'
else 'Sin Estado'
end as trasl_state_process
		,' ' as prison_per_id,' ' as prison_per_identification,' ' as prison_per_name,' ' as prison_per_lastname,' ' as id_sgp,' ' as sex,' ' as prontuario,' ' as status_sgp
		from traslation_head  th
		INNER JOIN prison_location   on th.crs_id_source=prison_location.id
		INNER JOIN prison_location crsd  on th.crs_id_destination=crsd.id
    INNER JOIN  traslation_type ty on th.trasl_type_id=ty.trasl_type_id
		INNER JOIN  user_login u    on  th.usr_id=u.usr_id
		INNER JOIN  traslation_details tdls    on  th.trasl_id=tdls.trasl_id
		INNER JOIN prison_person pp  on  tdls.prison_per_id=pp.id
		WHERE   th.trasl_id=(select MIN(trasl_id) from traslation_head where trasl_id > $this->id and traslation_head.crs_id_source= $this->id and traslation_head.trasl_state='t') and th.trasl_state='t'  and th.crs_id_source=$this->id;";
        return $query;
    }

    public function move1() {
        $query = "SELECT th.trasl_id,	prison_location.name as crs_source,crsd.name as crs_destination
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
		,pp.id,pp.identificador,pp.name,pp.last_name,pp.id,	pp.sex,	pp.prontuario,	pp.state
		from traslation_head  th
		INNER JOIN prison_location   on th.crs_id_source=prison_location.id
		INNER JOIN prison_location crsd  on th.crs_id_destination=crsd.id
    INNER JOIN  traslation_type ty on th.trasl_type_id=ty.trasl_type_id
		INNER JOIN  user_login u    on  th.usr_id=u.usr_id
		INNER JOIN  traslation_details tdls    on  th.trasl_id=tdls.trasl_id
		INNER JOIN prison_person pp  on  tdls.prison_per_id=pp.id
		WHERE   th.trasl_id=(select MIN(trasl_id) from traslation_head where trasl_id > $this->id and traslation_head.crs_id_source= $this->id and traslation_head.trasl_state='t') and th.trasl_state='t' and tdls.trasl_det_status='t'  and th.crs_id_source= $this->id;";
        return $query;
    }

    public function move2() {
         $query = "SELECT th.trasl_id,	prison_location.name as crs_source,' ' as crs_destination
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
				,pp.id,pp.identificador,pp.name,pp.last_name,pp.id,	pp.sex,	pp.prontuario,	pp.state
		from traslation_head  th
		INNER JOIN prison_location   on th.crs_id_source=prison_location.id
		
    INNER JOIN  traslation_type ty on th.trasl_type_id=ty.trasl_type_id
		INNER JOIN  user_login u    on  th.usr_id=u.usr_id
		INNER JOIN  traslation_details tdls    on  th.trasl_id=tdls.trasl_id
		INNER JOIN prison_person pp  on  tdls.prison_per_id=pp.id
		WHERE   th.trasl_id=(select MIN(trasl_id) from traslation_head where trasl_id > $this->id and traslation_head.crs_id_source= $this->id and traslation_head.trasl_state='t') and th.trasl_state='t' and tdls.trasl_det_status='t'  and th.crs_id_source=$this->id;";
        return $query;
    }

//put your code here
}
