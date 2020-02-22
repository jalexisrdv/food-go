<?php require_once 'header.php'; ?>


    <main class="contenedor main-alimentos-carrito">
        <?php if(isset($_COOKIE['alimentos']) && $_COOKIE['alimentos']!='[]'): ?>
            <h2 class="fw-300">Revisar artículos del carrito</h2>

            <div class="contenedor-carrito">
                
                    <section class="seccion-carrito" id="lista-alimentos">
                        <div class="alimentos carrito" id="alimentos-carrito">
                            <?php for($i = 0; $i < count($alimentos); $i++): ?>
                                <div class="alimento">
                                    <div class="imagen">
                                        <img src="<?php echo $alimentos[$i]['url_img'] ?>" alt="">
                                    </div>
                                    <div class="info-alimento">
                                        <h3><?php echo $alimentos[$i]['nombre'] ?></h3>
                                        <p class="precio">Precio: $<?php echo $alimentos[$i]['precio'] ?></p>
                                        <p class="unidades" id="unidades">Unidades: <?php echo $carrito[$i]->unidades ?></p>
                                        <div class="contenedor-borrar-alimento">
                                            <a href="#" id="borrar-alimento" class="borrar-alimento" data-id="<?php echo $alimentos[$i]['id_alimento'] ?>" data-sub-categoria="<?php echo $alimentos[$i]['sub_categoria'] ?>" data-unidades="<?php echo $carrito[$i]->unidades ?>">X</a>
                                        </div>
                                    </div>
                                </div>
                                <?php $total += ($alimentos[$i]['precio'] * $carrito[$i]->unidades); ?>
                            <?php endfor; ?>
                        </div>
                        <div class="vaciar-carrito">
                            <a href="" id="vaciar-carrito" class="boton boton-verde">Vaciar Carrito</a>
                        </div>
                    </section>

                    <aside class="resumen-carrito">
                        <div class="contenido-carrito">
                            <div class="resumen-pedido">
                                <p>Resumen del pedido (<?php echo '<span>' . count($alimentos) . '</span>' . ($var = (count($alimentos)) > 1 ? ' items' : ' item'); ?>)</p>
                            </div>
                            <div class="contenedor-pago">
                                <p id="pago-total" class="pago-total">Total: $ <span><?php echo $total; ?></span></p>
                                <form action="pago.php" id="formulario" method="">
                                    <input type="submit" id="terminar-compra" value="Terminar Compra">
                                </form>
                            </div>
                        </div>
                    </aside>
        </div>
        <?php else: ?>
                <h1 class="fw-300 centrar-texto">No hay items dentro del carrito</h1>
            <?php endif; ?>
    </main>

<?php require_once 'footer.php'; ?>