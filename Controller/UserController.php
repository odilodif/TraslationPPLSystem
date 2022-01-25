<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
/**
 * Description of conection
 *
 *
 * @author Odilo Ipiales
 */
/* * ********Connection to DDBB */
include_once ('./../Model/User.php');

if (isset($_POST['nick']) && isset($_POST['password'])) {
    if ($_POST['User'] === 'login') {
        include_once ('./../Utilitarian/php/Ldap.php');
        $nick = $_POST['nick'];
        $pass = $_POST['password'];
        $ldap = new Ldap();
        $autentication = $ldap->ldap_consult($nick, $pass);

        if ($autentication['autentication'] && !empty($autentication['profiles'])) {/* If exists roles and ldap */
            session_start();
            $roles = $autentication['profiles'];
            $_SESSION['_USU'] = $roles;
            /* If exists roles and permissions */
            if ((boolean) $roles[0]['success'] && !empty($_SESSION['_USU'])) {
                if (!isset($_SESSION['_USU'])) {
                    session_start();
                    $_SESSION['_USU'] = $roles;
                    echo json_encode($roles);
                }
                $_SESSION['_USU'] = $roles;
                echo json_encode($roles);
            }
        } else if ($autentication['autentication'] && empty($autentication['profiles'])) {/* Wheather no roles then only autentication */
            if (!isset($_SESSION['_USU'])) {
                session_start();
            }
            $autentication_user[] = array('success' => TRUE, 'usr_name' => $autentication['name_complete'], 'messages' => 'El usuario no tiene asisgnado centro, perfiles,roles');
            $_SESSION['_USU'] = $autentication_user;
            echo json_encode($autentication_user);
        } else {/* autentication no valid */

            $fail2[] = array('success' => FALSE, 'message' => 'Error ..! El usuario no existe en el AD ');
            echo json_encode($fail2);
        }
    }
}
if ($_POST['User'] === 'listDirectorsPlntCtral') {
    $user = new User();
    $usr = $user->listDirectorsPlantCtrl();
    if ($usr[0]['success']) {
        echo json_encode($usr);
    } else {
        echo json_encode($usr);
    }
}

if ($_POST['User'] === 'listUsers') {
    $user = new User();
    $usrList = $user->listAll();
    echo json_encode($usrList);
}

if ($_POST['User'] === 'loadUserForm') {
    $user = new User();
    $id_Sgp = $_POST['id_Sgp'];
    $usr = $user->getUserByIdSgp($id_Sgp);
    echo json_encode($usr);
}

if (isset($_POST['action'])) {
    if ($_POST['action'] === 'updateProfileByidUsrSgp') {
        $user = new User();
        $idUsrSgp = $_POST['idUsrSgp'];
        $idProfile = $_POST['idProfile'];
        $rs = $user->updateProfileByidUsrSgp($idUsrSgp, $idProfile);
        echo json_encode($rs);
    }
}

    