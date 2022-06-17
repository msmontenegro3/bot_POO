<?php

/*class Conexion{*/

    function conectar(){
        $user="root";
        $pass="";
        $server="localhost";
        $db= "oop_bot";

        $con = new mysqli($server, $user, $db);
        $con->set_charset("utf8");
    
        return $con;
    }

//}


?>