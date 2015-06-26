<?php

include '../CLASES/CL_IMAGEN.php';

$img = new CL_IMAGEN();

if (isset($_POST['submit'])) {
    $Imagen = $_POST['Imagen'];

    foreach ($Imagen as $ima => $value) {
        $img->EliminarImagen($value);
    }
    header("Location:../ImagenesAdmin.php?act=1");
}
else
{
  header("Location:../ImagenesAdmin.php?act=1");  
}