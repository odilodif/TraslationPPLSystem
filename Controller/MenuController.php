<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

 if ($_POST['Menu'] === 'ListMenu') {
     include_once ('./../Model/Menu.php');
      $menu_list = new Menu();
      $result=$menu_list->listAll();
       echo json_encode($result);
     
 }