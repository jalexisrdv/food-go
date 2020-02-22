<?php

class SQLMenu {
    
    private $conexion;

    public function __construct()
    {
        require_once 'models/conexion.php';
        $this->conexion = Conexion::getConexion();
    }

    public function getCategorias() {
        $statement = $this->conexion->prepare("SELECT nombre_categoria FROM tipos_categorias");
        $statement->execute();
        $resultset = $statement->get_result();
        $categorias = Array();
        while($row = $resultset->fetch_assoc()) {
            $categorias[] = $row;
        }
        return $categorias;
    }

    /*Compruebo si es una categoria general como: platillos, ...
    Porque tambien existen subcategorias como: asados, ...*/
    public function esCategoria($filtrar) {
        $categorias = $this->getCategorias();
        foreach($categorias as $categoria) {
            if($categoria['nombre_categoria']==$filtrar) {
                return true;
            }
        }
    }

    public function getMenu($filtrar) {
        $esCategoria = $this->esCategoria($filtrar);
        if($esCategoria) {
            $statement = $this->conexion->prepare("SELECT * FROM vmenu WHERE categoria = ?");
        }else if($filtrar=='menu') {
            $statement = $this->conexion->prepare("SELECT * FROM vmenu");
        }else {
            $statement = $this->conexion->prepare("SELECT * FROM vmenu WHERE sub_categoria = ?");
        }
        if($filtrar!='menu') {
            $statement->bind_param('s', $filtrar);
        }
        $statement->execute();
        $resultset = $statement->get_result();
        $menu = Array();
        while($row = $resultset->fetch_assoc()) {
            $menu[] = $row;
        }
        return $menu;
    }

}

?>