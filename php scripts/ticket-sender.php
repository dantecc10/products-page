<?php
session_start();
require '../vendor/autoload.php';
$dotenv = Dotenv\Dotenv::createImmutable('/var/www/vhosts/castelancarpinteyro.com/comercial.castelancarpinteyro.com');
$dotenv->load();

use chillerlan\QRCode\QRCode;

$data = 'comercial.castelancarpinteyro.com/tickets/digital-ticket-4.pdf';

include "mail-sending-settings.php";
$mail->ClearAllRecipients();
//$mail->AddAddress("dantecc10@gmail.com");
$mail->AddCC("dante@castelancarpinteyro.com");
$mail->IsHTML(true);  // Podemos activar o desactivar HTML en el mensaje
$mail->Subject = 'Confirmación de compra #4 - ' . $_ENV['BUSINESS_NAME'];
$style = '<style>';
$style .= file_get_contents("../assets/bootstrap/css/bootstrap.min.css");
$style .= file_get_contents("../assets/css/Bootstrap-Callout-Info.css");
$style .= file_get_contents("../assets/css/extra.css");
$style .= '</style>';
$msg = ('<!DOCTYPE html>
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
            ' . $style .
    '   </head>
        <body class="bg-aqua">');

$data = 'comercial.castelancarpinteyro.com/tickets/digital-ticket-4.pdf';
$msg .= ('  <div class="container">
                <div class="col">
                    <div class="row">
                        <h1 class="shadow text-dark text-center my-4 main-branding-text-color fw-bold fs-1">Ticket digital de compra.</h1>
                    </div>
                    <div class="row text-center">
                        <h2 class="shadow" fs-3>Compra #45676456</h2>
                    </div>
                    <div class="row fs-4 text-center">
                        <p>¡Hola, Dante! Te enviamos el archivo PDF del ticket de compra para que lo descargues. También podrás consultarlo en el siguiente link:</p>
                        <p class="btn btn-primary main-branding-background-color"><a href="https://comercial.castelancarpinteyro.com/tickets/digital-ticket-4.pdf">Click aquí para verlo en el navegador.</a></p>
                        <p class="fs-6">Si este email llegó a tu bandeja de <i>Spam</i>, por favor, informa que no lo es y múevelo a <i>Principal</i> para recibir ahí tus siguientes tickets.</p>
                    </div>
                    <div class="row">
                        <div class="col d-flex justify-content-center">
                            <a href="' . $data . '">
                                <img src="' . (new QRCode)->render($data) . '">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </body>
        </html>');
$mail->Body = $msg;
$mail->addAttachment("../tickets/digital-ticket-4.pdf", "Ticket de Compra #4 - " . $_ENV['BUSINESS_NAME']);

try {
    $mail->Send();
    // Resto del código...
    echo ("Correo enviado 'con éxito'");
} catch (Exception $e) {
    echo "Error al enviar el correo electrónico: " . $mail->ErrorInfo;
    echo "Excepción lanzada: " . $e->getMessage();
}
