<?php

require_once 'model/EjerciciosModel.php';


$ej = new EjerciciosModel();

$ejercicio_array = array(
    'enunciado' => $ej->getEnunciadoPorId(1)[0]['enunciado']
);




$arregloPreguntas = $ej->getPreguntasPorId(1);

foreach ($arregloPreguntas as $key => $value) {
    
    $data_pregunta[] = array($value['pregunta'], $value['id_respuesta_correcta'] );

}


$ejercicio_array['datos'] = $data_pregunta;
print_r($ejercicio_array);


// WHILE XDDDDDDD

$data_pregunta =array(
    array('preg 1', 3 )
);
array_push($data_pregunta, array('preg 2', 5));
$a = 0;

while ($a <  count($data_pregunta)) {
    print_r ($data_pregunta[$a][0]);
    
    print_r ($data_pregunta[$a][1]);
    $a++;
}

//print_r($ej->getRespuestasPorId(3));





//print_r($ejercicio_array);