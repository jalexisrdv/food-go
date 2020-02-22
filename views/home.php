<?php require_once 'header-home.php'; ?>

    <div class="barra">
        <div class="contenedor barra-contenido">
            <div class="icono-barra">
                <div class="contenedor-icono">
                    <i class="icono fas fa-utensils"></i>
                </div>
                <p>Lorem ipsum, dolor sit amet consectetur <br />deserunt minima odio ea magnam</p>
            </div>
            <div class="icono-barra">
                <div class="contenedor-icono">
                    <i class="icono fas fa-glass-martini"></i>
                </div>
                <p>voluptas autem nisi ipsum! <br /> voluptatem facilis perspiciatis</p>
            </div>
            <div class="icono-barra">
                <div class="contenedor-icono">
                    <i class="icono fas fa-ice-cream"></i>
                </div>
                <p>perspiciatis a eligendi? <br /> consectetur, adipisicing elit.</p>
            </div>
        </div>
    </div>

    <main class="seccion contenedor contenido-principal">
        <section class="seccion platillos">
            <h2 class="fw-300 centrar-texto">Platillos, Bebidas y Postres</h2>
            <div class="alimentos inicio">
                <?php foreach($platillos as $platillo): ?>
                    <div class="platillo gradiente alimento">
                        <div class="icono">
                            <i class="icono fas fa-utensils"></i>
                        </div>
                        <img src="<?php echo $platillo['url_img_platillo'] ?>" alt="">
                        <div class="info-alimento">
                            <h3 class="mg-bottom"><?php echo $platillo['nombre_platillo'] ?></h3>
                            <p class="precio">$<?php echo $platillo['precio_platillo'] ?></p>
                        </div>
                    </div>
                <?php endforeach; ?>
                <?php foreach($bebidas as $bebida): ?>
                    <div class="bebida gradiente alimento">
                        <div class="icono">
                            <i class="icono fas fa-glass-martini"></i>
                        </div>
                        <img src="<?php echo $bebida['url_img_bebida'] ?>" alt="">
                        <div class="info-alimento">
                            <h3 class="mg-bottom"><?php echo $bebida['nombre_bebida'] ?></h3>
                            <p class="precio">$<?php echo $bebida['precio_bebida'] ?></p>
                        </div>
                    </div>
                <?php endforeach; ?>
                <?php foreach($postres as $postre): ?>
                    <div class="postre gradiente alimento">
                        <div class="icono">
                            <i class="icono fas fa-ice-cream"></i>
                        </div>
                        <img src="<?php echo $postre['url_img_postre'] ?>" alt="">
                        <div class="info-alimento">
                            <h3 class="mg-bottom"><?php echo $postre['nombre_postre'] ?></h3>
                            <p class="precio">$<?php echo $postre['precio_postre'] ?></p>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
            <div class="comprar-alimentos">
                <a class="boton boton-verde" href="./alimentos.php">¡COMPRAR YA!</a>
            </div>
        </section>
    </main>

    <section class="seccion imagen-contacto">
        <div class="contenedor contenido-contacto">
            <h2>Lorem ipsum dolor, sit amet consectetur adipisicing elit.</h2>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsum officiis expedita ipsam nemo fuga quae rem ratione asperiores quod</p>
            <a href="./contacto.php" class="boton boton-verde">CONTACTÁNOS</a>
        </div>
    </section>

    <section class="contenedor seccion padding-2">
        <h2 class="fw-300 centrar-texto">Más Sobre Nosotros</h2>
        <div class="contenedor-nosotros">
            <div class="icono-nosotros">
                <div class="contenedor-icono">
                    <i class="icono far fa-check-circle"></i>
                </div>
                <h3>Lorem dolor sit amet</h3>
                <p>Quasi quibusdam, quos deserunt, recusandae iusto dolorem voluptatibus quaerat veritatis consectetur culpa sit dignissimos maiores iure id, magnam non voluptatum molestiae doloremque.</p>
            </div>
            <div class="icono-nosotros">
                <div class="contenedor-icono">
                    <i class="icono far fa-money-bill-alt"></i>
                </div>
                <h3>Lorem ipsum sit amet</h3>
                <p>Quasi quibusdam, quos deserunt, recusandae iusto dolorem voluptatibus quaerat veritatis consectetur culpa sit dignissimos maiores iure id, magnam non voluptatum molestiae doloremque.</p>
            </div>
            <div class="icono-nosotros">
                <div class="contenedor-icono">
                    <i class="icono far fa-clock"></i>
                </div>
                <h3>Lorem ipsum dolor</h3>
                <p>Quasi quibusdam, quos deserunt, recusandae iusto dolorem voluptatibus quaerat veritatis consectetur culpa sit dignissimos maiores iure id, magnam non voluptatum molestiae doloremque.</p>
            </div>
        </div>
    </section>

<?php require_once 'footer.php'; ?>