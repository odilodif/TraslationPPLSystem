<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

if ($_POST['Menu'] === 'ListMenu') {
    include_once ('./../Model/Menu.php');
    include_once ('./../Model/ProfileSaved.php');
    $idUsrSgp = $_POST['idUsrSgp'];
    $result;
    $menu = new Menu();
    $profile_saved = new ProfileSaved();
    $menu_list_usr = $profile_saved->readByUser($idUsrSgp);
    $menu_list = $menu->listAll();
    if ($menu_list_usr[0]['success']) {
        foreach ($menu_list as $key1 => $row_nenu) {
            foreach ($menu_list_usr as $key2 => $row_menu_profile) {
                if ($row_nenu['menu_description_id'] == $row_menu_profile['menu_description_id']) {
                    $menu_list[$key1]['check'] = TRUE;
                    break;
                }
            }
        }
    }

    echo json_encode($menu_list);
}