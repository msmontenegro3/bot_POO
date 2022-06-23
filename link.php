<?php

require_once 'Talker.php';

$data = file_get_contents("php://input");
$decode_data = json_decode($data,true);

$t = new Talker($decode_data);
//$t->sendMessage('hola');