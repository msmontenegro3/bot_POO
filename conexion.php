<?php

class Modelo{

    private $conexion;


    public function __construct(){
        $user="pelon196_chichi";
        $pass="Chichorito1999.";
        $server="mysql1007.mochahost.com";
        $db= "pelon196_bot_tel";

        $this->conexion = new mysqli($server, $user, $pass, $db);
        $this->conexion->set_charset("utf8");
    }

    public function getUsuarios(){
        $equis = $this->conexion->query('
        SELECT * FROM usuarios');

        return $equis->fetch_all(MYSQLI_ASSOC);
    }

}

$cn = new Modelo();
print_r($cn->getUsuarios()[1]['apellido_us']);

?>