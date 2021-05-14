<?php

date_default_timezone_set('America/Guayaquil');
if (isset($_POST['Traslation'])) {
    include_once ('./../Model/Traslation.php');
    if ($_POST['Traslation'] === 'TraslationList') {
        $traslation = new Traslation();
        $crsid = $_POST['crs_id'];
        $list = $traslation->listAllByCrs($crsid);
        if ($list[0]['success']) {
            echo json_encode($list);
        } else {
            echo json_encode($list);
        }
    }

    if ($_POST['Traslation'] === 'createTraslation') {
        $traslation = new Traslation();
        $userid = $_POST['user_id'];
        $crs_source_id = $_POST['crs_source_id'];
        $trasl_date_request = $_POST['trasl_date_request'];
        $profile=$_POST['profile'];
        $result = $traslation->create("VALUES($userid,$crs_source_id,'$trasl_date_request','start','t');");
       
        if ((boolean)$result['success']) {
            echo json_encode($result);
        } else {
            echo json_encode($result);
        }
    }


    if ($_POST['Traslation'] === 'lastTraslation') {
        $traslation = new Traslation();
        $result = $traslation->lastRecording();
        if ($result['success']) {
            echo json_encode($result);
        } else {
            echo json_encode($result);
        }
    }



    if ($_POST['Traslation'] === 'editTraslationDirectorCrs') {
        $traslation = new Traslation();
        $opbtnAct = $_POST['btnmove'];
        switch ($opbtnAct) {
            case 'First':
                include_once ('./../Model/FirstRecord.php');
                $traslation->setStrategy(new FirstRecord($_POST['id_crs']));
                $traslation->executeMove1();

                $info = $traslation->getMove($traslation->getQuery());

                if ($info[0]['success']) {
                    echo json_encode($info);
                } else {
                    $traslation->executeMove2();
                    $info2 = $traslation->getMove($traslation->getQuery());

                    if ($info2[0]['success']) {
                        echo json_encode($info2);
                    } else {
                        $traslation->executeEmpty();
                        $info_empty = $traslation->getMove($traslation->getQuery());
                        echo json_encode($info_empty);
                    }
                }
                break;
            case 'Backward':
                include_once ('./../Model/BackwardRecord.php');
                $traslation->setStrategy(new BackwardRecord($_POST['idTraslation'], $_POST['id_crs']));
                $traslation->executeMove1();
                $info = $traslation->getMove($traslation->getQuery());
                if ($info[0]['success']) {
                    echo json_encode($info);
                } else {
                    $traslation->executeMove2();
                    $info2 = $traslation->getMove($traslation->getQuery());
                    if ($info2[0]['success']) {
                        echo json_encode($info2);
                    } else {
                        $traslation->executeEmpty();
                        $info_empty = $traslation->getMove($traslation->getQuery());

                        echo json_encode($info_empty);
                    }
                }
                break;
            case 'Forward':
                include_once ('./../Model/ForwardRecord.php');
                $traslation->setStrategy(new ForwardRecord($_POST['idTraslation'], $_POST['id_crs']));
                $traslation->executeMove1();

                $info = $traslation->getMove($traslation->getQuery());

                if ($info[0]['success']) {
                    echo json_encode($info);
                } else {
                    $traslation->executeMove2();
                    $info2 = $traslation->getMove($traslation->getQuery());
                    if ($info2[0]['success']) {
                        echo json_encode($info2);
                    } else {
                        $traslation->executeEmpty();
                        $info_empty = $traslation->getMove($traslation->getQuery());
                        if ($info_empty[0]['success']) {
                            echo json_encode($info_empty);
                        } else {
                            echo json_encode($info_empty);
                        }
                    }
                }
                break;

            case 'LastRecord':
                include_once ('./../Model/LastRecord.php');
                $traslation->setStrategy(new LastRecord($_POST['id_crs']));
                $traslation->executeMove1();
                $info = $traslation->getMove($traslation->getQuery());
                if ($info[0]['success']) {
                    echo json_encode($info);
                } else {
                    $traslation->executeMove2();
                    $info2 = $traslation->getMove($traslation->getQuery());

                    if ($info2[0]['success']) {
                        echo json_encode($info2);
                    } else {
                        $traslation->executeEmpty();
                        $info_empty = $traslation->getMove($traslation->getQuery());
                        if ($info_empty[0]['success']) {
                            echo json_encode($info_empty);
                        } else {
                            echo json_encode($info_empty);
                        }
                    }
                }

                break;
            case 'out_crs':
                include_once ('./../Model/CurrentRecordOutCrs.php');
                $traslation->setStrategy(new CurrentRecordOutCrs($_POST['idTraslation']));
                $traslation->executeMove1();
                $info = $traslation->getMove($traslation->getQuery());
                if ($info[0]['success']) {
                    echo json_encode($info);
                } else {
                    $traslation->executeMove2();
                    $info2 = $traslation->getMove($traslation->getQuery());
                    if ($info2[0]['success']) {
                        echo json_encode($info2);
                    } else {
                        $traslation->executeEmpty();
                        $info_empty = $traslation->getMove($traslation->getQuery());

                        if ($info_empty[0]['success']) {

                            echo json_encode($info_empty);
                        } else {
                            echo json_encode($info_empty);
                        }
                    }
                }


                break;
            case 'current':
                include_once ('./../Model/CurrentRecord.php');
                $traslation->setStrategy(new CurrentRecord($_POST['idTraslation'], $_POST['id_crs']));
                $traslation->executeMove1();
                $info = $traslation->getMove($traslation->getQuery());
                if ($info[0]['success']) {
                    echo json_encode($info);
                } else {
                    $traslation->executeMove2();
                    $info2 = $traslation->getMove($traslation->getQuery());
                    if ($info2[0]['success']) {
                        echo json_encode($info2);
                    } else {
                        $traslation->executeEmpty();
                        $info_empty = $traslation->getMove($traslation->getQuery());
                        if ($info_empty[0]['success']) {
                            echo json_encode($info_empty);
                        } else {
                            echo json_encode($info_empty);
                        }
                    }
                }
                break;
        }
    }

    if ($_POST['Traslation'] === 'TraslationListAnalyst') {
        $traslation = new Traslation();
        $traslation->setUsr_id($_POST['usr_id']);
        $result = $traslation->traslationListAnalyst($_POST['type']);
        if ($result[0]['success']) {
            echo json_encode($result);
        } else {
            echo json_encode($result);
        }
    }

    if ($_POST['Traslation'] === 'editTraslationAnalyst') {
        $traslation = new Traslation();
        $traslation->setTrasl_id($_POST['idTraslation']);
        $traslation->setUsr_id($_POST['usr_id']);
        $result = $traslation->editTraslationAnalyst();
        if ($result[0]['success']) {
            echo json_encode($result);
        } else {
            echo json_encode($result);
        }
    }

    if ($_POST['Traslation'] === 'updateTraslationAnalyst') {
        $traslation = new Traslation();
        $traslation->setTrasl_id($_POST['idTraslation']);
        $traslation->setTrasl_observations($_POST['obsAnalys']);
        $traslation->setTrasl_director_assigned($_POST['trasl_director_assigned']);
        $traslation->setUsr_id($_POST['user_id']);
        //echo ''.$_POST['user_id'];

        $result = $traslation->updateObservationsAnalyst();
        if ($result['success']) {
            echo json_encode($result);
        } else {
            echo json_encode($result);
        }
    }


    if ($_POST['Traslation'] === 'TraslationListByApprobe') {
        $traslation = new Traslation();
        //echo ''.$_POST['usr_id'];
        $traslation->setTrasl_approved_by($_POST['usr_id']);
        $list_tral_approbed_aut = $_POST['list_tral_approbed_aut'];
        switch ($list_tral_approbed_aut) {
            case 'approved':
                $result = $traslation->listTaslationPlantCtrl1Approved($_POST['usr_id']);
                if ($result[0]['success']) {
                    echo json_encode($result);
                } else {
                    echo json_encode($result);
                }
                break;
            case 'authorized':

                $result = $traslation->listTaslationPlantCtrl1Authorized($_POST['usr_id']);
                if ($result[0]['success']) {
                    echo json_encode($result);
                } else {
                    echo json_encode($result);
                }
                break;
            case 'executed':
                $result = $traslation->listTaslationPlantCtrl1Executed();
                if ($result[0]['success']) {
                    echo json_encode($result);
                } else {
                    echo json_encode($result);
                }
                break;
            case 'to_approve':
                $traslation->setTrasl_director_assigned($_POST['usr_id']);
                $result = $traslation->listTaslationPlantCtrl1();
                if ($result[0]['success']) {
                    echo json_encode($result);
                } else {
                    echo json_encode($result);
                }
                break;
            case 'to_authorize':
                $result = $traslation->toAuthorize($_POST['direction']);
                if ($result[0]['success']) {
                    echo json_encode($result);
                } else {
                    echo json_encode($result);
                }
                break;
            case 'authorized2':

                $result = $traslation->listAuthorized2($_POST['usr_id']);
                if ($result[0]['success']) {
                    echo json_encode($result);
                } else {
                    echo json_encode($result);
                }
                break;
            case 'executed2':

                $result = $traslation->listExecuted2($_POST['usr_id']);
                if ($result[0]['success']) {
                    echo json_encode($result);
                } else {
                    echo json_encode($result);
                }
                break;
            case 'executed3':

                $result = $traslation->listExecuted3($_POST['usr_id']);
                if ($result[0]['success']) {
                    echo json_encode($result);
                } else {
                    echo json_encode($result);
                }
                break;
            case 'to_execute3':

                $result = $traslation->listToExecute3($_POST['usr_id']);
                if ($result[0]['success']) {
                    echo json_encode($result);
                } else {
                    echo json_encode($result);
                }
                break;

            default:
                /* $result = $traslation->listTaslationPlantCtrl1($_POST['usr_id']);
                  if ($result[0]['success']) {
                  echo json_encode($result);
                  } else {
                  echo json_encode($result);
                  } */
                break;
        }
    }

    /*  if ($_POST['Traslation'] === 'TraslationListApprobed') {
      $traslation = new Traslation();
      $traslation->setTrasl_approved_by($_POST['profile_id']);
      $profileAction = $_POST['profile_action'];
      switch ($profileAction) {
      case 'byExecute':

      $result = $traslation->listTaslationPlantCtrl1Proecess();
      if ($result[0]['success']) {
      echo json_encode($result);
      } else {
      echo json_encode($result);
      }
      break;

      default:
      $result = $traslation->listTaslationPlantCtrl1Approved();
      if ($result[0]['success']) {
      echo json_encode($result);
      } else {
      echo json_encode($result);
      }
      break;
      }
      } */

    /* if ($_POST['Traslation'] === 'TraslationListExecute') {
      $traslation = new Traslation();
      $traslation->setTrasl_profile_assigned($_POST['profile_id']);
      $profileAction = $_POST['profile_action'];
      switch ($profileAction) {
      case 'byExecute':

      $result = $traslation->listTaslationPlantCtrl1Proecess($_POST['usr_id']);
      if ($result[0]['success']) {
      echo json_encode($result);
      } else {
      echo json_encode($result);
      }
      break;

      default:
      $result = $traslation->listTaslationPlantCtrl1Executed();
      if ($result[0]['success']) {
      echo json_encode($result);
      } else {
      echo json_encode($result);
      }
      break;
      }
      } */


    if ($_POST['Traslation'] === 'reviewTraslation') {
        $traslation = new Traslation();
        $result = $traslation->reviewTraslation($_POST['idTraslation']);

        if ($result[0]['success']) {
            echo json_encode($result);
        } else {
            echo "<script>alert('El resultado es nulo')</script>";
        }
    }

    if ($_POST['Traslation'] === 'saveCommentary') {
        $traslation = new Traslation();
        $result = $traslation->updateCommentary($_POST['commnetary'], $_POST['idTraslation']);

        if ($result['success']) {
            echo json_encode($result);
        } else {
            echo json_encode($result);
        }
    }


    if ($_POST['Traslation'] === 'saveTraslationApprobed') {
        $traslation = new Traslation();
        $list = $_POST['listApproved'];
        $i = 0;
        foreach ($list as $key => $value) {
            $trasl_id = $value['trasl_id'];
            $usr_id_approbed = $value['usr_id_approbed'];
            $dirParent = $value['dirParent'];
            $result = $traslation->saveTraslationApprobed($trasl_id, $usr_id_approbed, $dirParent);
            $i++;
        }

        if ($result['success']) {
            $res = array('success' => TRUE, 'message' => 'Traslados Aprobados',
                'nro' => $i
            );
            echo json_encode($res);
        } else {
            $res = array('success' => FALSE,
                'message' => 'No se pudo Aprobar',
                'nro' => '0'
            );
            echo json_encode($res);
        }
    }

    if ($_POST['Traslation'] === 'saveTraslationExecuted') {
        $traslation = new Traslation();
        $list = $_POST['listExecuted'];
        $i = 0;
        foreach ($list as $key => $value) {
            $trasl_id = $value['trasl_id'];
            $usr_id_executed = $value['usr_id_executed'];

            $result = $traslation->saveTraslationExecuted($trasl_id, $usr_id_executed);
            $i++;
        }

        if ($result['success']) {
            $res = array('success' => TRUE, 'message' => 'Traslados Ejecutados',
                'nro' => $i
            );
            echo json_encode($res);
        } else {
            $res = array('success' => FALSE,
                'message' => 'No se pudo Aprobar',
                'nro' => '0'
            );
            echo json_encode($res);
        }
    }


    if ($_POST['Traslation'] === 'saveTraslationAuthorized') {
        $traslation = new Traslation();
        $list = $_POST['listAuthorized'];
        $i = 0;
        foreach ($list as $key => $value) {
            $trasl_id = $value['trasl_id'];
            $usr_id_approbed = $value['usr_id_authorized'];
            $result = $traslation->saveTraslationAuthorized($trasl_id, $usr_id_approbed);
            $i++;
        }

        if ($result['success']) {
            $res = array('success' => TRUE, 'message' => 'Traslados Aprobados',
                'nro' => $i
            );
            echo json_encode($res);
        } else {
            $res = array('success' => FALSE,
                'message' => 'No se pudo Aprobar',
                'nro' => '0'
            );
            echo json_encode($res);
        }
    }


    if ($_POST['Traslation'] === 'ConfirmApprovedTraslation') {
        $traslation = new Traslation();

        $result = $traslation->confirmApprovedTraslation($_POST['idTraslation']);

        if ($result['success']) {
            echo json_encode($result);
        } else {
            echo json_encode($result);
        }
    }

    if ($_POST['Traslation'] === 'deteteTraslation') {
        //  echo 'test';
        $traslation = new Traslation();

        $result = $traslation->deleteTraslation($_POST['itTraslation']);

        if ($result['success']) {
            echo json_encode($result);
        } else {
            echo json_encode($result);
        }
    }

    if ($_POST['Traslation'] === 'Report1') {
        $traslation = new Traslation();
        $result = $traslation->report1();
        if ($result[0]['success']) {
            echo json_encode($result);
        } else {
            echo json_encode($result);
        }
    }

    if ($_POST['Traslation'] === 'Report2') {
        if (isset($_POST['crs']) && isset($_POST['typeT'])) {
            $traslation = new Traslation();
            $query_date = date("Y-m-d");
            $from_ = date('Y-m-01', strtotime($query_date));
            $to_ = date('Y-m-t', strtotime($query_date));
            if ($_POST['crs'] == 0 && $_POST['typeT'] != 0) {
                // echo 'test';
                $result = $traslation->report2TypeT($_POST['from'] != '' ? $_POST['from'] : $from_, $_POST['to'] != '' ? $_POST['to'] : $to_, $_POST['typeT']);
                echo json_encode($result);
            } elseif ($_POST['crs'] != 0 && $_POST['typeT'] == 0) {
                //echo 'test2';
                $result = $traslation->report2Crs($_POST['from'] != '' ? $_POST['from'] : $from_, $_POST['to'] != '' ? $_POST['to'] : $to_, $_POST['crs']);
                echo json_encode($result);
            } elseif ($_POST['crs'] != 0 && $_POST['typeT'] != 0) {
                $result = $traslation->report2CrsTypeT($_POST['from'] != '' ? $_POST['from'] : $from_, $_POST['to'] != '' ? $_POST['to'] : $to_, $_POST['crs'], $_POST['typeT']);
                echo json_encode($result);
            } else {
                //echo 'test3'; 
                $result = $traslation->report2Todos($_POST['from'] != '' ? $_POST['from'] : $from_, $_POST['to'] != '' ? $_POST['to'] : $to_);
                echo json_encode($result);
            }
        }
    }

    if ($_POST['Traslation'] === 'reviewHistory') {
        $traslation = new Traslation();
        $result = $traslation->reviewHistoryPPLCenter($_POST['ppl_id'], $_POST['csr_id']);
        echo json_encode($result);
    }
}

if (isset($_POST['crs_id_destinationEdit'])) {
    include_once ('./../Model/Traslation.php');
    $traslation = new Traslation();
    $traslation->setTrasl_id($_POST['idTraslationEdit']);
    $traslation->setCrs_id_destination($_POST['crs_id_destinationEdit']);
    $info = $traslation->updateTraslByDestination();
    if ($info['success']) {
        $response = array('success' => TRUE, 'message' => 'Datos Guardados Exitosamente');
        echo json_encode($response);
    } else {
        echo json_encode($info);
    }
}

/* if(isset($_POST['btnSent'])){ */
if (isset($_FILES['file_pdf'])) {
    $valid_extensions = array('pdf'); // valid extensions
    $pathUpload = './../View/documents/'; // upload directory
    $pathSave = "View/documents/";
    $img = $_FILES['file_pdf']['name'];
    $tmp = $_FILES['file_pdf']['tmp_name'];
    // get uploaded file's extension
    $ext = strtolower(pathinfo($img, PATHINFO_EXTENSION));
    // can upload same image using rand function    
    $final_image = $img;
    // check's valid format
    if (in_array($ext, $valid_extensions)) {
        $pathUpload = $pathUpload . strtolower($final_image);
        $pathSave = $pathSave . strtolower($final_image);
        if (move_uploaded_file($tmp, $pathUpload)) {
            include_once ('./../Model/Traslation.php');
            $traslation = new Traslation();
            $traslation->setTrasl_id($_POST['idTraslation']);
            $traslation->setTrasl_type_id($_POST['trasl_type_id']);
            $traslation->setTrasl_date_request($_POST['txt_date_request_traslation']);
            $traslation->setCrs_id_destination($_POST['crs_id_destination']);
            $traslation->setTrasl_descripcion($_POST['trasl_descripcion']);
            $traslation->setTrasl_path($pathSave);
            $info = $traslation->sendUpdateTraslation();
            if ($info['success']) {

                include_once ('./mailsnai.php');
                include_once ('./../Model/User.php');
                $mailsnai = new MailSnai();
                $usr = new User();

                $get_mail = $usr->getmailByTypTrasl($_POST['trasl_type_id']);
                $to_address_asesor = 'victor.cozar@atencionintegral.gob.ec';
                $get_rs_mail = $mailsnai->sendMailSnai($get_mail['usr_email'], $to_address_asesor);
                //echo ''.$get_rs_mail;
                $flag_mail = (boolean) $get_rs_mail;
                $response = array('success' => TRUE, 'message' => 'Datos Guardados Exitosamente', 'path' => $pathSave, 'sendmail' => $flag_mail);
                echo json_encode($response);
            } else {
                echo json_encode($info);
            }
        }
    } else {
        $list = array('success' => FALSE, 'message' => 'extension de archivo invalido');
        echo json_encode($list);
    }
}
/* } */




if (isset($_FILES['file_pdf_edit'])) {

    $valid_extensions = array('pdf'); // valid extensions
    $pathUpload = './../View/documents/'; // upload directory
    $pathSave = "View/documents/";
    $img = $_FILES['file_pdf_edit']['name'];
    $tmp = $_FILES['file_pdf_edit']['tmp_name'];
    // get uploaded file's extension
    $ext = strtolower(pathinfo($img, PATHINFO_EXTENSION));
    // can upload same image using rand function    
    $final_image = $img;
    // check's valid format

    if (in_array($ext, $valid_extensions)) {
        $pathUpload = $pathUpload . strtolower($final_image);
        $pathSave = $pathSave . strtolower($final_image);
        if (move_uploaded_file($tmp, $pathUpload)) {
            include_once ('./../Model/Traslation.php');
            $traslation = new Traslation();
            $traslation->setTrasl_id($_POST['idTraslationEdit']);
            $traslation->setTrasl_type_id($_POST['trasl_type_id-edit']);
            $traslation->setTrasl_date_request($_POST['txt_date_request_traslation-edit']);
            $traslation->setCrs_id_destination($_POST['crs_id_destination-edit']);
            $traslation->setTrasl_descripcion($_POST['trasl_descripcion_edit']);
            $traslation->setTrasl_path($pathSave);

            $info = $traslation->sendUpdateTraslation();
            if ($info['success']) {
                $response = array('success' => TRUE, 'message' => 'Datos Guardados Exitosamente', 'path' => $pathSave);
                echo json_encode($response);
            } else {
                echo json_encode($info);
            }
        }
    } else {
        $list = array('success' => FALSE, 'message' => 'extension de archivo invalido');
        echo json_encode($list);
    }
}
?>
