<?php
include '../CLASES/CL_CATEGORIA.php';

$actividad = $_GET['act'];

switch ($actividad) {
    case 1:

        $nombre = $_POST['nombre'];
        $imagen = $_POST['Imagen'][0];
        $cat = new CL_CATEGORIA();
        $cat->CrearCategoria($nombre, $imagen);
        header("Location:../CategoriaAdmin.php?act=3");
        break;
    case 2:

        $id = $_POST['id'];
        $cat = new CL_CATEGORIA();
        $cat->EliminarCategoria($id);
        header("Location:../CategoriaAdmin.php?act=1");

        break;
    case 3:

        $nombre = $_POST['nombre'];
        $imagen = $_POST['Imagen'][0];
        $categoria = $_POST['categoria'];
        $cat = new CL_CATEGORIA();
        $cat->ActualizarCategoria($nombre, $imagen, $categoria);
        header("Location:../CategoriaAdmin.php?act=2");

        break;
    default:
        break;
}