<?php
include './HeaderAdmin.php';
include './CLASES/CL_USUARIO.php';

$actividad = $_GET['act'];

function Usuarios($act) {

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
    <body class="register-page">
        <div class="register-box">

            <div class="register-box-body">
                <p class="login-box-msg">Registrar Nuevo Administrador</p>
                <form action="./INCLUDES/Usuarios.php?act=1" method="post">
                    <div class="form-group has-feedback">
                        <input type="text" class="form-control" placeholder="Usuario" name="usuario"  id="usuario"/>
                        <span class="glyphicon glyphicon-user form-control-feedback"></span>
                    </div>
                    <div class="form-group has-feedback">
                        <input type="password" class="form-control" placeholder="Password" name="password"  id="password"/>
                        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                    </div>
                    <div class="row">
                        <div class="col-xs-8">                         
                        </div><!-- /.col -->
                        <div class="col-xs-4">
                            <button type="submit" class="btn btn-primary btn-block btn-flat">Register</button>
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

function Eliminar() {
    $user = new CL_USUARIO();
    $usuarios = $user->ObtenerUsuarios();
    ?>
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Tabla de Usuario</h3>
                    </div><!-- /.box-header -->
                    <div class="box-body">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th align="center">Usuario</th>
                                    <th align="center">Eliminar</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php for ($index = 0; $index < count($usuarios); $index++) {
                                        
                                   ?>
                                <tr>
                                    <td align="center"><?php echo $usuarios[$index]->strUsuario; ?></td>
                                    <td align="center">
                                        <form action="./INCLUDES/Usuarios.php?act=2" method="POST">
                                            
                                            <input type="hidden" name="id" value="<?php echo $usuarios[$index]->intId;  ?> ">
                                            
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

//session_start();
if (isset($_SESSION['user'])) {
    head();
    Usuarios($actividad);
    footer();
}
 else {
 header("Location:http://localhost:8000/Login.php");   
}
