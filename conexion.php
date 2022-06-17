<?php

/*class Conexion{*/

    function conectar(){
        $user="
        pelon196_mirta";
        $pass="Mirta2022";
        $server="mysql1007.mochahost.com";
        $db= "pelon196_mirta_utpl";

        $con = new mysqli($server, $user, $db);
        $con->set_charset("utf8");
    
        return $con;
    }

//}


?>