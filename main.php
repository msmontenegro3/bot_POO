<?php
require_once 'Bot.php';

//DATOS PARA LA CONEXIÓN CON TELEGRAM Y RECONOCIMIENTO DEL MENSAJE
$token= 'bot5334366629:AAEFOK9CnKLe3e2xStyI_QnFOai8jAMb0c4';
$bot = new Bot();

$data = file_get_contents("php://input");
$update = json_decode($data,true);
$message = $update['message']; //filtra el json con la información del usuario


$id = $message["from"]["id"]; //id del chat
$name = $message["from"]["first_name"]; //nombre del usuario
$text = $message["text"]; //mensaje del usuario



//ASIGNACIÓN COMANDO EN FORMATO /----

if(isset($text) && $text == '/start' ){
    $respuesta = "Hola " .$name. " bienvenido al bot que va a ayudarte a mejorar tus habilidades de programación 😄 \n\n
    A continuación tienes los comandos que puedes utilizar:
    \n /ejercicio1
    \n /help
    \n /indice
    \n /recursos";
    echo ":(";
    $bot->sendMessage($id, $respuesta, $token);
    
    //sendMessage($id,$respuesta,$token);
} 

//ENVÍO Y CONEXIÓN API DE TELEGRAM

//Función para enviar menssajes
/* function sendMessage($chatID, $messaggio, $token,&$k = ''){
    $url = "https://api.telegram.org/" . $token . "/sendMessage?disable_web_page_preview=false&parse_mode=HTML&chat_id=" . $chatID;

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
 */
//Función para enviar fotos
/* function sendPhoto($chatID, $photo, $token){
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
} */

//Aquí puede mandar stickers al menos desde la web
/* function sendSticker($chatID, $sticker, $token){
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
} */
?>