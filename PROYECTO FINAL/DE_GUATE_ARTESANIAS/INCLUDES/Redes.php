<?php

include '../CLASES/CL_REDSOCIAL.php';

$actividad = $_GET['act'];

switch ($actividad) {
    case 1:

        $nombre = $_POST['nombre'];
        $link = $_POST['link'];
        $rs = new CL_REDSOCIAL();
        $rs->CrearRedSocial($nombre, $link, -1);
        header("Location:../InfoGeneralAdmin.php?act=3");
        break;
    case 2:

        $id = $_POST['id'];
        $rs = new CL_REDSOCIAL();
        $rs->EliminarRedSocial($id);
        header("Location:../InfoGeneralAdmin.php?act=3");

        break;

    default:
        break;
}
