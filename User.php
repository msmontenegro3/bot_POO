<?php

require_once 'Modelo.php';
class User{

    public $data_user;

    public function __construct()
    {
        $this->data_user = new Modelo();
    }
    
    public function setUser($id, $nombre, $apellido, $fecha = '')
    {
        $this->data_user->setUsuarios($id, $nombre, $apellido, $fecha);
    }

    public function getIdArray()
    {
        $dt = $this->data_user->getUserData();
        foreach ($dt as $key => $value) {
            $id[] = $value; 
        }
        return $id;
    }
    
}
