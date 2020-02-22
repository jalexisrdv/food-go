<?php

require_once 'models/sql-menu.php';
require_once 'models/sql-categorias.php';

$sqlMenu = new SQLMenu();
$sqlCategorias = new SQLCategorias();
$categoriasPlatillos = $sqlCategorias->getCategoriasPlatillos();
$categoriasBebidas = $sqlCategorias->getCategoriasBebidas();
$categoriasPostres = $sqlCategorias->getCategoriasPostres();

if(isset($_GET) && !empty($_GET)) {
    foreach($_GET as $n) {
        $menu = $sqlMenu->getMenu($n);
    }
}else {
    $menu = $sqlMenu->getMenu('menu');
}

require_once 'views/v-alimentos.php';

?>