<?php

class Ejercicio
{
    public function menuInicial()
    {
        //ASIGNACIÓN COMANDO EN FORMATO /----

        if(isset($text) && $text == '/start' ){
            $respuesta = "Hola " .$name. " bienvenido al bot que va a ayudarte a mejorar tus habilidades de programación 😄 \n\n
            A continuación tienes los comandos que puedes utilizar:
            \n /ejercicio1
            \n /help
            \n /indice
            \n /recursos";

            sendMessage($id,$respuesta,$token);
        } 
        else if (isset($text) && $text == '/help' ){
            $respuesta = "Este bot se encarga de generar ejercicios y guiarte en el proceso de abstracción, de acuerdo a los pilares de la programación orientada a objetos (POO) 😁.\n\nSabemos que puede ser un camino difícil, por lo que vas a iniciar con ejercicios sencillos, y asociarlos a su solución en diagrama UML. Una vez realizado el proceso de abstracción, recomendamos que desarrolles estos ejercicios en el lenguaje de programación Java.\n\n FAQ \n\n<b>¿Qué hago si no encuentro el teclado 😓?</b>\nPuedes abrir el teclado nuevamente con el botón que está en el cuadro de ingreso de texto, al lado derecho, antes del clip de adjuntar archivos\n\n¿<b>Cómo regreso a la pregunta anterior 🥴?</b>\nSólo copia el mensaje anterior a la pregunta que deseas ver y listo 🤩";

            sendMessage($id,$respuesta,$token);
        } 

        else if(isset($text) && $text == '/indice' ){
            $respuesta = "LISTA DE EJERCICIOS:\n
            /ejercicio1";

            sendMessage($id,$respuesta,$token);
        }

        else if(isset($text) && $text == '/recursos' ){
            $respuesta = "LISTA DE ENLACES QUE PUEDEN INTERESARTE PARA ESTUDIAR:";
            sendMessage($id,$respuesta,$token);
            $respuesta = "Infografías: 
            \nhttps://teloexplicocongatitos.com/poster/tlecg07
            \nVideos explicativos:
            \nhttps://youtu.be/L8ywM1BQwT0
            \nCheatsheets:
            \nhttps://introcs.cs.princeton.edu/java/11cheatsheet/";

            sendMessage($id,$respuesta,$token);
        }
    }
}