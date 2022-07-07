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
    private $date;
    private $button_pressed;

    
    public function __construct($update)
    {
        $this->bot = new Bot();
        $this->usu = new User();
        $this->eje = new Ejercicio();
        $this->token = 'bot5334366629:AAEFOK9CnKLe3e2xStyI_QnFOai8jAMb0c4';
        $this->message = isset($update['message']) ? $update['message'] : "";
        $this->callback_query = isset($update['callback_query']) ? $update['callback_query'] : "";

        
        if ($this->message != "") {
            $this->id = $this->message["from"]["id"]; //id del chat
            $this->name = $this->message["from"]["first_name"]; //nombre del usuario
            $this->last_name = $this->message["from"]["last_name"]; //apellido del usuario
            $this->text = $this->message["text"]; //mensaje del usuario
            $this->date = date("d F Y H:i:s", $this->message["date"]);//fecha
        }else{
            $this->id = $this->callback_query["from"]["id"]; //id del chat
            $this->button_pressed = $this->callback_query['data']; //reconoce el callbackdata del teclado
            
            //$id_callback = $callback_query['id']; //reconoce el callbackdata del teclado
        }

    }

    public function enviarMensaje()
    {
        file_put_contents('llegaTextoALmetodo', $this->text);

        if(isset($this->text) && $this->text == '/start' ){
            $respuesta = 'pan caliente';
            //$wb->enviarMensaje();
            
            $this->bot->sendMessage($this->id, $respuesta, $this->token);
        
        }

    }

    public function reciver($respuesta = '')
    {
        $comandos_array = array('/start', '/help', '/recursos', '/seleccionar_ejercicio');

        if ($this->message != "" && in_array($this->text, $comandos_array)){

            $regex = '/';
            $metodo = str_replace($regex, '', $this->text);
            
            $this->bot->$metodo($this->id, $respuesta, $this->token);
        }else if($this->button_pressed != ""){

            

            $metodo = explode('(', $this->button_pressed)[0];
            $parametro = str_replace(')', '', explode('(', $this->button_pressed)[1]);

            

            $this->eje->$metodo($parametro = '', $this->id, $this->token);

        }else{

            $respuesta = 'No entendí tu mensaje';
            $this->bot->sendMessage($this->id, $respuesta, $this->token);

        }
    }

}

$wb = new Webhook(json_decode(file_get_contents("php://input"),true));
$wb->reciver();


/* $mensaje->enviarMensaje('hala');
*/

/* if($text == '/start' ){

    new Webhook(file_get_contents("php://input"));
    $mensaje->enviarMensaje('hala');

}  */
