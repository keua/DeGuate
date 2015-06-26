<?php

include '../CLASES/CL_IMAGEN.php';

$imagen = new CL_IMAGEN();
$imagen->strNombre = $_POST['Descripcion'];
$imagenes = $_FILES['imagen'];
for ($index = 0; $index < count($imagenes); $index++) {
    if ($imagenes["error"][$index] > 0) {
        echo "Error: " . $_FILES['error'][$index] . "<br>";
    } else {
        move_uploaded_file($imagenes['tmp_name'][$index], "../IMAGES/" . $imagenes['name'][$index]);
        $imagen->CrearImagen($imagen->strNombre, "../IMAGES/" . $imagenes['name'][$index]);
        crear_img_portada("../IMAGES/" . $imagenes['name'][$index], $imagenes['name'][$index]);
        crear_img_marca("../IMAGES/" . $imagenes['name'][$index], $imagenes['name'][$index]);
        crear_img_ga("../IMAGES/" . $imagenes['name'][$index], $imagenes['name'][$index]);
        crear_img_novedades("../IMAGES/" . $imagenes['name'][$index], $imagenes['name'][$index]);
        crear_img_prod("../IMAGES/" . $imagenes['name'][$index], $imagenes['name'][$index]);
        crear_img_tienda("../IMAGES/" . $imagenes['name'][$index], $imagenes['name'][$index]);
    }
}
header("Location:../ImagenesAdmin.php?act=2");

function crear_img_portada($ruta, $nombre) {
    $ruta_imagen = $ruta;

    $miniatura_ancho_maximo = 500;
    $miniatura_alto_maximo = 240;

    $info_imagen = getimagesize($ruta_imagen);
    $imagen_ancho = $info_imagen[0];
    $imagen_alto = $info_imagen[1];
    $imagen_tipo = $info_imagen['mime'];


    $proporcion_imagen = $imagen_ancho / $imagen_alto;
    $proporcion_miniatura = $miniatura_ancho_maximo / $miniatura_alto_maximo;

    if ($proporcion_imagen > $proporcion_miniatura) {
        $miniatura_ancho = $miniatura_ancho_maximo;
        $miniatura_alto = $miniatura_ancho_maximo / $proporcion_imagen;
    } else if ($proporcion_imagen < $proporcion_miniatura) {
        $miniatura_ancho = $miniatura_ancho_maximo * $proporcion_imagen;
        $miniatura_alto = $miniatura_alto_maximo;
    } else {
        $miniatura_ancho = $miniatura_ancho_maximo;
        $miniatura_alto = $miniatura_alto_maximo;
    }

    switch ($imagen_tipo) {
        case "image/jpg":
        case "image/jpeg":
            $imagen = \imagecreatefromjpeg($ruta_imagen);
            break;
        case "image/png":
            $imagen = \imagecreatefrompng($ruta_imagen);
            break;
        case "image/gif":
            $imagen = \imagecreatefromgif($ruta_imagen);
            break;
    }
    $lienzo = imagecreatetruecolor($miniatura_ancho_maximo, $miniatura_alto_maximo);

    imagecopyresampled($lienzo, $imagen, 0, 0, 0, 0, $miniatura_ancho_maximo, $miniatura_alto_maximo, $imagen_ancho, $imagen_alto);


    imagejpeg($lienzo, '../IMAGES/p_' . $nombre, 80);
}

function crear_img_novedades($ruta, $nombre) {
    $ruta_imagen = $ruta;

    $miniatura_ancho_maximo = 480;
    $miniatura_alto_maximo = 320;

    $info_imagen = getimagesize($ruta_imagen);
    $imagen_ancho = $info_imagen[0];
    $imagen_alto = $info_imagen[1];
    $imagen_tipo = $info_imagen['mime'];


    $proporcion_imagen = $imagen_ancho / $imagen_alto;
    $proporcion_miniatura = $miniatura_ancho_maximo / $miniatura_alto_maximo;

    if ($proporcion_imagen > $proporcion_miniatura) {
        $miniatura_ancho = $miniatura_ancho_maximo;
        $miniatura_alto = $miniatura_ancho_maximo / $proporcion_imagen;
    } else if ($proporcion_imagen < $proporcion_miniatura) {
        $miniatura_ancho = $miniatura_ancho_maximo * $proporcion_imagen;
        $miniatura_alto = $miniatura_alto_maximo;
    } else {
        $miniatura_ancho = $miniatura_ancho_maximo;
        $miniatura_alto = $miniatura_alto_maximo;
    }

    switch ($imagen_tipo) {
        case "image/jpg":
        case "image/jpeg":
            $imagen = \imagecreatefromjpeg($ruta_imagen);
            break;
        case "image/png":
            $imagen = \imagecreatefrompng($ruta_imagen);
            break;
        case "image/gif":
            $imagen = \imagecreatefromgif($ruta_imagen);
            break;
    }
    $lienzo = imagecreatetruecolor($miniatura_ancho_maximo, $miniatura_alto_maximo);

    imagecopyresampled($lienzo, $imagen, 0, 0, 0, 0, $miniatura_ancho_maximo, $miniatura_alto_maximo, $imagen_ancho, $imagen_alto);


    imagejpeg($lienzo, '../IMAGES/no_' . $nombre, 80);
}

function crear_img_prod($ruta, $nombre) {
    $ruta_imagen = $ruta;

    $miniatura_ancho_maximo = 380;
    $miniatura_alto_maximo = 228;

    $info_imagen = getimagesize($ruta_imagen);
    $imagen_ancho = $info_imagen[0];
    $imagen_alto = $info_imagen[1];
    $imagen_tipo = $info_imagen['mime'];


    $proporcion_imagen = $imagen_ancho / $imagen_alto;
    $proporcion_miniatura = $miniatura_ancho_maximo / $miniatura_alto_maximo;

    if ($proporcion_imagen > $proporcion_miniatura) {
        $miniatura_ancho = $miniatura_ancho_maximo;
        $miniatura_alto = $miniatura_ancho_maximo / $proporcion_imagen;
    } else if ($proporcion_imagen < $proporcion_miniatura) {
        $miniatura_ancho = $miniatura_ancho_maximo * $proporcion_imagen;
        $miniatura_alto = $miniatura_alto_maximo;
    } else {
        $miniatura_ancho = $miniatura_ancho_maximo;
        $miniatura_alto = $miniatura_alto_maximo;
    }

    switch ($imagen_tipo) {
        case "image/jpg":
        case "image/jpeg":
            $imagen = \imagecreatefromjpeg($ruta_imagen);
            break;
        case "image/png":
            $imagen = \imagecreatefrompng($ruta_imagen);
            break;
        case "image/gif":
            $imagen = \imagecreatefromgif($ruta_imagen);
            break;
    }
    $lienzo = imagecreatetruecolor($miniatura_ancho_maximo, $miniatura_alto_maximo);

    imagecopyresampled($lienzo, $imagen, 0, 0, 0, 0, $miniatura_ancho_maximo, $miniatura_alto_maximo, $imagen_ancho, $imagen_alto);


    imagejpeg($lienzo, '../IMAGES/pr_' . $nombre, 80);
}

function crear_img_marca($ruta, $nombre) {
    $ruta_imagen = $ruta;

    $miniatura_ancho_maximo = 170;
    $miniatura_alto_maximo = 170;

    $info_imagen = getimagesize($ruta_imagen);
    $imagen_ancho = $info_imagen[0];
    $imagen_alto = $info_imagen[1];
    $imagen_tipo = $info_imagen['mime'];


    $proporcion_imagen = $imagen_ancho / $imagen_alto;
    $proporcion_miniatura = $miniatura_ancho_maximo / $miniatura_alto_maximo;

    if ($proporcion_imagen > $proporcion_miniatura) {
        $miniatura_ancho = $miniatura_ancho_maximo;
        $miniatura_alto = $miniatura_ancho_maximo / $proporcion_imagen;
    } else if ($proporcion_imagen < $proporcion_miniatura) {
        $miniatura_ancho = $miniatura_ancho_maximo * $proporcion_imagen;
        $miniatura_alto = $miniatura_alto_maximo;
    } else {
        $miniatura_ancho = $miniatura_ancho_maximo;
        $miniatura_alto = $miniatura_alto_maximo;
    }

    switch ($imagen_tipo) {
        case "image/jpg":
        case "image/jpeg":
            $imagen = \imagecreatefromjpeg($ruta_imagen);
            break;
        case "image/png":
            $imagen = \imagecreatefrompng($ruta_imagen);
            break;
        case "image/gif":
            $imagen = \imagecreatefromgif($ruta_imagen);
            break;
    }
    $lienzo = imagecreatetruecolor($miniatura_ancho_maximo, $miniatura_alto_maximo);

    imagecopyresampled($lienzo, $imagen, 0, 0, 0, 0, $miniatura_ancho_maximo, $miniatura_alto_maximo, $imagen_ancho, $imagen_alto);


    imagejpeg($lienzo, '../IMAGES/ma_' . $nombre, 80);
}

function crear_img_ga($ruta, $nombre) {
    $ruta_imagen = $ruta;

    $miniatura_ancho_maximo = 100;
    $miniatura_alto_maximo = 100;

    $info_imagen = getimagesize($ruta_imagen);
    $imagen_ancho = $info_imagen[0];
    $imagen_alto = $info_imagen[1];
    $imagen_tipo = $info_imagen['mime'];


    $proporcion_imagen = $imagen_ancho / $imagen_alto;
    $proporcion_miniatura = $miniatura_ancho_maximo / $miniatura_alto_maximo;

    if ($proporcion_imagen > $proporcion_miniatura) {
        $miniatura_ancho = $miniatura_ancho_maximo;
        $miniatura_alto = $miniatura_ancho_maximo / $proporcion_imagen;
    } else if ($proporcion_imagen < $proporcion_miniatura) {
        $miniatura_ancho = $miniatura_ancho_maximo * $proporcion_imagen;
        $miniatura_alto = $miniatura_alto_maximo;
    } else {
        $miniatura_ancho = $miniatura_ancho_maximo;
        $miniatura_alto = $miniatura_alto_maximo;
    }

    switch ($imagen_tipo) {
        case "image/jpg":
        case "image/jpeg":
            $imagen = \imagecreatefromjpeg($ruta_imagen);
            break;
        case "image/png":
            $imagen = \imagecreatefrompng($ruta_imagen);
            break;
        case "image/gif":
            $imagen = \imagecreatefromgif($ruta_imagen);
            break;
    }
    $lienzo = imagecreatetruecolor($miniatura_ancho_maximo, $miniatura_alto_maximo);

    imagecopyresampled($lienzo, $imagen, 0, 0, 0, 0, $miniatura_ancho_maximo, $miniatura_alto_maximo, $imagen_ancho, $imagen_alto);


    imagejpeg($lienzo, '../IMAGES/ga_' . $nombre, 80);
}

function crear_img_tienda($ruta, $nombre) {
    $ruta_imagen = $ruta;

    $miniatura_ancho_maximo = 454;
    $miniatura_alto_maximo = 447;

    $info_imagen = getimagesize($ruta_imagen);
    $imagen_ancho = $info_imagen[0];
    $imagen_alto = $info_imagen[1];
    $imagen_tipo = $info_imagen['mime'];


    $proporcion_imagen = $imagen_ancho / $imagen_alto;
    $proporcion_miniatura = $miniatura_ancho_maximo / $miniatura_alto_maximo;

    if ($proporcion_imagen > $proporcion_miniatura) {
        $miniatura_ancho = $miniatura_ancho_maximo;
        $miniatura_alto = $miniatura_ancho_maximo / $proporcion_imagen;
    } else if ($proporcion_imagen < $proporcion_miniatura) {
        $miniatura_ancho = $miniatura_ancho_maximo * $proporcion_imagen;
        $miniatura_alto = $miniatura_alto_maximo;
    } else {
        $miniatura_ancho = $miniatura_ancho_maximo;
        $miniatura_alto = $miniatura_alto_maximo;
    }

    switch ($imagen_tipo) {
        case "image/jpg":
        case "image/jpeg":
            $imagen = \imagecreatefromjpeg($ruta_imagen);
            break;
        case "image/png":
            $imagen = \imagecreatefrompng($ruta_imagen);
            break;
        case "image/gif":
            $imagen = \imagecreatefromgif($ruta_imagen);
            break;
    }
    $lienzo = imagecreatetruecolor($miniatura_ancho_maximo, $miniatura_alto_maximo);

    imagecopyresampled($lienzo, $imagen, 0, 0, 0, 0, $miniatura_ancho_maximo, $miniatura_alto_maximo, $imagen_ancho, $imagen_alto);


    imagejpeg($lienzo, '../IMAGES/tn_' . $nombre, 80);
}