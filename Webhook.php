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

    
    public function __construct($data_telegram)
    {
        $this->bot = new Bot();
        $this->usu = new User();
        $this->token = 'bot5334366629:AAEFOK9CnKLe3e2xStyI_QnFOai8jAMb0c4';
        $update = json_decode($data_telegram,true);
/*         $this->message = $update['message'];
        $this->update_id = $update['update_id'];
        $this->callback_query = $update['callback_query'];
        $this->id = $message["from"]["id"];
        $this->text = $message["text"]; */
    }

    public function enviarMensaje($respuesta)
    {

        $this->bot->sendMessage($this->id, $respuesta, $this->token);
    }

    public function enviarMensaje2($text)
    {
        print_r($text);
    }
}


new Webhook(file_get_contents("php://input"));
$this->enviarMensaje2('hala');


if(isset($text) && $text == '/start' ){
    print_r('hdhdh');
    $mensaje = new Webhook(file_get_contents("php://input"));
    $mensaje->enviarMensaje('hala');

}
