<?php


require_once 'model/EjerciciosModel.php';

$id_pregunta = 3;

$ej = new EjerciciosModel();


$numero_respuestas = count($ej->getRespuestasPorPregunta($id_pregunta));

print_r($numero_respuestas);

$intento = true;

function simulaPreguntas($intento)
{
    if ($intento == true) {
        validaRespuesta(1);
    }else{
        validaRespuesta(0);
    }
}

$intentos_fallidos = 0;

function validaRespuesta($pregunta_id, $intentos_fallidos, $numero_respuestas)
{
    setFallos($pregunta_id, $intentos_fallidos);
    $puntuacion = ($numero_respuestas - $intentos_fallidos)/$numero_respuestas;
    $ej->setPuntuacion($pregunta_id, $puntuacion);

}




