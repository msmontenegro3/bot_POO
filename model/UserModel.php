<?php

class UserModel{

    public $conexion;


    public function __construct(){
        $user="pelon196_chichi";
        $pass="CHICHORITO1999.";
        $server="mysql1007.mochahost.com";
        $db= "pelon196_bot_tel";

        $this->conexion = new mysqli($server, $user, $pass, $db);
        $this->conexion->set_charset("utf8mb4");
        /* $this->conexion->set_charset("utf8"); */
    }


    public function setUsuarios($chatID, $nombre, $apellido, $fecha=''){
        $this->conexion->query('INSERT INTO usuarios (codigo_usuario_tel, nombre_us, apellido_us, fecha)
        VALUES (' . $chatID  . ' , \'' .  $nombre . '\', \'' .  $apellido . '\', \'' .  $fecha  . '\')');
    }

    public function getUserData(){

        $dt = $this->conexion->query('SELECT codigo_usuario_tel FROM usuarios');
        return $dt->fetch_all(MYSQLI_ASSOC);
    
    }
    

}

?>