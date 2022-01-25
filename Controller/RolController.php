<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
if ($_POST['Roles'] === 'ListRoles') {
    include_once ('./../Model/Rol.php');
    include_once ('./../Model/Profile.php');
    $idSGP=$_POST['idSGP'];
    $rol = new Rol();
    $listRol = $rol->listAll();
    /*$profile = new Profile();
    $profile_rol=$profile->getProfileRolByIdSgp($idSGP);
    if ($profile_rol['success']) {
            foreach ($listRol as $key1 => $row_rol) {               
                    if ($row_rol['rol_id'] == $profile_rol['rol_id']) {
                        $listRol[$key1]['check'] = TRUE;
                        break;                    
                }
            }
        }*/
    
    echo json_encode($listRol);
}
