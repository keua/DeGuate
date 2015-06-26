<?php
include './CLASES/CL_EMPRESA.php';
include './CLASES/CL_CATEGORIA.php';
include './CLASES/CL_REDSOCIAL';

$Empresa = new CL_EMPRESA();
$Empresa->GetInfo();

function head() {
    ?>
    <!--
    Author: W3layouts
    Author URL: http://w3layouts.com
    License: Creative Commons Attribution 3.0 Unported
    License URL: http://creativecommons.org/licenses/by/3.0/
    -->
    <!DOCTYPE html>
    <html>
        <head>
            <title><?php echo $GLOBALS['Empresa']->strNombre; ?>| Home :: w3layouts</title>
            <link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
            <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
            <script src="js/jquery.min.js"></script>
            <!-- Custom Theme files -->
            <link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
            <!-- Custom Theme files -->
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
            <!-- Custom Theme files -->
            <link rel="stylesheet" href="css/touchTouch.css" type="text/css" media="all" />
            <!--webfont-->
            <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
            <link href='http://fonts.googleapis.com/css?family=Playfair+Display+SC:400,900,700italic,700,400italic,900italic' rel='stylesheet' type='text/css'>
            <script src="js/responsiveslides.min.js"></script>
            <script>
                $(function () {
                    $("#slider").responsiveSlides({
                        auto: true,
                        nav: true,
                        speed: 500,
                        namespace: "callbacks",
                        pager: true,
                    });
                });
            </script>
            <script src="js/touchTouch.jquery.js"></script>    
            <script src="js/jquery.ui.totop.js"></script>
            <script>
                $(document).ready(function () {
                    $().UItoTop({easingType: 'easeOutQuart'});
                });

                $(function () {

                    // Initialize the gallery
                    $('.works a.gal').touchTouch();
                });
            </script>
        </head>
        <body>
            <!-- header-starts -->
            <div class="header">
                <div class="col-md-4 header-left">
                    <div class="social-icons">
                        <?php
                        $em = new CL_REDSOCIAL();
                        $redes = $em->ObtenerRedSocial();
                        
                        for ($index = 0; $index < count($redes); $index++) {
                            if ($redes[$index]->strNombre === 'facebook') {
                                ?>
                                <a href="<?php echo $redes[$index]->strUrl; ?>"><i class="facebook"></i></a>
                                <?php
                            } else if ($redes[$index]->strNombre === 'twiter') {
                                ?>
                                <a href = "<?php echo $redes[$index]->strUrl; ?>"><i class = "twitter"></i></a>
                                <?php
                            } else if ($redes[$index]->strNombre === 'google') {
                                ?>
                                <a href="<?php echo $redes[$index]->strUrl; ?>"><i class="google-pluse"></i></a>
                                <?php
                            }  else{
                                ?>
                                <a href="<?php echo $redes[$index]->strUrl; ?>"><i class="social-icons"></i></a>
                                <?php
                            }
                            ?>


                        <?php } ?>
                    </div>
                    <div class="logo">
                        <a href="index.php"><span><?php print $GLOBALS['Empresa']->strSlogan; ?></span>
                            <h1><?php print $GLOBALS['Empresa']->strNombre; ?></h1></a>
                    </div>
                    <div class="top-menu">
                        <ul>
                            <li><a class="active" href="index.php">Home</a></li>
                            <li><a href="AcercaDe.php">Acerca De</a></li>
                            <li><a href="Productos.php">Productos</a></li>
                            <li><a href="Marcas.php">Marcas</a></li>
                            <li><a href="Contacto.php">Contacto</a></li>
                            <li><a href="Tiendas.php">Tiendas</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-8 header-right">
                    <div class="slider">
                        <div class="callbacks_container">
                            <ul class="rslides" id="slider">
                                <?php
                                $emp = new CL_EMPRESA();
                                $emp->GET_IMAGENES();
                                $GLOBALS['Empresa']->arrPortada = $emp->arrPortada;
                                $GLOBALS['Empresa']->strLogo = $emp->strLogo;
                                $GLOBALS['Empresa']->strNovedades = $emp->strNovedades;
                                for ($index = 0; $index < count($emp->arrPortada); $index++) {
                                    ?>
                                <li><img src="<?php $por = explode('/', $emp->arrPortada[$index]); echo $por[0].'/'.$por[1].'/p_'.$por[2]; ?>" class="img-responsive" alt=""style="width:800; height:600;"/></li>
                                <?php } ?>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
            <!-- header-ends -->
            <?php
        }

        function footer() {
            ?>
            <div class="mail-section">
                <ul>
                    <li><i class="message"></i></li>
                    <li><a href=""><?php echo $GLOBALS['Empresa']->strCorreo; ?></a></li>
                    <li><i class="phone"></i></li>
                    <li><?php echo $GLOBALS['Empresa']->intTelefono; ?></li>
                </ul>
                <p><?php echo $GLOBALS['Empresa']->strDireccion; ?></p>
            </div>
            <div class="stellar-section">
                <div class="thumb-box6" data-stellar-background-ratio="-0.2">
                    <div class="container">
                        <h2>Categorias</h2>
                        <div class="row">
                            <?php
                            $cat = new CL_CATEGORIA();
                            $categorias = $cat->ObtenerCategorias();
                            $bandera = FALSE;
                            ?>
                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                                <ul class="list1-2">    
                                    <?php
                                    for ($index = 0; $index < count($categorias); $index++) {
                                        ?>
                                        <li><a href="./Productos.php?cat=<?php echo $categorias[$index]->intId; ?>"><?php echo $categorias[$index]->strNombre; ?></a></li>
                                        <?php
                                        if ($index > 0 && ($index + 1) % 7 == 0) {
                                            ?>
                                        </ul>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                                        <ul class="list1-2">
                                            <?php
                                        }
                                    }
                                    ?>
                                </ul>
                            </div>          
                        </div>
                    </div>
                </div>
            </div>

            <!-- content-section-ends -->
            <div class="footer">
                <div class="copy-rights text-center">
                    <p>&copy; 2014 Design by <a href="http://w3layouts.com" target="target_blank">W3layouts</a></p>
                </div>			
            </div>
        </body>
    </html>
<?php
}
