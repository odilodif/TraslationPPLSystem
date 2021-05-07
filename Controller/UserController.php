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

if (isset($_POST['nick']) && isset($_POST['password'])) {
    if ($_POST['User'] === 'login') {
        include_once ('./../Utilitarian/php/Ldap.php');
        include_once ('./../Model/User.php');
        $nick = $_POST['nick'];
        $pass = $_POST['password'];
        $ldap = new Ldap();
        $autentication = $ldap->ldap_consult($nick, $pass);
        if ($autentication['autentication'] && $autentication['profiles'] != null) {/* If exists roles and ldap */
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
            } else if ($autentication['autentication'] && $autentication['profiles'] == null) {/* Wheather no roles then only autentication */
                $autentication_user[] = array('success' => TRUE, 'usr_name' => $autentication['name_complete']);
                $_SESSION['_USU'] = $autentication_user;
                echo json_encode($autentication_user);
            } else {/* autentication no valid */

                $fail2[] = array('success' => FALSE, 'message' => 'Error ..! El usuario no existe en el AD ');
                echo json_encode($fail2);
            }
        }
    }
}
if ($_POST['User'] === 'listDirectorsPlntCtral') {
    include_once ('./../Model/User.php');
    $user = new User();
    $usr = $user->listDirectorsPlantCtrl();
    if ($usr[0]['success']) {
        echo json_encode($usr);
    } else {
        echo json_encode($usr);
    }
}
    