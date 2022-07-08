<?php


class Bot{

    //UPDATES
    public function getUpdates(){
        $url = "https://api.telegram.org/" . $token . "/getUpdates";
        
            $url = $url."&text=" . urlencode($messaggio);
            $ch = curl_init();
            $optArray = array(
                    CURLOPT_URL => $url,
                    CURLOPT_RETURNTRANSFER => true
        );
        curl_setopt_array($ch, $optArray);
        $result = curl_exec($ch);
        curl_close($ch);
    }

    //ENVÍA MENSAJES Y TECLADO
    function sendMessage($chatID, $messaggio, $token,&$k = ''){

        $keyboard = [
            "inline_keyboard" => [
                [
                    [
                        "text" => "✅",
                        "callback_data" => "presentarPreguntas(x)"
                    ],
                    [
                        "text" => "❌",
                        "callback_data" => "recall_start()"
                    ]
                ]
            ]
        ];
        $k=json_encode($keyboard);

        
        file_put_contents('llegaASendMessage', $k);
        $url = "https://api.telegram.org/" . $token . "/sendMessage?disable_web_page_preview=false&parse_mode=HTML&chat_id=" . $chatID;
        /* $url = "https://api.telegram.org/" . $token . "/sendMessage?&chat_id=" . $chatID; */
    
        if(isset($k)) {
            $url = $url."&reply_markup=".$k; 
            }
    
    
            $url = $url."&text=" . urlencode($messaggio);
            $ch = curl_init();
            $optArray = array(
                    CURLOPT_URL => $url,
                    CURLOPT_RETURNTRANSFER => true
        );
        curl_setopt_array($ch, $optArray);
        $result = curl_exec($ch);
        curl_close($ch);
    }

   


    //ENVÍA FOTOS
    function sendPhoto($chatID, $photo, $token){
        $url = "https://api.telegram.org/" . $token . "/sendPhoto?photo=".$photo."&chat_id=" . $chatID;
    
        $url = $url."&text=" . urlencode($messaggio);
        $ch = curl_init();
        $optArray = array(
                CURLOPT_URL => $url,
                CURLOPT_RETURNTRANSFER => true
        );
        curl_setopt_array($ch, $optArray);
        $result = curl_exec($ch);
        curl_close($ch);
    }

    //ENVÍA STICKERS Y GIFS
    function sendSticker($chatID, $sticker, $token){
        $url = "https://api.telegram.org/" . $token . "/sendSticker?sticker=".$sticker."&chat_id=" . $chatID;
    
        $url = $url."&text=" . urlencode($sticker);
        $ch = curl_init();
        $optArray = array(
                CURLOPT_URL => $url,
                CURLOPT_RETURNTRANSFER => true
        );
        curl_setopt_array($ch, $optArray);
        $result = curl_exec($ch);
        curl_close($ch);
    }

    //ENVÍA POLLS
   /*  public function sendPoll($chatID, $question, $options, $token){
        $url = "https://api.telegram.org/" . $token . "/sendPoll?question=" . $question;
        
            $url = $url."&options=" . urlencode($options);
            $ch = curl_init();
            $optArray = array(
                    CURLOPT_URL => $url,
                    CURLOPT_RETURNTRANSFER => true
        );
        curl_setopt_array($ch, $optArray);
        $result = curl_exec($ch);
        curl_close($ch);
    } */

    public function start($id, $respuesta, $token)
    {

            $respuesta = "Hola bienvenido al bot que va a ayudarte a mejorar tus habilidades de programación 😄 \n\n
            A continuación tienes los comandos que puedes utilizar:
            \n /help
            \n /indice
            \n /recursos
            \n /seleccionar_ejercicio
            \n Recuerda que para empezar a resolver los ejercicios debes seleccionar el comando /seleccionar_ejercicio";
        
            $this->sendMessage($id, $respuesta, $token);
        
    }

    public function help($id, $respuesta, $token){
        $respuesta = "Este bot se encarga de generar ejercicios y guiarte en el proceso de abstracción, de acuerdo a los pilares de la programación orientada a objetos (POO) 😁.\n\nSabemos que puede ser un camino difícil, por lo que vas a iniciar con ejercicios sencillos, y asociarlos a su solución en diagrama UML. Una vez realizado el proceso de abstracción, recomendamos que desarrolles estos ejercicios en el lenguaje de programación Java.\n\n FAQ \n\n<b>¿Qué hago si no encuentro el teclado 😓?</b>\nPuedes abrir el teclado nuevamente con el botón que está en el cuadro de ingreso de texto, al lado derecho, antes del clip de adjuntar archivos\n\n¿<b>Cómo regreso a la pregunta anterior 🥴?</b>\nSólo copia el mensaje anterior a la pregunta que deseas ver y listo 🤩";

        $this->sendMessage($id, $respuesta, $token);
    }

    /* public function indice($id, $respuesta, $token){
        $respuesta = "LISTA DE EJERCICIOS:
        \nSi desea acceder a un ejercicio determinado seleccione el comando /ejercicio
        \n /ejercicio1 - Abstracción celular
        \n /ejercicio2 - Sistema estudiantes de escuela";

        $this->sendMessage($id, $respuesta, $token);
    } */

    public function recursos($id, $respuesta, $token){
        $respuesta = "LISTA DE ENLACES QUE PUEDEN INTERESARTE PARA ESTUDIAR:";
        $this->sendMessage($id, $respuesta, $token);

        $respuesta = "Infografías: 
        \nhttps://teloexplicocongatitos.com/poster/tlecg07
        \nVideos explicativos:
        \nhttps://youtu.be/L8ywM1BQwT0
        \nCheatsheets:
        \nhttps://introcs.cs.princeton.edu/java/11cheatsheet/";
        $this->sendMessage($id, $respuesta, $token);
    }

    public function seleccionar_ejercicio($id, $respuesta, $token){

        $respuesta = "Seleccione el número de ejercicio que desee";

        $keyboard = [
            "inline_keyboard" => [
                [
                    [
                        "text" => "Ejercicio 1",
                        "callback_data" => "presentarEnunciado(1)"
                    ]
                    ],
                [
                    [
                        "text" => "Ejercicio 2",
                        "callback_data" => "presentarEnunciado(2)"
                    ]
                ]
            ]
        ];



        $k=json_encode($keyboard);
        $this->sendMessage($id, $respuesta, $token, $k);
    }

}