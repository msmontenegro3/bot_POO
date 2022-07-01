<?php


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



print_r($k['inline_keyboard']);
print_r('<br>');
print_r('<br>');
print_r('<br>');
print_r(json_encode($k2['inline_keyboard']));
