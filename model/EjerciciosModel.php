<?php

class EjerciciosModel{

    public $conexion;

    public function __construct(){
        $user="pelon196_chichi";
        $pass="CHICHORITO1999.";
        $server="mysql1007.mochahost.com";
        $db= "pelon196_bot_tel";

        $this->conexion = new mysqli($server, $user, $pass, $db);
        $this->conexion->set_charset("utf8mb4");
    }

    public function getEnunciadoPorId($ejercicio_id){

        $dt = $this->conexion->query('SELECT * FROM ejercicios WHERE id = ' . $ejercicio_id);
        return $dt->fetch_all(MYSQLI_ASSOC);
    
    }

    public function getPreguntasPorId($ejercicio_id)
    {
        $dt = $this->conexion->query('SELECT * FROM preguntas WHERE id_ejercicio = ' . $ejercicio_id);
        return $dt->fetch_all(MYSQLI_ASSOC);
    }

    public function getPreguntaPorEjercicio($ejercicio_id, $pregunta_id)
    {
        $dt = $this->conexion->query('SELECT * FROM preguntas WHERE id_ejercicio = '. $ejercicio_id .' AND id = '. $pregunta_id .'');
        return $dt->fetch_all(MYSQLI_ASSOC);
    }

    public function getRespuestasPorPregunta($pregunta_id)
    {
        $dt = $this->conexion->query('SELECT * FROM respuestas WHERE pregunta_id = ' . $pregunta_id);
        return $dt->fetch_all(MYSQLI_ASSOC);
    }

    public function getFeedbackPorPregunta($pregunta_id)
    {
        $dt = $this->conexion->query('SELECT feedback FROM preguntas WHERE id = ' . $pregunta_id);
        return $dt->fetch_all(MYSQLI_ASSOC);
    }

    public function setPuntuacion($id_usuario, $pregunta_id, $puntuacion, $intentos_fallidos)
    {
        $dt = $this->conexion->query('UPDATE score_preguntas_usuarios SET
        
        (score_pregunta = ' . $puntuacion  . '),
        (intentos_fallidos = ' . $intentos_fallidos  . ')
        WHERE id_usuario = ' . $id_usuario . 'AND id_pregunta = ' . $pregunta_id);
        
    }

    public function clearScore($id_usuario)
    {
        $dt = $this->conexion->query('DELETE FROM score_preguntas_usuarios WHERE id_usuario = ' . $id_usuario );
        return $try_number;
    }

    public function resetScore($id_usuario, $pregunta_id, $puntuacion, $intentos_fallidos)
    {
        $dt = $this->conexion->query('INSERT INTO score_preguntas_usuarios (id_usuarios, id_pregunta, score_pregunta, intentos_fallidos) VALUES 
        (' . $id_usuario  . '), (' .  $pregunta_id . '), (' . $puntuacion  . '), (' . $intentos_fallidos  . ')' );

    }



}
