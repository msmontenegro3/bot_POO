<?php

class Modelo{

    private $conexion;


    public function __construct(){
        $user="pelon196_chichi";
        $pass="CHICHORITO1999.";
        $server="mysql1007.mochahost.com";
        $db= "pelon196_bot_tel";

        $this->conexion = new mysqli($server, $user, $pass, $db);
        $this->conexion->set_charset("utf8");
    }

    public function getEjercicioFull($ejercicio_id){

        $dt = $this->conexion->query('SELECT * FROM ejercicios_view WHERE id_ejercicio = ' . $ejercicio_id);
        return $dt->fetch_all(MYSQLI_ASSOC);
    
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

//$m = new Modelo();
//print_r($m->getEjercicioFull(1));

?>