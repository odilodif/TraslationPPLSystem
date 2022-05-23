<?php

date_default_timezone_set('America/Guayaquil');
include_once ('./../Model/Bsg.php');
if (isset($_POST['PrisionPerson'])) {
    include_once ('./../Model/PrisonPerson.php');
    if ($_POST['PrisionPerson'] === 'PrisonPersonList') {
        $prison_person = new PrisonPerson();
        $list = $prison_person->listAll();
        if ($list[0]['success']) {
            echo json_encode($list);
        } else {
            echo json_encode($list);
        }
    }

    if ($_POST['PrisionPerson'] === 'createPrisonPerson') {
        $prison_person = new PrisonPerson();
        if (isset($_POST['ppls'])) {
            $list = $_POST['ppls'];
            $result;
            $i = 0;
            foreach ($list as $key => $value) {
                $trasl_id = $_POST['trasl_id'];
                $name = $value['name'];
                $lastname = $value['lastname'];
                $identification = $value['identification'];
                $result = $prison_person->create("INSERT INTO prison_person "
                        . "(prison_per_name,prison_per_lastname,prison_per_identification,trasl_id,prison_per_state)"
                        . " VALUES( '$name' ,'$lastname','$identification',$trasl_id,'t');");
                $i++;
            }
            //echo 'resul'.$result['message'];
            if ($result['success']) {
                $res = array('success' => TRUE, 'message' => 'PPL Creado',
                    'nro' => $i
                );
                echo json_encode($res);
            } else {
                $res = array('success' => FALSE,
                    'message' => 'PPL No Creado',
                    'nro' => '0'
                );
                echo json_encode($res);
            }
        }
    }

    if ($_POST['PrisionPerson'] === 'callPPL') {
        $prison_person = new PrisonPerson();
        $opbtnAct = $_POST['btnmove'];

        switch ($opbtnAct) {
            case 'current':
                include_once ('./../Model/CurrentRecordPrisonPerson.php');
                $prison_person->setStrategy(new CurrentRecordPrisonPerson($_POST['id_ppl']));
                $prison_person->executeMove1();
                $info = $prison_person->getMove($prison_person->getQuery());
                //echo ''.$info['success'];
                if ($info[0]['success']) {
                    echo json_encode($info);
                } else {
                    $prison_person->executeEmpty();
                    $info_empty = $prison_person->getMove($prison_person->getQuery());
                    if ($info_empty[0]['success']) {

                        echo json_encode($info_empty);
                    } else {
                        echo json_encode($info_empty);
                    }
                }

                break;

            default:
                break;
        }
    }


    if ($_POST['PrisionPerson'] === 'updatePPL') {

        $prison_person = new PrisonPerson();
        $prison_person->setPrison_per_observations($_POST['observations']);
        $prison_person->setPrison_per_id($_POST['idppl']);
        $ppl = $prison_person->updateObservatios();
        if ($ppl['success']) {
            echo json_encode($ppl);
        } else {
            echo json_encode($ppl);
        }
    }

    if ($_POST['PrisionPerson'] === 'callPPLListFiles') {
        $prison_person = new PrisonPerson();
        $ppl = $prison_person->readPrisonPersonByFiles($_POST['id_ppl']);
        if ($ppl[0]['success']) {
            echo json_encode($ppl);
        } else {
            echo json_encode($ppl);
        }
    }

    if ($_POST['PrisionPerson'] === 'listPPL') {
        $prison_person = new PrisonPerson();
        $crs_id = $_POST['crs_id'];
        $ppl = $prison_person->listAllWithCrs($crs_id);
        if ($ppl[0]['success']) {
            echo json_encode($ppl);
        } else {
            echo json_encode($ppl);
        }
    }

    if ($_POST['PrisionPerson'] === 'IF_Exist_PPL') {
        $prison_person = new PrisonPerson();
        if (isset($_POST['trasl_details'])) {
            $list = $_POST['trasl_details'];

            $result = $prison_person->ifExistsPPL($list);
        }
        if ($result['success']) {
            echo json_encode($result);
        } else {
            echo json_encode($result);
        }
    }

    if ($_POST['PrisionPerson'] === 'savePPL') {
        include_once ('./../Model/PrisonPerson.php');
        $ppl = new PrisonPerson();
        /* $result = $ppl->create($_POST['txtIdentification'], $_POST['txtName'], $_POST['txtLastname']); */
        $name = $_POST['name'];
        $lastname = $_POST['name'];
        $identification = $_POST['ced'];
        $result = $ppl->create("INSERT INTO prison_person "
                . "(prison_per_name,prison_per_lastname,prison_per_identification,prison_per_state)"
                . " VALUES( '$name' ,'$lastname','$identification','t');");
        if ($result['success']) {
            echo json_encode($result);
        } else {
            echo json_encode($result);
        }
    }

    if ($_POST['PrisionPerson'] === 'editPPL') {
        $prison_person = new PrisonPerson();
        $result = $prison_person->updateByParam($_POST['ppl_id'], $_POST['name'], $_POST['lastname']);

        if ($result['success']) {
            echo json_encode($result);
        } else {
            echo json_encode($result);
        }
    }

    if ($_POST['PrisionPerson'] === 'editLoadForm') {
        $prison_person = new PrisonPerson();
        $result = $prison_person->loadFormEdit($_POST['ppl_id']);

        if ($result['success']) {
            echo json_encode($result);
        } else {
            echo json_encode($result);
        }
    }

    if ($_POST['PrisionPerson'] === 'deletePrinsonPerson') {
        $prison_person = new PrisonPerson();
        $result = $prison_person->deleteBolleanPPL($_POST['id_ppl']);

        if ($result['success']) {
            echo json_encode($result);
        } else {
            echo json_encode($result);
        }
    }

    if ($_POST['PrisionPerson'] === 'searchPrisonPerson') {
        $cedula = $_POST['cedula'];
        $bsg = new Bsg();        
        $result = $bsg->obtenerDatosDePaciente($cedula);
        $data_bsg=$result['return'];
       echo json_encode($data_bsg);
       //var_dump($data_bsg);
    }
}


/* * ****************************AUTOCOMPLETE*********************************************** */

if (isset($_POST['term'])) {
    include_once ('./../Model/Prison_Person_Sgp.php');
    /* $ppl = new PrisonPerson(); */
    $ppl = new Prison_Person_Sgp();
    $info = $ppl->listByParameterFileds(trim($_POST['term']));
    //echo $info;
    if ($info[0]['success']) {
        echo json_encode($info);
        //return $info;
    } else {
        echo json_encode($info);
    }
}
