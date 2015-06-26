<?php

function Novedades() {
    ?>
    <div class="container">
        <div class="fish-info-section">
            <div class="fish-info-left">
                <img src="<?php
                $em = new CL_EMPRESA();
                $em->GET_IMAGENES();
                $nov = explode('/', $em->strNovedades);
                echo $nov[0] . '/' . $nov[1] . '/no_' . $nov[2];
                ?>" alt="" />
            </div>
            <div class="fish-info-middle">
                <h4>Novedades</h4>
            </div>
            <div class="fish-info-right">
                <h3>Novedades</h3>
                <p><?php echo $GLOBALS['Empresa']->strTextoNovedades; ?></p>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
    <?php
}
