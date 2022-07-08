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
        /* $this->contador = 0; */
        /* file_put_contents('thisContadorEnEnunciado', $this->contador); */
        
        $bot = new Bot();
        $enunciado = $this->ejercicio->getEnunciadoPorId($ejercicio_id)[0]['enunciado'];
        $bot->sendMessage($id, $enunciado, $token);

        $array_param_preguntas[0] =  $ejercicio_id;
        $array_param_preguntas[1] =  0;

        $respuesta = '¿Quieres continuar con el ejercicio?';
        $keyboard = [
            "inline_keyboard" => [
                [
                    [
                        "text" => "✅",
                        "callback_data" => "presentarPreguntas(". $array_param_preguntas[0] .","  . $array_param_preguntas[1]  .  ")"
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

    public function presentarPreguntas($array_param_preguntas, $id, $token)
    {
        file_put_contents('arrayParamPreguntas', $array_param_preguntas);

        $ejercicio_id = $array_param_preguntas[0];
        $contador = $array_param_preguntas[1];

        $bot = new Bot();
        $arreglo_preguntas = $this->ejercicio->getPreguntasPorId($ejercicio_id);
        $numero_preguntas = count($arreglo_preguntas);
        
        if ($contador < $numero_preguntas) {
            $imprimir = 'Pregunta ' . $contador + 1 . ': ' .$arreglo_preguntas[$contador]['pregunta'];

            $this->respuesta_correcta = $arreglo_preguntas[$contador]['id_respuesta_correcta'];
           // $this->feedback_pregunta = $arreglo_preguntas[$contador]['feedback'];

            $bot->sendMessage($id, $imprimir, $token);

            $this->presentarRespuestas($arreglo_preguntas[$contador]['id'], $contador, $ejercicio_id, $id, $token);
            /* file_put_contents('imprimirArchivo', $imprimir); */
        }else {
            $print = 'Has resuelto el estudio de caso. 
            Ahora programa tu propia solución en tu editor de código. A quí tienes nuestro repositorio con los dos ejercicios de este bot resuletos a nuestra manera:
            https://github.com/msmontenegro3/estudioCaso1.git
            https://github.com/msmontenegro3/estudioCaso3';
            $bot->sendMessage($id, $print, $token);

        }

        
        /* file_put_contents('arregloPreguntas', $numero_preguntas); */
      /*   $pregunta = $this->ejercicio->getPreguntaPorEjercicio($ejercicio_id); */

        
    }


    public function presentarRespuestas($pregunta_id, $contador, $ejercicio_id, $id, $token)
    {
        $bot = new Bot();
        foreach ($this->armarRespuestas($pregunta_id) as $key => $value) {
            $json_array['inline_keyboard'][$key][0]['text'] = $this->armarRespuestas($pregunta_id)[$key]['respuesta'];

            $id_respuesta_boton = $this->armarRespuestas($pregunta_id)[$key]['id'];

            /* file_put_contents('feedback', $this->feedback_pregunta); */

            $respuesta_correcta = $this->respuesta_correcta;
            $json_array['inline_keyboard'][$key][0]['callback_data'] = 'validarRespuesta(' . $pregunta_id  . ',' .  $id_respuesta_boton  . ','   .  $respuesta_correcta  . ',' . $contador  . ',' .  $ejercicio_id . ')';

            /*  ',' .   $this->respuesta_correcta  .  */
        }


        $k = json_encode($json_array);
        /* file_put_contents('quePasoTecladitosad', $k); */

        $respuesta = 'Seleccione la respuesta correcta';
        $bot->sendMessage($id, $respuesta, $token, $k);
    }

    public function validarRespuesta($array_param_respuestas, $id, $token)
    {

        $bot = new Bot();

        $pregunta_id = $array_param_respuestas[0];
        $respuesta_enviada = $array_param_respuestas[1];
        $respuesta_correcta = $array_param_respuestas[2];
        $contador = $array_param_respuestas[3];
        $ejercicio_id = $array_param_respuestas[4];

        if ($respuesta_enviada == $respuesta_correcta){
            $f = new EjerciciosModel();

            $emoji = '🎉';
            $bot->sendMessage($id, $emoji, $token);

           $feedback = $f->getFeedbackPorPregunta($pregunta_id)[0]['feedback'];


            $bot->sendMessage($id, $feedback, $token);

            $array_show_preguntas[0] = $ejercicio_id;
            $array_show_preguntas[1] = $contador + 1;

            $respuesta = 'Vamos con la siguiente pregunta...';
            $bot->sendMessage($id, $respuesta, $token);

            $this->presentarPreguntas($array_show_preguntas, $id, $token);

            
        }else {
            $array_show_preguntas[0] = $ejercicio_id;
            $array_show_preguntas[1] = $contador;

            $emoji = '🙊';
            $bot->sendMessage($id, $emoji, $token);
            
            $respuesta = 'Tienes una nueva oportunidad!!';
            $bot->sendMessage($id, $respuesta, $token);


            $this->presentarPreguntas($array_show_preguntas, $id, $token);

        }




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