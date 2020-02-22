<?php require_once 'header.php'; ?>


    <main class="contenedor main-alimentos-carrito">

        <h2 class="fw-300">Elegir forma de pago</h2>

        <div class="contenedor-carrito pago">
            <section class="seccion-carrito pago">
                <div class="carrito-pago">
                    <div class="head">
                        <div class="col-opcion-pago">
                            <p>Opción de Pago</p>
                        </div>
                    </div>
                    <div class="body">
                        <form action="pago-finalizado.php" method="POST" id="form-paypal">
                            <div class="dos-cols contenedor-paypal">
                                <div class="col-1 paypal">
                                    <input type="radio" name="opcion-pago" id="opcion-paypal">
                                    <label for="opcion-paypal">Paypal</label>
                                </div>
                                <div class="col-2 campos-paypal">
                                    <input type="email" name="id-paypal" id="id-paypal" placeholder="Paypal ID">
                                </div>
                            </div>
                        </form>
                        <div class="contenedor-nueva-tarjeta">
                            <form action="pago-finalizado.php" method="POST" id="form-tarjeta">
                                <div class="nueva-tarjeta">
                                    <input checked="true" type="radio" name="opcion-pago" id="opcion-tarjeta" form="form-paypal">
                                    <label for="opcion-tarjeta">Nueva tarjeta de crédito/débito</label>
                                </div>
                                <div id="campos-nueva-tarjeta">
                                    <div class="contenedor-numero-tarjeta">
                                        <div class="dos-cols">
                                            <div class="col-1">
                                                <div class="contenedor-fechar">
                                                    <label for="numero-tarjeta">Número de Tarjeta:</label>
                                                </div>
                                                <input type="text" name="numero-tarjeta" id="numero-tarjeta" placeholder="Número de Tarjeta">
                                            </div>
                                            <div class="col-2">
                                                <div class="contenedor-fechar">
                                                    <label for="titular-tarjeta">Titular de la tarjeta:</label>
                                                </div>
                                                <input type="text" name="titular-tarjeta" id="titular-tarjeta" placeholder="Titular de la tarjeta">
                                            </div>
                                        </div>
                                        <div class="dos-cols">
                                            <div class="col-1">
                                                <div class="contenedor-fechar">
                                                    <label for="vencimiento-tarjeta">Fecha de Vencimiento:</label>
                                                </div>
                                                <input type="text" name="vencimiento-tarjeta" id="vencimiento-tarjeta" placeholder="mm/aa">
                                            </div>
                                            <div class="col-2">
                                                <div class="contenedor-fechar">
                                                    <label for="cvv-cvc-tarjeta">CVV/CVC:</label>
                                                </div>
                                                <input type="number" name="cvv-cvc-tarjeta" id="cvv-cvc-tarjeta" placeholder="CVV/CVC">
                                            </div>
                                        </div>
                                    </div>
                                </div>    
                            </form>
                            <div id="error" class="error">
                                <p></p>
                            </div>
                        </div>
                    </div>
                    <?php for($i = 0; $i < count($alimentos); $i++): ?>
                        <?php $total += ($alimentos[$i]['precio'] * $carrito[$i]->unidades); ?>
                    <?php endfor; ?>
                </div>
            </section>

            <aside class="resumen-carrito">
                <div class="contenido-carrito">
                    <div class="resumen-pedido">
                        <p>Resumen del pedido (<?php echo '<span>' . count($alimentos) . '</span>' . ($var = (count($alimentos)) > 1 ? ' items' : ' item'); ?>)</p>
                    </div>
                    <div class="contenedor-pago">
                        <p id="pago-total" class="pago-total">Total: $ <span><?php echo $total; ?></span></p>
                        <button id="realizar-pago" type="submit" form="form-tarjeta">Realizar Pago</button>
                    </div>
                </div>
            </aside>
        </div>
    </main>

<?php require_once 'footer.php'; ?>