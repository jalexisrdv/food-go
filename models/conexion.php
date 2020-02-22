<?php

class Conexion {

    public static function getConexion() {
        $conexion = new mysqli('localhost', 'root', 'root', 'food_go');
        if(!$conexion->connect_errno) {
            return $conexion;
        }else {
            die('Error durante la conexión');
        }
    }

}

?>