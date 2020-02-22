<?php

require_once 'models/sql-categorias.php';
require_once 'models/sql-pedido.php';

$sqlCategorias = new SQLCategorias();
$categoriasPlatillos = $sqlCategorias->getCategoriasPlatillos();
$categoriasBebidas = $sqlCategorias->getCategoriasBebidas();
$categoriasPostres = $sqlCategorias->getCategoriasPostres();

require_once 'models/sql-carrito.php';

$sqlCarrito = new SQLCarrito();
$sqlPedido = new SQLPedido();

session_start();
if(isset($_COOKIE['alimentos'])) {
    //Son los alimentos que el usuario añadió al carrito
    $carrito = json_decode($_COOKIE['alimentos']);
    $alimentos = $sqlCarrito->getCarrito($carrito);
    $_SESSION['pedido'] = $alimentos;
    $_SESSION['carrito'] = $carrito;

    $sqlPedido->registrarPedido();
    $idPedido = $sqlPedido->getIdPedido();
    $_SESSION['id_pedido'] = $idPedido;
}

setcookie('alimentos', '', time() + (1 * 24 * 60 * 60 * 1000));

require_once 'views/v-pago-finalizado.php';

?>