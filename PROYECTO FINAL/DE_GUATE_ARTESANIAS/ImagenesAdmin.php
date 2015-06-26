<?php
include './HeaderAdmin.php';
include './CLASES/CL_IMAGEN.php';
$actividad = $_GET['act'];

function Imagenes($act) {

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
    <div class="col-lg-6-1" align="center">
        <!-- general form elements disabled -->
        <div class="box box-warning">
            <div class="box-header">
                <h3 class="box-title">Subir Imagen</h3>
            </div><!-- /.box-header -->
            <div class="box-body">
                <form enctype="multipart/form-data" action="./INCLUDES/uploader.php" method="POST">

                    <div class="form-group">
                        <label>Seleccionar Imagen</label>
                        <input name="imagen[]" id="imagen" type="file" />
                        <input name="imagen[]" id="imagen" type="file" />
                        <input name="imagen[]" id="imagen" type="file" />
                        <input name="imagen[]" id="imagen" type="file" />
                        <input name="imagen[]" id="imagen" type="file" />
                    </div>

                    <!-- textarea -->
                    <div class="form-group">
                        <label>Descripcion</label>
                        <textarea name="Descripcion" class="form-control" rows="3" placeholder="Enter ..."></textarea>
                    </div>

                    <input type="submit" class="btn btn-primary" name="submit" id="submit" value="Subir" />

                </form>
            </div><!-- /.box-body -->
        </div><!-- /.box -->
    </div><!--/.col (right) -->

    <?php
}

function Eliminar() {
    $img = new CL_IMAGEN();
    $imagenes = $img->ObtenerImagenes();
    ?>
    <div class="box box-danger">
        <div class="box-header with-border">
            <h3 class="box-title">Eliminar Imagenes</h3>
            <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
            </div>
        </div><!-- /.box-header -->
        <form action="./INCLUDES/EliminarImagen.php" name="form" method="post">
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
            <li align = "center">
                <input type="submit" value="Eliminar" name="submit" id="register-submit"  class="btn btn-danger">
            </li>
        </form>
        <div class="box-footer text-center">

        </div><!-- /.box-footer -->
    </div><!--/.box -->
    <?php
}

if (isset($_SESSION['user'])) {
    head();
    Imagenes($actividad);
    footer();
} else {
    header("Location:http://localhost:8000/Login.php");
}