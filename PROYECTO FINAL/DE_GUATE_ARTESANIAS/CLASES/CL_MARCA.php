<?php

include ('../INCLUDES/Conexion.php');

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of CL_MARCA  
 *
 * @author usuario
 */
class CL_MARCA {

    private $mysqli;
    public $strTitulo;
    public $strDescripcion;
    public $strImagen;
    public $intId;

    public function __construct() {
        $this->mysqli = conexion::conectar();
    }

    public function CrearMarca($titulo, $descripcion, $imagen) {
        $mysqli = $this->mysqli;
        $stmt = \mysqli_prepare($mysqli, "CALL CREAR_MARCA(?,?,?)");
        \mysqli_stmt_bind_param($stmt, 'sis', $titulo, $imagen, $descripcion);
        \mysqli_stmt_execute($stmt);
    }

    public function EliminarMarca($marca) {
        $mysqli = $this->mysqli;
        $stmt = \mysqli_prepare($mysqli, "CALL ELIMINAR_MARCA(?)");
        \mysqli_stmt_bind_param($stmt, 'i', $marca);
        \mysqli_stmt_execute($stmt);
    }

    public function ObtenerMarcas() {
        $Marcas = array();
        $i = 0;
        $mysqli = $this->mysqli;
        $sentencia = $mysqli->query("CALL GET_MARCA();");
        while ($fila = mysqli_fetch_array($sentencia)) {
            $mar = new CL_MARCA();
            $mar->intId = $fila['MARCA'];
            $mar->strTitulo = $fila['NOMBRE'];
            $mar->strImagen = $fila['IMAGEN'];
            $mar->strDescripcion = $fila['DESCRIPCION'];
            $Marcas[$i] = $mar;
            $i++;
        }
        mysqli_free_result($sentencia);
        mysqli_close($mysqli);
        return $Marcas;
    }

}
