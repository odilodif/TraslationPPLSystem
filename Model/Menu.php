<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Menu
 *
 * @author odilo.ipiales
 */
include_once './../Model/connection.php';
include_once './../Model/ICrud.php';

class Menu extends Connection implements ICrud {

//Fields
    private $menu_description_id;
    private $menu_description_description;
    private $menu_description_href;
    private $menu_description_state;
    private $menu_traslation_path_img;
    private $menu_parent;
    private $conn;

    function getMenu_description_id() {
        return $this->menu_description_id;
    }

    function getMenu_description_description() {
        return $this->menu_description_description;
    }

    function getMenu_description_href() {
        return $this->menu_description_href;
    }

    function getMenu_description_state() {
        return $this->menu_description_state;
    }

    function getMenu_traslation_path_img() {
        return $this->menu_traslation_path_img;
    }

    function getMenu_parent() {
        return $this->menu_parent;
    }

    function setMenu_description_id($menu_description_id) {
        $this->menu_description_id = $menu_description_id;
    }

    function setMenu_description_description($menu_description_description) {
        $this->menu_description_description = $menu_description_description;
    }

    function setMenu_description_href($menu_description_href) {
        $this->menu_description_href = $menu_description_href;
    }

    function setMenu_description_state($menu_description_state) {
        $this->menu_description_state = $menu_description_state;
    }

    function setMenu_traslation_path_img($menu_traslation_path_img) {
        $this->menu_traslation_path_img = $menu_traslation_path_img;
    }

    function setMenu_parent($menu_parent) {
        $this->menu_parent = $menu_parent;
    }

    //The Contructor

    function __construct() {
        //parent::__construct();
        $this->conn=Connection::getInstance();
    }

//Methods
    public function create($query) {
        
    }

    public function delete($query) {
        
    }

    public function deleteById($id) {
        
    }

    public function listAll() {
        $info;
        try {
            $query = "SELECT menu_description_id, menu_description_description, menu_description_state FROM menu_objects WHERE menu_description_state='t' ORDER BY 1;";
            //echo '' . $query;
            $rs = $this->conn->execute_sgp($query);
            if ($rs) {
                while ($row = pg_fetch_row($rs)) {
                    $info[] = array('success' => TRUE,
                        'message' => 'Lista de Menus',
                        'check' => FALSE,
                        'menu_description_id' => $row[0],
                        'menu_description_description' => $row[1],
                        'menu_description_state' => $row[2]
                    );
                }
                if (!empty($info)) {
                    return $info;
                } else {
                    return array(array('success' => FALSE, 'message' => 'Lista de Menus no Encontrados',));
                }
            } else {
                return array(array('success' => FALSE, 'message' => 'Problemas con la Base de Datos!!',));
            }
        } catch (Exception $exc) {
            /* echo $exc->getTraceAsString(); */
            return array('success' => FALSE, 'message' => 'error al consultar lista' . $exc->getMessage());
        } finally {
           // $this->conn->closeConnectionSgp();
        }
    }

    public function listByParameter($id, $name, $path) {
        
    }

    public function read($query) {
        
    }

    public function update($parametro) {
        
    }

    public function updateByParameters($id, $name, $path) {
        
    }

}
