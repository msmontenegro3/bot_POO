<?php

/*class Conexion{*/

    function conectar(){
        $user="root";
        $pass="";
        $server="localhost";
        $db= "oop_bot";
        $con=mysql_connect($server, $user, $pass) or die("Error al conectar a la base de datos" .mysql_error());
        mysql_select_db($db, $con);
    
        return $con;
    }

//}


?>