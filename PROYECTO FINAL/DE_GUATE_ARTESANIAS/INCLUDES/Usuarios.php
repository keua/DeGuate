<?php

include '../CLASES/CL_USUARIO.php';

$actividad = $_GET['act'];

session_start();


if ($actividad == 1) {
    Crear();
} else if ($actividad == 2) {
    Eliminar();
} else if ($actividad == 3) {
    Autenticar();
} else if ($actividad == 4) {
    session_destroy();
    header("Location:../Login.php");
}

function Crear() {
    $usuario = $_POST['usuario'];
    $password = $_POST['password'];
    $user = new CL_USUARIO();
    $user->CrearUsuario($usuario, $password);
    header("Location:../UsuariosAdmin.php?act=2");
}

function Eliminar() {
    $id = $_POST['id'];
    $user = new CL_USUARIO();
    $user->EliminarUsuario($id);
    header("Location:../UsuariosAdmin.php?act=1");
}

function Autenticar() {
    $user = $_POST['usuario'];
    $pass = $_POST['password'];
    $usuario = new CL_USUARIO();
    $aut = $usuario->Autenticar($user, $pass);
    if ($aut) {
        //session_start();
        $_SESSION['user'] = $user;
        header("Location:../InfoGeneralAdmin.php?act=1");
    } else {
        header("Location:../Login.php");
    }
}
