<?php

class Mensajes
{
    private $token;
    private $chatID;
    private $url;
    private $optArray;
    private $ch;

    public function __construct($token, $chatID, $url)
    {
        $this->token = $token;
        $this->chatID = $chatID;
        $this->url = $url;
        $this->optArray = array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true
        );
        $this->ch  = curl_init();
    }

    //ENVIA MENSAJE A TELEGRAM
    public function sendMessage($messaggio ,&$k = '')
    {
        $url = $this->url . $this->token . "/sendMessage?disable_web_page_preview=false&parse_mode=HTML&chat_id=" . $this->chatID;

        if(isset($k)) {
            $url = $url."&reply_markup=".$k; 
            }

            $url = $url."&text=" . urlencode($messaggio);

        curl_setopt_array($this->ch, $this->optArray);
        $result = curl_exec($this->ch);
        curl_close($this->ch);
    }

    //ENVIA FOTOS A TELEGRAM
    function sendPhoto($photo){
        $url = $this->url . $this->token . "/sendPhoto?photo=".$photo."&chat_id=" . $this->chatID;

        $url = $url."&text=" . urlencode($photo);

        curl_setopt_array($this->ch, $this->optArray);
        $result = curl_exec($this->ch);
        curl_close($this->ch);
    }


    //Aquí puede mandar stickers al menos desde la web
    function sendSticker($sticker){
        $url = $this->url . $this->token . "/sendSticker?sticker=".$sticker."&chat_id=" . $this->chatID;

        $url = $url."&text=" . urlencode($sticker);

        curl_setopt_array($this->ch, $this->optArray);
        $result = curl_exec($this->ch);
        curl_close($this->ch);
    }
}