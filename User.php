<?php

require_once 'Modelo.php';
class User{

    public $dataUser;
    
    public function setUser($id, $nombre, $apellido, $fecha = '')
    {
        $user_data = new Modelo();
        $user_data->setUsuarios($id, $nombre, $apellido, $fecha);
    }
    
}

$us = new User();
$us->setUser('23216546', 'Ernie', 'Manosalvas');