<?php
include './HeaderAdmin.php';
include './CLASES/CL_IMAGEN.php';
include './CLASES/CL_TIENDA.php';

$actividad = $_GET['act'];

function Tiendas($act) {

    switch ($act) {
        case 2:
            Crear();
            break;
        case 1:
            Eliminar();
            break;
        default:
            break;
    }
}

function Crear() {
    ?>
    <body class="responsive">
        <div class="register-box">

            <div class="register-box-body">
                <p class="login-box">Registrar Nueva Tienda</p>
                <form action="./INCLUDES/Tiendas.php?act=1" method="post">
                    <div class="form-group has-feedback">
                        <input type="text" class="form-control" placeholder="Tienda" name="nombre"  id="marca"/>
                        <span class="glyphicon glyphicon-user form-control-feedback"></span>
                    </div>
                    <div class="form-group has-feedback">
                        <input type="tel" class="form-control" placeholder="Telefono" name="telefono"  id="marca"/>
                        <span class="glyphicon glyphicon-phone form-control-feedback"></span>
                    </div>
                    <div class="form-group has-feedback">
                        <input type="url" class="form-control" placeholder="Enlace" name="enlace"  id="marca"/>
                        <span class="glyphicon glyphicon-home form-control-feedback"></span>
                    </div>
                    <div class="form-group has-feedback">
                        <textarea class="form-control" placeholder="Direccion" name="direccion"  id="descripcion"></textarea>
                        <span class="glyphicon glyphicon-dashboard form-control-feedback"></span>
                    </div>
                    <div class="form-group has-feedback">
                        <?php catalogo(); ?>
                    </div>
                    <div class="row">
                        <div class="col-xs-8">                         
                        </div><!-- /.col -->
                        <div class="col-xs-4">
                            <button type="submit" class="btn btn-primary btn-block btn-flat">Crear</button>
                        </div><!-- /.col -->
                    </div>
                </form>        
            </div><!-- /.form-box -->
        </div><!-- /.register-box -->

        <!-- jQuery 2.1.4 -->
        <script src="../../plugins/jQuery/jQuery-2.1.4.min.js"></script>
        <!-- Bootstrap 3.3.2 JS -->
        <script src="../../bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <!-- iCheck -->
        <script src="../../plugins/iCheck/icheck.min.js" type="text/javascript"></script>
        <script>
            $(function () {
                $('input').iCheck({
                    checkboxClass: 'icheckbox_square-blue',
                    radioClass: 'iradio_square-blue',
                    increaseArea: '20%' // optional
                });
            });
        </script>
    </body>
    <?php
}

function catalogo() {
    $img = new CL_IMAGEN();
    $imagenes = $img->ObtenerImagenes();
    ?>
    <div class="box box-danger">
        <div class="box-header with-border">
            <h3 class="box-title">Elegir Imagen</h3>
            <div class="box-tools pull-left">
                <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
            </div>
        </div><!-- /.box-header -->
        <div class="box-body no-padding">
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
        <div class="box-footer text-center">
        </div><!-- /.box-footer -->
    </div><!--/.box -->
    <?php
}

function Eliminar() {
    $tie = new CL_TIENDA();
    $tiendas = $tie->ObtenerTiendas();
    ?>
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Eliminar Tienda</h3>
                    </div><!-- /.box-header -->
                    <div class="box-body">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th align="center">Tienda</th>
                                    <th align="center">Nombre</th>
                                    <th align="center">Direccion</th>
                                    <th align="center">Eliminar</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php for ($index = 0; $index < count($tiendas); $index++) {
                                    ?>
                                    <tr>
                                        <td valign="center" align="center">
                                            <img src="<?php echo $tiendas[$index]->strImagen; ?>" alt="User Image" width="40" height="40"/> </td>
                                        <td align="center"><?php echo $tiendas[$index]->strNombre; ?></td>
                                        <td align="center"><?php echo $tiendas[$index]->strDireccion; ?></td>
                                        <td align="center">
                                            <form action="./INCLUDES/Tiendas.php?act=2" method="POST">

                                                <input type="hidden" name="id" value="<?php echo $tiendas[$index]->intId; ?> ">

                                                <input type="submit" value="eliminar" name="eliminar" class="btn btn-danger">
                                            </form>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div><!-- /.box-body -->
                </div><!-- /.box -->
            </div><!-- /.col -->
        </div><!-- /.row -->
    </section><!-- /.content -->
    <?php
}

if (isset($_SESSION['user'])) {
    head();
    Tiendas($actividad);
    footer();
}
header("Location:http://localhost:8000/Login.php");
