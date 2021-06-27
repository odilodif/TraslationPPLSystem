<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
 if ($_POST['Roles'] === 'ListRoles') {
     include_once ('./../Model/Rol.php');
      $rol = new Rol();
      $result=$rol->listAll();
       echo json_encode($result);
     
 }
