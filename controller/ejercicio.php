<?php
/* 
require_once '../model/EjerciciosModel.php'; */

require_once 'model/EjerciciosModel.php';

class Ejercicio
{
    private $ejercicio;

    public function __construct ()
    {
        $this->ejercicio = new EjerciciosModel();
    }

    public function armarEjercicio($ejercicio_id)
    {
        $ejercicio_array = array(
            'enunciado' => $this->ejercicio->getEnunciadoPorId($ejercicio_id)[0]['enunciado']
        );

        $arregloPreguntas = $this->ejercicio->getPreguntasPorId($ejercicio_id);

        foreach ($arregloPreguntas as $key => $value) {
    
            $data_pregunta[] = array($value['id'] ,$value['pregunta'], $value['id_respuesta_correcta'] );
        
        }

        $ejercicio_array['datos'] = $data_pregunta;

        return $ejercicio_array;
    }

    public function armarRespuestas($pregunta_id)
    {
        $respuestas_array = $this->ejercicio->getRespuestasPorPregunta($pregunta_id);

        return $respuestas_array;
    }

}

$ej = new Ejercicio();

//print_r($ej->armarEjercicio(1)['datos'][0][1]);

//print_r($ej->armarRespuestas(3));
/* 
foreach ($ej->armarRespuestas(3) as $key => $value) {
    //$arreglo_respuesta[] = array($value['id'], $value['respuesta']);
    echo 
    '[
        "text" => "' .  $value['respuesta'] . '",
        "callback_data" => '.  $value['id']  . '
    ],';

} */

//print_r($arreglo_respuesta);

  $respuestas_de_pregunta = '[
        "inline_keyboard" => [
            [';
    

            foreach ($ej->armarRespuestas(3) as $key => $value) {
                //$arreglo_respuesta[] = array($value['id'], $value['respuesta']);
                $respuestas_de_pregunta = $respuestas_de_pregunta . 
                '[
                    "text" => "' .  $value['respuesta'] . '",
                    "callback_data" => '.  $value['id']  . '
                ],';
            
            }
        

            $respuestas_de_pregunta = $respuestas_de_pregunta . ']
            ]
        ]';
        
        print_r($respuestas_de_pregunta);