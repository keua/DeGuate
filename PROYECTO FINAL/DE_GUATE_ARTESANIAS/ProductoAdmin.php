<?php
include './HeaderAdmin.php';
include './CLASES/CL_IMAGEN.php';
include './CLASES/CL_CATEGORIA.php';
include './CLASES/CL_PRODUCTO.php';

$actividad = $_GET['act'];

function Productos($act) {
    switch ($act) {
        case 3:

            Crear();

            break;
        case 2:
            Editar();
            break;
        case 1:
            Eliminar();
            break;
        case 4:
            FormEditar();
        default:
            break;
            break;
    }
}

function Eliminar() {
    $pro = new CL_PRODUCTO();
    $productos = $pro->ObtenerProductos();
    ?>
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Tabla de Productos</h3>
                    </div><!-- /.box-header -->
                    <div class="box-body">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th align="center">Imagen</th>
                                    <th align="center">Producto</th>
                                    <th align="center">Descripcion</th>
                                    <th align="center">Categoria</th>
                                    <th align="center">Precio</th>
                                    <th align="center">Editar</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php for ($index = 0; $index < count($productos); $index++) {
                                    ?>
                                    <tr>
                                        <td valign="center" align="center">
                                            <img src="<?php echo $productos[$index]->arrImagen[0]; ?>" alt="User Image" width="40" height="40"/> </td>
                                        <td align="center"><?php echo $productos[$index]->strTitulo; ?></td>
                                        <td align="center"><?php echo $productos[$index]->strDescripcion; ?></td>
                                        <td align="center"><?php
                                            $cat = $productos[$index]->arrCategoria[0];
                                            if ($productos[$index + 1]->intId == $productos[$index]->intId) {
                                                $cat .= ', ' . $productos[$index + 1]->arrCategoria[0];
                                            }echo $cat;
                                            ?></td>
                                        <td align="center"><?php echo 'Q.' . doubleval($productos[$index]->dblPrecio); ?></td>
                                        <td align="center">
                                            <form action="./INCLUDES/Productos.php?act=2" method="POST">

                                                <input type="hidden" name="id" value="<?php echo $productos[$index]->intId; ?> ">

                                                <input type="submit" value="eliminar" name="eliminar" class="btn btn-danger">
                                            </form>
                                        </td>
                                    </tr>
                                    <?php
                                    if ($productos[$index + 1]->intId == $productos[$index]->intId) {
                                        $index++;
                                    }
                                }
                                ?>
                            </tbody>
                        </table>
                    </div><!-- /.box-body -->
                </div><!-- /.box -->
            </div><!-- /.col -->
        </div><!-- /.row -->
    </section><!-- /.content -->
    <?php
}

function Crear() {
    ?>
    <body class="register-page">
        <div class="register-box">

            <div class="register-box-body">
                <p class="login-box">Registrar Nuevo Producto</p>
                <form action="./INCLUDES/Productos.php?act=1" method="post">
                    <div class="form-group has-feedback">
                        <input type="text" class="form-control" placeholder="Producto" name="titulo"  id="marca"/>
                        <span class="glyphicon glyphicon-user form-control-feedback"></span>
                    </div>
                    <div class="form-group has-feedback">
                        <input type="text" class="form-control" placeholder="Precio" name="precio"  id="marca"/>
                        <span class="glyphicon glyphicon-euro form-control-feedback"></span>
                    </div>
                    <div class="form-group has-feedback">
                        <textarea class="form-control" placeholder="Descripcion" name="descripcion"  id="descripcion"></textarea>
                        <span class="glyphicon glyphicon-dashboard form-control-feedback"></span>
                    </div>
                    <div class="form-group has-feedback">
                        <?php catalogo_img(); ?>
                    </div>
                    <div class="form-group has-feedback">
                        <?php catalogo_cat(); ?>
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

function catalogo_img() {
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

function catalogo_cat() {
    $cat = new CL_CATEGORIA();
    $categorias = $cat->ObtenerCategorias();
    ?>
    <div class="box box-danger">
        <div class="box-header with-border">
            <h3 class="box-title">Elegir Categoria</h3>
            <div class="box-tools pull-left">
                <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
            </div>
        </div><!-- /.box-header -->
        <div class="box-body no-padding">
            <ul class="users-list clearfix">
                <?php
                for ($index = 0; $index < count($categorias); $index++) {
                    ?>
                    <ul class="users-list clearfix">   
                        <li>
                            <img src="<?php
                            $pro = explode('/', $categorias[$index]->strImagen);
                            echo $pro[0] . '/' . $pro[1] . '/ga_' . $pro[2];
                            ?>" alt="User Image" height="160" width="90"/>
                            <a class="users-list-name"><?php echo $categorias[$index]->strNombre; ?></a>

                            <input type="checkbox" class="users-list"  name="Categoria[]" value="<?php echo $categorias[$index]->intId; ?>"/>

                        </li>   
                    <?php if ($index > 0 && ($index + 1) % 4 == 0) { ?>
                        </ul>
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

function Editar() {
    $pro = new CL_PRODUCTO();
    $productos = $pro->ObtenerProductos();
    ?>
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Tabla de Marcas</h3>
                    </div><!-- /.box-header -->
                    <div class="box-body">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th align="center">Imagen</th>
                                    <th align="center">Producto</th>
                                    <th align="center">Descripcion</th>
                                    <th align="center">Categoria</th>
                                    <th align="center">Precio</th>
                                    <th align="center">Editar</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php for ($index = 0; $index < count($productos); $index++) {
                                    ?>
                                    <tr>
                                        <td valign="center" align="center">
                                            <img src="<?php echo $productos[$index]->arrImagen[0]; ?>" alt="User Image" width="40" height="40"/> </td>
                                        <td align="center"><?php echo $productos[$index]->strTitulo; ?></td>
                                        <td align="center"><?php echo $productos[$index]->strDescripcion; ?></td>
                                        <td align="center"><?php
                                            $cat = $productos[$index]->arrCategoria[0];
                                            if ($productos[$index + 1]->intId == $productos[$index]->intId) {
                                                $cat .= ', ' . $productos[$index + 1]->arrCategoria[0];
                                            }echo $cat;
                                            ?></td>
                                        <td align="center"><?php echo 'Q.' . doubleval($productos[$index]->dblPrecio); ?></td>
                                        <td align="center">
                                            <form action="./ProductoAdmin.php?act=4" method="POST">

                                                <input type="hidden" name="id" value="<?php echo $productos[$index]->intId; ?> ">
                                                <input type="hidden" name="titulo" value="<?php echo $productos[$index]->strTitulo; ?> ">
                                                <input type="hidden" name="descripcion" value="<?php echo $productos[$index]->strDescripcion; ?> ">
                                                <input type="hidden" name="precio" value="<?php echo $productos[$index]->dblPrecio; ?> ">

                                                <input type="submit" value="editar" name="editar" class="btn btn-success">
                                            </form>
                                        </td>
                                    </tr>
                                    <?php
                                    if ($productos[$index + 1]->intId == $productos[$index]->intId) {
                                        $index++;
                                    }
                                }
                                ?>
                            </tbody>
                        </table>
                    </div><!-- /.box-body -->
                </div><!-- /.box -->
            </div><!-- /.col -->
        </div><!-- /.row -->
    </section><!-- /.content -->
    <?php
}

function FormEditar() {
    $id = $_POST['id'];
    $titulo = $_POST['titulo'];
    $descripcion = $_POST['descripcion'];
    $precio = $_POST['precio'];
    ?>
    <body class="register-page">
        <div class="register-box">

            <div class="register-box-body">
                <p class="login-box">Editar Producto</p>
                <form action="./INCLUDES/Productos.php?act=3" method="post">
                    <div class="form-group has-feedback">
                        <input type="text" class="form-control" placeholder="Producto" name="titulo"  id="titulo" value="<?php echo $titulo; ?>"/>
                        <span class="glyphicon glyphicon-user form-control-feedback"></span>
                    </div>
                    <div class="form-group has-feedback">
                        <input type="text" class="form-control" placeholder="Precio" name="precio"  id="precio" value="<?php echo $precio; ?>"/>
                        <span class="glyphicon glyphicon-euro form-control-feedback"></span>
                    </div>
                    <div class="form-group has-feedback">
                        <textarea class="form-control" placeholder="Descripcion" name="descripcion"  id="descripcion"> <?php echo $descripcion; ?></textarea>
                        <span class="glyphicon glyphicon-dashboard form-control-feedback"></span>
                    </div>
                    <div class="form-group has-feedback">
                        <input type="hidden" name="producto" id="producto" value ="<?php echo $id; ?>"/>
                    </div>
                    <div class="form-group has-feedback">
    <?php catalogo_img(); ?>
                    </div>
                    <div class="form-group has-feedback">
    <?php catalogo_cat(); ?>
                    </div>
                    <div class="row">
                        <div class="col-xs-8">                         
                        </div><!-- /.col -->
                        <div class="col-xs-4">
                            <input type="button" class="btn btn-danger btn-block btn-flat" value="Cancelar" onClick="window.open('./ProductoAdmin.php?act=2')">
                            <button type="submit" class="btn btn-primary btn-block btn-flat">Guardar</button>
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

if (isset($_SESSION['user'])) {
    head();
    Productos($actividad);
    footer();
} else {
    header("Location:http://localhost:8000/Login.php");
}