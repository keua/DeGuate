<?php
include './Header.php';
include './CLASES/CL_PRODUCTO.php';

function Productos() {
    $pro = new CL_PRODUCTO();
    $productos = array();
    if (isset($_GET['cat'])) {
        $productos = $pro->ObtenerProductoCategoria($_GET['cat']);
    } else {
        $productos = $pro->ObtenerProductos();
    }
    ?>
    <div class="content">
        <div class="container">
            <div class="container_12">
                <div class="grid_12">
                    <h3>Productos</h3>
                </div>
                <div class="clearfix"></div>
                <div class="works">
                    <?php
                    for ($index = 0; $index < count($productos); $index++) {
                        ?>
                        <div class="grid_4 <?php
                        if ($index != 0 && ($index + 1) % 3 == 0) {
                            print 'span66';
                        }
                        ?>">
                            <div class="box1 max-height"><a href="<?php echo $productos[$index]->arrImagen[0]; ?>" class="gal">
                                    <span></span><img src="<?php
                                                      $pro = explode('/', $productos[$index]->arrImagen[0]);
                                                      echo $pro[0] . '/' . $pro[1] . '/pr_' . $pro[2];
                                                      ?>" alt=""></a>
                                <div class="text1">
                                    <a href="#"><?php echo $productos[$index]->strTitulo; ?></a>
                                    <p><?php echo $productos[$index]->strDescripcion; ?></p>
                                    <a href="#"><?php
                                        $cat = $productos[$index]->arrCategoria[0];
                                        if ($productos[$index + 1]->intId == $productos[$index]->intId) {
                                            $cat .= ', ' . $productos[$index + 1]->arrCategoria[0];
                                        }echo $cat;
                                        ?></a>
                                    <p class="price">Q. <?php echo $productos[$index]->dblPrecio ?></p>
                                </div>
                            </div>
                        </div>
                        <?php
                        if ($productos[$index + 1]->intId == $productos[$index]->intId) {
                            $index++;
                        }
                    }
                    ?>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
    </div>
    <?php
}

head();
Productos();
footer();
?>