<?php

if($_COOKIE['alimentos']==urldecode('%5B%5D')) {
    header('Location: ./alimentos.php');
}

require_once 'models/sql-carrito.php';
require_once 'models/sql-categorias.php';

$sqlCarrito = new SQLCarrito();

//Son los alimentos que el usuario añadió al carrito
$carrito = json_decode($_COOKIE['alimentos']);
$alimentos = $sqlCarrito->getCarrito($carrito);
$total = 0.0;

$sqlCategorias = new SQLCategorias();
$categoriasPlatillos = $sqlCategorias->getCategoriasPlatillos();
$categoriasBebidas = $sqlCategorias->getCategoriasBebidas();
$categoriasPostres = $sqlCategorias->getCategoriasPostres();

require_once 'views/v-pago.php';

?>