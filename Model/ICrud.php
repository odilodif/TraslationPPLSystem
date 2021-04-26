<?php

interface ICrud {

    public function create($query);

    public function read($query);

    public function update($parametro);

    public function delete($query);

    public function listAll();

    public function listByParameter($id, $name,$path);

    public function deleteById($id);

    public function updateByParameters($id, $name, $path);
}

?>
