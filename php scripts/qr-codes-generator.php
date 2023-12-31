<?php
require '../vendor/autoload.php';

use chillerlan\QRCode\{QRCode, QROptions, QRImage, QRGdImage};
use chillerlan\Settings\SettingsContainerInterface;

$options = new QROptions([
    'version'    => 10, // Tamaño del código (1-40), 10 es grande
    'outputType' => QRCode::OUTPUT_IMAGE_PNG,
    'eccLevel'   => QRCode::ECC_H, // Nivel de corrección de errores alto
]);
$url = "comercial.castelancarpinteyro.com";
// Crea una instancia del generador QR
$qr = new QRCode($options);

// Genera el código QR y guarda la imagen
$imagenQR = $qr->render($url);
$rutaImagen = '/var/www/vhosts/castelancarpinteyro.com/comercial.castelancarpinteyro.com/qrcodes/qrcode_' . time() . '.png'; // Nombre del archivo con una marca de tiempo para evitar sobrescribir

// Guarda la imagen QR
file_put_contents($rutaImagen, $imagenQR);

// Devuelve la ruta de la imagen
//echo $rutaImagen;

//echo ('<img src="' . $rutaImagen . ">");
