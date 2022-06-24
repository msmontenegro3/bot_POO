<?php

$inc = include("../Modelo.php");

$conex = new Modelo();


if ($inc) {

    $resultado = $conex->conexion->query('SELECT * FROM usuarios');
    $array = $resultado->fetch_array();

        ?>
        
        <table class="tabla">
            <caption>USUARIOS QUE INTERACTUAN CON EL BOT</caption>
            <thead>
                <tr>
                    <th scope="col">Nombre</th>
                    <th scope="col">Apellido</th>
                    <th scope="col">Fecha</th>
                </tr>
            </thead>

            <tbody>
            <?php 
            foreach ($resultado as $row) { ?>
                <tr>
                <td> <?php echo $row['nombre_us']; ?> </td>
                <td> <?php echo $row['apellido_us']; ?> </td>
                <td> <?php echo $row['fecha']; ?> </td>
                </tr>

            <?php     
            }
            ?>
            </tbody>

        </table>

        <?php   
    

}

?>