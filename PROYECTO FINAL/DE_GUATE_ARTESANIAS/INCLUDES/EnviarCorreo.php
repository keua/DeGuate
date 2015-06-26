<?php

include './../PHPMailer-master/class.phpmailer.php';

if (isset($_POST['Correo'])) {

// Debes editar las próximas dos líneas de código de acuerdo con tus preferencias
    $email_to = $_POST['Para'];
    $email_subject = $_POST['Asunto'];
    $email_from = $_POST['Correo'];

// Aquí se deberían validar los datos ingresados por el usuario
    if (!isset($_POST['Nombre']) ||
            !isset($_POST['Telefono']) ||
            !isset($_POST['Correo']) ||
            !isset($_POST['Mensaje'])) {

        echo "<b>Ocurrió un error y el formulario no ha sido enviado. </b><br />";
        echo "Por favor, vuelva atrás y verifique la información ingresada<br />";
        die();
    }

    $email_message = "Detalles del formulario de contacto:\n\n";
    $email_message .= "Nombre: " . $_POST['Nombre'] . "\n";
    $email_message .= "Telefono: " . $_POST['Telefono'] . "\n";
    $email_message .= "E-mail: " . $_POST['Correo'] . "\n";
    $email_message .= "Mensaje: " . $_POST['Mensaje'] . "\n\n";


// Ahora se envía el e-mail usando la función mail() de PHP
    $headers = 'From: ' . $email_from . "\r\n" .
            'Reply-To: ' . $email_from . "\r\n" .
            'X-Mailer: PHP/' . phpversion();
    if (mail($email_to, $email_subject, $email_message, $headers)) {
        header("Location:../Contacto.php");
    }
}
