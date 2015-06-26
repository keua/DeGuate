<?php
include './Header.php';
include './CLASES/CL_MARCA.php';

function Marcas() {
    ?>
    <div class="thumb-box7 grid_12">
        <div class="container">
            <h3>MARCAS</h3>
            <div class="row">
                <?php
                $mar = new CL_MARCA();
                $marcas = $mar->ObtenerMarcas();

                for ($index = 0; $index < count($marcas); $index++) {
                    ?>
                    <div class="col-lg-6 col-md-6 col-sm-6">
                        <div class="thumb-pad3">
                            <div class="thumbnail">
                                <figure><img src="<?php $marc = explode('/', $marcas[$index]->strImagen);
                                                        echo $marc[0] . '/' . $marc[1] . '/ma_' . $marc[2];?>" alt=""></figure>
                                <div class="sale-title">
                                    <a><?php echo $marcas[$index]->strTitulo; ?></a>
                                    <p><?php echo $marcas[$index]->strDescripcion; ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                }
                ?>
            </div>
        </div>
    </div>
    <?php
}

head();
Marcas();
footer();
?>


