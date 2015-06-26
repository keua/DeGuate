<?php

include '../INCLUDES/Conexion.php';

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of CL_IMAGEN
 *
 * @author usuario
 */
class CL_IMAGEN {

    private $mysqli;
    public $intId;
    public $strUrl;
    public $strNombre;

    public function __construct() {
        $this->mysqli = conexion::conectar();
    }

    public function CrearImagen($nombre, $url) {
        $mysqli = $this->mysqli;
        $stmt = \mysqli_prepare($mysqli, "CALL CREAR_IMG(?,?);");
        \mysqli_stmt_bind_param($stmt, 'ss', $nombre, $url);
        \mysqli_stmt_execute($stmt);
        \mysqli_stmt_close($stmt);
    }

    public function EliminarImagen($imagen) {
        $mysqli = $this->mysqli;
        $stmt = \mysqli_prepare($mysqli, "CALL ELIMINAR_IMG(?);");
        \mysqli_stmt_bind_param($stmt, 'i', $imagen);
        \mysqli_stmt_execute($stmt);
        \mysqli_stmt_close($stmt);
    }

    public function ObtenerImagenes() {
        $Imagenes = array();
        $i = 0;
        $mysqli = $this->mysqli;
        $sentencia = $mysqli->query("CALL GET_IMG();");
        while ($fila = mysqli_fetch_array($sentencia)) {
            $img = new CL_IMAGEN();
            $img->strNombre = $fila['DESCRIPCION'];
            $img->intId = $fila['IMAGEN'];
            $img->strUrl = $fila['URL'];
            $Imagenes[$i] = $img;
            $i++;
        }
        mysqli_free_result($sentencia);
        mysqli_close($mysqli);
        return $Imagenes;
    }

}
