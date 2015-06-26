<?php

include ('../INCLUDES/Conexion.php');

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of CL_USUARIO
 *
 * @author usuario
 */
class CL_USUARIO {

    private $mysqli;
    public $strUsuario;
    public $strPass;
    public $intId;

    public function __construct() {
        $this->mysqli = conexion::conectar();
    }

    public function CrearUsuario($usuario, $password) {
        $mysqli = $this->mysqli;
        $stmt = \mysqli_prepare($mysqli, "CALL INSERTAR_ADMIN(?,?)");
        \mysqli_stmt_bind_param($stmt, 'ss', $usuario, $password);
        \mysqli_stmt_execute($stmt);
    }

    public function EliminarUsuario($ID) {
        $mysqli = $this->mysqli;
        $stmt = \mysqli_prepare($mysqli, "CALL ELIMINAR_ADMIN(?)");
        \mysqli_stmt_bind_param($stmt, 'i', $ID);
        \mysqli_stmt_execute($stmt);
    }

    public function ObtenerUsuarios() {

        $Usuario = array();
        $i = 0;
        $mysqli = $this->mysqli;
        $sentencia = $mysqli->query("CALL MOSTRAR_ADMIN();");
        while ($fila = mysqli_fetch_array($sentencia)) {
            $admin = new CL_USUARIO();
            $admin->intId = $fila['ADMINISTRADOR'];
            $admin->strUsuario = $fila['USUARIO'];
            $Usuario[$i] = $admin;
            $i++;
        }
        mysqli_free_result($sentencia);
        mysqli_close($mysqli);

        return $Usuario;
    }

    public function Autenticar($user, $password) {
        $mysqli = $this->mysqli;
        $stmt = \mysqli_prepare($mysqli, "CALL AUTENTICAR_ADMIN(?,?)");
        \mysqli_stmt_bind_param($stmt, 'ss', $user, $password);
        \mysqli_execute($stmt);
        $r1=0;
        $r2='';
        \mysqli_stmt_bind_result($stmt, $r1,$r2);
        while (\mysqli_stmt_fetch($stmt)) {
            return true;
        }
        \mysqli_stmt_close($stmt);
    }

}
