<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of LastRecord
 *
 * @author odilo
 */
include_once './../Model/ISurfMove.php';
class LastRecord implements ISurfMove {
    private  $crs_id;
    public function __construct($crs_id) {
       $this->crs_id=$crs_id;
    }
    public function FielsEmpty() {
         $query ="SELECT lpad(th.trasl_id::text,5,'00'),	prison_location.name as crs_source,' ' as crs_destination
		,'' as trasl_type_descripcion,th.trasl_date_request,'Creado por: ' || u.name_complete as name_complete,u.usr_lasname,' ' as trasl_descripcion,' ' as trasl_path,
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
		INNER JOIN  user_login u    on  th.usr_id=u.usr_id	
	WHERE   th.trasl_id=(SELECT max(trasl_id) FROM traslation_head WHERE trasl_state = 't' and crs_id_source=$this->crs_id ) and th.trasl_state='t';";
         return $query;
    }

    public function move1() {
         $query ="SELECT lpad(th.trasl_id::text,5,'00'),	prison_location.name as crs_source,crsd.name as crs_destination
		,	ty.trasl_type_descripcion,th.trasl_date_request,'Creado por: ' || u.name_complete as name_complete,u.usr_lasname,th.trasl_descripcion,th.trasl_path,
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
	WHERE   th.trasl_id=(SELECT max(trasl_id) FROM traslation_head WHERE trasl_state = 't' and crs_id_source=$this->crs_id ) and th.trasl_state='t';";
        return $query;
    }

    public function move2() {
        $query="SELECT th.trasl_id,	prison_location.name as crs_source,' '  as crs_destination
		,	ty.trasl_type_descripcion,th.trasl_date_request,'Creado por: ' || u.name_complete as name_complete,u.usr_lasname,th.trasl_descripcion,th.trasl_path,
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
	WHERE   th.trasl_id=(SELECT max(trasl_id) FROM traslation_head WHERE trasl_state = 't' and crs_id_source=$this->crs_id) and th.trasl_state='t';";
        return $query;
    }

//put your code here
}
