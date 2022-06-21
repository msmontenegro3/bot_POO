<?php
require_once 'Modelo.php';
class Ejercicio
{

    public function __construct ($ejercicio_id)
    {
        $ejercicio_data = new Modelo();
        $ejercicio = $ejercicio_data->getEjercicioFull($ejercicio_id);
        return $ejercicio[0]['enunciado'];
    }

    public function getEjercicio($ejercicio_id)
    {
        return 'ejercicio'. $ejercicio_id;
    }
}

$ej = new Ejercicio(1);