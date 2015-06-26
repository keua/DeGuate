<?php
include '../CLASES/CL_TIENDA.php';

$actividad = $_GET['act'];

switch ($actividad) {
    case 1:

        $nombre = $_POST['nombre'];
        $direccion = $_POST['direccion'];
        $telefono = $_POST['telefono'];
        $enlace = $_POST['enlace'];
        $imagen = $_POST['Imagen'][0];
        $tie = new CL_TIENDA();
        $tie->CrearTienda($nombre, $direccion, $telefono, $enlace, $imagen);
        header("Location:../TiendasAdmin.php?act=2");
        break;
    case 2:

        $id = $_POST['id'];
        $tie = new CL_TIENDA();
        $tie->EliminarTienda($id);
        header("Location:../TiendasAdmin.php?act=1");

        break;

    default:
        break;
}