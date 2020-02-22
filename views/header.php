<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Food Go</title>
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/style.css">
    <script defer src="js/all.js"></script>
</head>
<body>
    <header class="site-header alimentos">
        <div class="contenedor contenido-header">
            <div class="barra-navegacion">
                <div class="logo">
                    <a href="<?php echo './index.php' ?>"><img src="img/logo-2.png" alt="Logo food go"></a>
                </div>
                <div class="navegacion-y-carrito">
                    <nav class="navegacion">
                        <a href="#" class="btn-menu-movil"><i class="fas fa-bars icono"></i></a>
                        <ul class="menu-escritorio">
                            <li><a href="login.php"><i class="fas fa-sign-in-alt"></i> Iniciar Sesión</a></li>
                            <li>
                                <a href="#"><i class="fas fa-utensils"></i> Platillos <i class="fas fa-chevron-down icono-d"></i></a>
                                <ul>
                                    <li><a href="crear-platillo.php">crear platillo</a></li>
                                    <?php foreach($categoriasPlatillos as $platillo): ?>
                                        <li><a href="alimentos.php?categoria=<?php echo $platillo['nombre_categoria_platillo']; ?>"><?php echo $platillo['nombre_categoria_platillo']; ?></a></li>
                                    <?php endforeach; ?>
                                </ul>
                            </li>
                            <li>
                                <a href="#"><i class="fas fa-glass-martini"></i> Bebidas <i class="fas fa-chevron-down icono-d"></i></a>
                                <ul>
                                    <?php foreach($categoriasBebidas as $bebida): ?>
                                        <li><a href="alimentos.php?categoria=<?php echo $bebida['nombre_categoria_bebida']; ?>"><?php echo $bebida['nombre_categoria_bebida']; ?></a></li>
                                    <?php endforeach; ?>
                                </ul>
                            </li>
                            <li>
                                <a href="#"><i class="fas fa-ice-cream"></i> Postres <i class="fas fa-chevron-down icono-d"></i></a>
                                <ul>
                                    <?php foreach($categoriasPostres as $postre): ?>
                                        <li><a href="alimentos.php?categoria=<?php echo $postre['nombre_categoria_postre']; ?>"><?php echo $postre['nombre_categoria_postre']; ?></a></li>
                                    <?php endforeach; ?>
                                </ul>
                            </li>
                        </ul>
                    </nav>
                    <div class="carrito-compras">
                        <a href="carrito.php">
                            <i class="icono fas fa-shopping-cart"></i>
                            <span class="contador"></span>
                        </a>
                    </div><!--.carrito-->
                </div>
            </div>
        </div>
    </header>