<?php


https://api.telegram.org/bot5334366629:AAEFOK9CnKLe3e2xStyI_QnFOai8jAMb0c4/sendMessage?disable_web_page_preview=false&parse_mode=HTML&chat_id=1073553770&reply_markup={"inline_keyboard":[[{"text":"Memoria","callback_data":"validarRespuesta(3,1,2,'Exacto Recuerda que los atributos son caracter\u00edsticas o propiedades de los objetos.')"},{"text":"Conectarse a internet","callback_data":"validarRespuesta(3,2,2,'Exacto Recuerda que los atributos son caracter\u00edsticas o propiedades de los objetos.')"},{"text":"Tama\u00f1o (en pulgadas)","callback_data":"validarRespuesta(3,3,2,'Exacto Recuerda que los atributos son caracter\u00edsticas o propiedades de los objetos.')"},{"text":"Espacio (GB)","callback_data":"validarRespuesta(3,4,2,'Exacto Recuerda que los atributos son caracter\u00edsticas o propiedades de los objetos.')"}]]}




//************** */




$rr = 'fdds("ur")';

$metodo = explode('(', $rr);

$argumento = trim($metodo[1], ')');


call_user_func($metodo[0], $argumento);

function fdds($arg)
{
    print_r($arg);
}

return;

$k = [
    "inline_keyboard" => [
        [
            [
                "text" => "memoria",
                "callback_data" => 1
            ],
            [
                "text" => "Conectarse a internet",
                "callback_data" => 2
            ],
            [
                "text" => "Tamaño (pulgadas)",
                "callback_data" => 3
            ],
            [
                "text" => "Espacio (GB)",
                "callback_data" => 4
            ],
        ]
    ]
];

$k2['inline_keyboard'] =array(
    array(
    array(
        'text' =>  'dfgd',
        'callback_data' => 'dfgdf',
    )
)) ;


/* 
print_r($k['inline_keyboard']);
print_r('<br>');
print_r('<br>');
print_r('<br>');
print_r(json_encode($k2['inline_keyboard']));
 */