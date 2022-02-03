<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Prison_Person_Sgp
 *
 * @author odilo
 */
include_once './../Model/connection.php';
include_once './../Model/ICrud.php';

class Prison_Person_Sgp extends Connection implements ICrud {

    private $id;
    private $create_uid;
    private $create_date;
    private $write_date;
    private $write_uid;
    private $last_name;
    private $city_id;
    private $image;
    private $type_crime_id;
    private $tipo_identificador;
    private $sex;
    private $data_registro_civil;
    private $verificado;
    private $etapa_id;
    private $tiene_dactiloscopia;
    private $religion_id;
    private $location_id;
    private $country_id;
    private $crime_id;
    private $name;
    private $parish_id;
    private $date_in;
    private $state;
    private $lang_id;
    private $civil_state;
    private $etnia_id;
    private $center_id;
    private $permite_visitas;
    private $senescyt;
    private $pabellon_id;
    private $group_crime_id;
    private $prontuario;
    private $dias_pendientes_moved0;
    private $canton_id;
    private $image_medium;
    private $piso_id;
    private $ala_id;
    private $image_small;
    private $dias_total_moved0;
    private $level_of_education;
    private $birth_date;
    private $state_id;
    private $identificador;
    private $en_transito;
    private $verified_name;
    private $verified_identificador;
    private $verified_last_name;
    private $image2;
    private $image1;
    private $image0;
    private $Nacionalidad;
    private $LugarNacimiento;
    private $ppl_protegido;
    private $last_date_out;
    private $deuda_apremio;
    private $dias_sancion;
    private $drug_seize;
    private $precautionary_judgment;
    private $disability;
    private $precautionary_address;
    private $crime_str;
    private $arresto_domiciliario;
    private $precautionary_type;
    private $precautionary_judge;
    private $state_before_escape;
    private $work_activity;
    private $precautionary_time;
    private $has_medical_record;
    private $has_family_structure;
    private $working;
    private $type_disability;
    private $has_disability;
    private $regimen;
    private $ult_centro;
    private $alias_id;
    private $strategy;
    private $query;

    function getStrategy() {
        return $this->strategy;
    }

    function getQuery() {
        return $this->query;
    }

    function setStrategy($strategy) {
        $this->strategy = $strategy;
    }

    function setQuery($query) {
        $this->query = $query;
    }

    function getId() {
        return $this->id;
    }

    function getCreate_uid() {
        return $this->create_uid;
    }

    function getCreate_date() {
        return $this->create_date;
    }

    function getWrite_date() {
        return $this->write_date;
    }

    function getWrite_uid() {
        return $this->write_uid;
    }

    function getLast_name() {
        return $this->last_name;
    }

    function getCity_id() {
        return $this->city_id;
    }

    function getImage() {
        return $this->image;
    }

    function getType_crime_id() {
        return $this->type_crime_id;
    }

    function getTipo_identificador() {
        return $this->tipo_identificador;
    }

    function getSex() {
        return $this->sex;
    }

    function getData_registro_civil() {
        return $this->data_registro_civil;
    }

    function getVerificado() {
        return $this->verificado;
    }

    function getEtapa_id() {
        return $this->etapa_id;
    }

    function getTiene_dactiloscopia() {
        return $this->tiene_dactiloscopia;
    }

    function getReligion_id() {
        return $this->religion_id;
    }

    function getLocation_id() {
        return $this->location_id;
    }

    function getCountry_id() {
        return $this->country_id;
    }

    function getCrime_id() {
        return $this->crime_id;
    }

    function getName() {
        return $this->name;
    }

    function getParish_id() {
        return $this->parish_id;
    }

    function getDate_in() {
        return $this->date_in;
    }

    function getState() {
        return $this->state;
    }

    function getLang_id() {
        return $this->lang_id;
    }

    function getCivil_state() {
        return $this->civil_state;
    }

    function getEtnia_id() {
        return $this->etnia_id;
    }

    function getCenter_id() {
        return $this->center_id;
    }

    function getPermite_visitas() {
        return $this->permite_visitas;
    }

    function getSenescyt() {
        return $this->senescyt;
    }

    function getPabellon_id() {
        return $this->pabellon_id;
    }

    function getGroup_crime_id() {
        return $this->group_crime_id;
    }

    function getProntuario() {
        return $this->prontuario;
    }

    function getDias_pendientes_moved0() {
        return $this->dias_pendientes_moved0;
    }

    function getCanton_id() {
        return $this->canton_id;
    }

    function getImage_medium() {
        return $this->image_medium;
    }

    function getPiso_id() {
        return $this->piso_id;
    }

    function getAla_id() {
        return $this->ala_id;
    }

    function getImage_small() {
        return $this->image_small;
    }

    function getDias_total_moved0() {
        return $this->dias_total_moved0;
    }

    function getLevel_of_education() {
        return $this->level_of_education;
    }

    function getBirth_date() {
        return $this->birth_date;
    }

    function getState_id() {
        return $this->state_id;
    }

    function getIdentificador() {
        return $this->identificador;
    }

    function getEn_transito() {
        return $this->en_transito;
    }

    function getVerified_name() {
        return $this->verified_name;
    }

    function getVerified_identificador() {
        return $this->verified_identificador;
    }

    function getVerified_last_name() {
        return $this->verified_last_name;
    }

    function getImage2() {
        return $this->image2;
    }

    function getImage1() {
        return $this->image1;
    }

    function getImage0() {
        return $this->image0;
    }

    function getNacionalidad() {
        return $this->Nacionalidad;
    }

    function getLugarNacimiento() {
        return $this->LugarNacimiento;
    }

    function getPpl_protegido() {
        return $this->ppl_protegido;
    }

    function getLast_date_out() {
        return $this->last_date_out;
    }

    function getDeuda_apremio() {
        return $this->deuda_apremio;
    }

    function getDias_sancion() {
        return $this->dias_sancion;
    }

    function getDrug_seize() {
        return $this->drug_seize;
    }

    function getPrecautionary_judgment() {
        return $this->precautionary_judgment;
    }

    function getDisability() {
        return $this->disability;
    }

    function getPrecautionary_address() {
        return $this->precautionary_address;
    }

    function getCrime_str() {
        return $this->crime_str;
    }

    function getArresto_domiciliario() {
        return $this->arresto_domiciliario;
    }

    function getPrecautionary_type() {
        return $this->precautionary_type;
    }

    function getPrecautionary_judge() {
        return $this->precautionary_judge;
    }

    function getState_before_escape() {
        return $this->state_before_escape;
    }

    function getWork_activity() {
        return $this->work_activity;
    }

    function getPrecautionary_time() {
        return $this->precautionary_time;
    }

    function getHas_medical_record() {
        return $this->has_medical_record;
    }

    function getHas_family_structure() {
        return $this->has_family_structure;
    }

    function getWorking() {
        return $this->working;
    }

    function getType_disability() {
        return $this->type_disability;
    }

    function getHas_disability() {
        return $this->has_disability;
    }

    function getRegimen() {
        return $this->regimen;
    }

    function getUlt_centro() {
        return $this->ult_centro;
    }

    function getAlias_id() {
        return $this->alias_id;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setCreate_uid($create_uid) {
        $this->create_uid = $create_uid;
    }

    function setCreate_date($create_date) {
        $this->create_date = $create_date;
    }

    function setWrite_date($write_date) {
        $this->write_date = $write_date;
    }

    function setWrite_uid($write_uid) {
        $this->write_uid = $write_uid;
    }

    function setLast_name($last_name) {
        $this->last_name = $last_name;
    }

    function setCity_id($city_id) {
        $this->city_id = $city_id;
    }

    function setImage($image) {
        $this->image = $image;
    }

    function setType_crime_id($type_crime_id) {
        $this->type_crime_id = $type_crime_id;
    }

    function setTipo_identificador($tipo_identificador) {
        $this->tipo_identificador = $tipo_identificador;
    }

    function setSex($sex) {
        $this->sex = $sex;
    }

    function setData_registro_civil($data_registro_civil) {
        $this->data_registro_civil = $data_registro_civil;
    }

    function setVerificado($verificado) {
        $this->verificado = $verificado;
    }

    function setEtapa_id($etapa_id) {
        $this->etapa_id = $etapa_id;
    }

    function setTiene_dactiloscopia($tiene_dactiloscopia) {
        $this->tiene_dactiloscopia = $tiene_dactiloscopia;
    }

    function setReligion_id($religion_id) {
        $this->religion_id = $religion_id;
    }

    function setLocation_id($location_id) {
        $this->location_id = $location_id;
    }

    function setCountry_id($country_id) {
        $this->country_id = $country_id;
    }

    function setCrime_id($crime_id) {
        $this->crime_id = $crime_id;
    }

    function setName($name) {
        $this->name = $name;
    }

    function setParish_id($parish_id) {
        $this->parish_id = $parish_id;
    }

    function setDate_in($date_in) {
        $this->date_in = $date_in;
    }

    function setState($state) {
        $this->state = $state;
    }

    function setLang_id($lang_id) {
        $this->lang_id = $lang_id;
    }

    function setCivil_state($civil_state) {
        $this->civil_state = $civil_state;
    }

    function setEtnia_id($etnia_id) {
        $this->etnia_id = $etnia_id;
    }

    function setCenter_id($center_id) {
        $this->center_id = $center_id;
    }

    function setPermite_visitas($permite_visitas) {
        $this->permite_visitas = $permite_visitas;
    }

    function setSenescyt($senescyt) {
        $this->senescyt = $senescyt;
    }

    function setPabellon_id($pabellon_id) {
        $this->pabellon_id = $pabellon_id;
    }

    function setGroup_crime_id($group_crime_id) {
        $this->group_crime_id = $group_crime_id;
    }

    function setProntuario($prontuario) {
        $this->prontuario = $prontuario;
    }

    function setDias_pendientes_moved0($dias_pendientes_moved0) {
        $this->dias_pendientes_moved0 = $dias_pendientes_moved0;
    }

    function setCanton_id($canton_id) {
        $this->canton_id = $canton_id;
    }

    function setImage_medium($image_medium) {
        $this->image_medium = $image_medium;
    }

    function setPiso_id($piso_id) {
        $this->piso_id = $piso_id;
    }

    function setAla_id($ala_id) {
        $this->ala_id = $ala_id;
    }

    function setImage_small($image_small) {
        $this->image_small = $image_small;
    }

    function setDias_total_moved0($dias_total_moved0) {
        $this->dias_total_moved0 = $dias_total_moved0;
    }

    function setLevel_of_education($level_of_education) {
        $this->level_of_education = $level_of_education;
    }

    function setBirth_date($birth_date) {
        $this->birth_date = $birth_date;
    }

    function setState_id($state_id) {
        $this->state_id = $state_id;
    }

    function setIdentificador($identificador) {
        $this->identificador = $identificador;
    }

    function setEn_transito($en_transito) {
        $this->en_transito = $en_transito;
    }

    function setVerified_name($verified_name) {
        $this->verified_name = $verified_name;
    }

    function setVerified_identificador($verified_identificador) {
        $this->verified_identificador = $verified_identificador;
    }

    function setVerified_last_name($verified_last_name) {
        $this->verified_last_name = $verified_last_name;
    }

    function setImage2($image2) {
        $this->image2 = $image2;
    }

    function setImage1($image1) {
        $this->image1 = $image1;
    }

    function setImage0($image0) {
        $this->image0 = $image0;
    }

    function setNacionalidad($Nacionalidad) {
        $this->Nacionalidad = $Nacionalidad;
    }

    function setLugarNacimiento($LugarNacimiento) {
        $this->LugarNacimiento = $LugarNacimiento;
    }

    function setPpl_protegido($ppl_protegido) {
        $this->ppl_protegido = $ppl_protegido;
    }

    function setLast_date_out($last_date_out) {
        $this->last_date_out = $last_date_out;
    }

    function setDeuda_apremio($deuda_apremio) {
        $this->deuda_apremio = $deuda_apremio;
    }

    function setDias_sancion($dias_sancion) {
        $this->dias_sancion = $dias_sancion;
    }

    function setDrug_seize($drug_seize) {
        $this->drug_seize = $drug_seize;
    }

    function setPrecautionary_judgment($precautionary_judgment) {
        $this->precautionary_judgment = $precautionary_judgment;
    }

    function setDisability($disability) {
        $this->disability = $disability;
    }

    function setPrecautionary_address($precautionary_address) {
        $this->precautionary_address = $precautionary_address;
    }

    function setCrime_str($crime_str) {
        $this->crime_str = $crime_str;
    }

    function setArresto_domiciliario($arresto_domiciliario) {
        $this->arresto_domiciliario = $arresto_domiciliario;
    }

    function setPrecautionary_type($precautionary_type) {
        $this->precautionary_type = $precautionary_type;
    }

    function setPrecautionary_judge($precautionary_judge) {
        $this->precautionary_judge = $precautionary_judge;
    }

    function setState_before_escape($state_before_escape) {
        $this->state_before_escape = $state_before_escape;
    }

    function setWork_activity($work_activity) {
        $this->work_activity = $work_activity;
    }

    function setPrecautionary_time($precautionary_time) {
        $this->precautionary_time = $precautionary_time;
    }

    function setHas_medical_record($has_medical_record) {
        $this->has_medical_record = $has_medical_record;
    }

    function setHas_family_structure($has_family_structure) {
        $this->has_family_structure = $has_family_structure;
    }

    function setWorking($working) {
        $this->working = $working;
    }

    function setType_disability($type_disability) {
        $this->type_disability = $type_disability;
    }

    function setHas_disability($has_disability) {
        $this->has_disability = $has_disability;
    }

    function setRegimen($regimen) {
        $this->regimen = $regimen;
    }

    function setUlt_centro($ult_centro) {
        $this->ult_centro = $ult_centro;
    }

    function setAlias_id($alias_id) {
        $this->alias_id = $alias_id;
    }

    function executeMove1() {
        $this->query = $this->strategy->move1();
    }

    public function __construct() {
        parent::__construct();
    }

    /* Execute Only Traslations/*
     * 
     */

    function executeMove2() {

        $this->query = $this->strategy->move2();
    }

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

     public function listByParameterFileds($identification) {
        $info=NULL;
         try {
                  
            Connection::getInstance()->getConnection();
            // echo 'test';
            $query = "SELECT id,name,last_name,identificador,sex,prontuario,state FROM prison_person WHERE identificador LIKE '%$identification%' AND state <> 'free'  ORDER BY id limit 4 OFFSET 0 ;";
            //echo ''.$query;
            /*
            id	
             * name	
             * last_name	
             * identificador	
             * sex	
             * prontuario	
             * state
            */
            
            $this->rs = parent::execute_sgp($query);
            if ($this->rs) {
                while ($row = pg_fetch_row($this->rs)) {
                    $info[] = array(
                        'success' => TRUE,
                        'prison_per_id' => $row[0],
                        'prison_per_name' => $row[1],
                        'prison_per_lastname' => $row[2],
                        'prison_per_identification' => $row[3],
                        'prison_per_sex' => $row[4], 
                        'prison_per_prontuario' => $row[5],
                        'prison_per_state' => $row[6]
                      
                    );
                }
                return $info;
            } else {

                return array('success' => FALSE, 'message' => 'error al consultar lista PPLs');
            }
        } catch (Exception $ex) {
            return array('success' => FALSE, 'message' => 'error al consultar lista' . $ex->getMessage());
        } finally {
            /*parent::closeConnection();*/
        }
    }

//put your code here
}
