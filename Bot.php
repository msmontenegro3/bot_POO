<?php

//token y métodos
class Bot{

    private string $token;
    private string $url;
    
    
    public function getToken()
    {
        $token = '5334366629:AAEFOK9CnKLe3e2xStyI_QnFOai8jAMb0c4';
        return $token;
    }

    public function APICall(string $metodo){
        $t = Bot::getToken(); 
        $url = 'https://api.telegram.org/bot'. $t .$metodo;
        $ch = curl_init();
        $optArray = array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true
        );

        curl_setopt_array($ch, $optArray);
        $result = curl_exec($ch);
        curl_close($ch);
    }

    public function sendMessage($chatID, $messaggio, &$k = ''){
        $metodo = "/sendMessage?disable_web_page_preview=false&parse_mode=HTML&chat_id=" . $chatID . "&text=" . urldecode($messaggio);
        echo "llega aquí";
        return Bot::APICall($metodo);

    }
}