<?php

require_once 'model/UserModel.php';

$u = new UserModel();

$user_data = $u->getUsers();
/* print_r($user_data);
return; */

$registro_fecha = $u->showRegistro();



/* print_r($u->showRegistro());
return; */

$datos_para_content = '';
$fecha_ingreso = '';


foreach ($user_data as $key => $value) {

    foreach ($registro_fecha as $key2 => $registro) {
        if ($registro['chat_id'] === $value['codigo_usuario_tel']) {
            $fecha_ingreso = $fecha_ingreso . '<div class="columnas-tabla registros">' .  $registro['fecha_ingreso'] . '</div>';
        }
        
    }
    $datos_para_content = $datos_para_content . '

        <tr class="datos-row">
        <td class="columnas-tabla">' . ($key + 1) . '</td>
        <td class="columnas-tabla">' . $value['nombre_us'] . ' ' .  
        $value['apellido_us'] . '</td><td>' . $fecha_ingreso . '</td>';
}



$datos_para_content = $datos_para_content . '</tr>';




$content = '
<table class="main-tabla">
    <tr class="encabezado-row">
        <td class="columnas-tabla">Nº</td>
        <td class="columnas-tabla">Nombre</td>
        <td class="columnas-tabla">Fechas de Acceso</td>
    </tr>' 

    . $datos_para_content .

    '</table>
';

$template = file_get_contents('templates/main-template.html');
 
$template = str_replace('{contenido}', $content, $template);

print($template);
