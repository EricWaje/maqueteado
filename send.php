<?php

// DATOS TRAIDOS DEL FORM

$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$correo = $_POST['email'];
$mensaje = $_POST['message'];

// =========================================================================

// LIMPIANDO DATOS DEL FORMULARIO PARA EVITAR QUE NOS ENVIEN CODIGO MALIGNO

$nombre = ucfirst(strtolower(trim($nombre)));
$nombre = htmlspecialchars($nombre);
$nombre = filter_var($nombre, FILTER_SANITIZE_STRING);

$apellido = trim($apellido);
$apellido = htmlspecialchars($apellido);
$apellido = filter_var($apellido, FILTER_SANITIZE_STRING);

$correo = strtolower(trim($correo));
$correo = htmlspecialchars($correo);
$correo = filter_var($correo, FILTER_SANITIZE_EMAIL);

$mensaje = strtolower(trim($mensaje));
$mensaje = htmlspecialchars($mensaje);
$mensaje = filter_var($mensaje, FILTER_SANITIZE_STRING);

//=========================================================================

//ARMANDO CUERPO DEL MENSAJE

// CABECERA DEL MAIL

$header = "MIME-Version: 1.0\r\n";
$header .= 'From: OHWA <postmaster@nombredelaweb.com>' . "\r\n"; // ACA SE MODIFICA (NOMBRE O EMPRESA) y dentro de <> ponemos postmaster@nombredelaweb.com /// ejemplo PUNCH IT <postmaster@punchit.com.ar> // el mail dentro de <> puede ser el que desees (esto te va a figurar en la cabecera cuando ingrese el correo)

$header .= "Content-type: text/html; charset=utf-8\r\n";

$enviar_a = 'ericwaje03@gmail.com'; //aca va el correo en el cual queres que llegue el email que te mandan por el formulario

$asunto = 'FORMULARIO ENVIADO A TRAVES DE LA WEB'; // ej FORMULARIO ENVIADO A TRAVES DE PORTAL WEB XXXXXX // EL ASUNTO DEL MAIL JAJAJA

//===========================================================

// CUERPO DEL MAIL

$mensaje_app .= 'Nombre: ' . $nombre . '<br>';
$mensaje_app .= '<br>';
$mensaje_app .= 'Apellido: ' . $apellido . '<br>';
$mensaje_app .= '<br>';
$mensaje_app .= 'Email: ' . $correo . '<br>';
$mensaje_app .= '<br>';
$mensaje_app .= 'Mensaje: ' . $mensaje . '<br>';
$mensaje_app .= '<br>';

//=============================================================

//ENVIAMOS EL MAIL

mail($enviar_a, $asunto, $mensaje_app, $header);

//VAMOS A LA PAGINA QUE QUEREMOS DESPUES DE FINALIZAR DE ENVIAR EL MAIL
// EJEMPLO UNA WEBPAGE QUE NOS DICE SU CONSULTA SE A ENVIADO CON EXITO

header('location: http://www.google.com');

?>
