<?php

//token y métodos
class Bot{

    public string $metodo;
    private string $url;
    

    public function APICall(string $metodo){
        $url = 'https://api.telegram.org/bot'. '5334366629:AAEFOK9CnKLe3e2xStyI_QnFOai8jAMb0c4' .$metodo;
        echo $url;
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
        $url = 'https://api.telegram.org/bot'. '5334366629:AAEFOK9CnKLe3e2xStyI_QnFOai8jAMb0c4' .$metodo;
        echo $url;
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