<?php

require_once 'models/sql-platillo.php';
require_once 'models/sql-bebida.php';
require_once 'models/sql-postre.php';
require_once 'models/sql-categorias.php';

$sqlCategorias = new SQLCategorias();
$categoriasPlatillos = $sqlCategorias->getCategoriasPlatillos();
$categoriasBebidas = $sqlCategorias->getCategoriasBebidas();
$categoriasPostres = $sqlCategorias->getCategoriasPostres();

$sqlPlatillo = new SQLPlatillo();
$platillos = $sqlPlatillo->getPlatillosLimit(2);
$sqlBebida = new SQLBebida();
$bebidas = $sqlBebida->getBebidasLimit(2);
$sqlPostre = new SQLPostre();
$postres = $sqlPostre->getPostresLimit(2);

require_once 'views/home.php';

?>