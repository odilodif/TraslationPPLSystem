<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Utilitarian
 *
 * @author odilo
 */
class Utilitarian {

    public function validIdIsNull($id) {
        
    }

    public function buildQuerySearchingReport3($list, $crs_id) {
        $flag_id_empty = TRUE;
        $flag_date_empty = TRUE;
        $flag_field_empty = TRUE;
        $trasl_id;
        $date_from;
        $date_to;
        $criterion = null;
        $where = ' ';
        $date_searching = '';
        $i = 0;

        /*if ($crs_id != 57) {*/
            $traslation_details = new TraslationDetails();
            $list = $_POST['fields_search'];

            foreach ($list as $key => $value) {
                foreach ($value as $key2 => $value2) {
                    if (($i == 0 ) && (intval($value2) !== 0)) {
                        /* searching by id  number */
                        //echo 'number';
                        $key_searching = ' ' . $key2 . ' = ';
                        $criterion[] = array($key_searching => trim($value2));
                        $flag_id_empty = FALSE;
                    }
                    if ($value2 != '' && $i >= 2) {
                        // echo 'campo';
                        $val='';
                        if (strtoupper(trim($value2))=='INICIO') {
                            $val='start';
                        }
                        if (strtoupper(trim($value2))=='ENVIADO') {
                            $val='sent';
                        }
                        if (strtoupper(trim($value2))=='APROBADO') {
                             $val='approved';
                        }
                        if (strtoupper(trim($value2))=='REVISION') {
                            $val='revision';
                        }
                         if (strtoupper(trim($value2))=='FINALIZADO') {
                            $val='executed';
                        }
                         if (strtoupper(trim($value2))=='AUTORIZADO') {
                            $val='authorized';
                        }
                        
                        $key_searching = ' ' . $key2 . ' LIKE ';
                        $criterion[] = array($key_searching => " '%" . strtoupper(trim($val==''?$value2:$val)) . "%' ");
                        $flag_field_empty = FALSE;
                    }


                    if ($i == 1 && $value2 != '') {
                        /* searching by Date filed */
                        // echo 'fecha';
                        $date_search = trim($value2);
                        $date_global = explode("...", $date_search);
                        $date_from = $date_global[0];
                        $date_to = $date_global[1];
                        $key_searching = '   ( ' . $key2 . '  BETWEEN  ';
                        $date_searching = $key_searching . ' \'' . $date_from . '\' AND  \'' . $date_to . '\')';
                    }
                    $i++;
                }
            }

            $j = 0;
            if (isset($criterion)) {
                foreach ($criterion as $key3 => $value3) {
                    foreach ($value3 as $key4 => $value4) {

                        if (!$flag_id_empty) {
                            $where .= $key4 . ' ' . $value4;
                            $flag_id_empty = TRUE;
                            $j++;
                            continue;
                        }
                        if (!$flag_field_empty) {
                            if ($j == 0) {
                                $where .= $key4 . ' ' . $value4;
                            }
                            if ($j > 0) {
                                $where .= ' OR ' . $key4 . ' ' . $value4;
                            }
                        }
                        $j++;
                    }
                }
            }

            /* for ($i = 0; $i < 5; ++$i) {
              if ($i == 2)
              continue
              print "$i\n";
              } */

            /* $stack = array('first', 'second', 'third', 'fourth', 'fifth');
              foreach ($stack AS $v) {
              if ($v == 'second')
              continue;
              if ($v == 'fourth')
              break;
              echo $v . '<br>';
              } */



            if ((!$flag_field_empty || !$flag_id_empty) && $date_searching != '') {
                $date_searching = " AND " . $date_searching;
            }

            $query1 = "SELECT  COUNT(*) from traslation_head th
                        LEFT JOIN traslation_details td on th.trasl_id=td.trasl_id
                        LEFT JOIN prison_person ppl    on  td.prison_per_id=ppl.id_sgp
                        LEFT JOIN traslation_type typ  on  th.trasl_type_id= typ.trasl_type_id
                        LEFT JOIN center_crs crss     on  th.crs_id_source= crss.crs_id
                        LEFT JOIN center_crs crsd     on  th.crs_id_destination= crsd.crs_id
                        LEFT JOIN user_login usr     on  th.trasl_analyzed_by= usr.usr_id WHERE   " . $where . $date_searching;
            $query2 = "SELECT th.trasl_id,th.trasl_date_request,
                        case
                        when th.trasl_state_process ='START'  then 'INICIO'
                        when th.trasl_state_process ='SENT'  then 'ENVIADO'
                        when th.trasl_state_process ='APPROVED'  then 'APROBADO'
                        when th.trasl_state_process ='REVISION'  then 'REVISION'
                        when th.trasl_state_process ='EXECUTED'  then 'FINALIZADO'
                        when th.trasl_state_process ='AUTHORIZED'  then 'AUTORIZADO'
                        else 'SIN ESTADO'
                        end AS status, th.trasl_descripcion,ppl.prison_per_identification,ppl.prison_per_name
                        ,	ppl.prison_per_lastname,ppl.sex,	ppl.prontuario,	ppl.status_sgp,	typ.trasl_type_descripcion
                        ,crss.crs_description as crs_andigen, crsd.crs_description as crs_destino,usr.usr_name as name_analyst
                        ,usr.usr_lasname as lastname_analyst,($query1 ) as total
                         from traslation_head th
                        LEFT JOIN traslation_details td on th.trasl_id=td.trasl_id
                        LEFT JOIN prison_person ppl    on  td.prison_per_id=ppl.id_sgp
                        LEFT JOIN traslation_type typ  on  th.trasl_type_id= typ.trasl_type_id
                        LEFT JOIN center_crs crss     on  th.crs_id_source= crss.crs_id
                        LEFT JOIN center_crs crsd     on  th.crs_id_destination= crsd.crs_id
                        LEFT JOIN user_login usr     on  th.trasl_analyzed_by= usr.usr_id WHERE  " . $where . $date_searching . ";";
       /* }*/ 
       //echo ''.$query2;
        return $query2;
    }

}
