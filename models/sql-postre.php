<?php

class SQLPostre {
    
    private $conexion;

    public function __construct()
    {
        require_once 'models/conexion.php';
        $this->conexion = Conexion::getConexion();
    }

    public function getPostres() {
        $sql = 'SELECT * FROM vpostres';
        $resultados = $this->conexion->query($sql);
        $postres = Array();
        while($row = $resultados->fetch_assoc()) {
            $postres[] = $row;
        }
        return $postres;
    }

    public function getPostresLimit($limite) {
        $statement = $this->conexion->prepare("SELECT * FROM vpostres LIMIT ?");
        $statement->bind_param('i', $limite);
        $statement->execute();
        $resultset = $statement->get_result();
        $postres = Array();
        while($row = $resultset->fetch_assoc()) {
            $postres[] = $row;
        }
        return $postres;
    }

}

?>