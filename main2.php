<?php

class Webhook{

    private $message;
    private $text;

    public function __construct($update)
    {
        $this->message = $update['message'];
        $this->text = $update['message']["text"];

        file_put_contents('archivo2', $update);
    }

    public function reciver()
    {
        $chatID = 1073553770;
        $messaggio = 'HOLA WEY';
        $token= 'bot5334366629:AAEFOK9CnKLe3e2xStyI_QnFOai8jAMb0c4';
        file_put_contents('archivo3', $text);

        if(isset($text) && $text == '/start' ){
            
            file_put_contents('archivo4', $this->text);
            $this->sendMessage($chatID, $messaggio, $token);
        } 
    }

    public function sendMessage($chatID, $messaggio, $token,&$k = ''){
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

}


$wb = new Webhook(json_decode(file_get_contents("php://input"),true));



$wb->reciver(json_decode(file_get_contents("php://input"),true)['message']['text']);
return;


//---------------------------------------------------------

$update = json_decode(file_get_contents("php://input"),true);
$message = $update['message'];
$text = $message["text"];


$chatID = 1073553770;
$messaggio = 'HOLA WEY';
$token= 'bot5334366629:AAEFOK9CnKLe3e2xStyI_QnFOai8jAMb0c4';

if(isset($text) && $text == '/start' ){
    
    sendMessage($chatID, $messaggio, $token);
} 




function sendMessage($chatID, $messaggio, $token,&$k = ''){
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