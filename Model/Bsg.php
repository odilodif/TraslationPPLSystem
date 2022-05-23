<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

/**
 * Description of Bsg
 *
 * @author odilo
 */
include_once './../Model/connection.php';
include_once './../Model/ICrud.php';

class Bsg extends Connection {
    /* The Contructor */

    public function __construct() {
        parent::__construct();
    }

    public function obtenerDatosDePaciente($cedula) {
        $servicio = "https://www.bsg.gob.ec/sw/RC/BSGSW03_Consultar_Ciudadano?wsdl"; //url del servicio RC
        $servicio1 = "https://www.bsg.gob.ec/sw/STI/BSGSW08_Acceder_BSG?wsdl";  //url del servicio BSG
        $par = array();
        $parametros1 = array(); //parametros de la llamada
        $parametros1["Cedula"] = "1309540779"; // cedula de acceso
        $parametros1["Urlsw"] = "https://www.bsg.gob.ec/sw/RC/BSGSW03_Consultar_Ciudadano?wsdl";
        $parametros2["ValidarPermisoPeticion"] = $parametros1;
        $client1 = new SoapClient($servicio1, $par);
        $error = 0;
        try {
            $info1 = $client1->ValidarPermiso($parametros2);
        } catch (SoapFault $fault) {
            $error = 1;
            print(" 
            alert(' ERROR: " . $fault->faultcode . "-" . $fault->faultstring . ".'); 
            ");
        }

        $info2 = $this->obj2array($info1);
        $result = $info2["return"];
        $digest = $result["Digest"];
        $nonce = $result["Nonce"];
        $fecha1 = $result["Fecha"];
        $fecha2 = $result["FechaF"];     

        $client = new SoapClient($servicio, $par);
        $ap_param = array();
        $ap_param['CodigoInstitucion'] = "3";
        $ap_param['CodigoAgencia'] = "106";
        $ap_param['NUI'] = $cedula;
        $ap_param['Usuario'] = "minjus1";
        $ap_param['Contrasenia'] = "qsP=cnY7.jD2";

        $ap_param2['BusquedaPorCedula'] = $ap_param;
        $ns = "http://docs.oasis-open.org/wss/2004/01/oasis-200401-wss-wssecurity-secext-1.0.xsd";
        $user = "1309540779";
        $xml2 = '<wss:Security xmlns:wss="http://docs.oasis-open.org/wss/2004/01/oasis-200401-wss-wssecurity-secext-1.0.xsd">
        <wss:UsernameToken>
            <wss:Username>' . $user . '</wss:Username>
            <wss:Password Type="http://docs.oasis-open.org/wss/2004/01/oasis-200401-wss-username-token-profile-1.0#PasswordDigest">' . $digest . '</wss:Password>
            <wss:Nonce EncodingType="http://docs.oasis-open.org/wss/2004/01/oasis-200401-wss-soap-message-security-1.0#Base64Binary">' . $nonce . '</wss:Nonce>
            <wsu:Created xmlns:wsu="http://docs.oasis-open.org/wss/2004/01/oasis-200401-wss-wssecurity-utility-1.0.xsd">' . $fecha1 . '</wsu:Created>
         </wss:UsernameToken>
       <wsu:Timestamp xmlns:wsu="http://docs.oasis-open.org/wss/2004/01/oasis-200401-wss-wssecurity-utility-1.0.xsd" wsu:Id="Timestamp-2">
       <wsu:Created>' . $fecha1 . '</wsu:Created>
       <wsu:Expires>' . $fecha2 . '</wsu:Expires>
      </wsu:Timestamp> 
      </wss:Security>';

        $headVar = new SoapVar($xml2, XSD_ANYXML);

        $headers = new SoapHeader('http://docs.oasis-open.org/wss/2004/01/oasis-200401-wss-wssecurity-secext-1.0.xsd', 'Security', $headVar, true);

        $error = 0;
        try {
            $client->__setSoapHeaders($headers);

            $info = $client->__call('BusquedaPorNui', $ap_param2);
        } catch (SoapFault $fault) {
            $error = 1;
        }


        $res = $this->obj2array($info);
        return $res;
        /* echo '<br> <br>  ';
          print_r($res);
          echo '</br>--------------- RETURN DATA ---------------- </br> <br><br> ';
          echo json_encode($res); */

        /* $arr=array('cedula'=>$res['NUI'],'CondicionCedulado'=>$res['CondicionCedulado'],
          'FechaNacimiento'=>$res['FechaNacimiento'],'Genero'=>$res['Genero'],
          'LugarNacimiento'=>$res['LugarNacimiento']);
          $objeto[]=$arr; */
    }

    public function obj2array($obj) {
        $out = array();
        foreach ($obj as $key => $val) {
            switch (true) {
                case is_object($val):
                    $out[$key] = $this->obj2array($val);
                    break;
                case is_array($val):
                    $out[$key] = $this->obj2array($val);
                    break;
                default:
                    $out[$key] = $val;
            }
        }
        return $out;
    }

    //aqui se ejcuta 1311625840
    /* obtenerDatosDePaciente("1715488860"); */
    //obtenerDatosDePaciente("1715488860");
}
