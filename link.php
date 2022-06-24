<?php


$decode_data = json_decode('{"update_id":678050301,
    "message":{"message_id":1876,"from":{"id":1073553770,"is_bot":false,"first_name":"Mirta","last_name":"Montenegro","language_code":"es"},"chat":{"id":1073553770,"first_name":"Mirta","last_name":"Montenegro","type":"private"},"date":1656050732,"text":"/start","entities":[{"offset":0,"length":6,"type":"bot_command"}]}}',true);

print_r($decode_data);