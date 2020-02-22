<?php

class SQLPlatillo {
    
    private $conexion;

    public function __construct()
    {
        require_once 'models/conexion.php';
        $this->conexion = Conexion::getConexion();
    }

    public function getPlatillosLimit($limite) {
        $statement = $this->conexion->prepare("SELECT * FROM vplatillos LIMIT ?");
        $statement->bind_param('i', $limite);
        $statement->execute();
        $resultset = $statement->get_result();
        $platillos = Array();
        while($row = $resultset->fetch_assoc()) {
            $platillos[] = $row;
        }
        return $platillos;
    }

}

?>