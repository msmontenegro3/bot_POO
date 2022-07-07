<?php

/* require_once '../model/EjerciciosModel.php'; */

require_once 'model/EjerciciosModel.php';
require_once 'controller/Bot.php';
require_once 'Webhook.php';


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


        /* $contador_preguntas = sizeof($arregloPreguntas);

        if ($contador_preguntas > 0) {
            # code...
        } */

        file_put_contents('llegoElMetodo', $imprimir);
        return $ejercicio_array;
    }

    public function recall_start()
    {
        $bot = new Bot();
        $bot->start();
    }

    public function presentarEnunciado($ejercicio_id, $id, $token)
    {
        $bot = new Bot();
        $enunciado = $this->ejercicio->getEnunciadoPorId($ejercicio_id)[0]['enunciado'];
        $bot->sendMessage($id, $enunciado, $token);

        $respuesta = '¿Quieres continuar con el ejercicio?';
        $keyboard = [
            "inline_keyboard" => [
                [
                    [
                        "text" => "✅",
                        "callback_data" => "presentarEnunciado(1)"
                    ],
                    [
                        "text" => "❌",
                        "callback_data" => "recall_start()"
                    ]
                ]
            ]
        ];
        $k=json_encode($keyboard);
        $bot->sendMessage($id, $respuesta, $token, $k);
    }

    public function armarRespuestas($pregunta_id)
    {
        $respuestas_array = $this->ejercicio->getRespuestasPorPregunta($pregunta_id);

        return $respuestas_array;
    }

    public function metodoHola()
    {

        return 'hola';
/*         $respuesta = 'hola';
        $bot->sendMessage($id, $respuesta, $token); */
    
    }

}

/* $ej = new Ejercicio();

print_r($ej->armarRespuestas(3)[0]); */

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
/* 
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
        
        print_r($respuestas_de_pregunta); */