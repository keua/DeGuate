<?php
include './Header.php';
include './CLASES/CL_TIENDA.php';

function Tiendas() {
    ?>
    <!-- content-section-starts -->
    <?php
    $tie = new CL_TIENDA();
    $tiendas = $tie->ObtenerTiendas();
    for ($index = 0; $index < count($tiendas); $index++) {
        ?>
        <div class="special-section">
            <div class="col-md-4 special-section-left">
                <img src="<?php $marc = explode('/', $tiendas[$index]->strImagen);
        echo $marc[0] . '/' . $marc[1] . '/tn_' . $marc[2];
        ?>" alt="" />
            </div>
            <div class="col-md-8 special-section-right">
                <h3><?php echo $tiendas[$index]->strNombre ?></h3>
                <div class="special-section-right-grids">
                    <div class="special-section-right-grid1">
                        <p>DIRECCION</p>
                        <p class="special"><?php echo $tiendas[$index]->strDireccion ?></p>
                        <p>TELEFONO</p>
                        <p class="special"><?php echo $tiendas[$index]->intTelefono ?></p>
                        <a href="<?php echo $tiendas[$index]->strEnlace ?>"><?php echo $tiendas[$index]->strEnlace ?></a>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
    <?php } ?>

    <?php
}

head();
Tiendas();
footer();
?>