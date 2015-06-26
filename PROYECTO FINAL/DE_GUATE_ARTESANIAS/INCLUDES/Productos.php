<?php

include '../CLASES/CL_PRODUCTO.php';

$actividad = $_GET['act'];

switch ($actividad) {
    case 1:

        $titulo = $_POST['titulo'];
        $imagen = $_POST['Imagen'];
        $categoria = $_POST['Categoria'];
        $precio = $_POST['precio'];
        $descripcion = $_POST['descripcion'];
        $pro = new CL_PRODUCTO();
        $pro->CrearProducto($titulo, $descripcion, $precio, $imagen, $categoria);
        header("Location:../ProductoAdmin.php?act=3");
        break;
    case 2:

        $id = $_POST['id'];
        $pro = new CL_PRODUCTO();
        $pro->EliminarProducto($id);
        header("Location:http://localhost:8000/ProductoAdmin.php?act=1");

        break;
    case 3:

        $titulo = $_POST['titulo'];
        $imagen = $_POST['Imagen'];
        $categoria = $_POST['Categoria'];
        $precio = $_POST['precio'];
        $descripcion = $_POST['descripcion'];
        $producto = $_POST['producto'];
        $pro = new CL_PRODUCTO();
        $pro->ActualizarProducto($titulo, $descripcion, $precio, $imagen, $categoria, $producto);
        header("Location:http://localhost:8000/ProductoAdmin.php?act=2");

        break;
    default:
        break;
}