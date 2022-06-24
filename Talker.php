<?php
/*
/*print_r(json_decode('{"ok":true,"result":[{"update_id":678050204,
    "message":{"message_id":1662,"from":{"id":1073553770,"is_bot":false,"first_name":"Mirta","last_name":"Montenegro","language_code":"es"},"chat":{"id":1073553770,"first_name":"Mirta","last_name":"Montenegro","type":"private"},"date":1655946841,"text":"U"}}]}', true)['result'][0]['update_id']);*/
/*
class Talker{

    private $token;
    public $update_id;
    private $chat_id;
    public $text;
    public function __construct ()
    {
        $this->token= 'bot5334366629:AAEFOK9CnKLe3e2xStyI_QnFOai8jAMb0c4';
       // $this->update_id = json_decode($this->getUpdates(), true)['result'][0]['update_id']; //obtiene el update_id.
       $this->getUserID();
       $this->getText();
        
    }

    public function datos($data)
    {
        $datos=$data;
        print_r($datos);
    }

    public function getUserID()
    {
        $this->chat_id = end(json_decode($this->getUpdates(), true)['result'])['message']['from']['id'];
    }

    public function getText()
    {
        $this->text = end(json_decode($this->getUpdates(), true)['result'])['message']['text'];
    }

    public function getUpdates(){
        $url = "https://api.telegram.org/" . $this->token . "/getUpdates";


            $ch = curl_init();
            $optArray = array(
                    CURLOPT_URL => $url,
                    CURLOPT_RETURNTRANSFER => true
        );
        curl_setopt_array($ch, $optArray);
        $result = curl_exec($ch);

        curl_close($ch);
        return $result;
    }

    function sendMessage($messaggio, &$k = ''){
        $url = "https://api.telegram.org/" . $this->token . "/sendMessage?disable_web_page_preview=false&parse_mode=HTML&chat_id=" . $this->chat_id;
    
       // print_r($url);
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

$t = new Talker();

//$t->sendMessage('hola');
