<?php

require_once 'controller/Bot.php';
require_once 'controller/User.php';
require_once 'controller/ejercicio.php';

$usu = new User();

/* print_r($usu->getIdArray());
return ; */

//DATOS PARA LA CONEXIÓN CON TELEGRAM Y RECONOCIMIENTO DEL MENSAJE
$token= 'bot5334366629:AAEFOK9CnKLe3e2xStyI_QnFOai8jAMb0c4';
$bot = new Bot();

$data = file_get_contents("php://input");

$update = json_decode($data,true);
$message = $update['message']; //filtra el json con la información del usuario

$update_id = $update['update_id']; //número de actualización

//file_put_contents('archivo', $update_id);


$id = $message["from"]["id"]; //id del chat
$name = $message["from"]["first_name"]; //nombre del usuario
$last_name = $message["from"]["last_name"]; //apellido del usuario
$text = $message["text"]; //mensaje del usuario
$date = date("d F Y H:i:s", $message["date"]);//fecha



if (!in_array($id, $usu->getIdArray())) {
    $usu->setUser($id, $name, $last_name, $date);
}



//ASIGNACIÓN COMANDO EN FORMATO /----

if(isset($text) && $text == '/start' ){
    $respuesta = "Hola " .$name. " bienvenido al bot que va a ayudarte a mejorar tus habilidades de programación 😄 \n\n
    A continuación tienes los comandos que puedes utilizar:
    \n /help
    \n /indice
    \n /recursos
    \n /ejercicio
    \n Recuerda que para empezar a resolver los ejercicios debes seleccionar el comando /ejercicio";

    $bot->sendMessage($id, $respuesta, $token);
    
    //sendMessage($id,$respuesta,$token);
} 
if (isset($text) && $text == '/help' ){
    $respuesta = "Este bot se encarga de generar ejercicios y guiarte en el proceso de abstracción, de acuerdo a los pilares de la programación orientada a objetos (POO) 😁.\n\nSabemos que puede ser un camino difícil, por lo que vas a iniciar con ejercicios sencillos, y asociarlos a su solución en diagrama UML. Una vez realizado el proceso de abstracción, recomendamos que desarrolles estos ejercicios en el lenguaje de programación Java.\n\n FAQ \n\n<b>¿Qué hago si no encuentro el teclado 😓?</b>\nPuedes abrir el teclado nuevamente con el botón que está en el cuadro de ingreso de texto, al lado derecho, antes del clip de adjuntar archivos\n\n¿<b>Cómo regreso a la pregunta anterior 🥴?</b>\nSólo copia el mensaje anterior a la pregunta que deseas ver y listo 🤩";

    $bot->sendMessage($id, $respuesta, $token);
}
if(isset($text) && $text == '/indice' ){
    $respuesta = "LISTA DE EJERCICIOS:
    \nSi desea acceder a un ejercicio determinado seleccione el comando /ejercicio
    \n /ejercicio1 - Abstracción celular
    \n /ejercicio2 - Sistema estudiantes de escuela";

    $bot->sendMessage($id, $respuesta, $token);
}
if(isset($text) && $text == '/recursos' ){
    $respuesta = "LISTA DE ENLACES QUE PUEDEN INTERESARTE PARA ESTUDIAR:";
    $bot->sendMessage($id, $respuesta, $token);
    $respuesta = "Infografías: 
    \nhttps://teloexplicocongatitos.com/poster/tlecg07
    \nVideos explicativos:
    \nhttps://youtu.be/L8ywM1BQwT0
    \nCheatsheets:
    \nhttps://introcs.cs.princeton.edu/java/11cheatsheet/";

    $bot->sendMessage($id, $respuesta, $token);
}

//Llamada a ejercicios
if(isset($text) && $text == '/ejercicio' ){
    $respuesta = "Escriba el número de ejercicio que desee (en números)";

    $keyboard= [
        ['1', '2'],
    ];

    $key = array('one_time_keyboard' => true,'resize_keyboard' => true,'keyboard' => $keyboard);
	$k=json_encode($key);
    $bot->sendMessage($id, $respuesta, $token, $k);
}
if(isset($text) && $text == '1'){

    $enunciado = new Ejercicio();
    
    $bot->sendMessage($id, $enunciado->armarEjercicio(1)['enunciado'], $token);
    
    $keyboard= [
        ['respuesta1', 'respuesta2'],
    ];
    $key = array('one_time_keyboard' => true,'resize_keyboard' => true,'keyboard' => $keyboard);
	$k=json_encode($key);
    $bot->sendMessage($id, $enunciado->armarEjercicio(1)['datos'][0][0], $token, $k);

}

