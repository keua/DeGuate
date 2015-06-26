<?php
include './CLASES/CL_EMPRESA.php';

$Empresa = new CL_EMPRESA();
$Empresa->GetInfo();

$empr = new CL_EMPRESA();
$empr->GET_IMAGENES();

session_start();

function head() {
    ?>
    <!DOCTYPE html>
    <html>
        <head>
            <meta charset="UTF-8">
            <title>Admin De Guate Artesanias  | Dashboard</title>
            <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
            <!-- Bootstrap 3.3.4 -->
            <link href="./Administrador/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />    
            <!-- FontAwesome 4.3.0 -->
            <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
            <!-- Ionicons 2.0.0 -->
            <link href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" rel="stylesheet" type="text/css" />    
            <!-- Theme style -->
            <link href="./Administrador/dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
            <!-- AdminLTE Skins. Choose a skin from the css/skins 
                 folder instead of downloading all of them to reduce the load. -->
            <link href="./Administrador/dist/css/skins/_all-skins.min.css" rel="stylesheet" type="text/css" />
            <!-- iCheck -->
            <link href="./Administrador/plugins/iCheck/flat/blue.css" rel="stylesheet" type="text/css" />
            <!-- Morris chart -->
            <link href="./Administrador/plugins/morris/morris.css" rel="stylesheet" type="text/css" />
            <!-- jvectormap -->
            <link href="./Administrador/plugins/jvectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css" />
            <!-- Date Picker -->
            <link href="./Administrador/plugins/datepicker/datepicker3.css" rel="stylesheet" type="text/css" />
            <!-- Daterange picker -->
            <link href="./Administrador/plugins/daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css" />
            <!-- bootstrap wysihtml5 - text editor -->
            <link href="./Administrador/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css" rel="stylesheet" type="text/css" />

            <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
            <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
            <!--[if lt IE 9]>
                <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
                <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
            <![endif]-->
        </head>
        <body class="skin-blue sidebar-mini">
            <div class="wrapper">

                <header class="main-header">
                    <!-- Logo -->
                    <a href="./InfoGeneralAdmin.php?act=1" class="logo">
                        <!-- mini logo for sidebar mini 50x50 pixels -->
                        <span class="logo-mini"><b>A</b>LT</span>
                        <!-- logo for regular state and mobile devices -->
                        <span class="logo-lg"><b>Admin</b><?php print $GLOBALS['Empresa']->strNombre; ?></span>
                    </a>
                    <!-- Header Navbar: style can be found in header.less -->
                    <nav class="navbar navbar-static-top" role="navigation">
                        <!-- Sidebar toggle button-->
                        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                            <span class="sr-only">Toggle navigation</span>
                        </a>
                        <?php
                        if (isset($_SESSION['user'])) {
                            ?>
                            <div class="navbar-custom-menu">
                                <ul class="nav navbar-nav">

                                    <li class="dropdown user user-menu">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                            <img src="<?php print $GLOBALS['empr']->strLogo; ?>" class="user-image" alt="User Image"/>
                                            <span class="hidden-xs"><?php echo $_SESSION['user']; ?></span>
                                        </a>
                                        <ul class="dropdown-menu">
                                            <!-- User image -->
                                            <li class="user-header">
                                                <img src="<?php print $GLOBALS['empr']->strLogo; ?>" class="img-circle" alt="User Image" />
                                                <p>
                                                    <?php echo $_SESSION['user']; ?>
                                                    <small><?php $day =  \getdate();
                                                    print $day['weekday'].','.$day['mday'].'-'.$day['month'].'-'.$day['year'];?></small>
                                                </p>
                                            </li>
                                            <!-- Menu Body -->
                                            <!-- Menu Footer-->
                                            <li class="user-footer">
                                                <div class="pull-right">
                                                    <a href="./INCLUDES/Usuarios.php?act=4" class="btn btn-default btn-flat">Sign out</a>
                                                </div>
                                            </li>
                                        </ul>
                                    </li>

                                </ul>
                            </div>

        <?php
    }
    ?>

                    </nav>
                </header>
                <!-- Left side column. contains the logo and sidebar -->
                <aside class="main-sidebar">
                    <!-- sidebar: style can be found in sidebar.less -->
                    <section class="sidebar">
                        <!-- Sidebar user panel -->
                        <div class="user-panel">
                            <div class="pull-left image">
                                <img src="<?php print $GLOBALS['empr']->strLogo; ?>" class="img-circle" alt="User Image" />
                            </div>
                            <div class="pull-left info">
                                <p><?php echo $_SESSION['user']; ?></p>
                            </div>
                        </div>
                        <!-- sidebar menu: : style can be found in sidebar.less -->
                        <ul class="sidebar-menu">
                            <li class="header">MAIN NAVIGATION</li>
                            <li class="treeview">
                                <a>
                                    <i class="fa fa-dashboard"></i> <span>Empresa</span> <i class="fa fa-angle-left pull-right"></i>
                                </a>
                                <ul class="treeview-menu">
                                    <li class="active"><a href="InfoGeneralAdmin.php?act=1"><i class="fa fa-circle-o"></i> Cambiar Imagenes</a></li>
                                    <li><a href="InfoGeneralAdmin.php?act=2"><i class="fa fa-circle-o"></i> Cambiar informacion</a></li>
                                    <li><a href="InfoGeneralAdmin.php?act=3"><i class="fa fa-circle-o"></i> Redes Sociales</a></li>
                                </ul>
                            </li>
                            <li class="treeview">
                                <a href="#">
                                    <i class="fa fa-files-o"></i>
                                    <span>Productos</span>
                                    <i class="fa fa-angle-left pull-right"></i>
                                </a>
                                <ul class="treeview-menu">
                                    <li><a href="./ProductoAdmin.php?act=1"><i class="fa fa-circle-o"></i> Eliminar</a></li>
                                    <li><a href="/ProductoAdmin.php?act=2"><i class="fa fa-circle-o"></i> Editar</a></li>
                                    <li><a href="/ProductoAdmin.php?act=3"><i class="fa fa-circle-o"></i> Crear</a></li>
                                </ul>
                            </li>
                            <li class="treeview">
                                <a href="#">
                                    <i class="fa fa-files-o"></i>
                                    <span>Categorias</span>
                                    <i class="fa fa-angle-left pull-right"></i>
                                </a>
                                <ul class="treeview-menu">
                                    <li><a href="./CategoriaAdmin.php?act=1"><i class="fa fa-circle-o"></i> Eliminar</a></li>
                                    <li><a href="./CategoriaAdmin.php?act=2"><i class="fa fa-circle-o"></i> Editar</a></li>
                                    <li><a href="./CategoriaAdmin.php?act=3"><i class="fa fa-circle-o"></i> Crear</a></li>
                                </ul>
                            </li>
                            <li>
                            <li class="treeview">
                                <a href="#">
                                    <i class="fa fa-files-o"></i>
                                    <span>Tiendas</span>
                                    <i class="fa fa-angle-left pull-right"></i>
                                </a>
                                <ul class="treeview-menu">
                                    <li><a href="./TiendasAdmin.php?act=1"><i class="fa fa-circle-o"></i> Eliminar</a></li>
                                    <li><a href="./TiendasAdmin.php?act=2"><i class="fa fa-circle-o"></i> Crear</a></li>
                                </ul>
                            </li>
                            <li class="treeview">
                                <a href="#">
                                    <i class="fa fa-files-o"></i>
                                    <span>Marcas</span>
                                    <i class="fa fa-angle-left pull-right"></i>
                                </a>
                                <ul class="treeview-menu">
                                    <li><a href="./MarcasAdmin.php?act=1"><i class="fa fa-circle-o"></i> Eliminar</a></li>
                                    <li><a href="./MarcasAdmin.php?act=2"><i class="fa fa-circle-o"></i> Crear</a></li>
                                </ul>
                            </li>
                            <li class="treeview">
                                <a href="#">
                                    <i class="fa fa-files-o"></i>
                                    <span>Usuario</span>
                                    <i class="fa fa-angle-left pull-right"></i>
                                </a>
                                <ul class="treeview-menu">
                                    <li><a href="./UsuariosAdmin.php?act=1"><i class="fa fa-circle-o"></i> Eliminar</a></li>
                                    <li><a href="./UsuariosAdmin.php?act=2"><i class="fa fa-circle-o"></i> Crear</a></li>
                                </ul>
                            </li>
                            <li class="treeview">
                                <a href="#">
                                    <i class="fa fa-files-o"></i>
                                    <span>Galeria de Imagenes</span>
                                    <i class="fa fa-angle-left pull-right"></i>
                                </a>
                                <ul class="treeview-menu">
                                    <li><a href="./ImagenesAdmin.php?act=1"><i class="fa fa-circle-o"></i> Eliminar</a></li>
                                    <li><a href="./ImagenesAdmin.php?act=2"><i class="fa fa-circle-o"></i> Crear</a></li>
                                </ul>
                            </li>
                        </ul>
                    </section>
                    <!-- /.sidebar -->
                </aside>
                <!-- Content Wrapper. Contains page content -->
                <div class="content-wrapper">
                    <!-- Content Header (Page header) -->
                    <section class="content-header">
                        <h1>
                            Dashboard
                            <small>Control panel</small>
                        </h1>

                    </section>


                    <section class = content>

    <?php
}

function footer() {
    ?>
                    </section>
                </div><!-- /.content-wrapper -->
                <footer class="main-footer">
                    <div class="pull-right hidden-xs">
                        <b>Version</b> 2.0
                    </div>
                    <strong>Copyright &copy; 2014-2015 <a href="http://almsaeedstudio.com">Almsaeed Studio</a>.</strong> All rights reserved.
                </footer>


                <!-- Add the sidebar's background. This div must be placed
                     immediately after the control sidebar -->
                <div class='control-sidebar-bg'></div>
            </div><!-- ./wrapper -->

            <!-- jQuery 2.1.4 -->
            <script src="./Administrador/plugins/jQuery/jQuery-2.1.4.min.js"></script>
            <!-- jQuery UI 1.11.2 -->
            <script src="http://code.jquery.com/ui/1.11.2/jquery-ui.min.js" type="text/javascript"></script>
            <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
            <script>
                $.widget.bridge('uibutton', $.ui.button);
            </script>
            <!-- Bootstrap 3.3.2 JS -->
            <script src="./Administrador/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>    
            <!-- Morris.js charts -->
            <script src="http://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
            <script src="./Administrador/plugins/morris/morris.min.js" type="text/javascript"></script>
            <!-- Sparkline -->
            <script src="./Administrador/plugins/sparkline/jquery.sparkline.min.js" type="text/javascript"></script>
            <!-- jvectormap -->
            <script src="./Administrador/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js" type="text/javascript"></script>
            <script src="./Administrador/plugins/jvectormap/jquery-jvectormap-world-mill-en.js" type="text/javascript"></script>
            <!-- jQuery Knob Chart -->
            <script src="./Administrador/plugins/knob/jquery.knob.js" type="text/javascript"></script>
            <!-- daterangepicker -->
            <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js" type="text/javascript"></script>
            <script src="./Administrador/plugins/daterangepicker/daterangepicker.js" type="text/javascript"></script>
            <!-- datepicker -->
            <script src="./Administrador/plugins/datepicker/bootstrap-datepicker.js" type="text/javascript"></script>
            <!-- Bootstrap WYSIHTML5 -->
            <script src="./Administrador/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js" type="text/javascript"></script>
            <!-- Slimscroll -->
            <script src="./Administrador/plugins/slimScroll/jquery.slimscroll.min.js" type="text/javascript"></script>
            <!-- FastClick -->
            <script src='./Administrador/plugins/fastclick/fastclick.min.js'></script>
            <!-- AdminLTE App -->
            <script src="./Administrador/dist/js/app.min.js" type="text/javascript"></script>    

            <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
            <script src="./Administrador/dist/js/pages/dashboard.js" type="text/javascript"></script>    

            <!-- AdminLTE for demo purposes -->
            <script src="./Administrador/dist/js/demo.js" type="text/javascript"></script>
        </body>
    </html>
    <?php
}
