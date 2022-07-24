<?php

class UserModel{

    public $conexion;


    public function __construct(){
        $user="pelon196_chichi";
        $pass="CHICHORITO1999.";
        $server="mocha3037.mochahost.com";
        $db= "pelon196_bot_tel";

        $this->conexion = new mysqli($server, $user, $pass, $db);
        $this->conexion->set_charset("utf8mb4");
        /* $this->conexion->set_charset("utf8"); */
    }


    public function setUsuarios($chatID, $nombre, $apellido){
        $this->conexion->query('INSERT INTO usuarios (codigo_usuario_tel, nombre_us, apellido_us)
        VALUES (' . $chatID  . ' , \'' .  $nombre . '\', \'' .  $apellido . '\')');
    }

    public function setUserDate($chatID, $date)
    {
        $this->conexion->query('INSERT INTO usuarios_date_log (codigo_usuario_tel_id, fecha_ingreso)
        VALUES (' . $chatID  . ' , \'' .  $date . '\')');
    }

    public function getUserData(){

        $dt = $this->conexion->query('SELECT codigo_usuario_tel FROM usuarios');
        return $dt->fetch_all(MYSQLI_ASSOC);
    
    }

    public function getUsers(){

        $dt = $this->conexion->query('SELECT * FROM usuarios');
        return $dt->fetch_all(MYSQLI_ASSOC);
    
    }


    public function showRegistro()
    {
        $dt = $this->conexion->query('SELECT * FROM mostrar_fechas_ingreso');
        return $dt->fetch_all(MYSQLI_ASSOC);
    }
    

}


/* $u= new UserModel();
$u->setUserDate(1, 'rrr'); */
?>