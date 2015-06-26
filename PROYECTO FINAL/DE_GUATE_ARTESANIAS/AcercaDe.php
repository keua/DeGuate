<?php
include './Header.php';

function AcercaDe() {
    ?>

    <!-- content-section-starts -->
    <div class="global indent">
        <!--content-->
        <div class="who-box">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-6 col-sm-6 about-sec">
                        <h3>Mision</h3>
                        <div class="thumb-pad4">
                            <div class="thumbnail">
                                <figure><img src="<?php $por = explode('/', $GLOBALS['Empresa']->strLogo); echo $por[0].'/'.$por[1].'/pr_'.$por[2]; ?>" alt=""></figure>
                                <div class="about-title">
                                    <h4>Nuestra Mision es</h4>
                                    <p><?php echo $GLOBALS['Empresa']->strMision; ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6 about-sec">
                        <h3>Vision</h3>
                        <div class="thumb-pad4">
                            <div class="thumbnail">
                                <figure><img src="<?php $por = explode('/', $GLOBALS['Empresa']->strLogo); echo $por[0].'/'.$por[1].'/pr_'.$por[2]; ?>" alt=""></figure>
                                <div class="about-title">
                                    <h4>NUESTRA VISION ES </h4>
                                    <p><?php echo $GLOBALS['Empresa']->strVision; ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6 about-sec">
                        <h3>Descripcion</h3>
                        <div class="thumb-pad4">
                            <div class="thumbnail">
                                <figure><img src="<?php $por = explode('/', $GLOBALS['Empresa']->strLogo); echo $por[0].'/'.$por[1].'/pr_'.$por[2]; ?>" alt=""></figure>
                                <div class="about-title">
                                    <h4>DESCRIPCION</h4>
                                    <p><?php echo $GLOBALS['Empresa']->strDescripcion; ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>  
    </div>

    <!-- content-section-ends -->


    <?php
}

head();
AcercaDe();
footer();
?>
    
