<?php


require_once 'controller/Bot.php';
require_once 'controller/User.php';
require_once 'controller/ejercicio.php';

class Webhook{

    //DATOS PARA LA CONEXIÓN CON TELEGRAM Y RECONOCIMIENTO DEL MENSAJE
    private $usu;
    private $token;
    private $bot;
    private $message; //filtra el json con la información del usuario
    private $update_id; //número de actualización
    //PARA EL INLINEKEYBOARD 
    private $callback_query;
    //DATOS DEL USUARIO
    private $id; //id del chat
    private $text; //mensaje del usuario

    
    public function __construct($update)
    {
        $this->bot = new Bot();
        $this->usu = new User();
        $this->token = 'bot5334366629:AAEFOK9CnKLe3e2xStyI_QnFOai8jAMb0c4';
        
        $this->message = isset($update['message']) ? $update['message'] : "";
        
        /* $this->update_id = isset($update['update_id']) ? $update['update_id'] : ""; */
        $this->callback_query = isset($update['callback_query']) ? $update['callback_query'] : "";
        
        $this->id = isset($update['message']) ? $this->message["from"]["id"] : "";
        
        $this->text = isset($update['message']) ? $this->message["text"] : "";
        
        file_put_contents('archivo', $this->text);
        
        /*   if ($this->text == "/start") {
            
            $bot->sendMessage($this->id, 'asdfajk', $this->token);
        }
 */
        
    }

    public function enviarMensaje()
    {
        file_put_contents('llegaTextoALmetodo', $this->text);

        if(isset($this->text) && $this->text == '/start' ){
            $respuesta = 'pan caliente';
            //$wb->enviarMensaje();
            
            $this->botsendMessage($this->id, $respuesta, $this->token);
        
        }

    }

}

$wb = new Webhook(json_decode(file_get_contents("php://input"),true));
$wb->enviarMensaje();


/* $mensaje->enviarMensaje('hala');
*/

/* if($text == '/start' ){

    new Webhook(file_get_contents("php://input"));
    $mensaje->enviarMensaje('hala');

}  */
