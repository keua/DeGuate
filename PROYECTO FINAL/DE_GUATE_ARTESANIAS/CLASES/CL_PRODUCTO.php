<?php

include('../INCLUDES/Conexion.php');

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of CL_PRODUCTO
 *
 * @author usuario
 */
class CL_PRODUCTO {

    private $mysqli;
    public $arrImagen = array();
    public $strTitulo;
    public $strDescripcion;
    public $dblPrecio;
    public $arrCategoria = array();
    public $intId;

    public function __construct() {
        $this->mysqli = conexion::conectar();
    }

    public function CrearProducto($titulo, $descripcion, $precio, $imagen, $categoria) {
       $nul = null;
        $mysqli = $this->mysqli;
        $stmt = \mysqli_prepare($mysqli, "CALL CREAR_PRODUCTO(?,?,?);");
        \mysqli_stmt_bind_param($stmt, 'ssd', $titulo, $descripcion, $precio);
        \mysqli_stmt_execute($stmt);
        \mysqli_stmt_close($stmt);

        foreach ($imagen as $img) {
            $stmt = \mysqli_prepare($mysqli, "CALL ASIGNAR_IMG_PROD(?,?);");
            \mysqli_stmt_bind_param($stmt, 'ii', $img, $nul);
            \mysqli_stmt_execute($stmt);
            \mysqli_stmt_close($stmt);
        }

        foreach ($categoria as $cat) {
            $mysqli = $this->mysqli;
            $stmt = \mysqli_prepare($mysqli, "CALL ASIGNAR_CAT_PROD(?,?);");
            \mysqli_stmt_bind_param($stmt, 'ii', $cat, $nul);
            \mysqli_stmt_execute($stmt);
            \mysqli_stmt_close($stmt);
        }
    }

    public function ActualizarProducto($titulo, $descripcion, $precio, $imagen, $categoria, $producto) {
        $mysqli = $this->mysqli;
        $stmt = \mysqli_prepare($mysqli, "CALL ACTUALIZAR_PRODUCTO(?,?,?,?);");
        \mysqli_stmt_bind_param($stmt, 'ssdi', $titulo, $descripcion, $precio, $producto);
        \mysqli_stmt_execute($stmt);
        \mysqli_stmt_close($stmt);

        $stmt1 = \mysqli_prepare($mysqli, "CALL ELIMINAR_IMG_PROD(?);");
        \mysqli_stmt_bind_param($stmt1, 'i', $producto);
        \mysqli_stmt_execute($stmt1);
        \mysqli_stmt_close($stmt1);

        foreach ($imagen as $img) {
            $stmt2 = \mysqli_prepare($mysqli, "CALL ASIGNAR_IMG_PROD(?,?);");
            \mysqli_stmt_bind_param($stmt2, 'ii', $img, $producto);
            \mysqli_stmt_execute($stmt2);
            \mysqli_stmt_close($stmt2);
        }

        $stmt3 = \mysqli_prepare($mysqli, "CALL ELIMINAR_CAT_PROD(?);");
        \mysqli_stmt_bind_param($stmt3, 'i', $producto);
        \mysqli_stmt_execute($stmt3);
        \mysqli_stmt_close($stmt3);

        foreach ($categoria as $cat) {
            $mysqli = $this->mysqli;
            $stmt4 = \mysqli_prepare($mysqli, "CALL ASIGNAR_CAT_PROD(?,?);");
            \mysqli_stmt_bind_param($stmt4, 'ii', $cat, $producto);
            \mysqli_stmt_execute($stmt4);
            \mysqli_stmt_close($stmt4);
        }
    }

    public function EliminarProducto($producto) {
        $mysqli = $this->mysqli;
        $stmt4 = \mysqli_prepare($mysqli, "CALL ELIMINAR_PRODUCTO(?);");
        \mysqli_stmt_bind_param($stmt4, 'i', $producto);
        \mysqli_stmt_execute($stmt4);
        \mysqli_stmt_close($stmt4);
    }

    public function ObtenerProductos() {
        $Productos = array();
        $i = 0;
        $mysqli = $this->mysqli;
        $sentencia = $mysqli->query("CALL GET_PRODUCTO();");
        while ($fila = mysqli_fetch_array($sentencia)) {
            $pro = new CL_PRODUCTO();
            $pro->arrCategoria[0] = $fila['CATEGORIA'];
            $pro->arrImagen[0] = $fila['IMAGEN'];
            $pro->intId = $fila['PRODUCTO'];
            $pro->dblPrecio = $fila['PRECIO'];
            $pro->strTitulo = $fila['TITULO'];
            $pro->strDescripcion = $fila['DESCRIPCION'];
            $Productos[$i] = $pro;
            $i++;
        }
        mysqli_free_result($sentencia);
        mysqli_close($mysqli);
        return $Productos;
    }

    public function ObtenerProductoCategoria($cat) {
        $Productos = array();
        $i = 0;
        $mysqli = $this->mysqli;
        $stmt = \mysqli_prepare($mysqli, "CALL GET_PRODUCTO_CAT(?)");
        \mysqli_stmt_bind_param($stmt, 'i', $cat);
        \mysqli_execute($stmt);
        $categoria = '';
        $titulo = '';
        $imagen = '';
        $descripcion = '';
        $id = 0;
        $precio = 0.0;
        \mysqli_stmt_bind_result($stmt, $id, $titulo, $descripcion, $precio, $categoria, $imagen);
        while (\mysqli_stmt_fetch($stmt)) {
            $pro = new CL_PRODUCTO();
            $pro->arrCategoria[0] = $categoria;
            $pro->arrImagen[0] = $imagen;
            $pro->dblPrecio = $precio;
            $pro->strTitulo = $titulo;
            $pro->strDescripcion = $descripcion;
            $pro->intId = $id;
            $Productos[$i] = $pro;
            $i++;
        }
        \mysqli_stmt_close($stmt);
        return $Productos;
    }

}
