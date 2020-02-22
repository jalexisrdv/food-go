<?php 

require_once 'models/sql-categorias.php';

$sqlCategorias = new SQLCategorias();
$categoriasPlatillos = $sqlCategorias->getCategoriasPlatillos();
$categoriasBebidas = $sqlCategorias->getCategoriasBebidas();
$categoriasPostres = $sqlCategorias->getCategoriasPostres();

require_once 'views/header.php'; 

?>

    <main class="main-alimentos">
        <section class="seccion-alimentos venta" id="lista-alimentos">
            <h1 class="fw-300 centrar-texto">En desarrollo :)</h1>
        </section>
    </main>

<?php require_once 'views/footer.php'; ?>