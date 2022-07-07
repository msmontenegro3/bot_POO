<?php

/* require_once '../model/EjerciciosModel.php'; */

require_once 'model/EjerciciosModel.php';
require_once 'controller/Bot.php';
require_once 'Webhook.php';


class Ejercicio
{
    private $ejercicio;
    private $respuesta_correcta;
    private $feedback_pregunta;
    public $contador;

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

        /* file_put_contents('llegoElMetodo', $imprimir); */
        return $ejercicio_array;
    }

    public function recall_start($param, $id, $token)
    {
        $bot = new Bot();
        $respuesta = '';
        $bot->start($id, $respuesta, $token);
    }

    public function presentarEnunciado($ejercicio_id, $id, $token)
    {
        $this->contador = 0;
        /* file_put_contents('thisContadorEnEnunciado', $this->contador); */
        
        $bot = new Bot();
        $enunciado = $this->ejercicio->getEnunciadoPorId($ejercicio_id)[0]['enunciado'];
        $bot->sendMessage($id, $enunciado, $token);

        $respuesta = '¿Quieres continuar con el ejercicio?';
        $keyboard = [
            "inline_keyboard" => [
                [
                    [
                        "text" => "✅",
                        "callback_data" => "presentarPreguntas(". $ejercicio_id .")"
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

    public function presentarPreguntas($ejercicio_id, $id, $token)
    {
        file_put_contents('thisContadorEnPresentarPreguntas', $this->contador);
        $bot = new Bot();
        $arreglo_preguntas = $this->ejercicio->getPreguntasPorId($ejercicio_id);
        $numero_preguntas = count($arreglo_preguntas);
        $contador = $this->contador;
        if ($this->contador < $numero_preguntas) {
            $imprimir = $arreglo_preguntas[$contador]['pregunta'];

            $this->respuesta_correcta = $arreglo_preguntas[$contador]['id_respuesta_correcta'];
            $this->feedback_pregunta = $arreglo_preguntas[$contador]['feedback'];

            $bot->sendMessage($id, $imprimir, $token);

            $this->presentarRespuestas($arreglo_preguntas[$contador]['id'], $id, $token);
            /* file_put_contents('imprimirArchivo', $imprimir); */
        }

        
        /* file_put_contents('arregloPreguntas', $numero_preguntas); */
      /*   $pregunta = $this->ejercicio->getPreguntaPorEjercicio($ejercicio_id); */

        
    }


    public function presentarRespuestas($pregunta_id, $id, $token)
    {
        //sirve :)
        $bot = new Bot();
        foreach ($this->armarRespuestas($pregunta_id) as $key => $value) {
            $json_array['inline_keyboard'][$key][0]['text'] = $this->armarRespuestas($pregunta_id)[$key]['respuesta'];

            $id_respuesta_boton = $this->armarRespuestas($pregunta_id)[$key]['id'];

            $argumento_validar['pregunta_id'] = $pregunta_id;
            $argumento_validar['id_respuesta_boton'] = $id_respuesta_boton;
            $argumento_validar['feedback_pregunta'] = $this->feedback_pregunta;
            $argumento_validar['respuesta_correcta'] = $this->respuesta_correcta;

            $json_array['inline_keyboard'][$key][0]['callback_data'] = 'validarRespuesta(' . $argumento_validar  . ')';

        }

        file_put_contents('argumento_validar', $argumento_validar);

        $k = json_encode($json_array);

        $respuesta = 'Seleccione la respuesta correcta';
        $bot->sendMessage($id, $respuesta, $token, $k);
    }

    public function validarRespuesta($param)
    {
        file_put_contents('llega_hasta_validar', $param);
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

$ej->presentarEnunciado();
$ej->presentarPreguntas(); */