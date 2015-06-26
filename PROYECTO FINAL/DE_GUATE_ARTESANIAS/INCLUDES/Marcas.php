<?php

include '../CLASES/CL_MARCA.php';

$actividad = $_GET['act'];

switch ($actividad) {
    case 1:

        $marca = $_POST['marca'];
        $desc = $_POST['descripcion'];
        $Imagen = $_POST['Imagen'][0];
        $mar = new CL_MARCA();
        $mar->CrearMarca($marca, $desc, $Imagen);
        header("Location:../MarcasAdmin.php?act=2");
        break;
    case 2:

        $id = $_POST['id'];
        $mar = new CL_MARCA();
        $mar->EliminarMarca($id);
        header("Location:../MarcasAdmin.php?act=1");

        break;

    default:
        break;
}


