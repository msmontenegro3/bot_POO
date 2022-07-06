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

        /* $url = "https://api.telegram.org/" . $token . "/sendMessage?disable_web_page_preview=false&parse_mode=HTML&chat_id=" . $chatID; */
        $url = "https://api.telegram.org/" . $token . "/sendMessage?&chat_id=" . $chatID;
    
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
            \n /ejercicio
            \n Recuerda que para empezar a resolver los ejercicios debes seleccionar el comando /ejercicio";
        
            $this->sendMessage($id, $respuesta, $token);
        
    }


}