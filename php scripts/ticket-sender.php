<?php
session_start();
include "mail-sending-settings.php";
$mail->ClearAllRecipients();
//$mail->AddAddress("dantecc10@gmail.com");
$mail->AddCC("dante@castelancarpinteyro.com");
$mail->IsHTML(true);  // Podemos activar o desactivar HTML en el mensaje
$mail->Subject = 'Prueba de envío de correo desde subdominio.';
$msg = '<!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Document</title>
            <link rel="manifest" href="../manifest.json">
            <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
            <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i&amp;display=swap">
            <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.12.0/css/all.css">
            <link rel="stylesheet" href="../assets/css/Bootstrap-Callout-Info.css">
            <link rel="stylesheet" href="../assets/css/extra.css">
        </head>
        <body>';

    
$msg .= ('  <h1 class="fs-1">Envío exitoso</h1>
            <p class="shadow">Si este mensaje es visible, la configuración de correo en subodminio fue exitosa.</p>
        </body>
        </html>');
$mail->Body = $msg;

try {
    $mail->Send();
    // Resto del código...
    echo ("Correo enviado 'con éxito'");
} catch (Exception $e) {
    echo "Error al enviar el correo electrónico: " . $mail->ErrorInfo;
    echo "Excepción lanzada: " . $e->getMessage();
}