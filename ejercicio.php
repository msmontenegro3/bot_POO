<?php
require_once 'Modelo.php';
class Ejercicio
{
    private $ejercicio;
    public function __construct ($ejercicio_id)
    {
        $ejercicio_data = new Modelo();
        $this->ejercicio = $ejercicio_data->getEjercicioFull($ejercicio_id);
    }

    public function getEnunciado()
    {
        return $this->ejercicio[0]['enunciado'];
    }
}
