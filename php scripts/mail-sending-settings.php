<?php

namespace PHPMailer\PHPMailer;

use PHPMAILER\PHPMailer\{PHPMailer, Exception, SMTP};

require_once('../vendor/phpmailer/phpmailer/src/PHPMailer.php');
require_once('../vendor/phpmailer/phpmailer/src/SMTP.php');
require_once('../vendor/phpmailer/phpmailer/src/Exception.php');

include "credentials.php";
$data = generatePasskey('notifier');

$username = $data[2];
$password = $data[0];
$name = $data[1];

$mail = new PHPMailer;
$mail->SMTPDebug = 3;
$mail->isSMTP();
$mail->Host = "comercial.castelancarpinteyro.com"; //dominio o subdominio
$mail->SMTPSecure = 'TLS';
$mail->Port = 587;
$mail->SMTPAuth = true;
$mail->Username = $username;
$mail->Password = $password;
$mail->From = $username;
$mail->FromName = $name;
$mail->CharSet = "UTF-8";
$mail->isHTML(true);
$mail->XMailer = "Dante Castelán Carpinteyro (dante@castelancarpinteyro.com)";
//$mail->DKIM_domain = 'comercial.castelancarpinteyro.com';
//$mail->DKIM_private = '/'; // Ruta a la nueva clave privada de DKIM
//$mail->DKIM_selector = 'selector_comercial'; // Selector DKIM para comercial.castelancarpinteyro.com
//$mail->DKIM_passphrase = 'tu_nueva_passphrase'; // Contraseña de la nueva clave DKIM (si aplica)

/*
$mail->ClearAllRecipients();
$mail->AddAddress("dantecc10@gmail.com");
$mail->AddCC("dante@castelancarpinteyro.com");
$mail->IsHTML(true);  // Podemos activar o desactivar HTML en el mensaje
$mail->Subject = 'Prueba de envío de correo desde subdominio.';

$msg = ("<h1>Envío exitoso</h1>
            <p>Si este mensaje es visible, la configuración de correo en subodminio fue exitosa.</p>
            ");
$mail->Body = $msg;

try {
    $mail->Send();
    // Resto del código...
    echo ("Correo enviado 'con éxito'");
} catch (Exception $e) {
    echo "Error al enviar el correo electrónico: " . $mail->ErrorInfo;
    echo "Excepción lanzada: " . $e->getMessage();
}
*/