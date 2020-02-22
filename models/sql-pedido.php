<?php

class SQLPedido {

    private $conexion;

    public function __construct()
    {
        require_once 'models/conexion.php';
        $this->conexion = Conexion::getConexion();
    }

    public function registrarPedido() {
        $statement = $this->conexion->prepare("INSERT INTO pedidos(titular_pedido, comer_en_restaurante_pedido) values('TITULAR', 1)");
        $statement->execute();
    }

    public function getIdPedido() {
        $statement = $this->conexion->prepare("SELECT MAX(id_pedido) as id_pedido FROM pedidos");
        $statement->execute();
        $resulset = $statement->get_result();
        $idPedido = Array();
        while($row = $resulset->fetch_assoc()) {
            return sprintf("%020d", $row['id_pedido']);
        }
    }

}

?>