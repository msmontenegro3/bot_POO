<?php
require_once 'Talker.php';

$habla = new Talker();
$habla->getUpdates();
if(isset($text) && $text == '/start' ){
    $respuesta = "Hola " .$name. " bienvenido al bot que va a ayudarte a mejorar tus habilidades de programación 😄 \n\n
    A continuación tienes los comandos que puedes utilizar:
    \n /help
    \n /indice
    \n /recursos
    \n /ejercicio
    \n Recuerda que para empezar a resolver los ejercicios debes seleccionar el comando ejercicio";

    $bot->sendMessage($id, $respuesta, $token);
    
    //sendMessage($id,$respuesta,$token);
}