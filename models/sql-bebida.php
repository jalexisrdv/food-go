<?php

class SQLBebida {
    
    private $conexion;

    public function __construct()
    {
        require_once 'models/conexion.php';
        $this->conexion = Conexion::getConexion();
    }

    public function getBebidas() {
        $sql = 'SELECT * FROM vbebidas';
        $resultados = $this->conexion->query($sql);
        $bebidas = Array();
        while($row = $resultados->fetch_assoc()) {
            $bebidas[] = $row;
        }
        return $bebidas;
    }

    public function getBebidasLimit($limite) {
        $statement = $this->conexion->prepare("SELECT * FROM vbebidas LIMIT ?");
        $statement->bind_param('i', $limite);
        $statement->execute();
        $resultset = $statement->get_result();
        $bebidas = Array();
        while($row = $resultset->fetch_assoc()) {
            $bebidas[] = $row;
        }
        return $bebidas;
    }

}

?>