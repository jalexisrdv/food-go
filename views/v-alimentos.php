<?php require_once 'header.php'; ?>

    <main class="main-alimentos">
        <section class="seccion-alimentos venta" id="lista-alimentos">
            <?php if(count($menu) > 0): ?>
                <h2 class="fw-300 centrar-texto">Selecciona los Alimentos que mas te Gusten</h2>
                <div class="alimentos">
                    <?php foreach($menu as $alimento): ?>
                        <div class="alimento">
                            <div class="imagen">
                                <img src="<?php echo $alimento['url_img']; ?>" alt="">
                            </div>
                            <div class="info-alimento">
                                <h3><?php echo $alimento['nombre']; ?></h3>
                                <p class="precio">Precio: $<span><?php echo $alimento['precio']; ?></span></p>
                                <form action="" method="POST" class="contenedor-unidades">
                                    <input type="number" name="unidades" id="unidades" placeholder="Unidades" min="1" onkeypress="return pulsar(event)">
                                </form>
                                <a href="#" class="boton boton-verde agregar-carrito" data-id="<?php echo $alimento['id_alimento']; ?>" data-id-sub-categoria="<?php echo $alimento['id_sub_categoria']; ?>" data-sub-categoria="<?php echo $alimento['sub_categoria']; ?>">Añadir al Carrito</a>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php else: ?>
                <h1 class="fw-300 centrar-texto">No hay alimentos que mostrar :(</h1>
            <?php endif; ?>
        </section>
    </main>

<?php require_once 'footer.php'; ?>