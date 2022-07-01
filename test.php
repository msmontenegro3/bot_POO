<?php

print_r (json_encode([
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
]));