<?php

class Ejercicio
{
    public function menuInicial()
    {
        //ASIGNACI脫N COMANDO EN FORMATO /----

        if(isset($text) && $text == '/start' ){
            $respuesta = "Hola " .$name. " bienvenido al bot que va a ayudarte a mejorar tus habilidades de programaci贸n 馃槃 \n\n
            A continuaci贸n tienes los comandos que puedes utilizar:
            \n /ejercicio1
            \n /help
            \n /indice
            \n /recursos";

            sendMessage($id,$respuesta,$token);
        } 
        else if (isset($text) && $text == '/help' ){
            $respuesta = "Este bot se encarga de generar ejercicios y guiarte en el proceso de abstracci贸n, de acuerdo a los pilares de la programaci贸n orientada a objetos (POO) 馃榿.\n\nSabemos que puede ser un camino dif铆cil, por lo que vas a iniciar con ejercicios sencillos, y asociarlos a su soluci贸n en diagrama UML. Una vez realizado el proceso de abstracci贸n, recomendamos que desarrolles estos ejercicios en el lenguaje de programaci贸n Java.\n\n FAQ \n\n<b>驴Qu茅 hago si no encuentro el teclado 馃槗?</b>\nPuedes abrir el teclado nuevamente con el bot贸n que est谩 en el cuadro de ingreso de texto, al lado derecho, antes del clip de adjuntar archivos\n\n驴<b>C贸mo regreso a la pregunta anterior 馃ゴ?</b>\nS贸lo copia el mensaje anterior a la pregunta que deseas ver y listo 馃ぉ";

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
            $respuesta = "Infograf铆as: 
            \nhttps://teloexplicocongatitos.com/poster/tlecg07
            \nVideos explicativos:
            \nhttps://youtu.be/L8ywM1BQwT0
            \nCheatsheets:
            \nhttps://introcs.cs.princeton.edu/java/11cheatsheet/";

            sendMessage($id,$respuesta,$token);
        }
    }
}