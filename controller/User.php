<?php

require_once 'model/UserModel.php';
class User{

    public $data_user;

    public function __construct()
    {
        $this->data_user = new UserModel();
    }
    
    public function setUser($id, $nombre, $apellido)
    {
        $this->data_user->setUsuarios($id, $nombre, $apellido, $fecha);
    }

    public function reingresoUser($id)
    {
        $date = date();
        $this->data_user->setRUserDate($id, $date);

    }

    public function getIdArray()
    {
        $dt = $this->data_user->getUserData();
        foreach ($dt as $key => $value) {
            $id[] = $value['codigo_usuario_tel']; 
        }
        return $id;
    }
    
}
