<?php

class SQLCarrito {

    private $conexion;

    public function __construct()
    {
        require_once 'models/conexion.php';
        $this->conexion = Conexion::getConexion();
    }

    public function getCarrito($carrito) {
        $alimentosCarrito = Array();
        foreach($carrito as $alimento) {
            $id_alimento = $alimento->id;
            $sub_categoria = $alimento->subcategoria;
            $statement = $this->conexion->prepare("SELECT * FROM vmenu WHERE id_alimento = ? AND sub_categoria = ?");
            $statement->bind_param('is', $id_alimento, $sub_categoria);
            $statement->execute();
            $resultset = $statement->get_result();
            while($row = $resultset->fetch_assoc()) {
                $alimentosCarrito[] = $row;
            }
        }
        return $alimentosCarrito;
    }

}

?>