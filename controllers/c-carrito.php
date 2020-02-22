<?php 

require_once 'models/sql-carrito.php';
require_once 'models/sql-categorias.php';

$sqlCarrito = new SQLCarrito();

if(isset($_COOKIE['alimentos'])) {
    //Son los alimentos que el usuario añadió al carrito
    $carrito = json_decode($_COOKIE['alimentos']);
    $alimentos = $sqlCarrito->getCarrito($carrito);
}

$total = 0.0;

$sqlCategorias = new SQLCategorias();
$categoriasPlatillos = $sqlCategorias->getCategoriasPlatillos();
$categoriasBebidas = $sqlCategorias->getCategoriasBebidas();
$categoriasPostres = $sqlCategorias->getCategoriasPostres();

require_once 'views/v-carrito.php';

?>