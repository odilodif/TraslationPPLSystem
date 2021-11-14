<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
if ($_POST['ElapsedPorcentage'] === 'GetPorcentages60') {
     include_once ('./../Model/ElapsedPorcentage.php');
      $elapsed_porcentage = new ElapsedPorcentage();
      $result=$elapsed_porcentage->calcule_porcentage_and_get_table_elapsed_percentage60(0);
       echo json_encode($result);
     
 }
 
 if ($_POST['ElapsedPorcentage'] === 'GetPorcentages70') {
     include_once ('./../Model/ElapsedPorcentage.php');
      $elapsed_porcentage = new ElapsedPorcentage();
      $result=$elapsed_porcentage->calcule_porcentage_and_get_table_elapsed_percentage70(0);
       echo json_encode($result);
     
 }
 
  if ($_POST['ElapsedPorcentage'] === 'GetPorcentages80') {
     include_once ('./../Model/ElapsedPorcentage.php');
      $elapsed_porcentage = new ElapsedPorcentage();
      $result=$elapsed_porcentage->calcule_porcentage_and_get_table_elapsed_percentage80(0);
       echo json_encode($result);     
 }
 
  if ($_POST['ElapsedPorcentage'] === 'GetPorcentages90') {
     include_once ('./../Model/ElapsedPorcentage.php');
      $elapsed_porcentage = new ElapsedPorcentage();
      $result=$elapsed_porcentage->calcule_porcentage_and_get_table_elapsed_percentage90(0);
       echo json_encode($result);     
 }


