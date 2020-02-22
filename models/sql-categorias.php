<?php

class SQLCategorias {

    private $conexion;

    public function __construct() {
        require_once 'models/conexion.php';
        $this->conexion = Conexion::getConexion();
    }

    public function getCategoriasPlatillos() {
        $statement = $this->conexion->prepare("SELECT nombre_categoria_platillo FROM categorias_platillos");
        $statement->execute();
        $resultset = $statement->get_result();
        $categorias = Array();
        while($row = $resultset->fetch_assoc()) {
            $categorias[] = $row;
        }
        return $categorias;
    }

    public function getCategoriasBebidas() {
        $statement = $this->conexion->prepare("SELECT nombre_categoria_bebida FROM categorias_bebidas");
        $statement->execute();
        $resultset = $statement->get_result();
        $categorias = Array();
        while($row = $resultset->fetch_assoc()) {
            $categorias[] = $row;
        }
        return $categorias;
    }

    public function getCategoriasPostres() {
        $statement = $this->conexion->prepare("SELECT nombre_categoria_postre FROM categorias_postres");
        $statement->execute();
        $resultset = $statement->get_result();
        $categorias = Array();
        while($row = $resultset->fetch_assoc()) {
            $categorias[] = $row;
        }
        return $categorias;
    }

}

?>