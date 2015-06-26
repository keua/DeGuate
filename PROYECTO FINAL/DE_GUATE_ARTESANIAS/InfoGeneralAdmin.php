<?php
include './HeaderAdmin.php';
include '../CLASES/CL_REDSOCIAL.php';
include './CLASES/CL_IMAGEN.php';

$actividad = $_GET['act'];

function InfoGeneral($act) {
    switch ($act) {
        case 1:
            CambiarImagenes();
            break;
        case 2:
            CambiarInformacion();
            break;
        case 3:
            RedesSociales();
            break;
        default:
            break;
    }
}

function CambiarImagenes() {
    $img = new CL_IMAGEN();
    $imagenes = $img->ObtenerImagenes();
    ?>    
    <div class="box box-danger">
        <div class="box-header with-border">
            <h3 class="box-title">Elegir Imagen para Mostrar</h3>
            <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
            </div>
        </div><!-- /.box-header -->
        <form action="./Empresa.php?act=2" method="post">
            <div class="box-body no-padding">
                <ul class="users-list clearfix">
                    <ul class="users-list clearfix">
                        <?php
                        for ($index = 0; $index < count($imagenes); $index++) {
                            ?>
                            <!--<ul class="users-list clearfix">  --> 
                            <li>
                                <img src="<?php
                                $pro = explode('/', $imagenes[$index]->strUrl);
                                echo $pro[0] . '/' . $pro[1] . '/ga_' . $pro[2];
                                ?>" alt="User Image" height="100" width="100"/>
                                <input type="checkbox" class="users-list"  name="Imagen[]" value="<?php echo $imagenes[$index]->intId; ?>"/>

                            </li>   
                            <?php if ($index > 0 && ($index + 1) % 4 == 0) { ?>
                                <!--</ul> -->
                                <?php
                            }
                        }
                        ?>
                    </ul><!-- /.users-list -->
            </div><!-- /.box-body -->
            <li align = "center">
                <input type="submit" value="Portada" name="Portada" id="Portada"  class="btn btn-success">
                <input type="submit" value="Novedades" name="Novedades" id="Novedades"  class="btn btn-danger">
                <input type="submit" value="Logo" name="Logo" id="Logo"  class="btn btn-info ">
            </li>
        </form>
    </div><!--/.box -->
    <?php
}

function CambiarInformacion() {
    ?>
    <div class="col-lg-6-6">
        <!-- general form elements disabled -->
        <div class="box box-warning">
            <div class="box-header">
                <h3 class="box-title">Editar Informacion de la Empresa</h3>
            </div><!-- /.box-header -->
            <div class="box-body">
                <form action="./Empresa.php?act=1" method="POST">
                    <!-- text input -->
                    <div class="form-group has-feedback">
                        <label>Nombre</label>
                        <input type="text" class="form-control" placeholder="Nombre ..." name="nombre" value="<?php echo $GLOBALS['Empresa']->strNombre; ?>"/>
                        <span class="glyphicon glyphicon-user form-control-feedback"></span>
                    </div>
                    <!-- text input -->
                    <div class="form-group has-feedback">
                        <label>Telfono</label>
                        <input type="text" class="form-control" placeholder="Telefono ..." name="telefono" value="<?php echo $GLOBALS['Empresa']->intTelefono; ?>"/>
                        <span class="glyphicon glyphicon-phone form-control-feedback"></span>
                    </div>
                    <!-- text input -->
                    <div class="form-group has-feedback">
                        <label>Correo</label>
                        <input type="email" class="form-control" placeholder="Correo ..." name="correo" value="<?php echo $GLOBALS['Empresa']->strCorreo; ?>"/>
                        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                    </div>

                    <!-- textarea -->
                    <div class="form-group has-feedback">
                        <label>Direccion</label>
                        <textarea class="form-control" rows="3" placeholder="Direccion ..." name="direccion"><?php echo $GLOBALS['Empresa']->strDireccion; ?></textarea>
                    </div>

                    <!-- textarea -->
                    <div class="form-group has-feedback">
                        <label>Slogan</label>
                        <textarea class="form-control" rows="3" placeholder="Slogan ..." name="slogan"><?php echo $GLOBALS['Empresa']->strSlogan; ?></textarea>
                    </div>

                    <!-- textarea -->
                    <div class="form-group has-feedback">
                        <label>Descripcion</label>
                        <textarea class="form-control" rows="3" placeholder="Descripcion ..." name="descripcion"><?php echo $GLOBALS['Empresa']->strDescripcion; ?></textarea>
                    </div>

                    <!-- textarea -->
                    <div class="form-group has-feedback">
                        <label>Texto Novedades</label>
                        <textarea class="form-control" rows="3" placeholder="Novedades ..." name="novedades"><?php echo $GLOBALS['Empresa']->strTextoNovedades; ?></textarea>
                    </div>

                    <!-- textarea -->
                    <div class="form-group has-feedback">
                        <label>Mision</label>
                        <textarea class="form-control" rows="3" placeholder="Mision ..." name="mision"><?php echo $GLOBALS['Empresa']->strMision; ?></textarea>
                    </div>

                    <!-- textarea -->
                    <div class="form-group has-feedback">
                        <label>Vision</label>
                        <textarea class="form-control" rows="3" placeholder="Vision ..." name="vision"><?php echo $GLOBALS['Empresa']->strVision; ?></textarea>
                    </div>

                    <button type="submit"  class="btn btn-primary">Guardar</button>

                </form>
            </div><!-- /.box-body -->
        </div><!-- /.box -->
    </div><!--/.col (right) -->
    <?php
}

function RedesSociales() {
    $rs = new CL_REDSOCIAL();
    $redes = $rs->ObtenerRedSocial();
    ?>
    <div class="box box-danger">
        <div class="box-header with-border">
            <h3 class="box-title">Eliminar Redes Sociales</h3>
            <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
            </div>
        </div><!-- /.box-header -->
        <?php
        for ($index = 0; $index < count($redes); $index++) {
            ?>
            <ul class="users-list clearfix"> 
                <li>
                    <form action="./INCLUDES/Redes.php?act=2" method="POST">
                        <div class="box-body no-padding">
                            <div class="col-md-3 col-sm-6 col-xs-12">
                                <div class="info-box">
                                    <span class="info-box-icon bg-red"><i class="fa fa-google-plus"></i></span>
                                    <div class="info-box-content">
                                        <span class="info-box-text"></span>
                                        <span class="info-box-number"><?php echo $redes[$index]->strNombre; ?></span>
                                        <input type="hidden" name="id" value="<?php echo $redes[$index]->intId; ?>">
                                        <input type="submit" value="Eliminar" id="register-submit"  class="btn btn-danger">
                                    </div><!-- /.info-box-content -->
                                </div><!-- /.info-box -->
                            </div><!-- /.col -->
                        </div><!-- /.box-body -->
                    </form>
                </li>
                <?php if ($index > 0 && ($index + 1) % 4 == 0) { ?>
                </ul>
                <?php
            }
        }
        ?>
    </div><!--/.box -->
    <div class="box box-danger">
        <div class="box-header with-border">
            <h3 class="box-title">Crear Red Social</h3>
            <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
            </div>
        </div><!-- /.box-header -->
        <form action="./INCLUDES/Redes.php?act=1" method="Post">
            <div class="col-lg-6-6">
                <!-- general form elements disabled -->
                <div class="box box-warning">
                    <div class="box-body">
                        <form role="form">
                            <!-- text input -->
                            <div class="form-group">
                                <label>Nombre</label>
                                <input type="text" name="nombre" class="form-control" placeholder="Enter ..."/>
                                <span class="glyphicon glyphicon-bookmark form-control-feedback"></span>
                            </div>
                            <!-- text input -->
                            <div class="form-group">
                                <label>Link</label>
                                <input type="url" name="link" class="form-control" placeholder="Enter ..."/>
                                <span class="glyphicon glyphicon-home form-control-feedback"></span>
                            </div>

                            <button type="submit" class="btn btn-primary">Submit</button>


                    </div><!-- /.box-body -->
                </div><!-- /.box -->
            </div><!--/.col (right) -->

        </form>
        <div class="box-footer text-center">
            <a href="javascript::" class="uppercase">View All Users</a>
        </div><!-- /.box-footer -->
    </div><!--/.box -->
    <?php
}

if (isset($_SESSION['user'])) {
    head();
    InfoGeneral($actividad);
    footer();
} else {
    header("Location:http://localhost:8000/Login.php");
}