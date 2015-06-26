<?php

include('../INCLUDES/Conexion.php');

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of CL_TIENDA
 *
 * @author usuario
 */
class CL_TIENDA {

    public $strNombre;
    public $strDireccion;
    public $intTelefono;
    public $strEnlace;
    public $strImagen;
    public $intId;
    private $mysqli;

    public function __construct() {
        $this->mysqli = conexion::conectar();
    }

    public function CrearTienda($nombre, $direccion, $telefono, $enlace, $imagen) {
        $mysqli = $this->mysqli;
        $stmt = \mysqli_prepare($mysqli, "CALL CREAR_TIENDA(?,?,?,?,?);");
        \mysqli_stmt_bind_param($stmt, 'ssisi', $nombre, $direccion, $telefono, $enlace, $imagen);
        \mysqli_stmt_execute($stmt);
    }

    public function EliminarTienda($tienda) {
        $mysqli = $this->mysqli;
        $stmt = \mysqli_prepare($mysqli, "CALL ELIMINAR_TIENDA(?);");
        \mysqli_stmt_bind_param($stmt, 'i', $tienda);
        \mysqli_stmt_execute($stmt);
    }

    public function ObtenerTiendas() {
        $Tiendas = array();
        $i = 0;
        $mysqli = $this->mysqli;
        $sentencia = $mysqli->query("CALL GET_TIENDA();");
        while ($fila = mysqli_fetch_array($sentencia)) {
            $tie = new CL_TIENDA();
            $tie->intId = $fila['TIENDA'];
            $tie->intTelefono = $fila['TELEFONO'];
            $tie->strDireccion = $fila['DIRECCION'];
            $tie->strEnlace = $fila['ENLACE'];
            $tie->strNombre = $fila['NOMBRE'];
            $tie->strImagen = $fila['URL'];
            $Tiendas[$i] = $tie;
            $i++;
        }
        mysqli_free_result($sentencia);
        mysqli_close($mysqli);
        return $Tiendas;
    }

}
