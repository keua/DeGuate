<?php

include '../INCLUDES/Conexion.php';

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of CL_REDSOCIAL
 *
 * @author usuario
 */
class CL_REDSOCIAL {

    public $strNombre;
    public $strUrl;
    public $strImagen;
    public $intId;
    private $mysqli;

    public function __construct() {
        $this->mysqli = conexion::conectar();
    }

    public function CrearRedSocial($nombre, $link, $img) {
        $mysqli = $this->mysqli;
        $stmt = \mysqli_prepare($mysqli, "CALL CREAR_RS(?,?,?)");
        \mysqli_stmt_bind_param($stmt, 'ssi', $nombre, $link, $img);
        \mysqli_stmt_execute($stmt);
        \mysqli_stmt_close($stmt);
    }

    public function EliminarRedSocial($id) {
        $mysqli = $this->mysqli;
        $stmt = \mysqli_prepare($mysqli, "CALL ELIMINAR_RS(?)");
        \mysqli_stmt_bind_param($stmt, 'i', $id);
        \mysqli_stmt_execute($stmt);
        \mysqli_stmt_close($stmt);
    }

    public function ObtenerRedSocial() {
        $Redes = array();
        $i = 0;
        $mysqli = $this->mysqli;
        $sentencia = $mysqli->query("CALL GET_RS();");
        while ($fila = mysqli_fetch_array($sentencia)) {
            $rs = new CL_REDSOCIAL();
            $rs->intId = $fila['RED_SOCIAL'];
            $rs->strNombre=$fila['NOMBRE'];
            $rs->strUrl=$fila['URL'];
            $Redes[$i] = $rs;
            $i++;
        }
        mysqli_free_result($sentencia);
        mysqli_close($mysqli);
        return $Redes;
    }

}
