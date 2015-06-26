<?php

include './INCLUDES/Conexion.php';
include './CLASES/CL_REDSOCIAL.php';

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of CL_EMPRESA
 *
 * @author usuario
 */
class CL_EMPRESA {

    public $strLogo;
    public $strSlogan;
    public $arrPortada = array();
    public $strNovedades;
    public $strTextoNovedades;
    public $strNombre;
    public $Red_Social = array();
    public $strMision;
    public $strVision;
    public $strDescripcion;
    public $intTelefono;
    public $strDireccion;
    public $strCorreo;
    private $mysqli;

    public function __construct() {
        $this->mysqli = conexion::conectar();
    }

    public function GetInfo() {
        $mysqli = $this->mysqli;
        $sentencia = $mysqli->query("CALL GET_INFO_EMPRESA();");
        while ($fila = mysqli_fetch_array($sentencia)) {
            $this->strNombre = $fila['NOMBRE'];
            $this->strSlogan = $fila['SLOGAN'];
            $this->strMision = $fila['MISION'];
            $this->strVision = $fila['VISION'];
            $this->strDescripcion = $fila['DESCRIPCION'];
            $this->intTelefono = $fila['TELEFONO'];
            $this->strDireccion = $fila['DIRECCION'];
            $this->strCorreo = $fila['CORREO'];
            $this->strTextoNovedades = $fila['NOVEDADES'];
        }
        mysqli_free_result($sentencia);
        mysqli_close($mysqli);
        
    }

    public function GET_IMAGENES() {

        $mysqli = $this->mysqli;
        $sentencia = $mysqli->query("CALL GET_IMG_EMPRESA();");
        while ($fila = mysqli_fetch_array($sentencia)) {
            if ($fila['TIPO'] == 'LOGO') {
                $this->strLogo = $fila['URL'];
            } elseif ($fila['TIPO'] == 'PORTADA1') {
                $this->arrPortada[0] = $fila['URL'];
            } elseif ($fila['TIPO'] == 'PORTADA2') {
                $this->arrPortada[1] = $fila['URL'];
            } elseif ($fila['TIPO'] == 'PORTADA3') {
                $this->arrPortada[2] = $fila['URL'];
            } elseif ($fila['TIPO'] == 'NOVEDADES') {
                $this->strNovedades = $fila['URL'];
            }
        }
        mysqli_free_result($sentencia);
        mysqli_close($mysqli);
    }

    public function GET_REDES() {
        $rs = new CL_REDSOCIAL();
        $mysqli = $this->mysqli;
        $sentencia = $mysqli->query("CALL GET_REDES_EMPRESA();");
        $i = 0;
        while ($fila = mysqli_fetch_array($sentencia)) {
            $rs->strNombre = $fila['NOMBRE'];
            $rs->strUrl = $fila['LINK'];
            $rs->strImagen = $fila['IMAGEN'];
            $rs->id = $fila['ID'];
            $this->Red_Social[$i] = $rs;
            $i++;
        }
        mysqli_free_result($sentencia);
        mysqli_close($mysqli);
    }

    public function CambiarImagen($tipo, $img) {
        $mysqli = $this->mysqli;
        $stmt = \mysqli_prepare($mysqli, "CALL ASIGNAR_IMG_EMPRESA(?,?)");
        \mysqli_stmt_bind_param($stmt, 'si', $tipo, $img);
        \mysqli_stmt_execute($stmt);
        \mysqli_stmt_close($stmt);
    }

    public function CambiarNombre($nombre) {
        $mysqli = $this->mysqli;
        $stmt = \mysqli_prepare($mysqli, "CALL CAMBIAR_NOMBRE(?)");
        \mysqli_stmt_bind_param($stmt, 's', $nombre);
        \mysqli_stmt_execute($stmt);
        \mysqli_stmt_close($stmt);
    }

    public function CambiarSlogan($slogan) {
        $mysqli = $this->mysqli;
        $stmt = \mysqli_prepare($mysqli, "CALL CAMBIAR_SLOGAN(?)");
        \mysqli_stmt_bind_param($stmt, 's', $slogan);
        \mysqli_stmt_execute($stmt);
        \mysqli_stmt_close($stmt);
    }

    public function CambiarMision($mision) {
        $mysqli = $this->mysqli;
        $stmt = \mysqli_prepare($mysqli, "CALL CAMBIAR_MISION(?)");
        \mysqli_stmt_bind_param($stmt, 's', $mision);
        \mysqli_stmt_execute($stmt);
        \mysqli_stmt_close($stmt);
    }

    public function CambiarVision($vision) {
        $mysqli = $this->mysqli;
        $stmt = \mysqli_prepare($mysqli, "CALL CAMBIAR_VISION(?)");
        \mysqli_stmt_bind_param($stmt, 's', $vision);
        \mysqli_stmt_execute($stmt);
        \mysqli_stmt_close($stmt);
    }

    public function CambiarDescripcion($slogan) {
        $mysqli = $this->mysqli;
        $stmt = \mysqli_prepare($mysqli, "CALL CAMBIAR_Descripcion(?)");
        \mysqli_stmt_bind_param($stmt, 's', $slogan);
        \mysqli_stmt_execute($stmt);
        \mysqli_stmt_close($stmt);
    }

    public function CambiarTelefono($tel) {
        $mysqli = $this->mysqli;
        $stmt = \mysqli_prepare($mysqli, "CALL CAMBIAR_TELEFONO(?)");
        \mysqli_stmt_bind_param($stmt, 'i', $tel);
        \mysqli_stmt_execute($stmt);
        \mysqli_stmt_close($stmt);
    }

    public function CambiarDireccion($dir) {
        $mysqli = $this->mysqli;
        $stmt = \mysqli_prepare($mysqli, "CALL CAMBIAR_DIRECCION(?)");
        \mysqli_stmt_bind_param($stmt, 's', $dir);
        \mysqli_stmt_execute($stmt);
        \mysqli_stmt_close($stmt);
    }

    public function CambiarCorreo($correo) {
        $mysqli = $this->mysqli;
        $stmt = \mysqli_prepare($mysqli, "CALL CAMBIAR_CORREO(?)");
        \mysqli_stmt_bind_param($stmt, 's', $correo);
        \mysqli_stmt_execute($stmt);
        \mysqli_stmt_close($stmt);
    }

    public function CambiarNovedades($nov) {
        $mysqli = $this->mysqli;
        $stmt = \mysqli_prepare($mysqli, "CALL CAMBIAR_NOV(?)");
        \mysqli_stmt_bind_param($stmt, 's', $nov);
        \mysqli_stmt_execute($stmt);
        \mysqli_stmt_close($stmt);
    }

}
