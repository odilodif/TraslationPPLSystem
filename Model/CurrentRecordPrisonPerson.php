<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of CurrentRecordPrisonPerson
 *
 * @author odilo
 */
include_once './../Model/ISurfMove.php';
class CurrentRecordPrisonPerson implements ISurfMove {
    private $id_ppl;
    public function __construct($idppl) {        
        $this->id_ppl=$idppl;
    }
    public function FielsEmpty() {
        $query="SELECT ppl.id, ppl.name, ppl.last_name, ' ' as file_id 
	,	'' as file_path,' ' as file_description_name
		from prison_person ppl  WHERE ppl.id= $this->id_ppl;";
        
        return $query;
    }

    public function move1() {      
        $query="SELECT ppl.id, ppl.name, ppl.last_name,fd.file_id
	,	fd.file_path,fd.file_description_name
		from prison_person ppl 
		INNER JOIN file_document fd ON ppl.id=fd.prison_per_id
		WHERE ppl.id = $this->id_ppl and fd.file_state='t';";         
        return $query;
    }

    public function move2() {
         $query="";
        return $query;
    }

//put your code here
}
