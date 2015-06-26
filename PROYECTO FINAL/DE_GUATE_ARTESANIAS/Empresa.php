<?php

include './CLASES/CL_EMPRESA.php';

$actividad = $_GET['act'];

switch ($actividad) {
    case 1:

        $nombre = $_POST['nombre'];
        $dir = $_POST['direccion'];
        $telefono = $_POST['telefono'];
        $mision = $_POST['mision'];
        $vision = $_POST['vision'];
        $slogan = $_POST['slogan'];
        $descripcion = $_POST['descripcion'];
        $correo = $_POST['correo'];
        $nov = $_POST['novedades'];

        $empr = new CL_EMPRESA();
        $empr->CambiarCorreo($correo);
        $empr->CambiarDescripcion($descripcion);
        $empr->CambiarDireccion($dir);
        $empr->CambiarMision($mision);
        $empr->CambiarSlogan($slogan);
        $empr->CambiarNombre($nombre);
        $empr->CambiarTelefono((int) $telefono);
        $empr->CambiarVision($vision);
        $empr->CambiarNovedades($nov);

        header("Location:http://localhost:8000/InfoGeneralAdmin.php?act=2");
        break;
    case 2:
        $empr = new CL_EMPRESA();
        if (isset($_POST['Novedades'])) {
            $Imagen = $_POST['Imagen'];

            $empr->CambiarImagen('NOVEDADES', $Imagen[0]);

            header("Location:http://localhost:8000/InfoGeneralAdmin.php?act=1");
        } elseif (isset($_POST['Portada'])) {
            $Imagen = $_POST['Imagen'];

            $empr->CambiarImagen('PORTADA1', $Imagen[0]);
            $empr->CambiarImagen('PORTADA2', $Imagen[1]);
            $empr->CambiarImagen('PORTADA3', $Imagen[2]);

            header("Location:http://localhost:8000/InfoGeneralAdmin.php?act=1");
        } elseif (isset($_POST['Logo'])) {
            $Imagen = $_POST['Imagen'];

            $empr->CambiarImagen('LOGO', $Imagen[0]);

            header("Location:http://localhost:8000/InfoGeneralAdmin.php?act=1");
        }

        break;

    default:
        break;
}