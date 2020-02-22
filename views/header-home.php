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
    <header class="site-header inicio">
        <div class="contenedor contenido-header">
            <div class="barra-navegacion inicio">
                <div class="logo">
                    <a href="<?php echo './index.php' ?>"><img src="img/logo.png" alt="Logo food go"></a>
                </div>
                <div class="navegacion-y-carrito">
                    <nav class="navegacion">
                            <a href="login.php">Iniciar Sesión</a>
                            <!--<a href="registro.html">Registrarse</a>-->
                    </nav>
                    <div class="carrito-compras">
                        <a href="carrito.php">
                            <i class="icono fas fa-shopping-cart"></i>
                            <span class="contador"></span>
                        </a>
                    </div><!--.carrito-->
                </div>
            </div>
            <div class="contenido-hero">
                <h1>Disfruta una Nueva Experiencia</h1>
                <p>Realiza tu compra anticipada ¡no esperes más!</p>
                <a href="./alimentos.php" class="mg-top br boton boton-verde">¡COMPRAR YA!</a>
            </div>
        </div>
    </header>