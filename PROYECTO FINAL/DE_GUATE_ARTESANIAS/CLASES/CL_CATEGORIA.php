<?php

include '../INCLUDES/Conexion.php';
//require_once './INCLUDES/Conexion.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of CL_CATEGORIA
 *
 * @author usuario
 */
class CL_CATEGORIA {

    public $intId;
    public $strNombre;
    public $strImagen;
    private $mysqli;

    public function __construct() {
        $this->mysqli = conexion::conectar();
    }

    public function CrearCategoria($nombre, $imagen) {
        $mysqli = $this->mysqli;
        $stmt = \mysqli_prepare($mysqli, "CALL CREAR_CAT(?,?)");
        \mysqli_stmt_bind_param($stmt, 'si', $nombre, $imagen);
        \mysqli_stmt_execute($stmt);
    }

    public function EliminarCategoria($categoria) {
        $mysqli = $this->mysqli;
        $stmt = \mysqli_prepare($mysqli, "CALL ELIMINAR_CAT(?)");
        \mysqli_stmt_bind_param($stmt, 'i', $categoria);
        \mysqli_stmt_execute($stmt);
        \mysqli_stmt_close($stmt);
    }

    public function ActualizarCategoria($nombre, $imagen, $categoria) {
        $mysqli = $this->mysqli;
        $stmt = \mysqli_prepare($mysqli, "CALL ACTUALIZAR_CAT(?,?,?)");
        \mysqli_stmt_bind_param($stmt, 'sii', $nombre, $imagen, $categoria);
        \mysqli_stmt_execute($stmt);
        \mysqli_stmt_close($stmt);
    }

    public function ObtenerCategorias() {
        $Categorias = array();
        $i = 0;
        $mysqli = $this->mysqli;
        $sentencia = $mysqli->query("CALL GET_CAT();");
        while ($fila = mysqli_fetch_array($sentencia)) {
            $cat = new CL_CATEGORIA();
            $cat->intId = $fila['CATEGORIA'];
            $cat->strImagen = $fila['URL'];
            $cat->strNombre = $fila['NOMBRE'];
            $Categorias[$i] = $cat;
            $i++;
        }
        mysqli_free_result($sentencia);
        mysqli_close($mysqli);
        return $Categorias;
    }

    public function ObtenerCategoriaId($id) {
        $mysqli = $this->mysqli;
        $stmt = \mysqli_prepare($mysqli, "CALL GET_CAT_ID(?)");
        \mysqli_stmt_bind_param($stmt, 'i', $id);
        \mysqli_execute($stmt);
        $cat = 0;
        $nombre = '';
        $url = '';
        \mysqli_stmt_bind_result($stmt, $cat, $nombre, $url);
        while (\mysqli_stmt_fetch($stmt)) {
            $this->intId = $cat;
            $this->strNombre = $nombre;
            $this->strImagen = $url;
        }
        \mysqli_stmt_close($stmt);
    }

}
